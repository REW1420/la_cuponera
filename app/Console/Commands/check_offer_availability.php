<?php

namespace App\Console\Commands;

use App\Models\Offers;
use Illuminate\Console\Command;

class check_offer_availability extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check_offer_availability';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {


        $offers = Offers::all();
        $count = 0;

        foreach ($offers as $offer) {

            if ($offer->coupon_limit_quantity <= 0) {
                $offer->where('id', $offer->id)->update(['status_id' => 4]);
                $count++;
            }

        }
        $this->info($count . ' rows affected');
    }

}




