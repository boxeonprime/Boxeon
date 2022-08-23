<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SubscriptionController;
use App\Jobs\SendEmailJob;
use App\Mail\OrderPlaced;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class SquareController extends Controller
{
    public $config;

    public function __construct()
    {

        $this->config = parse_ini_file(dirname(__DIR__, 3) .
            "/config/app.ini", true);

    }

    public function test()
    {
        return redirect('/home/subscriptions');

        $id = auth()->user()->id;
        $user = User::find($id);

        return new OrderPlaced($user);

        #Queue an order-placed system email
        $details['email'] = $user->email;
        $message = new OrderPlaced($user);
        SendEmailJob::dispatch($details, $message)->onQueue('emails');
        dd($response);
    }

    /*
     * Creates a one-time payment for shipping labels
     * Returns to /labels/generate
     */
    public function charge(Request $request)
    {

        $charge = json_decode($request['charge']);
        $amount = (int) $charge->amount * 100;
        $token = $this->$config['square']['access_token'];

        $response = Http::withHeaders(
            [
                'Authorization' => "Bearer " . $token,
                'Content-Type' => 'application/json',
                'Square-Version' => "2022-01-20",
            ]
        )->post($this->config['square']['paymentsEndpoint'], [
            "idempotency_key" => $charge->sourceId,
            "amount_money" => [
                "amount" => $amount,
                "currency" => "USD",
            ],
            "source_id" => $charge->sourceId,
            "autocomplete" => true,
            "location_id" => $charge->locationId,
            "note" => "Shipping labels", // make dynamic - change, not urgent
            "app_fee_money" => [
                "amount" => 3,
                "currency" => "USD"]]);

        if ($response->status() == 200) {

            $completed = json_decode($response);

            if ($completed->payment->status == 'COMPLETED') {

                return json_encode(array('status' => 'SUCCESS'));

            } else {

                return json_encode(array('status' => 'FAILURE'));
            }
        } else {

            return json_encode(array('status' => 'FAILURE'));
        }

    }

    public function createCustomer()
    {
        $id = auth()->user()->id;
        $user = User::find($id);

        $response = Http::withHeaders(
            [
                'Authorization' => "Bearer " . $this->config['square']['access_token'],
                'Content-Type' => 'application/json',
                'Square-Version' => "2022-01-20",
            ]
        )->post($this->config['square']['customersEndpoint'], [

            "given_name" => $user->billing_given_name ?? $user->given_name,
            "family_name" => $user->billing_family_name ?? $user->family_name,
            "email_address" => $user->email,
            "address" => [
                "address_line_1" => $user->billing_address_line_1 ?? $user->address_line_1,
                "address_line_2" => $user->billing_address_line_2 ?? $user->address_line_2 ?? "",
                "locality" => $user->billing_admin_area_2 ?? $user->admin_area_2,
                "administrative_district_level_1" => $user->billing_admin_area_1 ?? $user->admin_area_1,
                "postal_code" => $user->billing_postal_code ?? $user->postal_code,
                "country" => $user->billing_country_code ?? $user->country_code,
            ],
            "cardholder_name" => $user->billing_given_name ?? $user->given_name . "" . $user->billing_family_name ?? $user->family_name,
            "reference_id" => '#early',
        ]);
        return json_decode($response);

    }

    public function createPayment($request)
    {

        $response = Http::withHeaders(
            [
                'Authorization' => "Bearer " . $this->config['square']['access_token'],
                'Content-Type' => 'application/json',
                'Square-Version' => "2022-01-20",
            ]
        )->post($this->config['square']['paymentsEndpoint'], [

            "idempotency_key" => $request->sourceId,
            "amount_money" => [
                "amount" => $request['amount'],
                "currency" => "USD",
            ],
            "source_id" => $request->sourceId,
            "autocomplete" => true,
            "location_id" => $this->config['square']['locationId'],
            "reference_id" => "creator-id-" . $request['id'],

        ]);

        $created = json_decode($response);

        if (isset($created->payment->id)) {

            return $created->payment->id;

        } else {

            return false;
        }

    }

    public function createCard(Request $request)
    {
        $request = json_decode($request["upsert"]);

        $id = auth()->user()->id;
        $user = User::find($id);

        // Checkpoint 1
        if (!isset($user->customer_id)) {

            $new = self::createCustomer();

            if (isset($new->customer->id)) {

                $user->update([

                    'customer_id' => $new->customer->id,
                ]);

            } else {
                
                return json_encode(array('status' => 'Unable to verify card'));

            }
        }

        // Reload
        $user = User::find($id);

        $response = Http::withHeaders(
            [
                'Authorization' => "Bearer " . $this->config['square']['access_token'],
                'Content-Type' => 'application/json',
                'Square-Version' => "2022-01-20",
            ]
        )->post($this->config['square']['cardsEndpoint'], [

            "idempotency_key" => $request->sourceId,
            "source_id" => $request->sourceId,
            "card" => [
                "billing_address" => [
                    "address_line_1" => $user->billing_address_line_1 ?? $user->address_line_1,
                    "address_line_2" => $user->billing_address_line_2 ?? $user->address_line_2 ?? "",
                    "locality" => $user->billing_admin_area_2 ?? $user->admin_area_2,
                    "administrative_district_level_1" => $user->billing_admin_area_1 ?? $user->admin_area_1,
                    "postal_code" => $user->billing_postal_code ?? $user->postal_code,
                    "country" => $user->billing_country_code ?? $user->country_code,
                ],
                "cardholder_name" => $user->billing_given_name ?? $user->given_name . "" . $user->billing_family_name ?? $user->family_name,
                "customer_id" => $user->customer_id,
                "reference_id" => "creator-id-" . $user->id,
            ],

        ]);

        return json_decode($response);

    }

    public function createPlan($plan)
    {

        $price = (int) $plan->amount * 100;
        // Returns 
        return $response = Http::withHeaders(
            [
                'Authorization' => "Bearer " . $this->config['square']['access_token'],
                'Content-Type' => 'application/json',
                'Square-Version' => "2022-01-20",
            ]
        )->post($this->config['square']['plansEndpoint'], [

            "idempotency_key" => $plan->key,
            "object" => [
                "type" => "SUBSCRIPTION_PLAN",
                "id" => "#plan",
                "subscription_plan_data" => [
                    "name" => "Subscription box",
                    "phases" => [
                        [
                            "cadence" => $plan->cadence,
                            "recurring_price_money" => [
                                "amount" => $price,
                                "currency" => "USD",
                            ],
                        ],
                    ],
                ],
            ],

        ]);

    }

    public function createSubscription(Request $request)
    {

        $id = auth()->user()->id;
        $user = User::find($id);

        $subscription = json_decode($request['upsert']);
        $price = SubscriptionController::amount();


        // Create plans
        self::createPlan($subscription );


        // Create the subscription
        $created_at = $user->created_at->format('Y-m-d'); // C
        $response = Http::withHeaders(
            [
                'Authorization' => "Bearer " . $this->config['square']['access_token'],
                'Content-Type' => 'application/json',
                'Square-Version' => "2022-01-20",
            ]
        )->post($this->config['square']['subscriptionsEndpoint'], [

            "idempotency_key" => $subscription->sourceId,
            "plan_id" => $user->plan_id, // C
            "customer_id" => $user->customer_id,
            "card_id" => $saved->card->id,
            "location_id" => $this->config['square']['locationId'],
            "start_date" => $created_at,
            "tax_percentage" => '0',
            'timezone' => 'America/New_York',
            "source" => [
                "name" => "Boxeon",
            ]]);

        $response = json_decode($response);

        if (isset($response->subscription->id)) {

            Subscription::where('user_id', '=', $id)
                ->where('plan_id', '=', $user->plan_id)
                ->update([

                    'sub_id' => $response->subscription->id,
                    'card_id' => $response->subscription->card_id,
                    'status' => 1,
                    'square_vid' => $response->subscription->version,
                ]);

            $stock = new SubscriptionController();
            $stock->updateStock(

                $user->id, $user->version, $user->stock// C
            );

            #Queue an order placed system email
            $details['email'] = $user->email;
            $message = new OrderPlaced($user);
            SendEmailJob::dispatch($details, $message)->onQueue('emails');

            Session::flash('message', 'Thank you!');
            return json_encode(array('redirectTo' => '/home/subscriptions'));

        } else {

            return $response;
        }

    }



    public function deleteSubscription($request)
    {

        $endpoint = $this->config['square']['subscriptionsEndpoint'] . "/" . $request['sub_id'] . "/cancel";

        return $response = Http::withHeaders(
            [
                'Authorization' => "Bearer " . $this->config['square']['access_token'],
                'Content-Type' => 'application/json',
                'Square-Version' => "2022-01-20",
            ]
        )->put($endpoint);

    }

    public function updateSubscription($request)
    {

        $response = Http::withHeaders(
            [
                'Authorization' => "Bearer " . $this->config['square']['access_token'],
                'Content-Type' => 'application/json',
                'Square-Version' => "2022-01-20",
            ]
        )->put($this->config['square']['subscriptionsEndpoint'] . "/" . $request['sub_id'], [

            "subscription" => [
                "cadence" => $request['cadence'],
                "version" => $request['square_vid'],
            ],
        ]);

        return json_decode($response);

    }

    public function __destruct()
    {
        unset($this->config);
    }

}
