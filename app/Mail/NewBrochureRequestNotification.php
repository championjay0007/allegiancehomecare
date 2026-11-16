<?php

namespace App\Mail;

use App\Models\BrochureRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewBrochureRequestNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public BrochureRequest $brochureRequest,
        public string $requestType
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New '.$this->requestType.' - Allegiance Heart & Home Care',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.new-brochure-request-notification',
            with: [
                'brochureRequest' => $this->brochureRequest,
                'requestType' => $this->requestType,
            ],
        );
    }
}
