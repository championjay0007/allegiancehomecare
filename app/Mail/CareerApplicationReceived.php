<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Career;

class CareerApplicationReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $application;

    public function __construct(Career $application)
    {
        $this->application = $application;
    }

    public function build()
    {
        return $this->subject('Your Application Has Been Received - Allegiance Heart & Home Care')
                    ->markdown('emails.career_application_received')
                    ->with([
                        'application' => $this->application,
                    ]);
    }
}