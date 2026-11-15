<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class PricingScheduleDownload extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $firstName,
        public string $lastName,
        public string $pricingPath,
        public string $pricingType // Added pricing type parameter
    ) {}

    public function envelope(): Envelope
    {
        $subject = $this->pricingType === 'ndis' 
            ? 'Your NDIS Pricing Schedule from Allegiance Heart & Home Care'
            : 'Your Aged Care Pricing Schedule from Allegiance Heart & Home Care';

        return new Envelope(
            subject: $subject,
        );
    }

    public function content(): Content
    {
        $pricingTypeName = $this->pricingType === 'ndis' ? 'NDIS' : 'Home Care';
        
        return new Content(
            view: 'emails.pricing-schedule',
            with: [
                'name' => $this->firstName . ' ' . $this->lastName,
                'pricingType' => $pricingTypeName,
            ],
        );
    }

    public function attachments(): array
    {
        $filename = $this->pricingType === 'ndis' 
            ? 'Allegiance-Heart-and-Home-Care-NDIS-Pricing.pdf'
            : 'Allegiance-Heart-and-Home-Care-Aged-Care-Pricing.pdf';

        return [
            Attachment::fromStorageDisk('public', $this->pricingPath)
                ->as($filename)
                ->withMime('application/pdf'),
        ];
    }
}