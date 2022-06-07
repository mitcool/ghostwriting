<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPass extends Mailable
{
    use Queueable, SerializesModels;

    public $link;
    public function __construct($link)
    {
        $this->link = $link;
    }

    public function build()
    {
        return $this->view('emails.forgot-password')->with('link', $this->link);
    }
}
