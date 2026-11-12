
@extends('layouts.care')

@section('title', 'Home')

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
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--light-bg);
            color: var(--dark);
            line-height: 1.7;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        /* Hero Section */
        .contact-hero {
            background: var(--gradient);
            color: white;
            padding: 6rem 0 8rem;
            text-align: center;
            position: relative;
            overflow: hidden;
            clip-path: polygon(0 0, 100% 0, 100% 90%, 0 100%);
        }

        .contact-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=1500&q=80') no-repeat center center/cover;
            opacity: 0.1;
            z-index: 1;
        }

        .contact-hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .contact-hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            font-weight: 800;
            text-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .contact-hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .floating-image {
            position: absolute;
            z-index: 3;
            animation: float 6s ease-in-out infinite;
        }

        .floating-image-1 {
            width: 150px;
            top: 50px;
            left: 5%;
        }

        .floating-image-2 {
            width: 120px;
            bottom: 50px;
            right: 8%;
        }

        /* Main Container */
        .contact-container {
            max-width: 1200px;
            margin: -80px auto 0;
            padding: 0 20px;
            position: relative;
            z-index: 4;
        }

        /* Contact Cards */
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }

        .contact-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
            text-align: center;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .contact-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--primary);
        }

        .contact-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
        }

        .contact-card i {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 25px;
            background: rgba(29, 191, 173, 0.1);
            width: 80px;
            height: 80px;
            line-height: 80px;
            border-radius: 50%;
            display: inline-block;
        }

        .contact-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .contact-card p, .contact-card a {
            color: var(--gray);
            margin-bottom: 10px;
            display: block;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-card a:hover {
            color: var(--primary);
        }

        /* Contact Form Section */
        .contact-form-section {
            background: white;
            border-radius: 20px;
            padding: 60px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            margin-bottom: 60px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .form-image {
            border-radius: 15px;
            overflow: hidden;
            height: 100%;
        }

        .form-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .form-image:hover img {
            transform: scale(1.03);
        }

        .section-title {
            margin-bottom: 40px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: var(--dark);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--primary);
            border-radius: 2px;
        }

        .section-title p {
            color: var(--gray);
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 15px 20px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(29, 191, 173, 0.2);
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .btn {
            display: inline-block;
            padding: 16px 35px;
            background: var(--gradient);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary), #00C9A7);
            opacity: 0;
            z-index: -1;
            transition: opacity 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 160, 198, 0.3);
        }

        .btn:hover::before {
            opacity: 1;
        }

        /* Map Section */
        .map-container {
            height: 500px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            margin-bottom: 60px;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Hours Section */
        .hours-section {
            background: white;
            border-radius: 20px;
            padding: 60px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            margin-bottom: 60px;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .hours-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .day-card {
            background: var(--light-bg);
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            transition: all 0.3s ease;
            border-left: 4px solid var(--primary);
        }

        .day-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        .day-card h4 {
            color: var(--primary);
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .day-card p {
            font-weight: 600;
            color: var(--dark);
        }

        .emergency-card {
            grid-column: 1 / -1;
            background: rgba(229, 57, 53, 0.1);
            padding: 30px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            margin-top: 30px;
            border-left: 4px solid var(--accent);
        }

        .emergency-card i {
            font-size: 2.5rem;
            color: var(--accent);
            margin-right: 25px;
            min-width: 60px;
        }

        .emergency-content h4 {
            color: var(--accent);
            margin-bottom: 5px;
            font-size: 1.3rem;
        }

        /* Social Section */
        .social-section {
            text-align: center;
            margin: 60px 0;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .social-link {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.1);
            position: relative;
            overflow: hidden;
        }

        .social-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .social-link:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            color: white;
        }

        .social-link:hover::before {
            opacity: 1;
        }

        .social-link i {
            position: relative;
            z-index: 1;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .contact-form-section {
                grid-template-columns: 1fr;
            }
            
            .form-image {
                height: 300px;
                order: -1;
            }
        }

        @media (max-width: 768px) {
            .contact-hero {
                padding: 4rem 0 6rem;
                clip-path: polygon(0 0, 100% 0, 100% 95%, 0 100%);
            }
            
            .contact-hero h1 {
                font-size: 2.5rem;
            }
            
            .contact-hero p {
                font-size: 1rem;
            }
            
            .floating-image-1,
            .floating-image-2 {
                display: none;
            }
            
            .contact-card {
                padding: 30px 20px;
            }
            
            .contact-form-section,
            .hours-section {
                padding: 40px 25px;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .contact-hero {
                clip-path: polygon(0 0, 100% 0, 100% 97%, 0 100%);
            }
            
            .contact-grid {
                grid-template-columns: 1fr;
            }
            
            .hours-grid {
                grid-template-columns: 1fr;
            }
            
            .emergency-card {
                flex-direction: column;
                text-align: center;
            }
            
            .emergency-card i {
                margin-right: 0;
                margin-bottom: 15px;
            }
        }



        /* Form Success Message */
.form-success-message {
    background: rgba(29, 191, 173, 0.1);
    color: var(--primary);
    padding: 15px 20px;
    border-radius: 10px;
    margin-bottom: 25px;
    border-left: 4px solid var(--primary);
    display: flex;
    align-items: center;
    gap: 10px;
}

.form-success-message i {
    font-size: 1.2rem;
}

/* Error Messages */
.error-message {
    color: var(--accent);
    font-size: 0.875rem;
    margin-top: 5px;
    display: block;
}

.is-invalid {
    border-color: var(--accent) !important;
}

.is-invalid:focus {
    box-shadow: 0 0 0 3px rgba(229, 57, 53, 0.2) !important;
}

/* Form Button Icon */
.btn i {
    margin-right: 8px;
}




/* Modal Styles */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.7);
    z-index: 1000;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background: white;
    padding: 2.5rem;
    border-radius: 1rem;
    text-align: center;
    max-width: 500px;
    width: 90%;
    box-shadow: 0 10px 50px rgba(0,0,0,0.2);
    animation: modalFadeIn 0.3s ease-out;
}

@keyframes modalFadeIn {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}

.modal-icon {
    font-size: 5rem;
    margin-bottom: 1.5rem;
}

.modal-icon.success {
    color: #1DBFAD;
}

.modal-icon.error {
    color: #E53935;
}

.modal h3 {
    font-size: 1.8rem;
    margin-bottom: 1rem;
    color: #1A1A1A;
}

.modal p {
    color: #6C757D;
    margin-bottom: 2rem;
    font-size: 1.1rem;
    line-height: 1.6;
}



















    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Hero Section -->
    <section class="contact-hero">
        <!--<img src="https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Floating illustration" class="floating-image floating-image-1">-->
        <!--<img src="https://images.unsplash.com/photo-1581093450022-4b0e61d4a5a3?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Floating illustration" class="floating-image floating-image-2">-->
        <div class="contact-hero-content">
            <h1>Let's Connect</h1>
            <p>We're here to help and answer any questions you might have. Reach out to us and we'll respond as soon as possible.</p>
        </div>
    </section>

    <!-- Contact Cards -->
    <div class="contact-container">
        <div class="contact-grid">
            <div class="contact-card">
                <i class="fas fa-phone-alt"></i>
                <h3>Call Us</h3>
                <a href="tel:02 8730 9049">02 8730 9049</a>
                
            </div>
            
            <div class="contact-card">
                <i class="fas fa-envelope"></i>
                <h3>Email Us</h3>
                <a href="mailto:admin@allegiancehearthomecare.com.au/">admin@allegiancehearthomecare
                .com.au</a>
                
            </div>
            
<!--            <div class="contact-card">-->
<!--                <i class="fas fa-map-marker-alt"></i>-->
<!--                <h3>Visit Us</h3>-->
<!--                <p>Address: 25 Restwell street , Bankstown 2200 NSW <br>-->
<!--Address 2: 233 Castlereagh Street, Sydney 2000 NSW <br> Adress 3: 1-3 Metro Parade, Mawson Lakes, 5095 Adelaide, South Australia</p>-->
              
<!--            </div>-->
        </div>
<!-- Office Locations Section -->
<style>
    .locations-section {
        margin-bottom: 60px;
    }

    .locations-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .locations-header h2 {
        font-size: 2.5rem;
        color: var(--dark);
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }

    .locations-header h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: var(--primary);
        border-radius: 2px;
    }

    .locations-header p {
        color: var(--gray);
        font-size: 1.1rem;
        margin-top: 20px;
    }

    .locations-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 30px;
    }

    .location-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
        position: relative;
    }

    .location-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }

    .location-header {
        background: var(--gradient);
        padding: 25px 30px;
        position: relative;
        overflow: hidden;
    }

    .location-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: pulse 4s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); opacity: 0.3; }
        50% { transform: scale(1.2); opacity: 0.1; }
    }

    .state-badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        padding: 5px 15px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        color: white;
        margin-bottom: 15px;
        letter-spacing: 1px;
    }

    .location-header h3 {
        color: white;
        font-size: 1.8rem;
        margin: 0;
        font-weight: 700;
    }

    .location-details {
        padding: 30px;
    }

    .address-block {
        margin-bottom: 25px;
    }

    .address-line {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 12px;
        color: var(--gray);
        line-height: 1.6;
    }

    .address-line i {
        color: var(--primary);
        font-size: 1.2rem;
        margin-top: 3px;
        min-width: 20px;
    }

    .address-line span {
        flex: 1;
    }

    .phone-block {
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px dashed rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .phone-block i {
        color: var(--primary);
        font-size: 1.3rem;
        background: rgba(29, 191, 173, 0.1);
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .phone-block a {
        color: var(--dark);
        text-decoration: none;
        font-weight: 600;
        font-size: 1.1rem;
        transition: color 0.3s ease;
    }

    .phone-block a:hover {
        color: var(--primary);
    }

    .phone-block:hover i {
        background: var(--primary);
        color: white;
        transform: scale(1.05);
    }

    .location-footer {
        background: var(--light-bg);
        padding: 15px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .map-link {
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .map-link i {
        transition: transform 0.3s ease;
    }

    .map-link:hover {
        color: var(--accent);
    }

    .map-link:hover i {
        transform: translateX(5px);
    }

    .office-hours {
        font-size: 0.85rem;
        color: var(--gray);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .office-hours i {
        color: var(--primary);
        font-size: 0.9rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .locations-grid {
            grid-template-columns: 1fr;
        }
        
        .locations-header h2 {
            font-size: 2rem;
        }
        
        .location-header h3 {
            font-size: 1.5rem;
        }
        
        .location-details {
            padding: 25px;
        }
        
        .location-footer {
            flex-direction: column;
            gap: 10px;
            text-align: center;
        }
    }

    @media (max-width: 480px) {
        .locations-header h2 {
            font-size: 1.8rem;
        }
        
        .location-header {
            padding: 20px;
        }
        
        .location-details {
            padding: 20px;
        }
        
        .address-line {
            font-size: 0.9rem;
        }
        
        .phone-block a {
            font-size: 1rem;
        }
    }
</style>

<!-- Office Locations Section -->
<div class="locations-section">
    <div class="locations-header">
        <h2>Our Office Locations</h2>
        <p>Visit us at any of our convenient locations across Australia</p>
    </div>
    
    <div class="locations-grid">
        <!-- New South Wales - Bankstown Office -->
        <div class="location-card">
            <div class="location-header">
                <div class="state-badge">
                    <i class="fas fa-map-marker-alt" style="margin-right: 5px;"></i> New South Wales
                </div>
                <h3>Bankstown Office</h3>
            </div>
            <div class="location-details">
                <div class="address-block">
                    <div class="address-line">
                        <i class="fas fa-building"></i>
                        <span>25 Restwell Street</span>
                    </div>
                    <div class="address-line">
                        <i class="fas fa-location-dot"></i>
                        <span>Bankstown NSW 2200</span>
                    </div>
                </div>
                <div class="phone-block">
                    <i class="fas fa-phone-alt"></i>
                    <a href="tel:0287309049">02 8730 9049</a>
                </div>
            </div>
            <div class="location-footer">
                <a href="https://maps.google.com/?q=25+Restwell+Street+Bankstown+NSW+2200" target="_blank" class="map-link">
                    <i class="fas fa-directions"></i> Get Directions
                </a>
                <div class="office-hours">
                    <i class="far fa-clock"></i>
                    <!--<span>Mon-Fri: 9am - 6pm</span>-->
                </div>
            </div>
        </div>

        <!-- Victoria - Richmond Office -->
        <div class="location-card">
            <div class="location-header">
                <div class="state-badge">
                    <i class="fas fa-map-marker-alt" style="margin-right: 5px;"></i> Victoria
                </div>
                <h3>Richmond Office</h3>
            </div>
            <div class="location-details">
                <div class="address-block">
                    <div class="address-line">
                        <i class="fas fa-building"></i>
                        <span>580 Church Street</span>
                    </div>
                    <div class="address-line">
                        <i class="fas fa-location-dot"></i>
                        <span>Richmond VIC 3121</span>
                    </div>
                </div>
                <div class="phone-block">
                    <i class="fas fa-phone-alt"></i>
                    <a href="tel:0370346513">03 7034 6513</a>
                </div>
            </div>
            <div class="location-footer">
                <a href="https://maps.google.com/?q=580+Church+Street+Richmond+VIC+3121" target="_blank" class="map-link">
                    <i class="fas fa-directions"></i> Get Directions
                </a>
                <div class="office-hours">
                    <i class="far fa-clock"></i>
                    <!--<span>Mon-Fri: 9am - 6pm</span>-->
                </div>
            </div>
        </div>

        <!-- South Australia - Mawson Lakes Office -->
        <div class="location-card">
            <div class="location-header">
                <div class="state-badge">
                    <i class="fas fa-map-marker-alt" style="margin-right: 5px;"></i> South Australia
                </div>
                <h3>Mawson Lakes Office</h3>
            </div>
            <div class="location-details">
                <div class="address-block">
                    <div class="address-line">
                        <i class="fas fa-building"></i>
                        <span>1–3 Metro Parade</span>
                    </div>
                    <div class="address-line">
                        <i class="fas fa-location-dot"></i>
                        <span>Mawson Lakes SA 5095</span>
                    </div>
                </div>
                <div class="phone-block">
                    <i class="fas fa-phone-alt"></i>
                    <a href="tel:0861022501">08 6102 2501</a>
                </div>
            </div>
            <div class="location-footer">
                <a href="https://maps.google.com/?q=1-3+Metro+Parade+Mawson+Lakes+SA+5095" target="_blank" class="map-link">
                    <i class="fas fa-directions"></i> Get Directions
                </a>
                <div class="office-hours">
                    <i class="far fa-clock"></i>
                    <!--<span>Mon-Fri: 9am - 6pm</span>-->
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.feedbackform')




        <!-- Map Section -->
<div class="map-container">
  <iframe 
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3316.123456!2d151.000123!3d-33.900123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x…!2s25%20Restwell%20Street%2C%20Bankstown%2C%20NSW%202200!5e0!3m2!1sen!2sus!4vXXXXXXXXXXXX"
    allowfullscreen="" 
    loading="lazy" 
    referrerpolicy="no-referrer-when-downgrade">
  </iframe>
</div>

        <!-- Operating Hours -->
        <div class="hours-section">
            <div class="section-title">
                <h2>Our Operating Hours</h2>
                <p>We're available during these hours to provide you with the best service possible.</p>
            </div>
            
            <div class="hours-grid">
                <div class="day-card">
                    <h4>Monday - Friday</h4>
                    <p>9:00 AM - 6:00 PM</p>
                </div>
                
                <div class="day-card">
                    <h4>Saturday</h4>
                    <p>10:00 AM - 4:00 PM</p>
                </div>
                
                <div class="day-card">
                    <h4>Sunday</h4>
                    <p>Closed</p>
                </div>
                
                <div class="emergency-card">
                    <i class="fas fa-exclamation-triangle"></i>
                    <div class="emergency-content">
                        <h4>Emergency Support</h4>
                        <p>24/7 emergency services available. Call:<b>000</b> </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Media -->
        <div class="social-section">
            <div class="section-title">
                <h2>Follow Us</h2>
                <p>Connect with us on social media for updates, news, and more.</p>
            </div>
            
            <div class="social-links">
                <a href="https://www.facebook.com/share/177EvA4Y6N/" class="social-link"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.tiktok.com/@allegiance.heart" class="social-link"><i class="fab fa-tiktok"></i></a>
                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>






    

    
@include('layouts.faq')
    <!-- Your existing form with updated JavaScript -->



@endsection