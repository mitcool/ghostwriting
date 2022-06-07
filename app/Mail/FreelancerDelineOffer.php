<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FreelancerDelineOffer extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice;
    public function __construct($invoice)
    {
        $this->invoice = $invoice;
    }

    public function build()
    {
        return $this->view('emails.freelancer-decline-offer')
                    ->with('invoice', $this->invoice);
    }
}
