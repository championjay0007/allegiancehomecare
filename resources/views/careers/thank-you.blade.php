@extends('layouts.care')

@section('title', 'Thank You for Your Application')

@section('content')
<section class="career-thank-you" aria-labelledby="career-thank-you-title">
    <div class="career-thank-you-card">
        <div class="career-thank-you-icon" aria-hidden="true">
            <i class="fas fa-check"></i>
        </div>
        <h1 id="career-thank-you-title">Thank you for your application.</h1>
        <p>We've received your details and resume. Our team will review your application and contact you if your experience and availability match a current or upcoming opportunity with Allegiance Heart &amp; Home Care.</p>
        <p>We appreciate your interest in joining our care team.</p>
        <div class="career-thank-you-actions">
            <a href="{{ route('careers') }}">Back to Careers</a>
            <a href="{{ route('home') }}">Return to Home</a>
        </div>
    </div>
</section>

<style>
    .career-thank-you {
        min-height: 55vh;
        display: grid;
        place-items: center;
        padding: 3rem 1.25rem;
        background: #f4f8f7;
    }

    .career-thank-you-card {
        width: min(100%, 680px);
        padding: clamp(2rem, 6vw, 4rem);
        background: #fff;
        border: 1px solid #e2ece9;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 12px 36px rgba(24, 67, 60, 0.08);
    }

    .career-thank-you-icon {
        width: 56px;
        height: 56px;
        display: grid;
        place-items: center;
        margin: 0 auto 1.25rem;
        border-radius: 50%;
        background: #e4f5f1;
        color: #138875;
        font-size: 1.35rem;
    }

    .career-thank-you-card h1 {
        margin: 0 0 1rem;
        color: #183b35;
        font-size: clamp(1.8rem, 5vw, 2.4rem);
        line-height: 1.2;
    }

    .career-thank-you-card p {
        max-width: 540px;
        margin: 0 auto 0.9rem;
        color: #52645f;
        line-height: 1.7;
    }

    .career-thank-you-actions {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 0.75rem;
        margin-top: 1.75rem;
    }

    .career-thank-you-actions a {
        display: inline-block;
        padding: 0.7rem 1.1rem;
        border: 1px solid #138875;
        border-radius: 5px;
        color: #087b6a;
        font-weight: 600;
        text-decoration: none;
        transition: background-color 150ms ease, color 150ms ease;
    }

    .career-thank-you-actions a:hover {
        background: #138875;
        color: #fff;
    }

    .career-thank-you-actions a:focus-visible {
        outline: 3px solid #ffbf47;
        outline-offset: 3px;
    }

    @media (max-width: 480px) {
        .career-thank-you {
            min-height: 0;
            padding: 2rem 1rem;
        }
    }
</style>
@endsection
