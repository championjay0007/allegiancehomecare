@extends('layouts.care')

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

    /* Base Styles */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        color: #333;
        background-color: #f9fafb;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Hero Section */
    .career-hero {
        background: var(--gradient);
        padding: 80px 0;
        color: white;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .career-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('https://images.unsplash.com/photo-1579684385127-1ef15d508118?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
        opacity: 0.15;
        z-index: 0;
    }

    .career-hero-content {
        position: relative;
        z-index: 1;
    }

    .career-hero h1 {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        line-height: 1.2;
        animation: fadeInDown 1s ease;
    }

    .career-hero p {
        font-size: 1.25rem;
        max-width: 700px;
        margin: 0 auto 2rem;
        opacity: 0.9;
        animation: fadeInUp 1s ease 0.3s both;
    }

    /* Buttons */
    .btn {
        display: inline-block;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        text-align: center;
        text-decoration: none;
        transition: all 0.3s ease;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
        background-color: var(--primary);
        color: white;
        border: 2px solid var(--primary);
    }

    .btn-primary:hover {
        background-color: #17a794;
        border-color: #17a794;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .btn-outline {
        background-color: transparent;
        color: var(--primary);
        border: 2px solid var(--primary);
    }

    .btn-outline:hover {
        background-color: var(--primary);
        color: white;
        transform: translateY(-2px);
    }

    /* Section Styling */
    .section {
        padding: 60px 0;
    }

    .section-title {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
    }

    .section-title h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 1rem;
    }

    .section-title::after {
        content: '';
        display: block;
        width: 80px;
        height: 4px;
        background: var(--primary);
        margin: 0 auto;
        border-radius: 2px;
    }

    /* Why Work With Us Cards */
    .benefits-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }

    .benefit-card {
        background: white;
        border-radius: 12px;
        padding: 40px 30px;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .benefit-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .benefit-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(29, 191, 173, 0.1);
        border-radius: 50%;
        color: var(--primary);
    }

    .benefit-icon svg {
        width: 36px;
        height: 36px;
    }

    .benefit-card h3 {
        font-size: 1.5rem;
        margin-bottom: 15px;
        color: var(--dark);
    }

    .benefit-card p {
        color: var(--gray);
        font-size: 1rem;
    }

    /* Job Listings */
    .job-listings {
        margin-top: 40px;
    }

    .job-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 30px;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .job-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .job-header {
        padding: 30px;
        border-bottom: 1px solid #eee;
    }

    .job-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 10px;
    }

    .job-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 15px;
    }

    .job-tag {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .job-description {
        padding: 30px;
    }

    .job-description p {
        margin-bottom: 20px;
        color: var(--gray);
    }

    .job-section-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--dark);
    }

    .job-list {
        padding-left: 20px;
        margin-bottom: 20px;
    }

    .job-list li {
        margin-bottom: 8px;
        color: var(--gray);
    }

    /* Application Form */
    .application-form {
        background: white;
        border-radius: 12px;
        padding: clamp(24px, 5vw, 50px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        margin-top: 40px;
    }

    .form-title {
        text-align: center;
        margin-bottom: 30px;
    }

    .form-title h2 {
        font-size: clamp(1.8rem, 4vw, 2.4rem);
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 10px;
    }

    .form-title p {
        color: var(--gray);
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        column-gap: 24px;
        row-gap: 4px;
        margin-bottom: 18px;
    }

    .form-group {
        min-width: 0;
        margin-bottom: 14px;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-group label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: var(--dark);
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    select.form-control {
        min-height: 48px;
        background-color: #fff;
    }

    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(29, 191, 173, 0.2);
        outline: none;
    }

    textarea.form-control {
        min-height: 88px;
        resize: vertical;
    }

    .employment-options {
        display: flex;
        flex-wrap: wrap;
        gap: 12px 24px;
        padding: 8px 0;
    }

    .employment-option,
    .consent-option {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        cursor: pointer;
    }

    .employment-option input,
    .consent-option input {
        flex: 0 0 auto;
        margin-top: 4px;
        accent-color: var(--primary);
    }

    .resume-control {
        padding: 10px;
        border: 1px dashed #9aa8ad;
        border-radius: 8px;
        background: #f8fbfb;
    }

    .resume-control::file-selector-button {
        margin-right: 12px;
        padding: 8px 14px;
        border: 0;
        border-radius: 6px;
        background: var(--primary);
        color: #fff;
        font-weight: 600;
        cursor: pointer;
    }

    .consent-option {
        line-height: 1.5;
        font-weight: 400 !important;
    }

    .career-form-error {
        display: none;
        margin-bottom: 18px;
        padding: 12px 16px;
        border-radius: 6px;
        background: #fef2f2;
        color: #b91c1c;
    }

    .career-form-error.active {
        display: block;
    }

    .form-actions {
        text-align: center;
        margin-top: 24px;
    }

    .form-actions .btn {
        min-width: 250px;
        background: linear-gradient(135deg, #1DBFAD 0%, #159B8A 100%);
        border: 0;
        color: #fff;
    }

    /* Success Modal */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .modal-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    .modal-content {
        background: white;
        border-radius: 12px;
        padding: 40px;
        max-width: 500px;
        width: 90%;
        text-align: center;
        transform: translateY(20px);
        transition: all 0.3s ease;
    }

    .modal-overlay.active .modal-content {
        transform: translateY(0);
    }

    .modal-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(29, 191, 173, 0.1);
        border-radius: 50%;
        color: var(--primary);
    }

    .modal-icon svg {
        width: 40px;
        height: 40px;
    }

    .modal-title {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: var(--dark);
    }

    .modal-text {
        color: var(--gray);
        margin-bottom: 30px;
    }

    /* Back to Top Button */
    .back-to-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
        background: var(--primary);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        z-index: 99;
    }

    .back-to-top:hover {
        background: #17a794;
        transform: translateY(-3px);
    }

    .back-to-top.active {
        opacity: 1;
        visibility: visible;
    }

    /* Animations */
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .career-hero h1 {
            font-size: 2.5rem;
        }
        
        .career-hero p {
            font-size: 1.1rem;
        }
        
        .form-grid {
            grid-template-columns: 1fr;
        }
        
        .application-form {
            padding: 24px 18px;
        }

        .employment-options {
            flex-direction: column;
            gap: 10px;
        }

        .benefits-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- Hero Section -->
<section class="career-hero">
    <div class="container career-hero-content">
        <h1>Join Our Team</h1>
        <p>We're looking for passionate individuals to help us transform lives through quality care services.</p>
        <a href="#open-positions" class="btn btn-primary">View Open Positions</a>
    </div>
</section>

<!-- Why Work With Us Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Why Work With Us?</h2>
        </div>
        
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3>Meaningful Work</h3>
                <p>Make a real difference in people's lives every day through compassionate care.</p>
            </div>
            
            <div class="benefit-card">
                <div class="benefit-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3>Career Growth</h3>
                <p>Continuous training and development opportunities to advance your career.</p>
            </div>
            
            <div class="benefit-card">
                <div class="benefit-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3>Competitive Benefits</h3>
                <p>Attractive compensation packages and flexible working arrangements.</p>
            </div>
        </div>
    </div>
</section>

<!-- Open Positions Section -->
<section id="open-positions" class="section bg-gray-50">
    <div class="container">
        <div class="section-title">
            <h2>Current Opportunities</h2>
        </div>
        
        <div class="job-listings">
            <div class="job-card">
                <div class="job-header">
                    <div class="flex justify-between items-start flex-wrap gap-4">
                        <div>
                            <h3 class="job-title">Support Worker</h3>
                            <div class="job-meta">
                                <span class="job-tag" style="background-color: #E1F5FE; color: #0288D1;">Full-time</span>
                                <span class="job-tag" style="background-color: #E8F5E9; color: #388E3C;">Sydney</span>
                                <span class="job-tag" style="background-color: #F3E5F5; color: #7B1FA2;">$38 - $45 / hr 
</span>
                            </div>
                        </div>
                        <button class="btn btn-outline apply-btn" data-position="Support Worker">Apply Now</button>
                    </div>
                </div>
                
                <div class="job-description">
                    <p>We're seeking compassionate Care Workers to provide high-quality support to our clients in their homes.</p>
                    
                    <h4 class="job-section-title">Responsibilities:</h4>
                    <ul class="job-list">
                        <li>Provide personal care and domestic assistance</li>
                        <li>Support clients with daily living activities</li>
                        <li>Maintain accurate client records</li>
                        <li>Follow care plans and report changes</li>
                    </ul>
                    
                    <h4 class="job-section-title">Requirements:</h4>
                    <ul class="job-list">
                        <li>Certificate III in Individual Support or equivalent</li>
                        <li>First Aid and CPR certificates</li>
                        <li>NDIS Worker Screening Check</li>
                        <li>Own transport and driver's license</li>
                    </ul>
                </div>
            </div>
            
            <!-- Additional job listings would go here -->
        </div>
    </div>
</section>

<!-- Application Form -->
<section id="application-form" class="section">
    <div class="container">
        <div class="application-form">
            <div class="form-title">
                <h2>Join Our Caring Team</h2>
                <p>Interested in making a difference? Submit your application below and we’ll be in touch if there’s a suitable opportunity.</p>
            </div>
            
            <form id="career-form" action="{{ route('careers.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="first_name">First Name *</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Enter your first name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="last_name">Last Name *</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Enter your last name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email address" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number *</label>
                        <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" required>
                    </div>

                    <div class="form-group">
                        <label for="job_position">Role Applying For *</label>
                        <select id="job_position" name="job_position" class="form-control" required>
                            <option value="">Select a role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role }}">{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="preferred_location">Preferred Location *</label>
                        <select id="preferred_location" name="preferred_location" class="form-control" required>
                            <option value="">Select a location</option>
                            @foreach($locations as $location)
                                <option value="{{ $location }}">{{ $location }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group full-width">
                        <label>Employment Type Preference *</label>
                        <div class="employment-options">
                            @foreach($employmentTypes as $index => $employmentType)
                                <label class="employment-option" for="employment_type_{{ $index }}">
                                    <input type="radio" id="employment_type_{{ $index }}" name="employment_type_preference" value="{{ $employmentType }}" required>
                                    <span>{{ $employmentType }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="work_rights">Work Rights in Australia *</label>
                        <select id="work_rights" name="work_rights" class="form-control" required>
                            <option value="">Select an option</option>
                            @foreach($workRightsOptions as $workRights)
                                <option value="{{ $workRights }}">{{ $workRights }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="availability">Availability *</label>
                        <select id="availability" name="availability" class="form-control" required>
                            <option value="">Select your availability</option>
                            @foreach($availabilities as $availability)
                                <option value="{{ $availability }}">{{ $availability }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group full-width">
                        <label for="referral_source">How did you hear about us? *</label>
                        <select id="referral_source" name="referral_source" class="form-control" required>
                            <option value="">Select an option</option>
                            @foreach($referralSources as $referralSource)
                                <option value="{{ $referralSource }}">{{ $referralSource }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group full-width">
                        <label for="resume">Resume (CV) *</label>
                        <input type="file" id="resume" name="resume" class="form-control resume-control" accept=".pdf,.doc,.docx" required>
                        <small class="text-gray-500">Upload your resume (PDF, DOC or DOCX, max 5MB)</small>
                    </div>

                    <div class="form-group full-width">
                        <label for="cover_letter">Cover Note / Message (Optional)</label>
                        <textarea id="cover_letter" name="cover_letter" class="form-control" maxlength="5000" placeholder="Tell us a little about yourself, your experience and what interests you about working with us."></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="consent-option" for="consent">
                            <input type="checkbox" id="consent" name="consent" value="1" required>
                            <span>I confirm that the information provided is accurate and I consent to be contacted about relevant job opportunities.</span>
                        </label>
                    </div>
                </div>

                <div id="career-form-error" class="career-form-error" role="alert"></div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane" aria-hidden="true"></i> Submit Application
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Success Modal -->
<div class="modal-overlay" id="success-modal">
    <div class="modal-content">
        <div class="modal-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        <h3 class="modal-title">Application Submitted!</h3>
        <p class="modal-text">Thank you for your application. We'll review your information and get back to you soon.</p>
        <button id="close-modal" class="btn btn-primary">Close</button>
    </div>
</div>

<!-- Back to Top Button -->
<div class="back-to-top" id="back-to-top">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="24" height="24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
    </svg>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Show application form when Apply button is clicked
    document.querySelectorAll('.apply-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const position = this.getAttribute('data-position');
            document.getElementById('job_position').value = position;
            document.getElementById('application-form').scrollIntoView({ behavior: 'smooth' });
        });
    });

    // Back to top button
    const backToTopBtn = document.getElementById('back-to-top');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 300) {
            backToTopBtn.classList.add('active');
        } else {
            backToTopBtn.classList.remove('active');
        }
    });
    
    backToTopBtn.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Form submission
    const form = document.getElementById('career-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitButton = form.querySelector('button[type="submit"]');
            const errorContainer = document.getElementById('career-form-error');
            errorContainer.classList.remove('active');
            errorContainer.textContent = '';
            
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            const formData = new FormData(form);
            submitButton.disabled = true;
            submitButton.textContent = 'Submitting...';

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json().then(data => ({ response, data })))
            .then(({ response, data }) => {
                if (!response.ok) {
                    if (response.status === 422 && data.errors) {
                        const messages = Object.values(data.errors).flat();
                        errorContainer.textContent = messages.join(' ');
                        errorContainer.classList.add('active');
                        errorContainer.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        return;
                    }

                    throw new Error(data.message || 'Application submission failed.');
                }

                if (data.success) {
                    document.getElementById('success-modal').classList.add('active');
                    form.reset();
                } else {
                    throw new Error(data.message || 'Application submission failed.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                errorContainer.textContent = 'There was an error submitting your application. Please try again.';
                errorContainer.classList.add('active');
            })
            .finally(() => {
                submitButton.disabled = false;
                submitButton.innerHTML = '<i class="fas fa-paper-plane" aria-hidden="true"></i> Submit Application';
            });
        });
    }

    // Close success modal
    document.getElementById('close-modal').addEventListener('click', function() {
        document.getElementById('success-modal').classList.remove('active');
    });
});
</script>
@endsection