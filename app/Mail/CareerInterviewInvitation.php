<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Career;

class CareerInterviewInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public $application;
    public $interviewDate;
    public $message;

    public function __construct(Career $application, $interviewDate, $message = null)
    {
        $this->application = $application;
        $this->interviewDate = $interviewDate;
        $this->message = $message;
    }

    public function build()
    {
        return $this->subject('Interview Invitation for ' . $this->application->job_position)
                    ->markdown('emails.career_interview_invitation');
    }
}