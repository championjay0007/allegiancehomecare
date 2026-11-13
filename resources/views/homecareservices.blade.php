@extends('layouts.care')
@section('title', 'Support at Home Services & Pricing | Allegiance Heart & Home Care')

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

        /* Hero Section */
        .hero-section {
            background: var(--gradient);
            color: var(--light);
            padding: 100px 0 80px;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1507652313519-d4e9174996dd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') center/cover;
            opacity: 0.15;
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
        }

        .hero-content h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            margin-top: 30px;
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
            background: var(--light);
            color: var(--primary);
        }

        .btn-primary:hover {
            background: rgba(255, 255, 255, 0.9);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-outline {
            background: transparent;
            color: var(--light);
            border: 2px solid var(--light);
        }

        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .btn i {
            margin-right: 10px;
        }

        /* Services Navigation */
        .services-nav {
            background: var(--light);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .services-nav-container {
            display: flex;
            overflow-x: auto;
            padding: 15px 0;
            scrollbar-width: none;
            overflow: auto !important;
        }

        .services-nav-container::-webkit-scrollbar {
            display: none;
        }

        .nav-link {
            padding: 10px 20px;
            white-space: nowrap;
            font-weight: 600;
            color: var(--dark);
            text-decoration: none;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary);
            border-bottom-color: var(--primary);
        }

        /* Main Content */
        .main-content {
            padding: 80px 0;
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
            font-size: 1.1rem;
            color: var(--gray);
            max-width: 700px;
            margin: 0 auto;
        }

        /* Service Sections */
        .service-section {
            margin-bottom: 80px;
            scroll-margin-top: 100px;
        }

        .service-card {
            background: var(--light);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-wrap: wrap;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .service-image {
            flex: 1;
            min-width: 300px;
            min-height: 300px;
            background-size: cover;
            background-position: center;
        }

        .service-content {
            flex: 1;
            min-width: 300px;
            padding: 40px;
        }

        .service-content h3 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: var(--dark);
        }

        .service-content p {
            margin-bottom: 20px;
            color: var(--gray);
        }

        .service-features {
            margin: 30px 0;
        }

        .service-features li {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
        }

        .service-features i {
            color: var(--primary);
            margin-right: 10px;
            margin-top: 4px;
        }

        .service-cta {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        /* Home Care Packages Section */
        .package-levels {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .package-card {
            background: var(--light);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .package-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .package-header {
            background: var(--gradient);
            color: var(--light);
            padding: 20px;
            text-align: center;
        }

        .package-header h3 {
            font-size: 1.5rem;
            margin-bottom: 5px;
        }

        .package-body {
            padding: 25px;
        }

        .package-body h4 {
            color: var(--primary);
            margin-bottom: 15px;
        }

        .package-features li {
            margin-bottom: 10px;
            display: flex;
            align-items: flex-start;
        }

        .package-features i {
            color: var(--primary);
            margin-right: 10px;
            font-size: 0.8rem;
            margin-top: 5px;
        }

        /* Resources Section */
        .resources-section {
            background: rgba(29, 191, 173, 0.05);
            padding: 60px 0;
            border-radius: 10px;
            margin: 80px 0;
        }

        .resources-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .resource-card {
            background: var(--light);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .resource-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .resource-icon {
            height: 100px;
            background: var(--gradient);
            color: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
        }

        .resource-content {
            padding: 25px;
        }

        .resource-content h3 {
            margin-bottom: 15px;
            color: var(--dark);
        }

        .resource-content p {
            margin-bottom: 20px;
            color: var(--gray);
        }

        /* Enquiry Form */
        .enquiry-section {
            background: var(--gradient);
            color: var(--light);
            padding: 60px;
            border-radius: 10px;
            margin: 80px 0;
        }

        .enquiry-container {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
        }

        .enquiry-content {
            flex: 1;
            min-width: 300px;
        }

        .enquiry-content h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .enquiry-content p {
            opacity: 0.9;
            margin-bottom: 30px;
        }

        .enquiry-form {
            flex: 1;
            min-width: 300px;
            background: var(--light);
            padding: 30px;
            border-radius: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
        }

        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 1em;
        }

        .radio-group {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
        }

        .radio-option {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .radio-option input {
            margin: 0;
        }

        .checkbox-group {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 20px;
        }

        .checkbox-group input {
            margin-top: 3px;
        }

        .submit-btn {
            background: var(--primary);
            color: var(--light);
            border: none;
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
            width: 100%;
        }

        .submit-btn:hover {
            background: #18a897;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .service-card, .enquiry-container {
                flex-direction: column;
            }
            
            .service-image {
                min-height: 250px;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 80px 0 60px;
            }
            
            .hero-content h1 {
                font-size: 2.2rem;
            }
            
            .hero-buttons {
                flex-direction: column;
            }
            
            .btn {
                justify-content: center;
            }
            
            .section-header h2 {
                font-size: 2rem;
            }
            
            .package-levels, .resources-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .hero-content h1 {
                font-size: 1.8rem;
            }
            
            .hero-content p {
                font-size: 1rem;
            }
            
            .service-content {
                padding: 25px;
            }
            
            .enquiry-section {
                padding: 40px 20px;
            }
            
            .enquiry-form {
                padding: 20px;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>Quality Support at Home Services</h1>
                <p>Compassionate support that helps you maintain independence and quality of life in the comfort of your own home.</p>
                <div class="hero-buttons">
                    <a href="/contact" class="btn btn-primary">
                        <i class="fas fa-phone-alt"></i> Request a Callback
                    </a>
                    <a href="/pricingform" class="btn btn-outline">
                        <i class="fas fa-download"></i> Download Pricing Schedule
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Navigation -->
    <nav class="services-nav">
        <div class="container">
            <div class="services-nav-container">
                <a href="#packages" class="nav-link active">Support at Home Funding Classifications</a>
                <a href="#personal-care" class="nav-link">Personal Care</a>
                <a href="#domestic" class="nav-link">Domestic Assistance</a>
                <a href="#nursing" class="nav-link">Nursing Care</a>
                <a href="#allied-health" class="nav-link">Allied Health</a>
                <a href="#technology" class="nav-link">Assistive Technology</a>
                <a href="#respite" class="nav-link">Respite Care</a>
                <a href="#palliative" class="nav-link">Palliative Care</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Home Care Packages Section -->
            @include('layouts.packages')

                <!-- <div class="service-cta">
                    <a href="#" class="btn btn-primary">
                        <i class="fas fa-download"></i> Download Pricing Schedule
                    </a>
                    <a href="#" class="btn btn-outline">
                        <i class="fas fa-book"></i> Request Consumer Handbook
                    </a>
                </div>
            </section> -->

            <!-- Personal Care Section -->
            <section id="personal-care" class="service-section">
                <div class="service-card">
                    <div class="service-image" style="background-image: url('https://img.aydinlik.com.tr/rcman/Cw640h360q95gc/storage/files/images/2022/03/25/kolesterol-ilaclari-parkinson-riskini-yaklasik-yuzde-16-dusurebiliyor-x5oR.jpg');"></div>
                    <div class="service-content">
                        <h3>Personal Care & Reablement</h3>
                        <p>Support with daily activities to maintain your independence and dignity at home.</p>
                        
                        <ul class="service-features">
                            <li><i class="fas fa-check"></i> Assistance with showering, dressing and grooming</li>
                            <li><i class="fas fa-check"></i> Mobility support and transfers</li>
                            <li><i class="fas fa-check"></i> Toileting and continence care</li>
                            <li><i class="fas fa-check"></i> Reablement programs to regain independence</li>
                            <li><i class="fas fa-check"></i> Medication reminders and assistance</li>
                            <li><i class="fas fa-check"></i> Skin care and pressure area care</li>
                        </ul>

                        <div class="service-cta">
                            <a href="/support-at-home-enquiry" class="btn btn-primary">
                                <i class="fas fa-phone-alt"></i> Submit an Enquiry
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Domestic Assistance Section -->
            <section id="domestic" class="service-section">
                <div class="service-card">
                    <div class="service-content">
                        <h3>Domestic Assistance & Transport</h3>
                        <p>Help with household tasks and getting out and about in your community.</p>
                        
                        <ul class="service-features">
                            <li><i class="fas fa-check"></i> Light house cleaning and tidying</li>
                            <li><i class="fas fa-check"></i> Laundry and ironing assistance</li>
                            <li><i class="fas fa-check"></i> Meal preparation and planning</li>
                            <li><i class="fas fa-check"></i> Shopping and errands</li>
                            <li><i class="fas fa-check"></i> Transport to appointments</li>
                            <li><i class="fas fa-check"></i> Social outing support</li>
                            <li><i class="fas fa-check"></i> Gardening and basic home maintenance</li>
                        </ul>

                        <div class="service-cta">
                            <a href="/support-at-home-enquiry" class="btn btn-primary">
                                <i class="fas fa-phone-alt"></i> Submit an Enquiry
                            </a>
                        </div>
                    </div>
                    <div class="service-image" style="background-image: url('https://images.unsplash.com/photo-1581578731548-c64695cc6952?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');"></div>
                </div>
            </section>

            <!-- Nursing Care Section -->
            <section id="nursing" class="service-section">
                <div class="service-card">
                    <div class="service-image" style="background-image: url('https://elderaffairs.org/wp-content/uploads/nursing-home-image-scaled.jpeg');"></div>
                    <div class="service-content">
                        <h3>Nursing, Complex Care & Clinical Case Management</h3>
                        <p>Specialized nursing care for those with complex health needs in their own home.</p>
                        
                        <ul class="service-features">
                            <li><i class="fas fa-check"></i> Wound care and dressing changes</li>
                            <li><i class="fas fa-check"></i> Catheter and stoma care</li>
                            <li><i class="fas fa-check"></i> Medication administration and management</li>
                            <li><i class="fas fa-check"></i> Chronic disease management</li>
                            <li><i class="fas fa-check"></i> Post-hospital care and rehabilitation</li>
                            <li><i class="fas fa-check"></i> Clinical case management</li>
                            <li><i class="fas fa-check"></i> Health monitoring and assessments</li>
                        </ul>

                        <div class="service-cta">
                            <a href="/support-at-home-enquiry" class="btn btn-primary">
                                <i class="fas fa-phone-alt"></i> Submit an Enquiry
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Allied Health Section -->
            <section id="allied-health" class="service-section">
                <div class="service-card">
                    <div class="service-content">
                        <h3>Allied Health Services</h3>
                        <p>Professional therapies to improve mobility, function and quality of life at home.</p>
                        
                        <ul class="service-features">
                            <li><i class="fas fa-check"></i> Physiotherapy for mobility and pain management</li>
                            <li><i class="fas fa-check"></i> Occupational therapy for daily living skills</li>
                            <li><i class="fas fa-check"></i> Speech pathology for communication and swallowing</li>
                            <li><i class="fas fa-check"></i> Dietetics and nutrition planning</li>
                            <li><i class="fas fa-check"></i> Podiatry for foot and nail care</li>
                            <li><i class="fas fa-check"></i> Exercise physiology for strength and balance</li>
                            <li><i class="fas fa-check"></i> Social work for emotional support</li>
                        </ul>

                        <div class="service-cta">
                             <a href="/support-at-home-enquiry" class="btn btn-primary">
                                <i class="fas fa-phone-alt"></i> Submit an Enquiry
                            </a>
                        </div>
                    </div>
                    <div class="service-image" style="background-image: url('https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');"></div>
                </div>
            </section>

            <!-- Assistive Technology Section -->
            <section id="technology" class="service-section">
                <div class="service-card">
                    <div class="service-image" style="background-image: url('https://images.unsplash.com/photo-1551650975-87deedd944c3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80');"></div>
                    <div class="service-content">
                        <h3>Assistive Technology & Home Modifications</h3>
                        <p>Solutions to make your home safer and more accessible.</p>
                        
                        <ul class="service-features">
                            <li><i class="fas fa-check"></i> Mobility aids assessment and provision</li>
                            <li><i class="fas fa-check"></i> Bathroom modifications (grab rails, shower seats)</li>
                            <li><i class="fas fa-check"></i> Ramps and stair lifts</li>
                            <li><i class="fas fa-check"></i> Kitchen modifications for accessibility</li>
                            <li><i class="fas fa-check"></i> Personal alarms and monitoring systems</li>
                            <li><i class="fas fa-check"></i> Bed rails and pressure care equipment</li>
                            <li><i class="fas fa-check"></i> Home safety assessments</li>
                        </ul>

                        <div class="service-cta">
                            <a href="/support-at-home-enquiry" class="btn btn-primary">
                                <i class="fas fa-phone-alt"></i> Submit an Enquiry
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Respite Care Section -->
            <section id="respite" class="service-section">
                <div class="service-card">
                    <div class="service-content">
                        <h3>Respite & Social Support</h3>
                        <p>Giving carers a break while ensuring you receive quality care and companionship.</p>
                        
                        <ul class="service-features">
                            <li><i class="fas fa-check"></i> In-home respite care</li>
                            <li><i class="fas fa-check"></i> Social support and companionship</li>
                            <li><i class="fas fa-check"></i> Community access and outings</li>
                            <li><i class="fas fa-check"></i> Group activities and day programs</li>
                            <li><i class="fas fa-check"></i> Overnight and weekend respite</li>
                            <li><i class="fas fa-check"></i> Emergency respite care</li>
                            <li><i class="fas fa-check"></i> Culturally specific respite options</li>
                        </ul>

                        <div class="service-cta">
                            <a href="/support-at-home-enquiry" class="btn btn-primary">
                                <i class="fas fa-phone-alt"></i> Submit an Enquiry
                            </a>
                        </div>
                    </div>
                    <div class="service-image" style="background-image: url('https://sfr.gov.ru/files/branches/tatarstan/2021/Novosti/0563538.jpg');"></div>
                </div>
            </section>

            <!-- Palliative Care Section -->
            <section id="palliative" class="service-section">
                <div class="service-card">
                    <div class="service-image" style="background-image: url('https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/02/Elderly_Women_1296x728-header.jpg?w=1155&h=1528');"></div>
                    <div class="service-content">
                        <h3>Palliative & End-of-Life Care</h3>
                        <p>Compassionate care focused on comfort, dignity and quality of life.</p>
                        
                        <ul class="service-features">
                            <li><i class="fas fa-check"></i> Pain and symptom management</li>
                            <li><i class="fas fa-check"></i> Emotional and spiritual support</li>
                            <li><i class="fas fa-check"></i> Personal care with dignity</li>
                            <li><i class="fas fa-check"></i> Nursing and personal care support based on assessed need, approved funding, the participant's care plan and service availability</li>
                            <li><i class="fas fa-check"></i> Family support and education</li>
                            <li><i class="fas fa-check"></i> Coordination with palliative care teams</li>
                            <li><i class="fas fa-check"></i> Bereavement support</li>
                        </ul>

                        <div class="service-cta">
                            <a href="/support-at-home-enquiry" class="btn btn-primary">
                                <i class="fas fa-phone-alt"></i> Submit an Enquiry
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Resources Section -->
            <section class="resources-section">
                <div class="section-header">
                    <h2>Helpful Resources</h2>
                    <p>Download our free guides to learn more about Support at Home Services</p>
                </div>

                <div class="resources-grid">
                    <div class="resource-card">
                        <div class="resource-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <div class="resource-content">
                            <h3>Support at Home Consumer Handbook</h3>
                            <p>Everything you need to know about receiving Support at Home Services, your rights, and what to expect.</p>
                            <a href="/download-brochure" class="btn btn-primary">
                                <i class="fas fa-download"></i> Download Now
                            </a>
                        </div>
                    </div>

                    <div class="resource-card">
                        <div class="resource-icon">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <div class="resource-content">
                            <h3>Support at Home Pricing Schedule</h3>
                            <p>Transparent information about our Support at Home service prices and applicable service arrangements.</p>
                             <a href="/pricingform" class="btn btn-primary">
                                    <i class="fas fa-download"></i> Download Now
                            </a>
                        </div>
                    </div>

                    <div class="resource-card">
                        <div class="resource-icon">
                            <i class="fas fa-question-circle"></i>
                        </div>
                        <div class="resource-content">
                            <h3>Frequently Asked Questions</h3>
                            <p>Answers to common questions about Support at Home services and classifications.</p>
                         <a href="{{url('/contact#faq')}}" class="btn btn-primary">
                                <i class=""></i> FAQ
                            </a>
                        </div>
                    </div>
                </div>
            </section>

<!-- Full-Width CTA Section -->
<section class="full-width-cta">
    <div class="cta-background">
        <div class="container">
            <div class="cta-content">
                <h2>Compassionate Care in the Comfort of Your Home</h2>
                <p>Let us help you or your loved one maintain independence with quality Support at Home services</p>
                <div class="cta-buttons">
                    <a href="tel:02 8730 9049" class="cta-button primary">
                        <i class="fas fa-phone"></i> Call Now: 02 8730 9049
                    </a>
                    <a href="/contact" class="cta-button ">
                        <i class="fas fa-envelope"></i> Send an Enquiry
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Full-Width CTA Styles */
    .full-width-cta {
        width: 100%;
        margin: 0;
        padding: 0;
    }
    
    .cta-background {
        background: var(--gradient);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }
    
    .cta-background::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('https://images.unsplash.com/photo-1507652313519-d4e9174996dd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') center/cover;
        opacity: 0.1;
        z-index: 0;
    }
    
    .cta-content {
        position: relative;
        z-index: 1;
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .cta-content h2 {
        font-size: 2.5rem;
        color: var(--light);
        margin-bottom: 20px;
        line-height: 1.3;
    }
    
    .cta-content p {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 30px;
    }
    
    .cta-buttons {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }
    
    .cta-button {
        display: inline-flex;
        align-items: center;
        padding: 15px 30px;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .cta-button i {
        margin-right: 10px;
    }
    
    .cta-button.primary {
        background: var(--light);
        color: var(--primary);
    }
    
    .cta-button.primary:hover {
        background: rgba(255, 255, 255, 0.9);
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .cta-button.secondary {
        background: transparent;
        color: var(--light);
        border: 2px solid var(--light);
    }
    
    .cta-button.secondary:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: translateY(-3px);
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .cta-background {
            padding: 60px 0;
        }
        
        .cta-content h2 {
            font-size: 2rem;
        }
        
        .cta-content p {
            font-size: 1.1rem;
        }
        
        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }
        
        .cta-button {
            width: 100%;
            max-width: 300px;
            justify-content: center;
        }
    }
    
    @media (max-width: 480px) {
        .cta-content h2 {
            font-size: 1.8rem;
        }
    }
</style>

<script>
    // Smooth scroll for enquiry button
    document.querySelector('.cta-button.secondary').addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('#enquiry').scrollIntoView({
            behavior: 'smooth'
        });
    });
</script>

            
            <!-- Enquiry Section -->
           </div>
    </main>

    <script>
        // Smooth scroll for navigation links
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Update active nav link
                document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
                
                // Scroll to section
                const targetId = this.getAttribute('href');
                document.querySelector(targetId).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Update active nav link on scroll
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('.service-section');
            const navLinks = document.querySelectorAll('.nav-link');
            
            let current = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                
                if (pageYOffset >= sectionTop - 100) {
                    current = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('active');
                }
            });
        });
    </script>
@endsection