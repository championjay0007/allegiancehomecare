@extends('layouts.care')

@section('title', 'Thank You for Your Enquiry')

@section('content')
@php
    $serviceName = request()->query('service_type') === 'ndis' ? 'NDIS' : 'Support at Home';
@endphp
<section class="thank-you-page" aria-labelledby="thank-you-title">
    <div class="thank-you-content">
        <div class="thank-you-icon" aria-hidden="true">
            <i class="fas fa-check"></i>
        </div>
        <p class="thank-you-eyebrow">{{ $serviceName }}</p>
        <h1 id="thank-you-title">Thank you for your enquiry</h1>
        <p>Your enquiry has been received by Allegiance Heart &amp; Home Care.</p>
        <p>A member of our intake team will contact you to discuss your {{ $serviceName }} needs and next steps.</p>
        <div class="thank-you-urgent">
            <p>If your enquiry is urgent, please call us on</p>
            <a class="thank-you-phone" href="tel:0287309049">02 8730 9049</a>
        </div>
        <a class="thank-you-home" href="{{ url('/') }}">Return to home</a>
    </div>
</section>

<style>
    .thank-you-page {
        min-height: 55vh;
        display: grid;
        place-items: center;
        padding: 3rem 1.25rem;
        background: #f4f8f7;
    }

    .thank-you-content {
        width: min(100%, 680px);
        padding: clamp(2rem, 6vw, 4rem);
        background: #fff;
        border: 1px solid #e2ece9;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 12px 36px rgba(24, 67, 60, 0.08);
    }

    .thank-you-icon {
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

    .thank-you-eyebrow {
        margin: 0 0 0.5rem;
        color: #138875;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
    }

    .thank-you-content h1 {
        margin: 0 0 1rem;
        color: #183b35;
        font-size: clamp(1.8rem, 5vw, 2.4rem);
        line-height: 1.2;
    }

    .thank-you-content > p:not(.thank-you-eyebrow) {
        max-width: 540px;
        margin: 0 auto 0.9rem;
        color: #52645f;
        line-height: 1.7;
    }

    .thank-you-urgent {
        margin: 1.75rem 0 1.5rem;
        padding: 1rem;
        background: #f4f8f7;
        border-radius: 6px;
    }

    .thank-you-urgent p {
        margin: 0 0 0.25rem;
        color: #52645f;
    }

    .thank-you-phone {
        color: #087b6a;
        font-size: 1.25rem;
        font-weight: 700;
        text-decoration-thickness: 1px;
        text-underline-offset: 3px;
    }

    .thank-you-home {
        display: inline-block;
        padding: 0.7rem 1.1rem;
        border: 1px solid #138875;
        border-radius: 5px;
        color: #087b6a;
        font-weight: 600;
        text-decoration: none;
        transition: background-color 150ms ease, color 150ms ease;
    }

    .thank-you-home:hover {
        background: #138875;
        color: #fff;
    }

    .thank-you-home:focus-visible,
    .thank-you-phone:focus-visible {
        outline: 3px solid #ffbf47;
        outline-offset: 3px;
    }

    @media (max-width: 480px) {
        .thank-you-page {
            min-height: 0;
            padding: 2rem 1rem;
        }
    }
</style>
@endsection