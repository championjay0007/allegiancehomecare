<!-- Form Section -->
@extends('layouts.care')
@section('content')


<style>
    :root {
        --primary: #1DBFAD;
        --primary-light: rgba(29, 191, 173, 0.1);
        --accent: #FF6B6B;
        --gradient: linear-gradient(135deg, #1DBFAD 0%, #00A0C6 100%);
        --gradient-hover: linear-gradient(135deg, #00A0C6 0%, #1DBFAD 100%);
        --dark: #2D3748;
        --darker: #1A202C;
        --light: #FFFFFF;
        --light-gray: #F7FAFC;
        --gray: #718096;
        --border: rgba(0, 0, 0, 0.08);
        --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
        --shadow-xl: 0 20px 25px rgba(0, 0, 0, 0.15);
        --transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        line-height: 1.6;
        color: var(--dark);
        background-color: var(--light-gray);
    }

    /* Hero Section */
    .hero-section {
        padding: 6rem 2rem;
        background: linear-gradient(135deg, rgba(255, 236, 230, 0.9) 0%, rgba(255, 248, 245, 0.9) 100%);
        position: relative;
        overflow: hidden;
    }

    .hero-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 3rem;
        position: relative;
        z-index: 2;
    }

    .hero-content {
        flex: 1 1 45%;
        min-width: 300px;
    }

    .hero-image {
        flex: 1 1 45%;
        min-width: 300px;
        position: relative;
    }

    .hero-title {
        font-size: 2.75rem;
        font-weight: 700;
        line-height: 1.2;
        color: var(--darker);
        margin-bottom: 1.5rem;
    }

    .hero-title strong {
        background: var(--gradient);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hero-text {
        font-size: 1.125rem;
        line-height: 1.8;
        color: var(--gray);
        margin-bottom: 2rem;
        max-width: 90%;
    }

    .hero-img {
        width: 100%;
        border-radius: 16px;
        box-shadow: var(--shadow-xl);
        transition: var(--transition);
        position: relative;
        z-index: 1;
    }

    .hero-img:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.2);
    }

    .shape-1 {
        position: absolute;
        width: 150px;
        height: 150px;
        background: var(--primary-light);
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        top: -50px;
        left: -50px;
        z-index: 0;
        animation: float 8s ease-in-out infinite;
    }

    .shape-2 {
        position: absolute;
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.1) 0%, rgba(255, 236, 230, 0.5) 100%);
        border-radius: 50%;
        bottom: -30px;
        right: -30px;
        z-index: 0;
        animation: float 6s ease-in-out infinite reverse;
    }

    /* Form Section */
    .form-section {
        padding: 5rem 2rem;
        background-color: var(--light);
        position: relative;
    }

    .form-container {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
    }

    .form-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--darker);
    }

    .form-subtitle {
        font-size: 1.125rem;
        color: var(--gray);
        margin-bottom: 3rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .form-title span {
        background: var(--gradient);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .download-form {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .form-group {
        position: relative;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-input {
        width: 100%;
        padding: 1rem 1.25rem;
        font-size: 1rem;
        border: 1px solid var(--border);
        border-radius: 10px;
        background-color: var(--light-gray);
        transition: var(--transition);
    }

    .form-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(29, 191, 173, 0.2);
    }

    .form-submit {
        grid-column: 1 / -1;
        background: var(--gradient);
        color: var(--light);
        padding: 1rem 2rem;
        font-size: 1rem;
        font-weight: 600;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        transition: var(--transition);
        margin-top: 1rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
    }

    .form-submit:hover {
        background: var(--gradient-hover);
        transform: translateY(-3px);
        box-shadow: var(--shadow-lg);
    }

    .form-submit svg {
        transition: var(--transition);
    }

    .form-submit:hover svg {
        transform: translateX(5px);
    }

    /* Pricing Options */
    .pricing-options {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .pricing-option {
        flex: 1;
        max-width: 200px;
    }

    .pricing-option input {
        display: none;
    }

    .pricing-option label {
        display: block;
        padding: 1rem;
        background: var(--light-gray);
        border: 1px solid var(--border);
        border-radius: 10px;
        text-align: center;
        cursor: pointer;
        transition: var(--transition);
    }

    .pricing-option input:checked + label {
        background: var(--primary-light);
        border-color: var(--primary);
        color: var(--primary);
        font-weight: 600;
    }

    /* Floating Animation */
    @keyframes float {
        0%, 100% {
            transform: translateY(0) rotate(0deg);
        }
        50% {
            transform: translateY(-20px) rotate(5deg);
        }
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .hero-title {
            font-size: 2.25rem;
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            padding: 4rem 1.5rem;
        }
        
        .hero-title {
            font-size: 2rem;
        }
        
        .hero-text {
            max-width: 100%;
        }
        
        .download-form {
            grid-template-columns: 1fr;
        }

        .pricing-options {
            flex-direction: column;
            align-items: center;
        }

        .pricing-option {
            max-width: 100%;
            width: 100%;
        }
    }

    @media (max-width: 576px) {
        .hero-section {
            padding: 3rem 1rem;
        }
        
        .hero-title {
            font-size: 1.75rem;
        }
        
        .form-title {
            font-size: 1.5rem;
        }
    }
</style>


<section class="form-section">
    <div class="form-container">
        <h2 class="form-title">Request our <span>Pricing Schedule</span></h2>
        <p class="form-subtitle">Complete the form below to receive our detailed pricing information</p>
        
        @if(session('success'))
            <div class="alert alert-success" style="background: #D1FAE5; color: #065F46; padding: 1rem; border-radius: 0.5rem; margin-bottom: 2rem;">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger" style="background: #FEE2E2; color: #B91C1C; padding: 1rem; border-radius: 0.5rem; margin-bottom: 2rem;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form class="download-form" method="POST" action="/pricingform">
            @csrf
            
            <div class="form-group full-width">
                <div class="pricing-options">
                    <div class="pricing-option">
                        <input type="radio" id="ndis" name="pricing_type" value="ndis" checked>
                        <label for="ndis">NDIS Pricing</label>
                    </div>
                    <div class="pricing-option">
                        <input type="radio" id="homecare" name="pricing_type" value="homecare">
                        <label for="homecare">Agedcare Pricing</label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <input type="text" name="first_name" class="form-input" placeholder="First name" required value="{{ old('first_name') }}">
            </div>
            
            <div class="form-group">
                <input type="text" name="last_name" class="form-input" placeholder="Last name" required value="{{ old('last_name') }}">
            </div>
            
            <div class="form-group full-width">
                <input type="email" name="email" class="form-input" placeholder="Email address" required value="{{ old('email') }}">
            </div>
            
            <div class="form-group full-width">
                <input type="tel" name="phone" class="form-input" placeholder="Phone number" required value="{{ old('phone') }}">
            </div>

            <div class="form-group full-width">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="contact_me" class="rounded text-primary border-gray-300">
                    <span>I'd like to be contacted about care options</span>
                </label>
            </div>
            
            <div class="form-group">
        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
        @error('g-recaptcha-response')
            <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>
            
            <button type="submit" class="form-submit">
                <span>Get Pricing Schedule</span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 15L12 3M12 15L8 11M12 15L16 11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5 17H19C20.1046 17 21 17.8954 21 19V20C21 21.1046 20.1046 22 19 22H5C3.89543 22 3 21.1046 3 20V19C3 17.8954 3.89543 17 5 17Z" stroke="currentColor" stroke-width="2"/>
                </svg>
            </button>
        </form>
    </div>
</section>

@endsection