@extends('layouts.care')

@section('title', 'Submit an Enquiry')

@section('content')
<div class="booking-container">
    <!-- Eligibility Gatekeeper -->
    <div class="eligibility-notice">
        <h2>Who Can Use This Form?</h2>
        <div class="eligibility-grid">
            <div class="eligibility-group">
                <h3><i class="fas fa-check-circle"></i> Eligible Users</h3>
                <ul>
                    <li>NDIS Participants (self/plan-managed)</li>
                    <li> Support at Home Package Consumers (Level 1-8)</li>
                    <li>Family Members/Carers of eligible clients</li>
                    <li>Support Coordinators/Case Managers</li>
                    <li>Prospective clients checking eligibility</li>
                </ul>
            </div>
            <div class="eligibility-group not-eligible">
                <h3><i class="fas fa-times-circle"></i> Not Eligible</h3>
                <ul>
                    <li>Non-NDIS/HCP individuals</li>
                    <li>Business partnership inquiries</li>
                    <li>Job seekers (use Careers page)</li>
                </ul>
            </div>
        </div>
        <div class="pricing-links">
            <p>Before proceeding, please review our pricing:</p>
            <a href="/pricingform" class="pricing-link">Pricing Schedule</a>
            <a href="/download-brochure" class="pricing-link">Consumer Handbook</a>
        </div>
    </div>

    <!-- Progress Bar -->
    <div class="booking-progress">
        <div class="progress-step active" data-step="1">
            <div class="step-number">1</div>
            <div class="step-label">Service Type</div>
        </div>
        <div class="progress-step" data-step="2">
            <div class="step-number">2</div>
            <div class="step-label">Your Details</div>
        </div>
        <div class="progress-step" data-step="3">
            <div class="step-number">3</div>
            <div class="step-label">Service Needs</div>
        </div>
    </div>

    <!-- Form Sections -->
    <form id="bookingForm" action="{{ route('booking.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Step 1: Service Type -->
        <div class="form-step active" data-step="1">
            <h2>What type of care services are you looking for?</h2>
            
            <div class="service-options">
                <div class="service-card">
                    <input type="radio" name="service_type" id="home_care" value="home_care" required>
                    <label for="home_care">
                        <div class="service-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h3>Support at Home Package</h3>
                        <p>For older Australians with government-funded Home Care Packages</p>
                    </label>
                </div>
                
                <div class="service-card">
                    <input type="radio" name="service_type" id="ndis" value="ndis">
                    <label for="ndis">
                        <div class="service-icon">
                            <i class="fas fa-wheelchair"></i>
                        </div>
                        <h3>NDIS Support</h3>
                        <p>For individuals with an approved NDIS plan</p>
                    </label>
                </div>
            </div>
            
            <div class="form-navigation">
                <button type="button" class="btn-next" onclick="nextStep(2)">Continue</button>
            </div>
        </div>

        <!-- Step 2: Personal Details -->
        <div class="form-step" data-step="2">
            <h2>Tell us about yourself</h2>
            
            <div class="form-grid">
                <!-- Basic Information -->
                <div class="form-group">
                    <label for="completing_as">You are completing this as:</label>
                    <select id="completing_as" name="completing_as" required>
                        <option value="">Select option</option>
                        <option value="participant">The participant/consumer</option>
                        <option value="family">A family member</option>
                        <option value="coordinator">A support coordinator</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                
                <div class="form-group" id="other_role_container" style="display:none;">
                    <label for="other_role">Please specify:</label>
                    <input type="text" id="other_role" name="other_role">
                </div>
                
                <div class="form-group">
                    <label for="full_name">Full Name *</label>
                    <input type="text" id="full_name" name="full_name" required>
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone Number *</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <!-- Location -->
                <div class="form-group">
                    <label for="postcode">Postcode *</label>
                    <input type="text" id="postcode" name="postcode" required>
                </div>
                
                <div class="form-group">
                    <label for="suburb">Suburb *</label>
                    <input type="text" id="suburb" name="suburb" required>
                </div>
                
                <div class="form-group">
                    <label for="state">State *</label>
                    <select id="state" name="state" required>
                        <option value="">Select state</option>
                        <option value="NSW">NSW</option>
                        <option value="VIC">VIC</option>
                        <option value="QLD">QLD</option>
                        <option value="SA">SA</option>
                        <option value="WA">WA</option>
                        <option value="TAS">TAS</option>
                        <option value="NT">NT</option>
                        <option value="ACT">ACT</option>
                    </select>
                </div>
                
                <!-- ID Fields (Conditional) -->
                <div class="form-group" id="ndis_number_container">
                    <label for="ndis_number">NDIS Number (if applicable)</label>
                    <input type="text" id="ndis_number" name="ndis_number">
                </div>
                
                <div class="form-group" id="hcp_id_container">
                    <label for="hcp_id">Home Care Package ID (if applicable)</label>
                    <input type="text" id="hcp_id" name="hcp_id">
                </div>
                
                <!-- Contact Preferences -->
                <div class="form-group full-width">
                    <label>Preferred Contact Method *</label>
                    <div class="checkbox-group">
                        <label><input type="checkbox" name="contact_phone" value="1" checked> Phone</label>
                        <label><input type="checkbox" name="contact_email" value="1" checked> Email</label>
                        <label><input type="checkbox" name="contact_sms" value="1"> SMS</label>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="contact_time">Best Time to Contact *</label>
                    <select id="contact_time" name="contact_time" required>
                        <option value="">Select preferred time</option>
                        <option value="morning">Morning (9am-12pm)</option>
                        <option value="afternoon">Afternoon (12pm-5pm)</option>
                        <option value="evening">Evening (5pm-8pm)</option>
                        <option value="anytime">Anytime</option>
                    </select>
                </div>
            </div>
            
            <div class="form-navigation">
                <button type="button" class="btn-prev" onclick="prevStep()">Back</button>
                <button type="button" class="btn-next" onclick="nextStep(3)">Continue</button>
            </div>
        </div>

        <!-- Step 3: Service Needs -->
        <div class="form-step" data-step="3">
            <h2>Tell us about your service needs</h2>
            
            <div class="form-grid">
                <!-- Service Type Specific Fields -->
                <div class="form-group">
                    <label for="preferred_date">Preferred Start Date</label>
                    <input type="date" id="preferred_date" name="preferred_date">
                </div>
                
                <!-- Dynamic Service Selection -->
                <div class="form-group full-width" id="ndis_services_container">
                    <label>NDIS Services Needed</label>
                    <div class="checkbox-grid">
                        <label><input type="checkbox" name="ndis_services[]" value="support_worker"> Support Worker</label>
                        <label><input type="checkbox" name="ndis_services[]" value="nursing"> Nursing Care</label>
                        <label><input type="checkbox" name="ndis_services[]" value="physio"> Physiotherapy</label>
                        <label><input type="checkbox" name="ndis_services[]" value="coordination"> Support Coordination</label>
                        <label><input type="checkbox" name="ndis_services[]" value="household"> Household Tasks</label>
                        <label><input type="checkbox" name="ndis_services[]" value="community"> Community Access</label>
                        <label><input type="checkbox" name="ndis_services[]" value="plan_management"> Plan Management</label>
                    </div>
                </div>
                
                <div class="form-group full-width" id="hcp_services_container">
                    <label>Home Care Services Needed</label>
                    <div class="checkbox-grid">
                        <label><input type="checkbox" name="hcp_services[]" value="personal_care"> Personal Care</label>
                        <label><input type="checkbox" name="hcp_services[]" value="nursing"> Nursing Support</label>
                        <label><input type="checkbox" name="hcp_services[]" value="domestic"> Domestic Assistance</label>
                        <label><input type="checkbox" name="hcp_services[]" value="allied_health"> Allied Health</label>
                        <label><input type="checkbox" name="hcp_services[]" value="respite"> Respite Care</label>
                        <label><input type="checkbox" name="hcp_services[]" value="palliative"> Palliative Care</label>
                        <label><input type="checkbox" name="hcp_services[]" value="assistive_tech"> Assistive Technology</label>
                    </div>
                </div>
                
                <!-- Additional Information -->
                <div class="form-group full-width">
                    <label for="additional_info">Additional Information</label>
                    <textarea id="additional_info" name="additional_info" rows="4"></textarea>
                </div>
                
                <!-- File Upload -->
                <div class="form-group full-width">
                    <label for="support_docs">Upload Support Documents (Optional)</label>
                    <input type="file" id="support_docs" name="support_docs[]" multiple>
                    <small>e.g., NDIS plan, care plan, referral documents (Max 5MB each)</small>
                </div>
                
                <!-- Referral Source -->
                <div class="form-group">
                    <label for="referral_source">How did you hear about us?</label>
                    <select id="referral_source" name="referral_source">
                        <option value="">Select option</option>
                        <option value="search">Google Search</option>
                        <option value="referral">Provider Referral</option>
                        <option value="family">Family/Friend</option>
                        <option value="coordinator">Support Coordinator</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                
                <!-- Consent -->
                <div class="form-group full-width consent-box">
                    <label class="checkbox-label">
                        <input type="checkbox" name="consent" id="consent" required>
                        I confirm the information provided is accurate and I've reviewed the pricing schedule.
                        I agree to the <a href="/terms" target="_blank">Terms & Conditions</a> and 
                        <a href="/privacy" target="_blank">Privacy Policy</a> *
                    </label>
                </div>
            </div>
            
            <div class="form-navigation">
                <button type="button" class="btn-prev" onclick="prevStep()">Back</button>
                <button type="submit" class="btn-submit">Submit My Enquiry</button>
            </div>
        </div>
    </form>
</div>


<style>
    /* Eligibility Notice */
    .eligibility-notice {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        border-left: 4px solid var(--primary);
    }
    
    .eligibility-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
        margin: 1rem 0;
    }
    
    .eligibility-group h3 {
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .eligibility-group ul {
        list-style: none;
        padding-left: 0;
        margin: 0;
    }
    
    .eligibility-group li {
        padding: 0.3rem 0;
        position: relative;
        padding-left: 1.5rem;
    }
    
    .eligibility-group li:before {
        content: "•";
        position: absolute;
        left: 0;
        color: var(--primary);
    }
    
    .not-eligible li:before {
        color: #dc3545;
    }
    
    .pricing-links {
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid #eee;
    }
    
    .pricing-link {
        display: inline-block;
        margin-right: 1rem;
        padding: 0.5rem 1rem;
        background: var(--primary);
        color: white;
        border-radius: 5px;
        text-decoration: none;
    }
    
    /* Checkbox Grid */
    .checkbox-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 0.5rem;
    }
    
    /* Consent Box */
    .consent-box {
        background: #f8f9fa;
        padding: 1rem;
        border-radius: 5px;
        margin-top: 1rem;
    }


    
    /* Add more styles as needed from your original CSS */


     /* Booking Container */
    .booking-container {
        max-width: 1000px;
        margin: 3rem auto;
        padding: 2rem;
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    /* Progress Bar */
    .booking-progress {
        display: flex;
        justify-content: space-between;
        margin-bottom: 3rem;
        position: relative;
    }

    .booking-progress::before {
        content: '';
        position: absolute;
        top: 20px;
        left: 0;
        right: 0;
        height: 3px;
        background: #eee;
        z-index: 1;
    }

    .progress-step {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .progress-step.active .step-number {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    .progress-step.active .step-label {
        color: var(--dark);
        font-weight: 600;
    }

    .step-number {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: white;
        border: 3px solid #eee;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        margin-bottom: 0.5rem;
        transition: all 0.3s ease;
    }

    .step-label {
        color: var(--gray);
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    /* Form Steps */
    .form-step {
        display: none;
        animation: fadeIn 0.5s ease;
    }

    .form-step.active {
        display: block;
    }

    .form-step h2 {
        color: var(--primary);
        margin-bottom: 2rem;
        font-size: 1.8rem;
    }

    /* Service Options */
    .service-options {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 3rem;
    }

    .service-card input[type="radio"] {
        display: none;
    }

    .service-card label {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 2rem;
        border: 2px solid #eee;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        height: 100%;
        text-align: center;
    }

    .service-card input[type="radio"]:checked + label {
        border-color: var(--primary);
        background: rgba(29, 191, 173, 0.05);
        box-shadow: 0 5px 15px rgba(29, 191, 173, 0.1);
    }

    .service-icon {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background: rgba(29, 191, 173, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
    }

    .service-card h3 {
        color: var(--dark);
        margin-bottom: 0.5rem;
    }

    .service-card p {
        color: var(--gray);
        font-size: 0.9rem;
    }

    /* Journey Options */
    .journey-options {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 3rem;
    }

    .option-card input[type="radio"] {
        display: none;
    }

    .option-card label {
        display: block;
        padding: 1.5rem;
        border: 2px solid #eee;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .option-card input[type="radio"]:checked + label {
        border-color: var(--primary);
        background: rgba(29, 191, 173, 0.05);
    }

    .option-card h3 {
        color: var(--dark);
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
    }

    .option-card p {
        color: var(--gray);
        font-size: 0.9rem;
    }

    /* Personal Details Form */
    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group.full-width {
        grid-column: span 2;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--dark);
        font-weight: 500;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: var(--primary);
        outline: none;
        box-shadow: 0 0 0 3px rgba(29, 191, 173, 0.2);
    }

    .form-group textarea {
        min-height: 100px;
        resize: vertical;
    }

    /* Form Navigation */
    .form-navigation {
        display: flex;
        justify-content: space-between;
        margin-top: 2rem;
    }

    .btn-prev,
    .btn-next,
    .btn-submit {
        padding: 0.8rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-prev {
        background: white;
        color: var(--primary);
        border: 2px solid var(--primary);
    }

    .btn-prev:hover {
        background: rgba(29, 191, 173, 0.1);
    }

    .btn-next,
    .btn-submit {
        background: var(--primary);
        color: white;
        border: 2px solid var(--primary);
    }

    .btn-next:hover,
    .btn-submit:hover {
        background: #159b8a;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    /* Confirmation Message */
    .confirmation-message {
        text-align: center;
        padding: 3rem 1rem;
    }

    .confirmation-message svg {
        margin-bottom: 1.5rem;
    }

    .confirmation-message h2 {
        color: var(--primary);
        margin-bottom: 1rem;
    }

    .confirmation-message p {
        color: var(--gray);
        max-width: 600px;
        margin: 0 auto 1.5rem;
        line-height: 1.6;
    }

    .btn-home {
        display: inline-block;
        margin-top: 1rem;
        padding: 0.8rem 2rem;
        background: var(--primary);
        color: white;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-home:hover {
        background: #159b8a;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .booking-progress {
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .progress-step {
            flex: 1 0 40%;
        }
        
        .service-options,
        .journey-options,
        .form-grid {
            grid-template-columns: 1fr;
        }
        
        .form-group.full-width {
            grid-column: span 1;
        }
        
        .form-navigation {
            flex-direction: column-reverse;
            gap: 1rem;
        }
        
        .btn-prev,
        .btn-next,
        .btn-submit {
            width: 100%;
        }
    }

    /* Radio and Checkbox Styles */
.radio-group {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    margin-top: 0.5rem;
}

.radio-group label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
}

.checkbox-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
}

/* Date Input Styling */
input[type="date"] {
    appearance: none;
    -webkit-appearance: none;
    padding: 0.8rem 1rem;
    background: white url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236C757D' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Crect x='3' y='4' width='18' height='18' rx='2' ry='2'%3E%3C/rect%3E%3Cline x1='16' y1='2' x2='16' y2='6'%3E%3C/line%3E%3Cline x1='8' y1='2' x2='8' y2='6'%3E%3C/line%3E%3Cline x1='3' y1='10' x2='21' y2='10'%3E%3C/line%3E%3C/svg%3E") no-repeat 95% center;
    background-size: 16px;
}

/* Textarea Styling */
textarea {
    min-height: 100px;
    resize: vertical;
    line-height: 1.5;
    padding: 0.8rem 1rem;
}

/* Conditional Fields (shown/hidden with JS) */
.interpreter-details {
    display: none;
    margin-top: 1rem;
    padding: 1rem;
    background: rgba(29, 191, 173, 0.05);
    border-radius: 8px;
}

.requires-interpreter:checked ~ .interpreter-details {
    display: block;
}


.has-error input,
.has-error select,
.has-error textarea {
    border-color: var(--accent) !important;
}

.error-message {
    color: var(--accent);
    font-size: 0.85em;
    margin-top: 5px;
}
</style>




<script>
    // Show/hide NDIS or HCP fields based on service type selection
    document.querySelectorAll('input[name="service_type"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const isNDIS = this.value === 'ndis';
            
            // Toggle ID fields
            document.getElementById('ndis_number_container').style.display = isNDIS ? 'block' : 'none';
            document.getElementById('hcp_id_container').style.display = isNDIS ? 'none' : 'block';
            
            // Toggle service options
            document.getElementById('ndis_services_container').style.display = isNDIS ? 'block' : 'none';
            document.getElementById('hcp_services_container').style.display = isNDIS ? 'none' : 'block';
        });
    });
    
    // Show "Other" role field when selected
    document.getElementById('completing_as').addEventListener('change', function() {
        document.getElementById('other_role_container').style.display = 
            this.value === 'other' ? 'block' : 'none';
    });
    
    // Postcode lookup API (example using Fetch)
    document.getElementById('postcode').addEventListener('blur', function() {
        const postcode = this.value;
        if (postcode.length === 4 && /^\d+$/.test(postcode)) {
            fetch(`/api/postcode-lookup?postcode=${postcode}`)
                .then(response => response.json())
                .then(data => {
                    if (data.suburb) {
                        document.getElementById('suburb').value = data.suburb;
                        document.getElementById('state').value = data.state;
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    });
    
    // Form Navigation
    function nextStep(step) {
        // Validate current step before proceeding
        if (validateStep(step - 1)) {
            document.querySelector(`.form-step[data-step="${step - 1}"]`).classList.remove('active');
            document.querySelector(`.form-step[data-step="${step}"]`).classList.add('active');
            
            document.querySelector(`.progress-step[data-step="${step - 1}"]`).classList.remove('active');
            document.querySelector(`.progress-step[data-step="${step}"]`).classList.add('active');
            
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    }

    function prevStep() {
        const currentStep = document.querySelector('.form-step.active').dataset.step;
        const prevStep = parseInt(currentStep) - 1;
        
        document.querySelector(`.form-step[data-step="${currentStep}"]`).classList.remove('active');
        document.querySelector(`.form-step[data-step="${prevStep}"]`).classList.add('active');
        
        document.querySelector(`.progress-step[data-step="${currentStep}"]`).classList.remove('active');
        document.querySelector(`.progress-step[data-step="${prevStep}"]`).classList.add('active');
        
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // Basic step validation
    function validateStep(step) {
        const currentStep = document.querySelector(`.form-step[data-step="${step}"]`);
        const requiredFields = currentStep.querySelectorAll('[required]');
        let isValid = true;

        requiredFields.forEach(field => {
            if (!field.value) {
                field.style.borderColor = 'var(--accent)';
                isValid = false;
                
                // Remove error on input
                field.addEventListener('input', function() {
                    this.style.borderColor = '#ddd';
                });
            }
        });

        if (!isValid) {
            alert('Please complete all required fields before continuing.');
            return false;
        }

        // Additional validation for specific steps
        if (step === 1 && !document.querySelector('input[name="service_type"]:checked')) {
            alert('Please select a service type.');
            return false;
        }

        return true;
    }

    // Form submission
    document.getElementById('bookingForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = this;
        
        if (validateStep(3)) {
            // Show loading state
            const submitBtn = form.querySelector('.btn-submit');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Submitting...';
            
            // Create FormData object
            const formData = new FormData(form);
            
            // Add AJAX headers
            const headers = new Headers();
            headers.append('X-Requested-With', 'XMLHttpRequest');
            headers.append('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
            
            fetch(form.action, {
                method: 'POST',
                headers: headers,
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    const thankYouUrl = new URL(@json(route('booking.thank-you')), window.location.origin);
                    thankYouUrl.searchParams.set('service_type', formData.get('service_type'));
                    window.location.assign(thankYouUrl);
                } else {
                    showFormErrors(data.errors || {});
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('There was an error submitting your form. Please try again.');
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Submit My Enquiry';
            });
        }
    });

    // Function to display validation errors
    function showFormErrors(errors) {
        // Clear previous errors
        document.querySelectorAll('.error-message').forEach(el => el.remove());
        document.querySelectorAll('.has-error').forEach(el => el.classList.remove('has-error'));
        
        // Add new errors
        for (const [field, messages] of Object.entries(errors)) {
            const input = document.querySelector(`[name="${field}"]`);
            if (input) {
                const inputContainer = input.closest('.form-group') || input.closest('.option-card') || input.closest('.service-card');
                if (inputContainer) {
                    inputContainer.classList.add('has-error');
                    const errorEl = document.createElement('div');
                    errorEl.className = 'error-message';
                    errorEl.style.color = 'var(--accent)';
                    errorEl.style.marginTop = '5px';
                    errorEl.textContent = messages.join(', ');
                    inputContainer.appendChild(errorEl);
                }
                
                // Scroll to first error
                if (!document.querySelector('.scroll-to-first-error')) {
                    input.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    input.classList.add('scroll-to-first-error');
                    setTimeout(() => input.classList.remove('scroll-to-first-error'), 2000);
                }
            }
        }
        
        if (Object.keys(errors).length === 0) {
            alert('There was an unexpected error. Please try again.');
        }
    }

    // Initialize first step
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.form-step[data-step="1"]').classList.add('active');
    });
</script>







@endsection