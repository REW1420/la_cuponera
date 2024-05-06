<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {

        $schedule->command('app:check_offers_expiration_date')->everyMinute()->withoutOverlapping()->onSuccess(function () {
            error_log('Offers updated');
        })->onFailure(function () {
            error_log('Offers error');
        });

        $schedule->command('app:check_coupons_expiration_date')->everyMinute()->withoutOverlapping()->onSuccess(function () {
            error_log('Coupons update');
        })->onFailure(function () {
            error_log('Coupons error');
        });
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
