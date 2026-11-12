<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class BrochureDownload extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $firstName,
        public string $lastName,
        public string $brochurePath
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Allegiance Care Brochure',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.brochure-download',
            with: [
                'name' => $this->firstName . ' ' . $this->lastName,
            ],
        );
    }

  
        public function attachments(): array
{
    return [
        Attachment::fromStorageDisk('public', $this->brochurePath)
            ->as('Allegiance-Care-Services.pdf')
            ->withMime('application/pdf')
    ];
}
}

