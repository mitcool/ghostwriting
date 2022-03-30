<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email =  $this->view('emails.payment-email')
            ->with(['order'=>$this->order]);

        foreach ($this->order->invoices as $invoice) {
            info(storage_path('public'));
            $email->attach(storage_path('app\public').'\\'.$invoice->id.'.pdf');
        }

        return $email;
    }
}
