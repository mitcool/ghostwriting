<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserPin extends Mailable
{
    use Queueable, SerializesModels;

    public $pin;
    public function __construct($pin)
    {
        $this->pin = $pin;
    }

    public function build()
    {
        return $this->view('emails.user-pin')->with('pin',$this->pin);
    }
}
