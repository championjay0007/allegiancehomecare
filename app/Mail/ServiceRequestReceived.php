<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ServiceRequest;

class ServiceRequestReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $serviceRequest;

    public function __construct(ServiceRequest $serviceRequest)
    {
        $this->serviceRequest = $serviceRequest;
    }

    public function build()
    {
        return $this->subject('Your Service Request Has Been Received - Allegiance Heart & Home Care')
                    ->markdown('emails.service_request_received')
                    ->with([
                        'request' => $this->serviceRequest,
                    ]);
    }
}