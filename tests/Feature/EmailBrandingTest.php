<?php

use App\Mail\AdminContactNotification;
use App\Mail\BrochureDownload;
use App\Mail\CareerApplicationReceived;
use App\Mail\CareerInfoRequest;
use App\Mail\CareerInterviewInvitation;
use App\Mail\CareerRejection;
use App\Mail\ContactFormConfirmation;
use App\Mail\FeedbackComplaintSubmitted;
use App\Mail\NewCareerApplication;
use App\Mail\NewServiceRequestNotification;
use App\Mail\PricingScheduleDownload;
use App\Mail\ServiceRequestReceived;
use App\Mail\ServiceRequestResponse;
use App\Models\Career;
use App\Models\Contact;
use App\Models\FeedbackComplaint;
use App\Models\ServiceRequest;

it('uses the full brand name in email sender and subject lines', function () {
    $career = new Career(['job_position' => 'Support Worker']);
    $contact = new Contact;
    $serviceRequest = new ServiceRequest;
    $serviceRequest->id = 42;
    $feedback = new FeedbackComplaint(['category' => 'Compliment']);

    $subjects = [
        (new AdminContactNotification($contact))->build()->subject,
        (new CareerApplicationReceived($career))->build()->subject,
        (new NewCareerApplication($career))->build()->subject,
        (new CareerInfoRequest($career, 'Please send your certificate.'))->build()->subject,
        (new CareerInterviewInvitation($career, 'November 20'))->build()->subject,
        (new CareerRejection($career, 'Thank you for your time.'))->build()->subject,
        (new ContactFormConfirmation($contact))->build()->subject,
        (new NewServiceRequestNotification($serviceRequest))->build()->subject,
        (new ServiceRequestReceived($serviceRequest))->build()->subject,
        (new ServiceRequestResponse($serviceRequest, 'We will be in touch.'))->build()->subject,
        (new FeedbackComplaintSubmitted($feedback))->envelope()->subject,
        (new BrochureDownload('Taylor', 'Example', 'brochure.pdf'))->envelope()->subject,
        (new PricingScheduleDownload('Taylor', 'Example', 'pricing.pdf', 'homecare'))
            ->envelope()->subject,
    ];

    expect(config('mail.from.name'))->toBe('Allegiance Heart & Home Care');

    foreach ($subjects as $subject) {
        expect($subject)->toContain('Allegiance Heart & Home Care');
    }

    foreach ([
        (new ServiceRequestReceived($serviceRequest))->build(),
        (new NewServiceRequestNotification($serviceRequest))->build(),
        (new ServiceRequestResponse($serviceRequest, 'We will be in touch.'))->build(),
    ] as $serviceRequestMail) {
        expect($serviceRequestMail->hasFrom(
            config('mail.from.address'),
            'Allegiance Heart & Home Care'
        ))->toBeTrue();
    }
});

it('uses the full brand name in the shared service-request email layout', function () {
    config(['app.name' => 'Allegiance Home Care']);

    $serviceRequest = new ServiceRequest([
        'full_name' => 'Taylor Example',
        'service_type' => 'home_care',
    ]);
    $serviceRequest->id = 42;
    $serviceRequest->created_at = now();

    $content = html_entity_decode((new ServiceRequestReceived($serviceRequest))->render());

    expect(substr_count($content, 'Allegiance Heart & Home Care'))->toBeGreaterThanOrEqual(3);
});
