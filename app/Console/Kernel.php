<?php

namespace App\Console;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
         $schedule->call(function () {
            $colabUsers = User::where('user_role', 'colab')->get();

            foreach ($colabUsers as $user) {
                $lastUpdated = Carbon::parse($user->updated_at);
                $now = Carbon::now();

                // Check if 90 days have passed since the user's role was last updated
                if ($now->diffInDays($lastUpdated) >= 90) {
                    $user->user_role = 'guest';
                    $user->save();
                }
            }
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
