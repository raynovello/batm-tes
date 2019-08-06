<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {

            $data = \App\Customer::all();

            foreach ($data as $key => $value) {
                if (filter_var($value->email, FILTER_VALIDATE_EMAIL)) {
                    $data = new \App\FinalCustomer();
                    $data->name = $value->name;
                    $data->email = $value->email;
                    $data->phone = $value->phone;
                    $data->address = $value->address;
                    $data->save();
                }
            }

            \App\Customer::truncate();

        })->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
