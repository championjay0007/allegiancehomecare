@extends('layouts.care')

@section('title', str_contains(strtolower($service->slug . ' ' . $service->title), 'self-management')
    ? 'Self-Managed Support at Home | Allegiance Heart & Home Care'
    : (str_contains(strtolower($service->slug . ' ' . $service->title), 'domestic assistance')
        ? 'Domestic Assistance for Older Australians | Allegiance Heart & Home Care'
        : $service->title . ' | Allegiance Heart & Home Care'))

@section('content')
<style>
    :root {
        --primary: #1DBFAD;
        --accent: #E53935;
        --gradient: linear-gradient(135deg, #00A0C6 0%, #004E92 100%);
        --dark: #1A1A1A;
        --light: #FFFFFF;
        --gray: #6C757D;
        --light-bg: #F8F9FA;
        --shadow-sm: 0 4px 6px rgba(0, 0, 0, 0.05);
        --shadow-md: 0 10px 15px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 20px 25px rgba(0, 0, 0, 0.15);
    }
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    body {
        color: var(--dark);
        line-height: 1.7;
        overflow-x: hidden;
    }
    
    /* Hero Section */
    .service-hero {
        position: relative;
        height: 90vh;
        min-height: 600px;
        display: flex;
        align-items: center;
        overflow: hidden;
    }
    
    .hero-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        z-index: 1;
        transition: transform 0.8s cubic-bezier(0.22, 1, 0.36, 1);
        transform: scale(1.1);
    }
    
    .hero-background::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(0, 80, 146, 0.85) 0%, rgba(0, 160, 198, 0.85) 100%);
        z-index: 2;
    }
    
    .hero-content {
        position: relative;
        z-index: 3;
        color: var(--light);
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
        width: 100%;
        animation: fadeInUp 1s ease-out;
    }
    
    .service-title {
        font-size: 4rem;
        margin-bottom: 1.5rem;
        font-weight: 800;
        line-height: 1.1;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
    }
    
    .service-short-desc {
        font-size: 1.5rem;
        margin-bottom: 3rem;
        max-width: 700px;
        opacity: 0.9;
        font-weight: 300;
    }
    
    .cta-buttons {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
    }
    
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 1rem 2.5rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
        text-align: center;
        min-width: 220px;
        position: relative;
        overflow: hidden;
    }
    
    .btn-primary {
        background: var(--primary);
        color: var(--light);
        border: 2px solid var(--primary);
        box-shadow: var(--shadow-md);
    }
    
    .btn-primary:hover {
        background: transparent;
        color: var(--light);
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }
    
    .btn-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: 0.5s;
    }
    
    .btn-primary:hover::before {
        left: 100%;
    }
    
    .btn-outline {
        background: transparent;
        color: var(--light);
        border: 2px solid var(--light);
        box-shadow: var(--shadow-sm);
    }
    
    .btn-outline:hover {
        background: var(--light);
        color: var(--primary);
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }
    
    /* About Service Section */
    .about-service {
        padding: 6rem 2rem;
        background: var(--light-bg);
        position: relative;
        overflow: hidden;
    }
    
    .about-service::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 300px;
        height: 300px;
        background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="%231DBFAD" opacity="0.05"><circle cx="50" cy="50" r="40"/></svg>') no-repeat;
        background-size: contain;
        z-index: 0;
    }
    
    .section-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
        position: relative;
        z-index: 1;
    }
    
    .section-header {
        margin-bottom: 3rem;
        text-align: center;
    }
    
    .section-badge {
        display: inline-block;
        background: var(--primary);
        color: white;
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 600;
        letter-spacing: 1px;
        margin-bottom: 1rem;
        text-transform: uppercase;
    }
    
    .section-title {
        font-size: 2.8rem;
        margin-bottom: 1.5rem;
        color: var(--primary);
        position: relative;
        display: inline-block;
        font-weight: 700;
    }
    
    .gradient-text {
        background: var(--gradient);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 0;
        width: 80px;
        height: 5px;
        background: var(--accent);
        border-radius: 3px;
    }
    
    .section-subtitle {
        font-size: 1.2rem;
        color: var(--gray);
        max-width: 700px;
        margin: 0 auto;
    }
    
    .section-content {
        font-size: 1.1rem;
        color: var(--dark);
    }
    
    .section-content p {
        margin-bottom: 1.5rem;
    }
    
    .section-image {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        transition: all 0.5s cubic-bezier(0.22, 1, 0.36, 1);
        position: relative;
    }
    
    .section-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(29, 191, 173, 0.1) 0%, rgba(0, 78, 146, 0.1) 100%);
        z-index: 1;
    }
    
    .section-image:hover {
        transform: translateY(-10px) rotate(1deg);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
    }
    
    .section-image img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.8s ease;
    }
    
    .section-image:hover img {
        transform: scale(1.05);
    }
    
    /* More Info Section */
    .more-info {
        padding: 6rem 2rem;
        background: var(--light);
        position: relative;
    }
    
    .more-info::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100px;
        background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M1200 0L0 0 892.25 114.72 1200 0z" fill="%23F8F9FA"/></svg>') no-repeat;
        background-size: 100% 100%;
        z-index: 1;
    }
    
    /* Core Values Section */
    .values-section {
        padding: 6rem 2rem;
        background: var(--light-bg);
        position: relative;
        overflow: hidden;
    }
    
    .values-container {
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2.5rem;
        margin-top: 4rem;
    }
    
    .value-card {
        background: var(--light);
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: var(--shadow-sm);
        transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    
    .value-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
        background: var(--primary);
        transition: width 0.4s ease;
    }
    
    .value-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
    }
    
    .value-card:hover::before {
        width: 100%;
        opacity: 0.1;
    }
    
    .value-icon {
        font-size: 3rem;
        margin-bottom: 1.5rem;
        color: var(--primary);
        transition: transform 0.4s ease;
    }
    
    .value-card:hover .value-icon {
        transform: scale(1.2) rotate(10deg);
    }
    
    .value-title {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        font-weight: 700;
        position: relative;
        z-index: 2;
    }
    
    .value-description {
        color: var(--gray);
        position: relative;
        z-index: 2;
    }
    
    /* Process Section */
    .process-section {
        padding: 6rem 2rem;
        background: var(--light);
        position: relative;
    }
    
    .process-container {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
    }
    
    .process-timeline {
        position: absolute;
        left: 50%;
        top: 0;
        bottom: 0;
        width: 4px;
        background: linear-gradient(to bottom, var(--primary), var(--accent));
        transform: translateX(-50%);
        z-index: 1;
    }
    
    .process-steps {
        display: flex;
        flex-direction: column;
        gap: 4rem;
        position: relative;
        z-index: 2;
    }
    
    .process-step {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 4rem;
    }
    
    .step-content {
        flex: 1;
        background-color: white;
        padding: 2.5rem;
        border-radius: 20px;
        box-shadow: var(--shadow-md);
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }
    
    .step-content::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(29, 191, 173, 0.05) 0%, rgba(0, 78, 146, 0.05) 100%);
        z-index: 1;
    }
    
    .step-content:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }
    
    .step-header {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
        position: relative;
        z-index: 2;
    }
    
    .step-number {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: var(--gradient);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        font-weight: 700;
        margin-right: 1.5rem;
        flex-shrink: 0;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .step-content h3 {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 0.5rem;
    }
    
    .step-content p {
        color: var(--gray);
        line-height: 1.7;
        position: relative;
        z-index: 2;
    }
    
    .step-marker {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--gradient);
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        box-shadow: 0 0 0 8px rgba(29, 191, 173, 0.2);
    }
    
    .step-image {
        flex: 1;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        transition: all 0.5s cubic-bezier(0.22, 1, 0.36, 1);
    }
    
    .step-image:hover {
        transform: scale(1.03) rotate(1deg);
    }
    
    .step-image img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.8s ease;
    }
    
    .step-image:hover img {
        transform: scale(1.1);
    }
    
    /* Stats Section */
    .stats-section {
        padding: 6rem 2rem;
        background: var(--gradient);
        color: white;
        position: relative;
        overflow: hidden;
    }
    
    .stats-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="white" opacity="0.05"><circle cx="25" cy="25" r="20"/><circle cx="75" cy="75" r="20"/><circle cx="75" cy="25" r="10"/><circle cx="25" cy="75" r="10"/></svg>');
        z-index: 1;
    }
    
    .stats-container {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 3rem;
        text-align: center;
    }
    
    .stat-item {
        padding: 2rem;
    }
    
    .stat-number {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        background: linear-gradient(135deg, rgba(255,255,255,0.9), white);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    
    .stat-label {
        font-size: 1.2rem;
        font-weight: 500;
        opacity: 0.9;
    }
    
    /* CTA Section */
    .service-cta {
        padding: 6rem 2rem;
        background: var(--light-bg);
        text-align: center;
        position: relative;
    }
    
    .service-cta::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100px;
        background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M1200 0L0 0 892.25 114.72 1200 0z" fill="white"/></svg>') no-repeat;
        background-size: 100% 100%;
        z-index: 1;
    }
    
    .cta-container {
        max-width: 800px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }
    
    .cta-title {
        font-size: 2.8rem;
        margin-bottom: 1.5rem;
        color: var(--primary);
        font-weight: 700;
    }
    
    .cta-text {
        font-size: 1.3rem;
        margin-bottom: 3rem;
        color: var(--gray);
    }
    
    /* Custom HTML Section */
    .custom-html-section {
        padding: 6rem 2rem;
        background: var(--light);
    }
    
    .custom-html-container {
        max-width: 1200px;
        margin: 0 auto;
    }
    
    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes pulse {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
        100% {
            transform: scale(1);
        }
    }
    
    /* Responsive Design */
    @media (max-width: 992px) {
        .service-title {
            font-size: 3rem;
        }
        
        .section-title {
            font-size: 2.3rem;
        }
        
        .process-step {
            gap: 2rem;
        }
    }
    
    @media (max-width: 768px) {
        .service-hero {
            height: 80vh;
            min-height: 500px;
        }
        
        .service-title {
            font-size: 2.5rem;
        }
        
        .service-short-desc {
            font-size: 1.2rem;
        }
        
        .section-container, .info-grid {
            grid-template-columns: 1fr;
        }
        
        .section-image {
            order: -1;
        }
        
        .hero-content {
            text-align: center;
        }
        
        .cta-buttons {
            justify-content: center;
        }
        
        .process-timeline {
            display: none;
        }
        
        .process-step {
            flex-direction: column;
        }
        
        .step-marker {
            display: none;
        }
        
        .step-content, .step-image {
            width: 100%;
        }
    }
    
    @media (max-width: 576px) {
        .service-hero {
            height: 70vh;
            min-height: 400px;
        }
        
        .btn {
            min-width: 100%;
        }
        
        .stats-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

/* Related Services Section */
.related-services {
        padding: 6rem 2rem;
        background: var(--light-bg);
        position: relative;
        overflow: hidden;
    }
    
    .related-services::before {
        content: '';
        position: absolute;
        bottom: -50px;
        left: -50px;
        width: 200px;
        height: 200px;
        background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="%231DBFAD" opacity="0.05"><path d="M30,50 Q50,30 70,50 T90,50" stroke="%231DBFAD" stroke-width="2" fill="none"/></svg>') no-repeat;
        background-size: contain;
        z-index: 0;
    }
    
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
        position: relative;
        z-index: 1;
    }
    
    .service-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
        display: block;
        text-decoration: none;
        color: var(--dark);
        position: relative;
    }
    
    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
    }
    
    .card-image {
        height: 200px;
        overflow: hidden;
        position: relative;
    }
    
    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s cubic-bezier(0.22, 1, 0.36, 1);
    }
    
    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,78,146,0.3));
    }
    
    .service-card:hover .card-image img {
        transform: scale(1.1);
    }
    
    .card-content {
        padding: 2rem;
        position: relative;
    }
    
    .service-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary), #004E92);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 5px 15px rgba(29, 191, 173, 0.3);
    }
    
    .service-card h3 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        font-weight: 700;
        color: var(--dark);
        transition: color 0.3s ease;
    }
    
    .service-card p {
        color: var(--gray);
        margin-bottom: 2rem;
        font-size: 1rem;
    }
    
    .card-arrow {
        position: absolute;
        right: 2rem;
        bottom: 2rem;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--light-bg);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .service-card:hover .card-arrow {
        background: var(--primary);
        color: white;
        transform: translateX(5px);
    }
    
    .service-card:hover h3 {
        color: var(--primary);
    }
    
    @media (max-width: 768px) {
        .services-grid {
            grid-template-columns: 1fr;
        }
        
        .card-image {
            height: 180px;
        }
    }
</style>

<!-- Hero Section -->
<section class="service-hero">
    <div class="hero-background" style="background-image: url('{{ asset('storage/' . $service->image) }}');"></div>
    <div class="hero-content">
        <h1 class="service-title">{{ $service->title }}</h1>
        <p class="service-short-desc">{{ $service->short_description }}</p>
        <div class="cta-buttons">
            <a href="#contact" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone-call mr-2">
                    <path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                </svg>
                Get Started Today
            </a>
            <a href="tel:0450085223" class="btn btn-outline">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone mr-2">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                </svg>
                Call Us Now
            </a>
        </div>
    </div>
</section>

<!-- About Service Section -->
<section class="about-service">
    <div class="section-container">
        <div>
            <h2 class="section-title">About Our <span class="gradient-text">{{ $service->title }}</span> Service</h2>
            <div class="section-content">
                {!! $service->description !!}
            </div>
        </div>
        <div class="section-image">
            <img src="{{ asset('storage/' . $service->image2) }}" alt="{{ $service->title }} service">
        </div>
    </div>
</section>

<!-- More Info Section -->
<section class="more-info">
    <div class="section-container">
        <div class="section-image">
            <img src="{{ asset('storage/' . $service->image3) }}" alt="More about {{ $service->title }}">
        </div>
        <div>
            <h2 class="section-title">More <span class="gradient-text">Details</span></h2>
            <div class="section-content">
                {!! $service->more_info !!}
            </div>
        </div>
    </div>
</section>

<!-- Core Values Section -->
<section class="values-section">
    <div class="values-container">
        <div class="section-header">
            <span class="section-badge">Our Values</span>
            <h2>Core Values Behind Our <span class="gradient-text">{{ $service->title }}</span> Service</h2>
            <p class="section-subtitle">The principles that guide every aspect of our care delivery</p>
        </div>
        
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>
                    </svg>
                </div>
                <h3 class="value-title">Compassionate Care</h3>
                <p class="value-description">We provide care with genuine empathy and kindness, treating every client as we would our own family members.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                </div>
                <h3 class="value-title">Safety First</h3>
                <p class="value-description">Our highest priority is creating a safe environment where clients feel secure and protected at all times.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                </div>
                <h3 class="value-title">Client-Centered</h3>
                <p class="value-description">Every care plan is tailored to individual needs, preferences and cultural backgrounds.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                </div>
                <h3 class="value-title">Professional Excellence</h3>
                <p class="value-description">Our staff maintain the highest standards through continuous training and quality assurance.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <h3 class="value-title">Respect & Dignity</h3>
                <p class="value-description">We honor each individual's right to privacy, autonomy and respectful treatment at all times.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                </div>
                <h3 class="value-title">Transparency</h3>
                <p class="value-description">We maintain open communication and clear documentation about all aspects of care.</p>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
@if($service->features && count($service->features) > 0)
<section class="process-section">
    <div class="process-container">
        <div class="section-header">
            <span class="section-badge">Our Services</span>
            <h2>How Our <span class="gradient-text">{{ $service->title }}</span> Service Works</h2>
            <p class="section-subtitle">Simple, transparent steps to get you the care you need</p>
        </div>
        
        <div class="process-timeline"></div>
        
        <div class="process-steps">
            @foreach($service->features as $index => $feature)
            <div class="process-step @if($index % 2 == 0) step-left @else step-right @endif">
                @if($index % 2 == 0)
                <div class="step-content">
                    <div class="step-header">
                        <div class="step-number">{{ $index + 1 }}</div>
                        <h3>{{ $feature['title'] ?? 'Our Step' }}</h3>
                    </div>
                    <p>{{ $feature['description'] ?? 'Detailed description of our process step' }}</p>
                </div>
                
                <div class="step-marker">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </div>
                
                <div class="step-image">
                    @if(isset($feature['image']))
                    <img src="{{ $feature['image'] }}" alt="{{ $feature['title'] ?? 'Step ' . ($index + 1) }}">
                    @else
                    <img src="https://etimg.etb2bimg.com/thumb/msid-114496135,imgsize-31134,width-1200,height=765,overlay-ethealth/health-it/bharatbox-partners-with-goqii-to-launch-metaverse-health-and-wellness-platform.jpg" alt="Care process">
                    @endif
                </div>
                @else
                <div class="step-image">
                    @if(isset($feature['image']))
                    <img src="{{ $feature['image'] }}" alt="{{ $feature['title'] ?? 'Step ' . ($index + 1) }}">
                    @else
                    <img src="https://etimg.etb2bimg.com/thumb/msid-114496135,imgsize-31134,width-1200,height=765,overlay-ethealth/health-it/bharatbox-partners-with-goqii-to-launch-metaverse-health-and-wellness-platform.jpg" alt="Care process">
                    @endif
                </div>
                
                <div class="step-marker">
                    <svg xmlns="https://etimg.etb2bimg.com/thumb/msid-114496135,imgsize-31134,width-1200,height=765,overlay-ethealth/health-it/bharatbox-partners-with-goqii-to-launch-metaverse-health-and-wellness-platform.jpg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </div>
                
                <div class="step-content">
                    <div class="step-header">
                        <div class="step-number">{{ $index + 1 }}</div>
                        <h3>{{ $feature['title'] ?? 'Our Step' }}</h3>
                    </div>
                    <p>{{ $feature['description'] ?? 'Detailed description of our process step' }}</p>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


    
    <!-- Custom HTML Section -->
    @if($service->custom_html)
    <section class="custom-html-section">
        <div class="custom-html-container">
            {!! $service->custom_html !!}
        </div>
    </section>
    @endif




<!-- Dynamic CTA Section (NDIS vs Home Care) -->
<section class="service-cta">
    <div class="cta-container">
        @if($service->category === 'ndis')
            <!-- NDIS Specific CTA -->
            <h2 class="cta-title">Ready to Start Your <span class="gradient-text">NDIS Journey</span>?</h2>
            <p class="cta-text">Our NDIS specialists are ready to help you navigate your plan and get the most from your supports.</p>
            <div class="cta-buttons">
                <a href="/submit-form/ndis" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text mr-2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                    Submit NDIS Service Request
                </a>
                <a href="#contact" class="btn btn-outline" style="color: var(--dark); border-color: var(--dark);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle mr-2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                    </svg>
                    NDIS Support Coordination Help
                </a>
            </div>
            <p class="mt-4 text-gray-600">Not sure where to start? <a href="#contact" class="text-primary font-semibold">Contact our NDIS team</a> for guidance.</p>

        @elseif($service->category === 'home-care')
            <!-- Home Care Specific CTA -->
            <h2 class="cta-title">Need <span class="gradient-text">Home Care Support</span>?</h2>
            <p class="cta-text">Request our Consumer Handbook or speak with our care coordinators about your needs.</p>
            <div class="cta-buttons">
                <a href="/home-care-handbook" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download mr-2">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                    Download Home Care Handbook
                </a>
                <a href="#contact" class="btn btn-outline" style="color: var(--dark); border-color: var(--dark);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone mr-2">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    Request a Callback
                </a>
            </div>
            <p class="mt-4 text-gray-600">For pricing enquiries, <a href="/home-care-pricing" class="text-primary font-semibold">view our schedule</a> or call 0450 085 223.</p>
        @endif
    </div>
</section>










<!-- Related Services Section -->
<section class="related-services">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">More Services</span>
            <h2>Other <span class="gradient-text">Care Services</span> We Offer</h2>
            <p class="section-subtitle">Explore our comprehensive range of compassionate care solutions</p>
        </div>
        
        <div class="services-grid">
            @foreach($relatedServices as $service)
            <a href="{{ route('services.show', $service->slug) }}" class="service-card">
                <div class="card-image">
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}">
                    <div class="image-overlay"></div>
                </div>
                <div class="card-content">
                    <div class="service-icon">
                        @if($service->icon)
                        <i class="{{ $service->icon }}"></i>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                        @endif
                    </div>
                    <h3>{{ $service->title }}</h3>
                    <p>{{ Str::limit($service->short_description, 100) }}</p>
                    <div class="card-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>




@if($service->custom_html)
    <section class="custom-html-section py-16 bg-white">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="custom-html-container prose lg:prose-xl max-w-none">
                {!! $service->custom_html !!}
            </div>
        </div>
    </section>
@endif

<script> // Hero background animation 
window.addEventListener('scroll', function() { const hero = document.querySelector('.hero-background'); 
const scrollPosition = window.pageYOffset;
 hero.style.transform = 'scale(1.1) translateY(' + scrollPosition * 0.3 + 'px)'; }); 
 // Smooth scrolling for anchor links 
 document.querySelectorAll('a[href^="#"]').forEach(anchor => { anchor.addEventListener('click', function (e) { e.preventDefault(); document.querySelector(this.getAttribute('href')).scrollIntoView({ behavior: 'smooth' }); }); }); 
 // Animate stats counter 
function animateStats() { const statNumbers = document.querySelectorAll('.stat-number'); 
    const speed = 200; statNumbers.forEach(stat => { const target = parseInt(stat.getAttribute('data-count')); 
        const count = parseInt(stat.innerText); const increment = target / speed; if(count < target) { stat.innerText = Math.ceil(count + increment); 
            setTimeout(animateStats, 1); } else { stat.innerText = target; } }); } // Intersection Observer for animations 
            const observerOptions = { threshold: 0.1 }; const observer = new IntersectionObserver((entries, observer) => { entries.forEach(entry => { if(entry.isIntersecting) { if(entry.target.classList.contains('stats-section')) { animateStats(); } 
            entry.target.classList.add('animated'); observer.unobserve(entry.target); } }); }, observerOptions); 
            document.querySelectorAll('.section-container, .value-card, .process-step, .stats-section').forEach(section => { observer.observe(section); }); // Initialize animations when page loads document.addEventListener('DOMContentLoaded', function() 
// { // Animate hero content 
const heroContent = document.querySelector('.hero-content'); 
heroContent.style.opacity = '0'; 
heroContent.style.transform = 'translateY(30px)'; setTimeout(() => { heroContent.style.transition = 'opacity 0.8s ease-out, transform 0.8s ease-out'; 
heroContent.style.opacity = '1'; 
heroContent.style.transform = 'translateY(0)'; }, 300); }); </script>

    
    <script>
        // Simple animation for hero background on scroll
        window.addEventListener('scroll', function() {
            const hero = document.querySelector('.hero-background');
            const scrollPosition = window.pageYOffset;
            hero.style.transform = 'translateY(' + scrollPosition * 0.5 + 'px)';
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>

@endsection