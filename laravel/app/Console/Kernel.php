<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    // protected function schedule(Schedule $schedule)
    // {
    //     // $schedule->command('inspire')->hourly();
    //     $now = Carbon::now();
    //     $month = $now->format('F');
    //     $year = $now->format('yy');

    //     $fourthFridayMonthly = new Carbon('fourth friday of ' . $month . ' ' . $year);

    //     $schedule->job(new SendEmailJob)->monthlyOn($fourthFridayMonthly->format('d'), '13:46');
    // }

    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $now = Carbon::now();

        $kendalas = DB::select('SELECT * FROM kendala');
        foreach ($kendalas as $kendala) {
            //$target = date('d F Y, H:i:s', strtotime($kendala->target));
            $target = date('d F Y, H:i:s', strtotime('-2 days', strtotime($kendala->target)));                  //tanggal 25 - 2 = 23
            $hari_ini = date('d F Y, H:i:s'); 

            if($hari_ini >= $target && $kendala->status==0){
                $schedule->job(new SendEmailJob);
            }
        }

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
