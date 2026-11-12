<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ServiceRequest;

class NewServiceRequestNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $serviceRequest;

    public function __construct(ServiceRequest $serviceRequest)
    {
        $this->serviceRequest = $serviceRequest;
    }

    public function build()
    {
        return $this->subject('New Service Request Submission')
                    ->markdown('emails.new_service_request_notification')
                    ->with([
                        'request' => $this->serviceRequest,
                    ]);
    }
}