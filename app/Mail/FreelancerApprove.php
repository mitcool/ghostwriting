<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FreelancerApprove extends Mailable
{
    use Queueable, SerializesModels;

    
    public $freelancer;
    public function __construct($freelancer)
    {
        $this->freelancer = $freelancer;
    }

    
    public function build()
    {
        return $this->view('emails.freelancer-approve')
            ->subject('Welcome to ghostwriting')
            ->with(['freelancer' => $this->freelancer]);
    }
}
