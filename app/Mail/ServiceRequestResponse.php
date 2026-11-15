<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ServiceRequest;

class ServiceRequestResponse extends Mailable
{
    use Queueable, SerializesModels;

    public $serviceRequest;
    public $response;
    public $isAdminCopy;

    public function __construct(ServiceRequest $serviceRequest, string $response, bool $isAdminCopy = false)
    {
        $this->serviceRequest = $serviceRequest;
        $this->response = $response;
        $this->isAdminCopy = $isAdminCopy;
    }

    public function build()
    {
        $subject = $this->isAdminCopy 
            ? "[Admin Copy] Response to Service Request #{$this->serviceRequest->id}"
            : "Response to Your Service Request #{$this->serviceRequest->id}";
        $subject .= ' - Allegiance Heart & Home Care';

        return $this->subject($subject)
            ->markdown('emails.service_request_response')
            ->with([
                'request' => $this->serviceRequest,
                'response' => $this->response,
                'isAdminCopy' => $this->isAdminCopy,
            ]);
    }
}