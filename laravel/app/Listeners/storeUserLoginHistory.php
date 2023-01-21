<?php

namespace App\Listeners;

use App\Events\LoginHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\Email;
use App\Models\Kendala;

class storeUserLoginHistory
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\LoginHistory  $event
     * @return void
     */

    public function handle(LoginHistory $event)
    {
        $current_timestamp = Carbon::now()->toDateTimeString();

        $userinfo = $event->user;

        $saveHistory = DB::table('login_history')->insert(
            ['name' => $userinfo->name, 'email' => $userinfo->email, 'created_at' => $current_timestamp, 'updated_at' => $current_timestamp]
        );
        return $saveHistory;
    }

    // public function handle(LoginHistory $event)
    // {
    //     $kendalas = DB::select('SELECT * FROM kendala');
    //     foreach ($kendalas as $kendala) {
        
    //         $target = date('d F Y, H:i:s', strtotime($kendala->target));
    //         $hari_ini = date('d F Y, H:i:s');
    //         $mail = \DB::table('email')->where('id',1)->first();

    //         if($hari_ini >= $target){
    //             $kirim_email = 

    //             $email = $mail->email;
    //             $subject = $mail->subject;
    //             $body = $mail->body;
    //             $nama = $mail->nama;

    //             $data = array(
    //                 'email' => $email,
    //                 'subject' => $subject,
    //                 'body' => $body,
    //                 'nama' => $nama
    //             );

    //             \Mail::send('emails.kirim', $data, function($mail) use($email, $subject, $body, $nama){
    //                 $mail->to($email, 'no-reply')
    //                 ->subject($subject, 'no-reply');
    //                 $mail->from($email, $nama);
    //             });
    //         }
    //     }

    //     $kirim_email =0;

    //     return $kirim_email;
    // }
}
