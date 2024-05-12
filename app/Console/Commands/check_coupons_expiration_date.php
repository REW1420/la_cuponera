<?php

namespace App\Console\Commands;

use App\Models\Coupons;
use Carbon\Carbon;
use Illuminate\Console\Command;

class check_coupons_expiration_date extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check_coupons_expiration_date';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Iterate over all coupons and check if the expiration date and change the status if it expired';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now()->toDateString();

        $coupons = Coupons::where('expiration_date', '<', $now)->where('status_id', 5)->get();
        $count = 0;

        foreach ($coupons as $coupon) {

            if ($coupon->status_id == 5) {
                $coupon->where('id', $coupon->id)->update(['status_id' => 6]);
                $count++;
            }

        }
        $this->info($count . ' rows affected');
    }
}
