<?php

# DEPRECATED

namespace App\Jobs;

use App\Http\Controllers\SquareController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\ThrottlesExceptions;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;



class Subscribe implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */

    public $tries = 1;
    public $id;

    public function __construct()
    {

        //$this->id = $id;

    }

    public function price($quantity, $cadence, $basePrice)
    {

        if ($cadence == 1) {
            $price = $basePrice;
        } else if ($cadence == 2) {
            $price = $basePrice + 1;
        } else if ($cadence == 3) {
            $price = $basePrice + 2;
        } else if ($cadence == 0) {
            $price = $basePrice + 3;
        }

        return $price * $quantity;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        dispatch(function () {

            $square = new SquareController();

            $plan = DB::table("subscriptions")
            // ->where("user_id", "=", $this->id)
                ->where("sub_id", "=", null)
                ->where("plan_id", "!=", null) // Selects subscriptions
                ->orderBy("created_at", "desc")
                ->limit(1)
                ->get();

            $upsert = array(

                "plan_id" => $plan[0]->plan_id,
                "key" => uniqid());

            $r = json_decode($square->createSubscription($upsert));

            if (isset($r->subscription->id)) {

                DB::table("subscriptions")
                    ->where("user_id", "=", $plan[0]->user_id)
                    ->where("plan_id", "=", $plan[0]->plan_id)
                    ->update([

                        'sub_id' => $r->subscription->id,
                        'status' => 1,
                        'square_vid' => $r->subscription->version,
                    ]);
            }

            # PROCESS ONE-TIME PURCHASES

            $charge = DB::table("subscriptions")
                ->where("sub_id", "=", null)
                ->where("frequency", "=", 0) // selects one-time purchases
                ->orderBy("created_at", "desc")
                ->limit(1)
                ->get();

            $product = DB::table("products")
                ->where("id", "=", $charge[0]["product_id"])
                ->get();

            $charge = json_encode($charge);

            $charge->price = self::price($charge[0]["quantity"], $charge[0]["frequency"], $product[0]["basePrice"]);

            $charge->key = uniqid();
           // $square->charge($charge);

        })->afterResponse();
    }

    /**
     * Get the middleware the job should pass through.
     *
     * @return array
     */
    public function middleware()
    {
        return [new ThrottlesExceptions(1, 5)];
    }

    /**
     * Determine the time at which the job should timeout.
     *
     * @return \DateTime
     */
    public function retryUntil()
    {
        return now()->addMinutes(5);
    }

}
