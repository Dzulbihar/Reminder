<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Kirim extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = \App\Models\Email::all();
        return $this->subject('Progres permintaan sudah melewati target yang sudah ditentukan')
                    ->to('ahmad.dzulbihar69@gmail.com')
                    ->view('emails.kirim',[
            'email' => $email,
        ]);
    }
}
