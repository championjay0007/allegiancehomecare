<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Career;

class CareerInfoRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $application;
    public $message;

    public function __construct(Career $application, $message)
    {
        $this->application = $application;
        $this->message = $message;
    }

    public function build()
    {
        return $this->subject('Additional Information Required for Your Application - Allegiance Heart & Home Care')
                    ->markdown('emails.career_info_request');
    }
}