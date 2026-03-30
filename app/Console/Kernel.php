<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
   protected function schedule(Schedule $schedule)
{
    // Tous les jours à minuit, vérifier les publicités actives
    $schedule->call(function () {
        \App\Models\Publicite::query()
            ->whereDate('date_fin', '<', now())
            ->update(['actif' => false]);

        \App\Models\Publicite::query()
            ->whereDate('date_debut', '<=', now())
            ->whereDate('date_fin', '>=', now())
            ->update(['actif' => true]);
    })->daily();
}

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}