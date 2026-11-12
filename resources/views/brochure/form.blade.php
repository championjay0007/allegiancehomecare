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

    /* Alert Messages */
    .alert {
        padding: 1rem 1.5rem;
        border-radius: 0.5rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        animation: slideIn 0.3s ease-out;
    }

    .alert-success {
        background: #D1FAE5;
        color: #065F46;
        border-left: 4px solid #10B981;
    }

    .alert-danger {
        background: #FEE2E2;
        color: #B91C1C;
        border-left: 4px solid #EF4444;
    }

    .alert-icon {
        margin-right: 1rem;
        font-size: 1.25rem;
    }

    .alert-content {
        text-align: left;
    }

    .alert-close {
        margin-left: auto;
        cursor: pointer;
        opacity: 0.7;
        transition: var(--transition);
    }

    .alert-close:hover {
        opacity: 1;
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

    @keyframes slideIn {
        from {
            transform: translateY(-20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
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

        .alert {
            flex-direction: column;
            align-items: flex-start;
        }

        .alert-icon {
            margin-bottom: 0.5rem;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="shape-1"></div>
    <div class="shape-2"></div>
    <div class="hero-container">
        <div class="hero-content" data-aos="fade-right">
            <h1 class="hero-title">Discover our compassionate approach to <strong>NDIS & Home care</strong></h1>
            <p class="hero-text">
                Download our Consumer Handbook to explore the personalized services we offer,
                meticulously designed for comfort, dignity, and enhanced quality of life.
            </p>
        </div>
        <div class="hero-image" data-aos="fade-left">
            <img src="https://images.squarespace-cdn.com/content/v1/65963c6f60b6d31de9c050bc/d4dc1d50-f41b-4e1f-abc8-d6d99a3c7513/shutterstock_2219183715.jpg" alt="Compassionate care consultation" class="hero-img">
        </div>
    </div>
</section>

<!-- Form Section -->
<section class="form-section">
    <div class="form-container">
        <h2 class="form-title">Get your <span>free Consumer Handbook</span> today</h2>
        <p class="form-subtitle">Complete the form below and we'll send you our detailed guide to our care services</p>
        
        <!-- Alert Messages -->
        @if(session('success'))
            <div class="alert alert-success">
                <div class="alert-icon">✓</div>
                <div class="alert-content">
                    {{ session('success') }}
                </div>
                <div class="alert-close" onclick="this.parentElement.style.display='none'">×</div>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <div class="alert-icon">!</div>
                <div class="alert-content">
                    <strong>Please fix these issues:</strong>
                    <ul style="margin-top: 0.5rem; padding-left: 1.25rem;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="alert-close" onclick="this.parentElement.style.display='none'">×</div>
            </div>
        @endif
        
        <form class="download-form" method="POST" action="/download-brochure">
            @csrf
            
            <div class="form-group">
                <input type="text" name="first_name" class="form-input" placeholder="First name" value="{{ old('first_name') }}" required>
            </div>
            
            <div class="form-group">
                <input type="text" name="last_name" class="form-input" placeholder="Last name" value="{{ old('last_name') }}" required>
            </div>
            
            <div class="form-group full-width">
                <input type="email" name="email" class="form-input" placeholder="Email address" value="{{ old('email') }}" required>
            </div>
            
            <div class="form-group full-width">
                <input type="tel" name="phone" class="form-input" placeholder="Phone number" value="{{ old('phone') }}" required>
            </div>
            
            <div class="form-group">
        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
        @error('g-recaptcha-response')
            <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>
            
            <button type="submit" class="form-submit">
                <span>Download Now!</span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 15L12 3M12 15L8 11M12 15L16 11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5 17H19C20.1046 17 21 17.8954 21 19V20C21 21.1046 20.1046 22 19 22H5C3.89543 22 3 21.1046 3 20V19C3 17.8954 3.89543 17 5 17Z" stroke="currentColor" stroke-width="2"/>
                </svg>
            </button>
        </form>
    </div>
</section>

<!-- AOS Animation Script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        easing: 'ease-out-quad',
        once: true
    });

    // Auto-dismiss alerts after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 300);
            });
        }, 5000);
    });
</script>

@endsection