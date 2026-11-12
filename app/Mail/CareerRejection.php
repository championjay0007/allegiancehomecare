<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Career;

class CareerRejection extends Mailable
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
        return $this->subject('Update on Your Application for ' . $this->application->job_position)
                    ->markdown('emails.career_rejection');
    }
}