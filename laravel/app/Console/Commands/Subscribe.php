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

        $this->info('Subscription retried successfully');
    }
}
