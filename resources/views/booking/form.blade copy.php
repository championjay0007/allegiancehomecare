@extends('layouts.care')

@section('title', 'Book Care Services')

@section('content')
<div class="booking-container">
    <!-- Progress Bar -->
    <div class="booking-progress">
        <div class="progress-step active" data-step="1">
            <div class="step-number">1</div>
            <div class="step-label">Service Type</div>
        </div>
        <div class="progress-step" data-step="2">
            <div class="step-number">2</div>
            <div class="step-label">Your Journey</div>
        </div>
        <div class="progress-step" data-step="3">
            <div class="step-number">3</div>
            <div class="step-label">Your Details</div>
        </div>
        <div class="progress-step" data-step="4">
            <div class="step-number">4</div>
            <div class="step-label">Complete</div>
        </div>
    </div>

    <!-- Form Sections -->
    <form id="bookingForm" action="{{ route('booking.submit') }}" method="POST">
        @csrf

        <!-- Step 1: Service Type -->
        <div class="form-step active" data-step="1">
            <h2>What type of care services are you looking for?</h2>
            
            <div class="service-options">
                <div class="service-card">
                    <input type="radio" name="service_type" id="aged_care" value="aged_care" required>
                    <label for="aged_care">
                        <div class="service-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 8v4l3 3"></path>
                            </svg>
                        </div>
                        <h3>Aged Care</h3>
                        <p>Support for elderly individuals including personal care, companionship, and home help.</p>
                    </label>
                </div>
                
                <div class="service-card">
                    <input type="radio" name="service_type" id="disability" value="disability">
                    <label for="disability">
                        <div class="service-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <h3>Disability Support</h3>
                        <p>NDIS-funded services to help with daily living and community participation.</p>
                    </label>
                </div>
                
                <div class="service-card">
                    <input type="radio" name="service_type" id="home_care" value="home_care">
                    <label for="home_care">
                        <div class="service-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </div>
                        <h3>Home Care</h3>
                        <p>Assistance with household tasks, meal preparation, and personal care at home.</p>
                    </label>
                </div>
            </div>
            
            <div class="form-navigation">
                <button type="button" class="btn-next" onclick="nextStep(2)">Continue</button>
            </div>
        </div>

        <!-- Step 2: Disability Journey -->
        <div class="form-step" data-step="2">
            <h2>Where are you on your disability journey?</h2>
            
            <div class="journey-options">
                <div class="option-card">
                    <input type="radio" name="journey_stage" id="exploring" value="exploring" required>
                    <label for="exploring">
                        <h3>Just Exploring</h3>
                        <p>I'm researching options but haven't started the process yet.</p>
                    </label>
                </div>
                
                <div class="option-card">
                    <input type="radio" name="journey_stage" id="applying" value="applying">
                    <label for="applying">
                        <h3>Applying for NDIS</h3>
                        <p>I'm in the process of applying for NDIS funding.</p>
                    </label>
                </div>
                
                <div class="option-card">
                    <input type="radio" name="journey_stage" id="approved" value="approved">
                    <label for="approved">
                        <h3>NDIS Approved</h3>
                        <p>I have an approved NDIS plan and funding.</p>
                    </label>
                </div>
                
                <div class="option-card">
                    <input type="radio" name="journey_stage" id="existing" value="existing">
                    <label for="existing">
                        <h3>Existing Client</h3>
                        <p>I'm already receiving services but looking for additional support.</p>
                    </label>
                </div>
            </div>
            
            <div class="form-navigation">
                <button type="button" class="btn-prev" onclick="prevStep()">Back</button>
                <button type="button" class="btn-next" onclick="nextStep(3)">Continue</button>
            </div>
        </div>

  <!-- Step 3: Personal Details (Updated) -->
<div class="form-step" data-step="3">
    <h2>Tell us about yourself</h2>
    
    <div class="form-grid">
        <!-- Basic Information -->
        <div class="form-group">
            <label for="completing_for">Who are you completing this for?</label>
            <select id="completing_for" name="completing_for" required>
                <option value="">Select option</option>
                <option value="self">Myself</option>
<option value="someone_else">Someone Else</option>
                
            </select>
        </div>
        
        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" required>
        </div>
        
        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" id="date_of_birth" name="date_of_birth" required>
        </div>
        
        <div class="form-group">
            <label>Gender</label>
            <div class="radio-group">
                <label><input type="radio" name="gender" value="male" required> Male</label>
<label><input type="radio" name="gender" value="female"> Female</label>
<label><input type="radio" name="gender" value="other"> Other</label>
                
            </div>
        </div>
        
        <!-- Contact Information -->
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" required>
        </div>
        
        <div class="form-group">
            <label for="postcode">Postcode</label>
            <input type="text" id="postcode" name="postcode" required>
        </div>
        
        <div class="form-group full-width">
            <label for="address">Full Address</label>
            <input type="text" id="address" name="address">
        </div>
        
        <!-- Cultural Considerations -->
        <div class="form-group full-width">
            <label for="cultural_considerations">Cultural Considerations</label>
            <textarea id="cultural_considerations" name="cultural_considerations" rows="2"></textarea>
        </div>
        
        <div class="form-group">
            <label class="checkbox-label">
                <input type="hidden" name="requires_interpreter" value="0">
                <input type="checkbox" name="requires_interpreter" id="requires_interpreter" value="1">
                Requires interpreter service
            </label>
        </div>
        
        <div class="form-group">
            <label class="checkbox-label">
             <input type="hidden" name="is_aboriginal_or_torres_strait_islander" value="0">   
            <input type="checkbox" name="is_aboriginal_or_torres_strait_islander" id="is_aboriginal_or_torres_strait_islander" value="1">
                Aboriginal or Torres Strait Islander
            </label>
        </div>
        
        <!-- Health Information -->
        <div class="form-group full-width">
            <label for="relevant_conditions">Relevant Medical Conditions</label>
            <textarea id="relevant_conditions" name="relevant_conditions" rows="3"></textarea>
        </div>
        
        <div class="form-group full-width">
            <label for="special_assessments">Special Assessments Needed</label>
            <textarea id="special_assessments" name="special_assessments" rows="2"></textarea>
        </div>
        
        <div class="form-group full-width">
            <label for="initial_appointment_info">Initial Appointment Information</label>
            <textarea id="initial_appointment_info" name="initial_appointment_info" rows="3"></textarea>
        </div>
        
        <div class="form-group full-width">
            <label for="notes_for_practitioners">Notes for Practitioners</label>
            <textarea id="notes_for_practitioners" name="notes_for_practitioners" rows="3"></textarea>
        </div>
        
        <!-- Referral -->
        <div class="form-group full-width">
            <label for="referral">How did you hear about us? (Optional)</label>
            <select id="referral" name="referral">
                <option value="">Select an option</option>
                <option value="search">Search Engine (Google, etc.)</option>
                <option value="social">Social Media</option>
                <option value="friend">Friend/Family Referral</option>
                <option value="healthcare">Healthcare Professional</option>
                <option value="other">Other</option>
            </select>
        </div>
        
        <div class="form-group full-width">
            <label for="additional_info">Additional Information (Optional)</label>
            <textarea id="additional_info" name="additional_info" rows="3"></textarea>
        </div>
    </div>
    
    <div class="form-navigation">
        <button type="button" class="btn-prev" onclick="prevStep()">Back</button>
        <button type="submit" class="btn-submit">Submit Request</button>
    </div>
</div>

        <!-- Step 4: Confirmation (shown after submission) -->
        <div class="form-step" data-step="4">
            <div class="confirmation-message">
                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 24 24" fill="none" stroke="#1DBFAD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                <h2>Thank You for Your Request!</h2>
                <p>We've received your information and our care coordinator will contact you within 24 hours to discuss your needs.</p>
                <p>In the meantime, you can explore our <a href="/resources">resource library</a> or learn more about <a href="/services">our services</a>.</p>
                <a href="/" class="btn-home">Return to Homepage</a>
            </div>
        </div>
    </form>
</div>

<style>
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

        if (step === 2 && !document.querySelector('input[name="journey_stage"]:checked')) {
            alert('Please select where you are in your disability journey.');
            return false;
        }

        return true;
    }


// Conditional Field Display
document.getElementById('requires_interpreter').addEventListener('change', function() {
    const interpreterDetails = document.querySelector('.interpreter-details');
    if (this.checked) {
        interpreterDetails.style.display = 'block';
    } else {
        interpreterDetails.style.display = 'none';
    }
});

// Date Picker Initialization (if using a library)
flatpickr("#date_of_birth", {
    dateFormat: "Y-m-d",
    maxDate: "today",
    allowInput: true
});


    // Form submission
document.getElementById('bookingForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = this;
    
    if (validateStep(3)) {
        // Show loading state
        const submitBtn = form.querySelector('.btn-submit');
        submitBtn.disabled = true;
        submitBtn.textContent = 'Submitting...';
        
        fetch(form.action, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: new FormData(form)
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => { throw err; });
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Show success step
                document.querySelector('.form-step[data-step="3"]').classList.remove('active');
                document.querySelector('.form-step[data-step="4"]').classList.add('active');
                document.querySelector('.progress-step[data-step="4"]').classList.add('active');
            } else {
                showFormErrors(data.errors || {});
            }
        })
        .catch(error => {
            console.error('Error:', error);
            if (error.errors) {
                showFormErrors(error.errors);
            } else {
                alert('There was an error submitting your form. Please try again.');
            }
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Submit Request';
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