<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\SquareController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class Subscribe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'retry:sub';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retry subscriptions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        dispatch(function () {

            $square = new SquareController();

            $plan = DB::table("subscriptions")

                ->where("sub_id", "=", null)
                ->where("plan_id", "!=", null) // Selects subscriptions
                ->orderBy("created_at", "desc")
                ->limit(1)
                ->get();

            $upsert = array(

                "plan_id" => $plan[0]->plan_id,
                "user_id" => $plan[0]->user_id,
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

            $charge = json_encode($charge[0]);

            $charge->price = self::price($charge->quantity, $charge->frequency, $product[0]["basePrice"]);

            $charge->key = uniqid();
            $square->charge($charge);

        });
    }


}