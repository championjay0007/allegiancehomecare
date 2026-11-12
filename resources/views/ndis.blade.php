@extends('layouts.care')
@section('title', 'NDIS Services - Empowering Independence')

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
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--light-bg);
            color: var(--dark);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        .page-header {
            background: var(--gradient);
            color: var(--light);
            padding: 80px 0 60px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1579684385127-1ef15d508118?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') center/cover;
            opacity: 0.15;
            z-index: 0;
        }

        .page-header h1 {
            font-size: 2.8rem;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
        }

        .page-header p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .breadcrumb {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            position: relative;
            z-index: 1;
        }

        .breadcrumb a {
            color: var(--light);
            text-decoration: none;
            margin: 0 5px;
            transition: color 0.3s;
        }

        .breadcrumb a:hover {
            color: var(--primary);
        }

        .breadcrumb .separator {
            color: rgba(255, 255, 255, 0.7);
        }

        /* Service Categories */
        .service-categories {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
            margin: 40px 0;
        }

        .category-btn {
            background: var(--light);
            border: 2px solid var(--primary);
            color: var(--dark);
            padding: 10px 20px;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
        }

        .category-btn:hover, .category-btn.active {
            background: var(--primary);
            color: var(--light);
        }

        /* Service Cards Grid */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            margin: 50px 0;
        }

        .service-card {
            background: var(--light);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .service-card .card-header {
            background: var(--gradient);
            color: var(--light);
            padding: 20px;
            position: relative;
        }

        .service-card .card-header h3 {
            margin-bottom: 10px;
            font-size: 1.4rem;
        }

        .service-card .card-header .icon {
            position: absolute;
            right: 20px;
            top: 20px;
            font-size: 2rem;
            opacity: 0.2;
        }

        .service-card .card-body {
            padding: 20px;
        }

        .service-card .card-body p {
            margin-bottom: 20px;
            color: var(--gray);
        }

        .service-card .card-footer {
            padding: 0 20px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .service-card .learn-more {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            transition: color 0.3s;
        }

        .service-card .learn-more:hover {
            color: var(--accent);
        }

        .service-card .learn-more i {
            margin-left: 5px;
            transition: transform 0.3s;
        }

        .service-card .learn-more:hover i {
            transform: translateX(3px);
        }

        .service-card .badge {
            background: rgba(29, 191, 173, 0.1);
            color: var(--primary);
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        /* CTA Section */
        .cta-section {
            background: var(--gradient);
            color: var(--light);
            padding: 60px 0;
            text-align: center;
            margin: 80px 0;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1573497491765-dccce02b29df?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') center/cover;
            opacity: 0.1;
            z-index: 0;
        }

        .cta-section h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .cta-section p {
            max-width: 700px;
            margin: 0 auto 30px;
            position: relative;
            z-index: 1;
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            position: relative;
            z-index: 1;
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-primary {
            background: var(--light);
            color: var(--primary);
        }

        .btn-primary:hover {
            background: rgba(255, 255, 255, 0.9);
            transform: translateY(-2px);
        }

        .btn-outline {
            border: 2px solid var(--light);
            color: var(--light);
        }

        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        /* FAQ Section */
        .faq-section {
            margin: 80px 0;
        }

        .faq-section h2 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 2rem;
            color: var(--dark);
        }

        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            background: var(--light);
            border-radius: 8px;
            margin-bottom: 15px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .faq-question {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.3s;
        }

        .faq-question:hover {
            background: rgba(29, 191, 173, 0.05);
        }

        .faq-question i {
            transition: transform 0.3s;
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }

        .faq-answer {
            padding: 0 20px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s, padding 0.3s;
        }

        .faq-item.active .faq-answer {
            padding: 0 20px 20px;
            max-height: 500px;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2.2rem;
            }
            
            .services-grid {
                grid-template-columns: 1fr;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
                max-width: 300px;
                text-align: center;
            }
        }
    </style>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">Empowering Your Independence Through Quality NDIS Support</h1>
            <p class="hero-subtitle">Compassionate, personalized care designed to help you achieve your goals and live life to the fullest</p>
            
            <div class="hero-buttons">
                <a href="#services" class="btn btn-primary">
                    <i class="fas fa-list-ul"></i> View Our Services
                </a>
                <a href="https://sil.allegiancehearthomecare.com.au/" class="btn btn-secondary">
                    <!--<i class="fas fa-phone-alt"></i> Call Now: 0410299570-->
                    SIl Homes
                </a>
            </div>
        </div>
        
        <div class="hero-features">
            <div class="feature-item">
                <i class="fas fa-check-circle"></i>
                <span>NDIS Registered Provider</span>
            </div>
            <div class="feature-item">
                <i class="fas fa-check-circle"></i>
                <span>Personalized Care Plans</span>
            </div>
            <div class="feature-item">
                <i class="fas fa-check-circle"></i>
                <span>Australia-Wide Support</span>
            </div>
        </div>
    </div>
    
    <div class="hero-image">
        <img src="https://images.unsplash.com/photo-1581056771107-24ca5f033842?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Caregiver assisting NDIS participant with a smile" />
    </div>
    
    <div class="scroll-indicator">
        <span>Explore Our Services</span>
        <i class="fas fa-chevron-down"></i>
    </div>
</section>

<style>
    /* Hero Section Styles */
    .hero {
        position: relative;
        min-height: 90vh;
        display: flex;
        align-items: center;
        overflow: hidden;
        background-color: var(--dark);
        color: var(--light);
    }
    
    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        z-index: 1;
    }
    
    .hero .container {
        position: relative;
        z-index: 2;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-top: 100px;
        padding-bottom: 80px;
    }
    
    .hero-content {
        max-width: 800px;
        margin-bottom: 40px;
    }
    
    .hero-title {
        font-size: 3.2rem;
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 20px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }
    
    .hero-subtitle {
        font-size: 1.4rem;
        margin-bottom: 30px;
        opacity: 0.9;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
    }
    
    .hero-buttons {
        display: flex;
        gap: 20px;
        margin-top: 40px;
    }
    
    .btn {
        display: inline-flex;
        align-items: center;
        padding: 15px 30px;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .btn-primary {
        background: var(--primary);
        color: var(--light);
        box-shadow: 0 4px 15px rgba(29, 191, 173, 0.3);
    }
    
    .btn-primary:hover {
        background: #18a897;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(29, 191, 173, 0.4);
    }
    
    .btn-secondary {
        background: transparent;
        color: var(--light);
        border: 2px solid var(--light);
    }
    
    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: translateY(-3px);
    }
    
    .btn i {
        margin-right: 10px;
        font-size: 1.1rem;
    }
    
    .hero-features {
        display: flex;
        gap: 30px;
        margin-top: 30px;
        flex-wrap: wrap;
    }
    
    .feature-item {
        display: flex;
        align-items: center;
        font-size: 1.1rem;
        font-weight: 500;
    }
    
    .feature-item i {
        color: var(--primary);
        margin-right: 10px;
        font-size: 1.3rem;
    }
    
    .hero-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }
    
    .hero-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }
    
    .scroll-indicator {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 3;
        display: flex;
        flex-direction: column;
        align-items: center;
        color: var(--light);
        opacity: 0.8;
        animation: bounce 2s infinite;
    }
    
    .scroll-indicator i {
        margin-top: 5px;
        font-size: 1.2rem;
    }
    
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0) translateX(-50%);
        }
        40% {
            transform: translateY(-10px) translateX(-50%);
        }
        60% {
            transform: translateY(-5px) translateX(-50%);
        }
    }
    
    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .hero-title {
            font-size: 2.8rem;
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
        }
    }
    
    @media (max-width: 768px) {
        .hero {
            min-height: 80vh;
        }
        
        .hero-title {
            font-size: 2.2rem;
        }
        
        .hero-buttons {
            flex-direction: column;
            gap: 15px;
        }
        
        .hero-features {
            flex-direction: column;
            gap: 15px;
        }
        
        .btn {
            justify-content: center;
            padding: 12px 20px;
        }
    }
</style>

<script>
    // Smooth scroll for the scroll indicator
    document.querySelector('.scroll-indicator').addEventListener('click', function() {
        document.querySelector('#services').scrollIntoView({
            behavior: 'smooth'
        });
    });
</script>
    <!-- Services Section -->
<section id="services" class="services-section">
    <div class="container">
        <div class="section-header">
            <h2>Our NDIS Services</h2>
            <p>Comprehensive support designed to help you achieve your goals and live independently</p>
        </div>

        <!-- Service Categories -->
        <div class="service-categories">
            <div class="category active" data-category="all">All Services</div>
            <div class="category" data-category="daily">Daily Living</div>
            <div class="category" data-category="community">Community</div>
            <div class="category" data-category="health">Health & Therapy</div>
            <div class="category" data-category="support">Support & Plan Management</div>
        </div>

        <!-- Services Grid -->
        <div class="services-grid">
            <!-- Daily Living Services -->
            <div class="service-card" data-category="daily">
                <div class="card-icon">
                    <i class="fas fa-home"></i>
                </div>
                <h3>Accommodation/Tenancy</h3>
                <div class="card-content">
                    <p>Support to establish and maintain appropriate accommodation, including assistance with tenancy obligations, shared living arrangements, and finding suitable housing options that meet your accessibility needs.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Tenancy agreement support</li>
                        <li><i class="fas fa-check"></i> Shared living coordination</li>
                        <li><i class="fas fa-check"></i> Housing application assistance</li>
                    </ul>
                </div>
                <!--<a href="#" class="learn-more">Learn more <i class="fas fa-arrow-right"></i></a>-->
            </div>

            <div class="service-card" data-category="daily">
                <div class="card-icon">
                    <i class="fas fa-hands-helping"></i>
                </div>
                <h3>Assist Personal Activities</h3>
                <div class="card-content">
                    <p>Personal care assistance with daily activities to support your independence and wellbeing (available in Standard and High Intensity levels).</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Showering, dressing, grooming</li>
                        <li><i class="fas fa-check"></i> Mobility assistance</li>
                        <li><i class="fas fa-check"></i> High-intensity daily personal activities</li>
                        <li><i class="fas fa-check"></i> Continence management</li>
                    </ul>
                </div>
                <!--<a href="#" class="learn-more">Learn more <i class="fas fa-arrow-right"></i></a>-->
            </div>

            <div class="service-card" data-category="daily">
                <div class="card-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <h3>Daily Tasks/Shared Living</h3>
                <div class="card-content">
                    <p>Support with household tasks and shared living arrangements to maintain a comfortable and safe living environment.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Meal preparation</li>
                        <li><i class="fas fa-check"></i> Light house cleaning</li>
                        <li><i class="fas fa-check"></i> Laundry and ironing</li>
                        <li><i class="fas fa-check"></i> Shared living support</li>
                    </ul>
                </div>
                <!--<a href="#" class="learn-more">Learn more <i class="fas fa-arrow-right"></i></a>-->
            </div>

            <div class="service-card" data-category="daily">
                <div class="card-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3>Development Life Skills</h3>
                <div class="card-content">
                    <p>Training and support to develop skills for independent living and community participation.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Budgeting and money management</li>
                        <li><i class="fas fa-check"></i> Cooking and nutrition</li>
                        <li><i class="fas fa-check"></i> Personal organization</li>
                        <li><i class="fas fa-check"></i> Problem-solving skills</li>
                    </ul>
                </div>
                <!--<a href="#" class="learn-more">Learn more <i class="fas fa-arrow-right"></i></a>-->
            </div>

            <div class="service-card" data-category="daily">
                <div class="card-icon">
                    <i class="fas fa-broom"></i>
                </div>
                <h3>Household Tasks</h3>
                <div class="card-content">
                    <p>Assistance with household chores and maintenance to keep your living environment comfortable.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Vacuuming and mopping</li>
                        <li><i class="fas fa-check"></i> Dusting and cleaning</li>
                        <li><i class="fas fa-check"></i> Changing bed linen</li>
                        <li><i class="fas fa-check"></i> Basic home maintenance</li>
                    </ul>
                </div>
                <!--<a href="#" class="learn-more">Learn more <i class="fas fa-arrow-right"></i></a>-->
            </div>

            <!-- Community Participation Services -->
            <div class="service-card" data-category="community">
                <div class="card-icon">
                    <i class="fas fa-route"></i>
                </div>
                <h3>Assist Life Stage, Transition</h3>
                <div class="card-content">
                    <p>Support during major life transitions to build skills and confidence for change.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> School to work transition</li>
                        <li><i class="fas fa-check"></i> Moving out of home</li>
                        <li><i class="fas fa-check"></i> Retirement planning</li>
                        <li><i class="fas fa-check"></i> Change in living arrangements</li>
                    </ul>
                </div>
                <!--<a href="#" class="learn-more">Learn more <i class="fas fa-arrow-right"></i></a>-->
            </div>

            <div class="service-card" data-category="community">
                <div class="card-icon">
                    <i class="fas fa-car-side"></i>
                </div>
                <h3>Assist Travel/Transport</h3>
                <div class="card-content">
                    <p>Transport assistance to help you participate in community, work, education and social activities.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Medical appointments</li>
                        <li><i class="fas fa-check"></i> Work or education</li>
                        <li><i class="fas fa-check"></i> Social activities</li>
                        <li><i class="fas fa-check"></i> Shopping and errands</li>
                    </ul>
                </div>
                <!--<a href="#" class="learn-more">Learn more <i class="fas fa-arrow-right"></i></a>-->
            </div>

            <div class="service-card" data-category="community">
                <div class="card-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3>Innovative Community Participation</h3>
                <div class="card-content">
                    <p>Creative programs to enhance your social and community participation based on your interests.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Social skills development</li>
                        <li><i class="fas fa-check"></i> Interest-based activities</li>
                        <li><i class="fas fa-check"></i> Community events</li>
                        <li><i class="fas fa-check"></i> Volunteer opportunities</li>
                    </ul>
                </div>
                <!--<a href="#" class="learn-more">Learn more <i class="fas fa-arrow-right"></i></a>-->
            </div>

            <div class="service-card" data-category="community">
                <div class="card-icon">
                    <i class="fas fa-hands"></i>
                </div>
                <h3>Participate Community</h3>
                <div class="card-content">
                    <p>Support to engage in social and community activities that match your interests.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Social outings</li>
                        <li><i class="fas fa-check"></i> Recreational activities</li>
                        <li><i class="fas fa-check"></i> Cultural events</li>
                        <li><i class="fas fa-check"></i> Sports and hobbies</li>
                    </ul>
                </div>
                <!--<a href="#" class="learn-more">Learn more <i class="fas fa-arrow-right"></i></a>-->
            </div>

            <div class="service-card" data-category="community">
                <div class="card-icon">
                    <i class="fas fa-users-cog"></i>
                </div>
                <h3>Group/Centre Activities</h3>
                <div class="card-content">
                    <p>Structured group programs focusing on skill development and social interaction.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Life skills workshops</li>
                        <li><i class="fas fa-check"></i> Social groups</li>
                        <li><i class="fas fa-check"></i> Educational programs</li>
                        <li><i class="fas fa-check"></i> Therapeutic activities</li>
                    </ul>
                </div>
                <!--<a href="#" class="learn-more">Learn more <i class="fas fa-arrow-right"></i></a>-->
            </div>

            <!-- Health & Therapy Services -->
            <div class="service-card" data-category="health">
                <div class="card-icon">
                    <i class="fas fa-user-nurse"></i>
                </div>
                <h3>Community Nursing Care</h3>
                <div class="card-content">
                    <p>Specialized nursing services to support your health needs at home.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Wound care</li>
                        <li><i class="fas fa-check"></i> Catheter management</li>
                        <li><i class="fas fa-check"></i> Diabetes support</li>
                        <li><i class="fas fa-check"></i> Medication management</li>
                    </ul>
                </div>
                <!--<a href="#" class="learn-more">Learn more <i class="fas fa-arrow-right"></i></a>-->
            </div>

            <div class="service-card" data-category="health">
                <div class="card-icon">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <h3>Therapeutic Supports</h3>
                <div class="card-content">
                    <p>Professional therapies to support your development and wellbeing.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Occupational therapy</li>
                        <li><i class="fas fa-check"></i> Physiotherapy</li>
                        <li><i class="fas fa-check"></i> Speech pathology</li>
                        <li><i class="fas fa-check"></i> Behavior support</li>
                    </ul>
                </div>
                <!--<a href="#" class="learn-more">Learn more <i class="fas fa-arrow-right"></i></a>-->
            </div>

            <!-- Support Coordination Services -->
            <div class="service-card" data-category="support">
                <div class="card-icon">
                    <i class="fas fa-network-wired"></i>
                </div>
                <h3>NDIS Support Coordination</h3>
                <div class="card-content">
                    <p>Help to understand and implement your NDIS plan effectively.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Understand your plan</li>
                        <li><i class="fas fa-check"></i> Connect with providers</li>
                        <li><i class="fas fa-check"></i> Build your capacity</li>
                        <li><i class="fas fa-check"></i> Crisis resolution</li>
                    </ul>
                </div>
                <a href="#" class="learn-more">Learn more <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="service-card" data-category="support">
                <div class="card-icon">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <h3>Plan Management</h3>
                <div class="card-content">
                    <p>Expert financial management of your NDIS plan to maximise your funding and reduce administrative stress. We pay your providers, track budgets, and help you get the most from your supports.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Provider invoice processing & payment</li>
                        <li><i class="fas fa-check"></i> Real-time budget tracking & reporting</li>
                        <li><i class="fas fa-check"></i> NDIS price guide compliance</li>
                        <li><i class="fas fa-check"></i> Freedom to use registered & unregistered providers</li>
                        <li><i class="fas fa-check"></i> Monthly statements & financial reviews</li>
                    </ul>
                </div>
                <a href="#" class="learn-more">Learn more <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="service-card" data-category="daily">
                <div class="card-icon">
                    <i class="fas fa-building"></i>
                </div>
                <h3>Specialised Disability Accommodation</h3>
                <div class="card-content">
                    <p>Housing solutions for participants with extreme functional impairment.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Accessible housing</li>
                        <li><i class="fas fa-check"></i> 24/7 support</li>
                        <li><i class="fas fa-check"></i> Specialist staff</li>
                        <li><i class="fas fa-check"></i> Tailored living solutions</li>
                    </ul>
                </div>
                <!--<a href="#" class="learn-more">Learn more <i class="fas fa-arrow-right"></i></a>-->
            </div>
        </div>
        
        <div class="service-card" data-category="support">
            <div class="card-icon">
                <i class="fas fa-home"></i>
            </div>
            <h3>Supported Independent Living (SIL)</h3>
            <div class="card-content">
                <p>Support to help you live as independently as possible in your own home or in a shared living arrangement. Our team provides personalised daily living assistance, skill-building, and supervision based on your individual goals and support needs.</p>
                <ul class="service-features">
                    <li><i class="fas fa-check"></i> Personal care and daily living assistance</li>
                    <li><i class="fas fa-check"></i> 24/7 active or sleepover support</li>
                    <li><i class="fas fa-check"></i> Meal preparation and household management</li>
                    <li><i class="fas fa-check"></i> Medication and health support under RN oversight</li>
                    <li><i class="fas fa-check"></i> Social inclusion and community participation</li>
                    <li><i class="fas fa-check"></i> Development of independent living skills</li>
                </ul>
                <a href="https://sil.allegiancehearthomecare.com.au/" class="learn-more">Learn more <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

        <!-- Service Enquiry CTA (commented) -->
<!--        <div class="service-cta">-->
<!--            <div class="cta-content">-->
<!--                <h3>Not sure which services are right for you?</h3>-->
<!--                <p>Our NDIS experts can help you navigate your plan and choose the perfect combination of supports.</p>-->
<!--            </div>-->
<!--            <div class="cta-buttons">-->
<!--                <a href="#" class="btn btn-primary">-->
<!--                    <i class="fas fa-phone-alt"></i> Call Our Team-->
<!--                </a>-->
<!--                <a href="#" class="btn btn-secondary">-->
<!--                    <i class="fas fa-envelope"></i> Email Enquiry-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</section>

<style>
    /* Services Section Styles */
    .services-section {
        padding: 100px 0;
        background-color: var(--light-bg);
    }
    
    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }
    
    .section-header h2 {
        font-size: 2.5rem;
        color: var(--dark);
        margin-bottom: 15px;
    }
    
    .section-header p {
        font-size: 1.2rem;
        color: var(--gray);
        max-width: 700px;
        margin: 0 auto;
    }
    
    /* Service Categories */
    .service-categories {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 40px;
    }
    
    .category {
        padding: 10px 25px;
        border-radius: 30px;
        background: var(--light);
        border: 2px solid var(--primary);
        color: var(--dark);
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 600;
    }
    
    .category:hover, .category.active {
        background: var(--primary);
        color: var(--light);
    }
    
    /* Services Grid */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
        margin-bottom: 60px;
    }
    
    .service-card {
        background: var(--light);
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        padding: 30px;
        position: relative;
    }
    
    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    
    .card-icon {
        width: 60px;
        height: 60px;
        background: var(--gradient);
        color: var(--light);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 20px;
    }
    
    .service-card h3 {
        font-size: 1.4rem;
        margin-bottom: 15px;
        color: var(--dark);
    }
    
    .card-content p {
        color: var(--gray);
        margin-bottom: 15px;
        line-height: 1.6;
    }
    
    .service-features {
        margin: 20px 0;
        padding-left: 5px;
    }
    
    .service-features li {
        margin-bottom: 10px;
        display: flex;
        align-items: flex-start;
    }
    
    .service-features i {
        color: var(--primary);
        margin-right: 10px;
        font-size: 0.9rem;
        margin-top: 4px;
    }
    
    .learn-more {
        display: inline-flex;
        align-items: center;
        color: var(--primary);
        font-weight: 600;
        text-decoration: none;
        margin-top: 15px;
        transition: color 0.3s ease;
    }
    
    .learn-more:hover {
        color: var(--accent);
    }
    
    .learn-more i {
        margin-left: 8px;
        font-size: 0.9rem;
        transition: transform 0.3s ease;
    }
    
    .learn-more:hover i {
        transform: translateX(3px);
    }
    
    /* Service CTA */
    .service-cta {
        background: var(--gradient);
        color: var(--light);
        border-radius: 10px;
        padding: 40px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
    }
    
    .cta-content h3 {
        font-size: 1.6rem;
        margin-bottom: 10px;
    }
    
    .cta-content p {
        opacity: 0.9;
        max-width: 600px;
    }
    
    .cta-buttons {
        display: flex;
        gap: 15px;
    }
    
    .btn {
        display: inline-flex;
        align-items: center;
        padding: 12px 25px;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .btn-primary {
        background: var(--light);
        color: var(--primary);
    }
    
    .btn-primary:hover {
        background: rgba(255, 255, 255, 0.9);
        transform: translateY(-2px);
    }
    
    .btn-secondary {
        background: transparent;
        color: var(--light);
        border: 2px solid var(--light);
    }
    
    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: translateY(-2px);
    }
    
    .btn i {
        margin-right: 8px;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .services-grid {
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        }
    }
    
    @media (max-width: 768px) {
        .section-header h2 {
            font-size: 2rem;
        }
        
        .service-card {
            padding: 25px;
        }
        
        .service-cta {
            flex-direction: column;
            text-align: center;
            gap: 25px;
        }
        
        .cta-buttons {
            width: 100%;
            flex-direction: column;
        }
        
        .btn {
            justify-content: center;
            width: 100%;
        }
    }
    
    @media (max-width: 480px) {
        .services-grid {
            grid-template-columns: 1fr;
        }
        
        .category {
            padding: 8px 15px;
            font-size: 0.9rem;
        }
    }
</style>

<script>
    // Service Category Filter
    document.querySelectorAll('.category').forEach(category => {
        category.addEventListener('click', () => {
            // Update active category
            document.querySelectorAll('.category').forEach(c => c.classList.remove('active'));
            category.classList.add('active');
            
            const categoryName = category.dataset.category;
            const serviceCards = document.querySelectorAll('.service-card');
            
            // Filter services
            serviceCards.forEach(card => {
                if (categoryName === 'all' || card.dataset.category === categoryName) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
</script>

        <!-- CTA Section -->
        <div class="cta-section">
            <h2>Ready to Get Started With NDIS Support?</h2>
            <p>Our team is here to help you navigate the NDIS and access the services you need to live your best life.</p>
            <div class="cta-buttons">
                <a href="/contact" class="btn btn-primary">Request a Callback</a>
                <a href="/download-brochure" class="btn btn-outline">Read NDIS Guide</a>
            </div>
        </div>

        
<!-- FAQ Section -->
<section class="faq-section">
    <div class="container">
        <div class="section-header">
            <h2>NDIS Services FAQs</h2>
            <p>Answers to common questions about our NDIS services and supports</p>
        </div>

        <div class="faq-tabs">
            <div class="tab-buttons">
                <button class="tab-btn active" data-tab="general">General Questions</button>
                <button class="tab-btn" data-tab="participants">For Participants</button>
                <button class="tab-btn" data-tab="coordination">Others</button>
            </div>

            <div class="tab-content active" id="general">
                <div class="faq-accordion">
                    <!-- General Questions -->
                    <div class="faq-item">
                        <div class="faq-question">
                            <h3>What types of services does Allegiance offer under the NDIS?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>We offer a comprehensive range of NDIS services including:</p>
                            <ul>
                                <li><strong>Core supports:</strong> Personal care, assistance with daily living, transport</li>
                                <li><strong>Capacity building:</strong> Life skills development, therapy supports, employment support</li>
                                <li><strong>Community participation:</strong> Social and recreational activities</li>
                                <li><strong>Support coordination:</strong> Help to implement your NDIS plan</li>
                                <li><strong>Specialist supports:</strong> High-intensity daily personal activities, specialist disability accommodation</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <h3>Who can use your NDIS services?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Our NDIS services are available to:</p>
                            <ul>
                                <li>NDIS participants with approved plans (self-managed, plan-managed or agency-managed)</li>
                                <li>Individuals under 65 years old with permanent and significant disability</li>
                                <li>Australian citizens or permanent residents</li>
                                <li>People with NDIS plans that include the specific supports we provide</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <h3>Are your services available Australia-wide?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Yes, we provide NDIS services across all states and territories in Australia. Our care teams are located in major cities and many regional areas. Service availability may vary in some remote locations - please contact us to check availability in your specific area.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <h3>How do I start services with Allegiance?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Starting services is simple:</p>
                            <ol>
                                <li>Contact us via phone, email or our website enquiry form</li>
                                <li>We'll arrange a free consultation to discuss your needs</li>
                                <li>Provide us with a copy of your NDIS plan (we can help you understand it)</li>
                                <li>We'll develop a service agreement tailored to your goals</li>
                                <li>Match you with suitable support workers</li>
                                <li>Services begin according to your schedule</li>
                            </ol>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <h3>Can you help me apply for NDIS funding?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Absolutely. Our team can:</p>
                            <ul>
                                <li>Explain the NDIS access process in simple terms</li>
                                <li>Help you prepare for your planning meeting</li>
                                <li>Connect you with GP or allied health referrals</li>
                                <li>Assist with completing the NDIS access request form</li>
                                <li>Support you to gather necessary evidence of disability</li>
                                <li>Help you understand what supports to request</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="participants">
                <div class="faq-accordion">
                    <!-- Participant Questions -->
                    <div class="faq-item">
                        <div class="faq-question">
                            <h3>Who is eligible for NDIS services?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>To access NDIS supports through Allegiance, you must:</p>
                            <ul>
                                <li>Be under 65 years old when first accessing the scheme</li>
                                <li>Have a permanent and significant disability that affects your ability to take part in everyday activities</li>
                                <li>Be an Australian citizen, permanent resident, or hold a Protected Special Category Visa</li>
                                <li>Live in Australia where the NDIS is available</li>
                                <li>Have an approved NDIS plan that includes the supports you're requesting</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <h3>Do you support all types of NDIS management?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Yes, we work with all NDIS management types:</p>
                            <div class="management-types">
                                <div class="type-card">
                                    <h4><i class="fas fa-user"></i> Self-Managed</h4>
                                    <p>You manage your NDIS funds and pay providers directly</p>
                                </div>
                                <div class="type-card">
                                    <h4><i class="fas fa-file-invoice-dollar"></i> Plan-Managed</h4>
                                    <p>A plan manager pays your providers and manages finances</p>
                                </div>
                                <div class="type-card">
                                    <h4><i class="fas fa-building"></i> NDIA-Managed</h4>
                                    <p>NDIS pays providers directly from your plan</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <h3>Can I request a regular support worker?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Yes, we prioritize consistency in support workers. Here's how we ensure good matches:</p>
                            <ul>
                                <li>We consider your preferences (gender, language, personality, skills)</li>
                                <li>You're involved in selecting your support team</li>
                                <li>We document your preferences in your support plan</li>
                                <li>We aim to maintain the same workers for continuity</li>
                                <li>If a worker isn't the right fit, we'll find a replacement</li>
                            </ul>
                            <p>Consistent support leads to better relationships and outcomes.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <h3>How quickly can services commence?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Our typical onboarding timeline:</p>
                            <ul>
                                <li><strong>Standard cases:</strong> 2-5 business days after receiving your request and documents</li>
                                <li><strong>Urgent cases:</strong> We prioritize and can often start within 24 hours</li>
                                <li><strong>Complex cases:</strong> May take up to 7 days to ensure proper setup</li>
                            </ul>
                            <p>Factors affecting timing:</p>
                            <ul>
                                <li>Completing our intake process</li>
                                <li>Worker availability in your area</li>
                                <li>Special requirements or complex needs</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <h3>Can I change or cancel services?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Yes, you have full control over your services:</p>
                            <ul>
                                <li><strong>Changes:</strong> You can modify services with reasonable notice (typically 24-48 hours)</li>
                                <li><strong>Cancellations:</strong> You may cancel services at any time following our cancellation policy</li>
                                <li><strong>Pauses:</strong> Services can be paused during hospital stays or vacations</li>
                                <li><strong>Worker requests:</strong> You can request a different support worker if needed</li>
                            </ul>
                            <p>We're flexible and will work with your changing needs.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="coordination">
                <div class="faq-accordion">
                    <!-- Support Coordination Questions -->
                    <div class="faq-item">
                        <div class="faq-question">
                            <h3>What is Plan Management?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Our Plan Management service includes:</p>
                            <div class="feature-grid">
                                <div class="feature">
                                    <i class="fas fa-money-bill-wave"></i>
                                    <h4>Financial Management</h4>
                                    <p>Pay providers on your behalf and track budgets</p>
                                </div>
                                <div class="feature">
                                    <i class="fas fa-file-alt"></i>
                                    <h4>Record Keeping</h4>
                                    <p>Provide monthly statements of your spending</p>
                                </div>
                                <div class="feature">
                                    <i class="fas fa-search-dollar"></i>
                                    <h4>Budget Monitoring</h4>
                                    <p>Alert you if funds are running low</p>
                                </div>
                                <div class="feature">
                                    <i class="fas fa-lock"></i>
                                    <h4>No Cost</h4>
                                    <p>Funded separately in your NDIS plan</p>
                                </div>
                            </div>
                            <p>Plan management gives you choice and control without the paperwork burden.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <h3>What is Support Coordination?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Support Coordination helps you:</p>
                            <ul>
                                <li><strong>Understand your plan:</strong> We explain your funded supports and how to use them</li>
                                <li><strong>Connect with providers:</strong> We help find services that match your needs</li>
                                <li><strong>Build capacity:</strong> We teach you to navigate the NDIS independently</li>
                                <li><strong>Coordinate supports:</strong> We ensure different providers work together effectively</li>
                                <li><strong>Prepare for reviews:</strong> We help document outcomes for your next plan</li>
                                <li><strong>Crisis resolution:</strong> We assist with urgent support needs</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <h3>What's the difference between Support Coordination and Plan Management?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <div class="comparison-table">
                                <div class="comparison-header">
                                    <div></div>
                                    <div>Support Coordination</div>
                                    <div>Plan Management</div>
                                </div>
                                <div class="comparison-row">
                                    <div>Purpose</div>
                                    <div>Helps implement your plan and connect with services</div>
                                    <div>Manages financial aspects of your plan</div>
                                </div>
                                <div class="comparison-row">
                                    <div>Activities</div>
                                    <div>Service linkage, capacity building, crisis support</div>
                                    <div>Paying providers, tracking budgets, paperwork</div>
                                </div>
                                <div class="comparison-row">
                                    <div>Funding</div>
                                    <div>Capacity Building budget</div>
                                    <div>Separate funding category</div>
                                </div>
                                <div class="comparison-row">
                                    <div>Outcome</div>
                                    <div>Increased ability to manage supports</div>
                                    <div>Reduced administrative burden</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <h3>How do I get Support Coordination in my plan?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>To include Support Coordination in your NDIS plan:</p>
                            <ol>
                                <li><strong>Assessment:</strong> The NDIS considers if you need help implementing your plan</li>
                                <li><strong>Request:</strong> Ask for it during your planning meeting if you:
                                    <ul>
                                        <li>Have complex support needs</li>
                                        <li>Are new to the NDIS</li>
                                        <li>Have limited informal supports</li>
                                        <li>Need help managing multiple providers</li>
                                    </ul>
                                </li>
                                <li><strong>Justification:</strong> Provide examples of why you need this support</li>
                                <li><strong>Level:</strong> The NDIS will determine if you need Support Connection (lower level) or Coordination</li>
                            </ol>
                            <p>We can help you prepare evidence to request this support.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <h3>Can I change my Support Coordinator?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Yes, you can change Support Coordinators at any time. Here's how:</p>
                            <ul>
                                <li><strong>No lock-in contracts:</strong> You're not locked into any agreement</li>
                                <li><strong>Simple process:</strong> Just notify us and we'll assist with transition</li>
                                <li><strong>Reasons to change:</strong> If your needs change or you're not satisfied</li>
                                <li><strong>Transition:</strong> We'll ensure proper handover to your new provider</li>
                            </ul>
                            <p>Your choice and control are important to us.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Help Section -->
        <div class="help-section">
            <div class="help-content">
                <h3>Still have questions about our NDIS services?</h3>
                <p>Our friendly team is here to help you understand your options and access the right supports.</p>
            </div>
            <div class="help-buttons">
                <<a href="tel:02 8730 9049" class="btn btn-primary">
    <i class="fas fa-phone-alt"></i> Call 02 8730 9049
</a>

<a href="mailto:admin@allegiancehearthomecare.com.au " class="btn btn-secondary">
    <i class="fas fa-envelope"></i> Email Us
</a>
                <!--<a href="#" class="btn btn-tertiary">-->
                <!--    <i class="fas fa-comments"></i> Live Chat-->
                <!--</a>-->
            </div>
        </div>
    </div>
</section>

<style>
    /* FAQ Section Styles */
    .faq-section {
        padding: 100px 0;
        background-color: var(--light);
    }
    
    .section-header {
        text-align: center;
        margin-bottom: 50px;
    }
    
    .section-header h2 {
        font-size: 2.5rem;
        color: var(--dark);
        margin-bottom: 15px;
    }
    
    .section-header p {
        font-size: 1.1rem;
        color: var(--gray);
        max-width: 700px;
        margin: 0 auto;
    }
    
    /* FAQ Tabs */
    .faq-tabs {
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .tab-buttons {
        display: flex;
        justify-content: center;
        margin-bottom: 40px;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .tab-btn {
        padding: 12px 25px;
        background: var(--light-bg);
        border: none;
        border-radius: 30px;
        font-weight: 600;
        color: var(--dark);
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .tab-btn:hover {
        background: rgba(29, 191, 173, 0.1);
    }
    
    .tab-btn.active {
        background: var(--primary);
        color: var(--light);
    }
    
    .tab-content {
        display: none;
    }
    
    .tab-content.active {
        display: block;
    }
    
    /* FAQ Accordion */
    .faq-accordion {
        max-width: 900px;
        margin: 0 auto;
    }
    
    .faq-item {
        border-radius: 8px;
        margin-bottom: 15px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        border: 1px solid #eee;
    }
    
    .faq-question {
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        background: var(--light);
        transition: background 0.3s ease;
    }
    
    .faq-question h3 {
        font-size: 1.2rem;
        color: var(--dark);
        margin-right: 20px;
    }
    
    .faq-question i {
        color: var(--primary);
        transition: transform 0.3s ease;
    }
    
    .faq-item.active .faq-question {
        background: rgba(29, 191, 173, 0.05);
    }
    
    .faq-item.active .faq-question i {
        transform: rotate(180deg);
    }
    
    .faq-answer {
        padding: 0 20px;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease, padding 0.3s ease;
        background: var(--light);
    }
    
    .faq-item.active .faq-answer {
        padding: 0 20px 20px;
        max-height: 2000px;
    }
    
    .faq-answer p, .faq-answer ul, .faq-answer ol {
        margin-bottom: 15px;
    }
    
    .faq-answer ul, .faq-answer ol {
        padding-left: 20px;
    }
    
    .faq-answer li {
        margin-bottom: 8px;
    }
    
    /* Special Content Styles */
    .management-types {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin: 20px 0;
    }
    
    .type-card {
        background: rgba(29, 191, 173, 0.05);
        padding: 20px;
        border-radius: 8px;
        border-left: 4px solid var(--primary);
    }
    
    .type-card h4 {
        color: var(--primary);
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }
    
    .type-card h4 i {
        margin-right: 10px;
    }
    
    .feature-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin: 20px 0;
    }
    
    .feature {
        text-align: center;
        padding: 20px 15px;
        background: rgba(29, 191, 173, 0.05);
        border-radius: 8px;
    }
    
    .feature i {
        font-size: 1.5rem;
        color: var(--primary);
        margin-bottom: 10px;
    }
    
    .feature h4 {
        margin-bottom: 8px;
        color: var(--dark);
    }
    
    .feature p {
        font-size: 0.9rem;
        color: var(--gray);
    }
    
    .comparison-table {
        margin: 20px 0;
        border: 1px solid #eee;
        border-radius: 8px;
        overflow: hidden;
    }
    
    .comparison-header {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        background: var(--primary);
        color: var(--light);
        font-weight: 600;
    }
    
    .comparison-header div {
        padding: 15px;
        text-align: center;
    }
    
    .comparison-row {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        border-bottom: 1px solid #eee;
    }
    
    .comparison-row:last-child {
        border-bottom: none;
    }
    
    .comparison-row div {
        padding: 15px;
        border-right: 1px solid #eee;
    }
    
    .comparison-row div:first-child {
        font-weight: 600;
        background: rgba(29, 191, 173, 0.05);
    }
    
    .comparison-row div:last-child {
        border-right: none;
    }
    
    /* Help Section */
    .help-section {
        background: var(--gradient);
        color: var(--light);
        border-radius: 10px;
        padding: 40px;
        margin-top: 60px;
        text-align: center;
    }
    
    .help-content h3 {
        font-size: 1.8rem;
        margin-bottom: 15px;
    }
    
    .help-content p {
        opacity: 0.9;
        max-width: 700px;
        margin: 0 auto 30px;
    }
    
    .help-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
    }
    
    .btn {
        display: inline-flex;
        align-items: center;
        padding: 12px 25px;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .btn-primary {
        background: var(--light);
        color: var(--primary);
    }
    
    .btn-primary:hover {
        background: rgba(255, 255, 255, 0.9);
        transform: translateY(-2px);
    }
    
    .btn-secondary {
        background: transparent;
        color: var(--light);
        border: 2px solid var(--light);
    }
    
    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: translateY(-2px);
    }
    
    .btn-tertiary {
        background: rgba(255, 255, 255, 0.1);
        color: var(--light);
    }
    
    .btn-tertiary:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-2px);
    }
    
    .btn i {
        margin-right: 8px;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .management-types, .feature-grid {
            grid-template-columns: 1fr;
        }
    }
    
    @media (max-width: 768px) {
        .section-header h2 {
            font-size: 2rem;
        }
        
        .tab-buttons {
            flex-direction: column;
            align-items: center;
        }
        
        .tab-btn {
            width: 100%;
            max-width: 300px;
            text-align: center;
        }
        
        .comparison-header, .comparison-row {
            grid-template-columns: 1fr;
        }
        
        .comparison-row div {
            border-right: none;
            border-bottom: 1px solid #eee;
        }
        
        .comparison-row div:last-child {
            border-bottom: none;
        }
        
        .help-buttons {
            flex-direction: column;
            align-items: center;
        }
        
        .btn {
            width: 100%;
            max-width: 250px;
            justify-content: center;
        }
    }
    
    @media (max-width: 480px) {
        .faq-question {
            padding: 15px;
        }
        
        .faq-question h3 {
            font-size: 1.1rem;
        }
        
        .help-section {
            padding: 30px 20px;
        }
        
        .help-content h3 {
            font-size: 1.5rem;
        }
    }
</style>

<script>











    
    // Tab Functionality
    const tabBtns = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const tabId = btn.dataset.tab;
            
            // Update active tab button
            tabBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            
            // Show corresponding tab content
            tabContents.forEach(content => {
                content.classList.remove('active');
                if (content.id === tabId) {
                    content.classList.add('active');
                }
            });
        });
    });
    
    // Accordion Functionality
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        
        question.addEventListener('click', () => {
            // Close other items in the same accordion
            const parentAccordion = item.closest('.faq-accordion');
            if (parentAccordion) {
                parentAccordion.querySelectorAll('.faq-item').forEach(i => {
                    if (i !== item) {
                        i.classList.remove('active');
                    }
                });
            }
            
            // Toggle current item
            item.classList.toggle('active');
        });
    });
</script>



    </main>

    <script>





    function showService(index) {
        // Hide all content blocks
        document.querySelectorAll('.service-content').forEach(el => el.classList.remove('active'));

        // Remove active class from buttons
        document.querySelectorAll('.service-btn').forEach(el => el.classList.remove('active'));

        // Show selected content
        document.getElementById(`service-${index}`).classList.add('active');

        // Add active class to clicked button
        document.querySelectorAll('.service-btn')[index].classList.add('active');
    }

    document.addEventListener('DOMContentLoaded', function() {
            const track = document.getElementById('testimonialTrack');
            const slides = document.querySelectorAll('.testimonial-slide');
            const dots = document.querySelectorAll('.carousel-dot');
            const prevBtn = document.querySelector('.prev');
            const nextBtn = document.querySelector('.next');
            let currentIndex = 0;
            let slideInterval;
            
            // Update carousel position
            function updateCarousel() {
                track.style.transform = `translateX(-${currentIndex * 100}%)`;
                
                // Update dots
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentIndex);
                });
            }
            
            // Go to specific slide
            function goToSlide(index) {
                currentIndex = index;
                updateCarousel();
                resetInterval();
            }
            
            // Next slide
            function nextSlide() {
                currentIndex = (currentIndex + 1) % slides.length;
                updateCarousel();
                resetInterval();
            }
            
            // Previous slide
            function prevSlide() {
                currentIndex = (currentIndex - 1 + slides.length) % slides.length;
                updateCarousel();
                resetInterval();
            }
            
            // Reset auto-rotation interval
            function resetInterval() {
                clearInterval(slideInterval);
                slideInterval = setInterval(nextSlide, 5000);
            }
            
            // Dot click event
            dots.forEach(dot => {
                dot.addEventListener('click', function() {
                    const slideIndex = parseInt(this.getAttribute('data-index'));
                    goToSlide(slideIndex);
                });
            });
            
            // Button events
            prevBtn.addEventListener('click', prevSlide);
            nextBtn.addEventListener('click', nextSlide);
            
            // Keyboard navigation
            document.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowLeft') prevSlide();
                if (e.key === 'ArrowRight') nextSlide();
            });
            
            // Touch support for mobile
            let touchStartX = 0;
            let touchEndX = 0;
            
            track.addEventListener('touchstart', function(e) {
                touchStartX = e.changedTouches[0].screenX;
                clearInterval(slideInterval);
            }, {passive: true});
            
            track.addEventListener('touchend', function(e) {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
                resetInterval();
            }, {passive: true});
            
            function handleSwipe() {
                if (touchEndX < touchStartX - 50) nextSlide();
                if (touchEndX > touchStartX + 50) prevSlide();
            }
            
            // Start auto-rotation
            resetInterval();
        });

    document.addEventListener('DOMContentLoaded', function() {
    // FAQ accordion functionality
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        
        question.addEventListener('click', () => {
            // Close all other items
            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                    otherItem.querySelector('.faq-answer').style.maxHeight = '0';
                    otherItem.querySelector('.faq-answer').style.padding = '0 25px';
                    otherItem.querySelector('.faq-question i').style.transform = 'rotate(0)';
                }
            });
            
            // Toggle current item
            item.classList.toggle('active');
            const answer = item.querySelector('.faq-answer');
            const icon = item.querySelector('.faq-question i');
            
            if (item.classList.contains('active')) {
                answer.style.maxHeight = answer.scrollHeight + 'px';
                answer.style.padding = '0 25px 25px';
                icon.style.transform = 'rotate(180deg)';
            } else {
                answer.style.maxHeight = '0';
                answer.style.padding = '0 25px';
                icon.style.transform = 'rotate(0)';
            }
        });
    });
});



document.addEventListener('DOMContentLoaded', function() {
    // Hero image hover effect
    const heroImage = document.querySelector('.hero-image img');
    if (heroImage) {
        heroImage.parentElement.addEventListener('mouseenter', function() {
            heroImage.style.transform = 'scale(1.05)';
        });
        
        heroImage.parentElement.addEventListener('mouseleave', function() {
            heroImage.style.transform = 'scale(1)';
        });
    }
});











        // Service Category Filter
        const categoryBtns = document.querySelectorAll('.category-btn');
        const serviceCards = document.querySelectorAll('.service-card');

        categoryBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Update active button
                categoryBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                
                const category = btn.dataset.category;
                
                // Filter services
                serviceCards.forEach(card => {
                    if (category === 'all' || card.dataset.category === category) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // FAQ Accordion
        const faqItems = document.querySelectorAll('.faq-item');
        
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            
            question.addEventListener('click', () => {
                // Close other items
                faqItems.forEach(i => {
                    if (i !== item) {
                        i.classList.remove('active');
                    }
                });
                
                // Toggle current item
                item.classList.toggle('active');
            });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
@endsection