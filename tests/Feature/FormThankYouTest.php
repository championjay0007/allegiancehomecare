<?php

use App\Mail\BrochureDownload;
use App\Mail\NewServiceRequestNotification;
use App\Mail\PricingScheduleDownload;
use App\Mail\ServiceRequestReceived;
use App\Models\BrochureRequest;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

it('redirects booking submissions to the conversion thank-you page', function () {
    Mail::fake();

    $response = $this->postJson(route('booking.submit'), [
        'service_type' => 'home_care',
        'completing_as' => 'participant',
        'full_name' => 'Taylor Example',
        'phone' => '0400000000',
        'email' => 'taylor@example.com',
        'postcode' => '2000',
        'suburb' => 'Sydney',
        'state' => 'NSW',
        'contact_time' => 'morning',
        'hcp_services' => ['personal_care'],
        'consent' => '1',
    ]);

    $response
        ->assertOk()
        ->assertJsonPath(
            'redirect',
            route('booking.thank-you', ['type' => 'booking', 'service_type' => 'home_care'])
        );

    expect(ServiceRequest::count())->toBe(1);
    Mail::assertSent(ServiceRequestReceived::class);
    Mail::assertSent(NewServiceRequestNotification::class);
});

it('shows booking confirmation with the one-business-day follow-up', function () {
    $this->get(route('booking.thank-you', ['type' => 'booking', 'service_type' => 'ndis']))
        ->assertOk()
        ->assertSee('Thank you for submitting your form')
        ->assertSee('A care partner will contact you within 1 business day')
        ->assertSee('NDIS');
});

it('redirects brochure requests to the conversion thank-you page', function () {
    Mail::fake();
    Http::fake([
        'www.google.com/recaptcha/api/siteverify' => Http::response(['success' => true]),
    ]);
    Storage::fake('public');
    Storage::disk('public')->put('brochures/allegiance-care-brochure.pdf', 'pdf');

    $this->post(route('brochure.download'), [
        'first_name' => 'Taylor',
        'last_name' => 'Example',
        'email' => 'taylor@example.com',
        'phone' => '0400000000',
        'g-recaptcha-response' => 'valid-token',
    ])->assertRedirect(route('booking.thank-you', ['type' => 'brochure']));

    expect(BrochureRequest::count())->toBe(1);
    Mail::assertSent(BrochureDownload::class);
});

it('redirects pricing requests to the conversion thank-you page', function () {
    Mail::fake();
    Http::fake([
        'www.google.com/recaptcha/api/siteverify' => Http::response(['success' => true]),
    ]);
    Storage::fake('public');
    Storage::disk('public')->put('brochures/homecare-pricing.pdf', 'pdf');

    $this->post(route('brochure.pricingform'), [
        'first_name' => 'Taylor',
        'last_name' => 'Example',
        'email' => 'taylor@example.com',
        'phone' => '0400000000',
        'pricing_type' => 'homecare',
        'g-recaptcha-response' => 'valid-token',
    ])->assertRedirect(route('booking.thank-you', ['type' => 'pricing']));

    expect(BrochureRequest::count())->toBe(1);
    Mail::assertSent(PricingScheduleDownload::class);
});

it('shows a clear confirmation after brochure and pricing requests', function () {
    $this->get(route('booking.thank-you', ['type' => 'brochure']))
        ->assertOk()
        ->assertSee('The Consumer Handbook has been sent to your email address.');

    $this->get(route('booking.thank-you', ['type' => 'pricing']))
        ->assertOk()
        ->assertSee('Your pricing schedule has been sent to your email address.');
});
