<?php

namespace App\Jobs;

use App\Mail\Gmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\Email;
use DB;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = DB::select('SELECT * FROM email');
        foreach ($email as $mail) {
            $email = $mail->email;
            $subject = $mail->subject;
            $body = $mail->body;
            $nama = $mail->nama;
            
            $data = array(
                'email' => $email,
                'subject' => $subject,
                'body' => $body,
                'nama' => $nama
            );

            \Mail::send('email_template', $data, function($mail) use($email, $subject, $body, $nama){
                $mail->to($email, 'no-reply')
                    ->subject($subject, 'no-reply');
                $mail->from($email, $nama);
            });
        }
    }
}
