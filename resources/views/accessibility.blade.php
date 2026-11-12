@extends('layouts.care')
@section('title', 'Accessibility Statement')

@section('content')
    <style>
        .accessibility-statement {
            padding: 80px 0;
            background-color: #f9f9f9;
            font-family: 'Poppins', sans-serif;
            line-height: 1.8;
            color: #333;
        }
        
        .accessibility-container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 50px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        
        .accessibility-header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 2px solid #00A651;
            padding-bottom: 20px;
        }
        
        .accessibility-header img {
            max-height: 80px;
            margin-bottom: 20px;
        }
        
        .accessibility-header h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 10px;
            font-family: 'Montserrat', sans-serif;
        }
        
        .accessibility-header .effective-date {
            color: #666;
            font-size: 1rem;
            font-weight: 500;
        }
        
        .statement-section {
            margin-bottom: 40px;
        }
        
        .statement-section h2 {
            font-size: 1.5rem;
            color: #00A651;
            margin-bottom: 15px;
            font-family: 'Montserrat', sans-serif;
            padding-bottom: 5px;
            border-bottom: 1px solid #eee;
        }
        
        .statement-section h3 {
            font-size: 1.2rem;
            color: #F26522;
            margin: 25px 0 10px;
        }
        
        .statement-section p, .statement-section li {
            margin-bottom: 10px;
            color: #555;
        }
        
        .statement-section ul {
            padding-left: 25px;
            margin: 15px 0;
        }
        
        .statement-section li {
            margin-bottom: 8px;
            position: relative;
            padding-left: 20px;
        }
        
        .statement-section li:before {
            content: "•";
            color: #00A651;
            font-weight: bold;
            position: absolute;
            left: 0;
        }
        
        .highlight-box {
            background-color: rgba(0,166,81,0.05);
            border-left: 4px solid #00A651;
            padding: 20px;
            margin: 25px 0;
            border-radius: 0 8px 8px 0;
        }
        
        .contact-info {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 8px;
            margin-top: 30px;
        }
        
        @media (max-width: 768px) {
            .accessibility-container {
                padding: 30px;
            }
            
            .accessibility-header h1 {
                font-size: 2rem;
            }
        }
        
        /* Accessibility-specific styles */
        a:focus {
            outline: 3px solid #F26522;
            outline-offset: 3px;
        }
        
        .skip-link {
            position: absolute;
            left: -9999px;
            top: 0;
            background: #333;
            color: white;
            padding: 10px;
            z-index: 100;
        }
        
        .skip-link:focus {
            left: 0;
        }
    </style>

    <section class="accessibility-statement">
        <a href="#main-content" class="skip-link">Skip to main content</a>
        
        <div class="container accessibility-container" id="main-content">
            <div class="accessibility-header">
                <img src="{{asset('images/logo.jpg')}}" alt="Allegiance Heart & Home Care Logo">
                <h1>Accessibility Statement</h1>
                <div class="effective-date">Effective Date: June 2025</div>
            </div>
            
            <div class="statement-section">
                <h2>Our Commitment</h2>
                <p>At Allegiance Heart & Home Care Pty Ltd, we are committed to ensuring digital accessibility for all users, including people with disabilities, older Australians, carers, and members of our diverse communities. We aim to provide a website that is easy to navigate, perceivable, and functional for everyone.</p>
            </div>
            
            <div class="statement-section">
                <h2>Accessibility Standards</h2>
                <p>Our website aims to meet or exceed the requirements of the Web Content Accessibility Guidelines (WCAG) 2.1 Level AA, as recommended by the World Wide Web Consortium (W3C) and recognised under Australian law (Disability Discrimination Act 1992).</p>
            </div>
            
            <div class="statement-section">
                <h2>Key Features</h2>
                <p>To support accessibility, our website includes:</p>
                <ul>
                    <li>Text alternatives for non-text content</li>
                    <li>Keyboard navigability</li>
                    <li>Sufficient colour contrast and scalable fonts</li>
                    <li>Clear headings and structure</li>
                    <li>Accessible forms and labels</li>
                    <li>Responsive design for various devices and screen readers</li>
                </ul>
                
                <div class="highlight-box">
                    <h3>Additional Accessibility Measures</h3>
                    <ul>
                        <li>Skip to content links for keyboard users</li>
                        <li>Proper semantic HTML structure</li>
                        <li>ARIA landmarks for screen reader users</li>
                        <li>Focus indicators for keyboard navigation</li>
                        <li>Adjustable text sizing (using browser controls)</li>
                    </ul>
                </div>
            </div>
            
            <div class="statement-section">
                <h2>Feedback and Assistance</h2>
                <p>If you encounter any barriers to accessing our website or require assistance with digital content or forms, please contact us. We are committed to providing reasonable accommodations and improving accessibility wherever possible.</p>
                
                <div class="contact-info">
                    <p><strong>Accessibility Coordinator</strong><br>
                    Allegiance Heart & Home Care Pty Ltd<br>
                    Email: <a href="mailto:admin@allegiancehearthomecare.com.au">admin@allegiancehearthomecare.com.au</a><br>
                    Phone: [Your Accessible Contact Number]</p>
                </div>
                
                <p>We aim to respond to accessibility feedback within 5 business days.</p>
            </div>
            
            <div class="statement-section">
                <h2>Ongoing Improvements</h2>
                <p>We are continuously working to improve the accessibility of our website and digital services. Your feedback is valuable and helps us achieve an inclusive experience for all users.</p>
                
                <p>Our accessibility initiatives include:</p>
                <ul>
                    <li>Regular accessibility audits using automated and manual testing</li>
                    <li>Staff training on accessible content creation</li>
                    <li>User testing with people with disabilities</li>
                    <li>Monitoring new WCAG standards and implementing updates</li>
                </ul>
            </div>
            
            <div class="statement-section">
                <h2>Alternative Access Options</h2>
                <p>If you need information from our website in an alternative format, we can provide:</p>
                <ul>
                    <li>Printed materials (large print available)</li>
                    <li>Assistance over the phone</li>
                    <li>Email or postal correspondence</li>
                    <li>In-person support at our offices</li>
                </ul>
                <p>Please contact us to arrange alternative access to our information and services.</p>
            </div>
            
            <div class="statement-section">
                <h2>Compliance Status</h2>
                <p>This website is partially compliant with WCAG 2.1 Level AA standards, due to the following exceptions:</p>
                <ul>
                    <li>Some third-party content may not meet our accessibility standards</li>
                    <li>Older PDF documents may not be fully accessible</li>
                    <li>Some complex data tables may require simplification</li>
                </ul>
                <p>We are actively working to address these issues and improve compliance.</p>
            </div>
        </div>
    </section>
@endsection