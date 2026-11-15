<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Career;

class NewCareerApplication extends Mailable
{
    use Queueable, SerializesModels;

    public $application;

    public function __construct(Career $application)
    {
        $this->application = $application;
    }

    public function build()
    {
        return $this->subject(
            'New Career Application: ' . $this->application->job_position . ' - Allegiance Heart & Home Care'
        )
                    ->markdown('emails.new_career_application')
                    ->with([
                        'application' => $this->application,
                    ]);
    }
}