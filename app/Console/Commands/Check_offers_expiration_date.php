<?php

namespace App\Console\Commands;

use App\Models\Offers;
use Illuminate\Console\Command;

class Check_offers_expiration_date extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check_offers_expiration_date';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Iterate over all offers and check if the expiration date and change the status if it expired';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $offers = Offers::all();
        $count = 0;
        foreach ($offers as $offer) {

            $endDate = \Carbon\Carbon::parse($offer->end_date)->toDateString();

            if ($endDate === now()->toDateString()) {

                if ($offer->status_id == 1 || $offer->status_id === 2 || $offer->status_id === 3 || $offer->status_id === 5) {
                    $offer->where('id', $offer->id)->update(['status_id' => 6]);
                    $count++;
                }
            }
        }
        $this->info($count . ' rows affected');
    }



}
