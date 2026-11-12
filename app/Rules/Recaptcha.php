<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class Recaptcha implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // If the token is entirely missing
        if (empty($value)) {
            $fail('The reCAPTCHA challenge must be completed.');
            return;
        }

        // Send a POST request to Google's API endpoint
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $value,
            'remoteip' => request()->ip(),
        ]);

        // If Google says it's a bot or the token is invalid, fail the validation
        if (!$response->json('success')) {
            $fail('Anti-robot verification failed. Please try again.');
        }
    }
}