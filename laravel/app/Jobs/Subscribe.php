<?php

# DEPRECATED

namespace App\Jobs;

use App\Http\Controllers\SquareController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\Middleware\ThrottlesExceptions;



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


    public function __construct()
    {
        
        
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
            ->where("sub_id", "=", null)
            ->orderBy("plan_id", "desc")
            ->limit(1)
            ->get();

            $upsert = array(

                "plan_id" => $plan["plan_id"],
                "key" => uniqid());

            $r = json_decode($square->createSubscription($upsert));

            if (isset($r->subscription->id)) {

                DB::table("subscriptions")
                    ->where("user_id", "=", $plan["user_id"])
                    ->where("plan_id", "=", $sub["plan_id"])
                    ->update([

                        'sub_id' => $r->subscription->id,
                        'status' => 1,
                        'square_vid' => $r->subscription->version,
                    ]);
            }

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
