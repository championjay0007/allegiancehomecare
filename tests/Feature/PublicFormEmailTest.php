<?php

use App\Mail\AdminContactNotification;
use App\Mail\ContactFormConfirmation;
use App\Mail\FeedbackComplaintReceived;
use App\Mail\FeedbackComplaintSubmitted;
use App\Models\Contact;
use App\Models\FeedbackComplaint;
use Illuminate\Support\Facades\Mail;

it('sends contact form notifications to both the requester and admin', function () {
    Mail::fake();
    config(['mail.admin_address' => 'admin@example.com']);

    $this->postJson(route('contact.send'), [
        'name' => 'Taylor Example',
        'email' => 'taylor@example.com',
        'phone' => '0400000000',
        'message' => 'I would like information about your services.',
    ])->assertOk()
        ->assertJsonPath('success', true);

    expect(Contact::count())->toBe(1);
    Mail::assertSent(ContactFormConfirmation::class, fn (ContactFormConfirmation $mail): bool => $mail->hasTo('taylor@example.com'));
    Mail::assertSent(AdminContactNotification::class, fn (AdminContactNotification $mail): bool => $mail->hasTo('admin@example.com'));
});

it('sends named feedback to both the requester and admin', function () {
    Mail::fake();
    config(['mail.admin_address' => 'admin@example.com']);

    $this->post(route('feedback.store'), [
        'name' => 'Taylor Example',
        'email' => 'taylor@example.com',
        'message' => 'Thank you for the excellent support.',
        'category' => 'Other',
        'agree_terms' => '1',
    ])->assertRedirect();

    expect(FeedbackComplaint::count())->toBe(1);
    Mail::assertSent(
        FeedbackComplaintSubmitted::class,
        fn (FeedbackComplaintSubmitted $mail): bool => $mail->hasTo('admin@example.com')
    );
    Mail::assertSent(
        FeedbackComplaintReceived::class,
        fn (FeedbackComplaintReceived $mail): bool => $mail->hasTo('taylor@example.com')
            && str_contains($mail->render(), 'We received your feedback')
    );
});

it('sends anonymous feedback only to the admin', function () {
    Mail::fake();
    config(['mail.admin_address' => 'admin@example.com']);

    $this->post(route('feedback.store'), [
        'anonymous' => 'on',
        'message' => 'Please review this concern.',
        'category' => 'NDIS',
        'agree_terms' => '1',
    ])->assertRedirect();

    $feedback = FeedbackComplaint::query()->sole();
    expect($feedback->anonymous)->toBeTrue()
        ->and($feedback->email)->toBeNull();

    Mail::assertSent(FeedbackComplaintSubmitted::class, fn (FeedbackComplaintSubmitted $mail): bool => $mail->hasTo('admin@example.com'));
    Mail::assertNotSent(FeedbackComplaintReceived::class);
});
