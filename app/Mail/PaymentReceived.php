<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice;
    public function __construct($invoice)
    {
        $this->invoice = $invoice;
    }

    public function build()
    {
        return $this->view('emails.payment-received')
                ->with(['invoice'=>$this->invoice])
                ->attach(storage_path('app\public').'\\'.$this->invoice->invoice_number.'.pdf');
    }
}
