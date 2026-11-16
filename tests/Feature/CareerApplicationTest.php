<?php

use App\Mail\CareerApplicationReceived;
use App\Mail\NewCareerApplication;
use App\Models\Career;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

it('shows the requested career application choices', function () {
    $response = $this->get(route('careers'));

    $response
        ->assertOk()
        ->assertSee('Join Our Caring Team')
        ->assertSee('name="first_name"', false)
        ->assertSee('name="last_name"', false)
        ->assertSee('name="email"', false)
        ->assertSee('name="phone"', false)
        ->assertSee('name="job_position"', false)
        ->assertSee('name="preferred_location"', false)
        ->assertSee('name="employment_type_preference"', false)
        ->assertSee('name="work_rights"', false)
        ->assertSee('name="availability"', false)
        ->assertSee('name="referral_source"', false)
        ->assertSee('name="resume"', false)
        ->assertSee('name="cover_letter"', false)
        ->assertSee('name="consent"', false);

    foreach ([
        ...Career::ROLES,
        ...Career::LOCATIONS,
        ...Career::WORK_RIGHTS_OPTIONS,
        ...Career::AVAILABILITIES,
        ...Career::REFERRAL_SOURCES,
    ] as $option) {
        $response->assertSee($option);
    }
});

it('stores career application details and notifies the applicant and admin', function () {
    Mail::fake();
    Storage::fake('public');
    config([
        'mail.from.address' => 'sender@example.com',
        'mail.career_applications_address' => 'careers@example.com',
    ]);

    $this->postJson(route('careers.submit'), [
        'first_name' => 'Taylor',
        'last_name' => 'Example',
        'email' => 'taylor@example.com',
        'phone' => '0400000000',
        'job_position' => 'Support Worker',
        'preferred_location' => 'Sydney / NSW',
        'employment_type_preference' => 'Part-time',
        'work_rights' => 'Australian citizen',
        'availability' => 'Weekdays',
        'referral_source' => 'Allegiance website',
        'consent' => '1',
        'cover_letter' => 'I enjoy helping people.',
        'resume' => UploadedFile::fake()->create('resume.pdf', 100, 'application/pdf'),
    ])->assertOk()
        ->assertJsonPath('success', true)
        ->assertJsonPath('redirect', route('careers.thank-you'));

    $application = Career::query()->sole();

    expect($application->preferred_location)->toBe('Sydney / NSW')
        ->and($application->employment_type_preference)->toBe('Part-time')
        ->and($application->work_rights)->toBe('Australian citizen')
        ->and($application->availability)->toBe('Weekdays')
        ->and($application->referral_source)->toBe('Allegiance website')
        ->and($application->cover_letter)->toBe('I enjoy helping people.')
        ->and($application->consent)->toBeTrue();

    Storage::disk('public')->assertExists($application->resume_path);
    Mail::assertSent(CareerApplicationReceived::class, fn (CareerApplicationReceived $mail): bool => $mail->hasTo('taylor@example.com'));
    Mail::assertSent(NewCareerApplication::class, function (NewCareerApplication $mail) use ($application): bool {
        $content = html_entity_decode($mail->render());
        $mail->assertHasAttachmentFromStorageDisk('public', $application->resume_path, 'resume.pdf');

        return $mail->hasTo('careers@example.com')
            && str_contains($content, 'Sydney / NSW')
            && str_contains($content, 'Australian citizen')
            && str_contains($content, 'I enjoy helping people.')
            && str_contains($content, 'Allegiance Heart & Home Care');
    });
});

it('falls back to the sender address if cached career recipient config is missing', function () {
    Mail::fake();
    Storage::fake('public');
    config([
        'mail.from.address' => 'fallback@example.com',
        'mail.admin_address' => null,
        'mail.career_applications_address' => null,
    ]);

    $this->postJson(route('careers.submit'), [
        'first_name' => 'Taylor',
        'last_name' => 'Example',
        'email' => 'taylor@example.com',
        'phone' => '0400000000',
        'job_position' => 'Support Worker',
        'preferred_location' => 'Sydney / NSW',
        'employment_type_preference' => 'Part-time',
        'work_rights' => 'Australian citizen',
        'availability' => 'Weekdays',
        'referral_source' => 'Allegiance website',
        'consent' => '1',
        'resume' => UploadedFile::fake()->create('resume.pdf', 100, 'application/pdf'),
    ])->assertOk();

    Mail::assertSent(NewCareerApplication::class, fn (NewCareerApplication $mail): bool => $mail->hasTo('fallback@example.com'));
});

it('shows the careers confirmation at its thank-you path', function () {
    $this->get(route('careers.thank-you'))
        ->assertOk()
        ->assertSee('Thank you for your application.')
        ->assertSee("We've received your details and resume.", false)
        ->assertSee('current or upcoming opportunity with Allegiance Heart & Home Care.')
        ->assertSee('We appreciate your interest in joining our care team.')
        ->assertSee(route('careers'), false);
});
