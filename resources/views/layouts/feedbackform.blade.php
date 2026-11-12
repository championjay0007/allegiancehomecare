<div class="feedback-container" id="feedback">
    <div class="feedback-card">
        <h2 class="feedback-title">Submit Your Feedback or Complaint</h2>
        
        @if(session('success'))
            <div class="success-message" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('feedback.store') }}" method="POST" class="feedback-form">
            @csrf

            <!-- Anonymous Toggle -->
            <div class="form-group">
                <label class="checkbox-label">
                    <input type="checkbox" id="anonymous" name="anonymous" onchange="toggleFields()"
                           aria-label="Submit feedback anonymously">
                    <span class="checkmark" aria-hidden="true"></span>
                    Submit Anonymously
                </label>
                <!-- Hidden input for backend clarity -->
                <input type="hidden" name="is_anonymous" id="is_anonymous" value="0">
            </div>

            <!-- Contact Fields -->
            <div id="contact-fields">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name" class="input-label">Name</label>
                        <input type="text" id="name" name="name" class="input-field" 
                               @error('name') aria-invalid="true" @enderror
                               value="{{ old('name') }}" />
                        @error('name')
                            <span class="error-message" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="input-label">Email</label>
                        <input type="email" id="email" name="email" class="input-field" 
                               @error('email') aria-invalid="true" @enderror
                               value="{{ old('email') }}" />
                        @error('email')
                            <span class="error-message" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Category -->
            <div class="form-group">
                <label for="category" class="input-label">Category</label>
                <select id="category" name="category" class="input-field" required
                        aria-required="true" @error('category') aria-invalid="true" @enderror>
                    <option value="">Select a category</option>
                    <option value="NDIS" {{ old('category') == 'NDIS' ? 'selected' : '' }}>NDIS</option>
                    <option value="Home Care" {{ old('category') == 'Home Care' ? 'selected' : '' }}>Home Care</option>
                    <option value="Other" {{ old('category') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('category')
                    <span class="error-message" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <!-- Message -->
            <div class="form-group">
                <label for="message" class="input-label">Your Feedback or Complaint</label>
                <textarea id="message" name="message" rows="5" class="input-field textarea" required
                          aria-required="true" @error('message') aria-invalid="true" @enderror>{{ old('message') }}</textarea>
                @error('message')
                    <span class="error-message" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <!-- reCAPTCHA -->
            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                @error('g-recaptcha-response')
                    <span class="error-message" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <!-- T&Cs -->
            <div class="form-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="agree_terms" required
                           aria-required="true" @error('agree_terms') aria-invalid="true" @enderror />
                    <span class="checkmark" aria-hidden="true"></span>
                    I agree to the <a href="/terms" target="_blank" class="link">Terms & Conditions</a> and <a href="/privacy" target="_blank" class="link">Privacy Policy</a>
                </label>
                @error('agree_terms')
                    <span class="error-message" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-button" aria-label="Submit feedback form">Submit Feedback</button>
        </form>
    </div>
</div>

<style>
.feedback-container {
    font-family: 'Segoe UI', sans-serif;
    padding: 2rem;
    background: var(--light-bg);
}

.feedback-card {
    background: var(--light);
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    padding: 2rem;
    max-width: 700px;
    margin: auto;
    backdrop-filter: blur(10px);
    background-color: rgba(255, 255, 255, 0.9);
}

.feedback-title {
    color: var(--dark);
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
    text-align: center;
}

.success-message {
    background-color: #d4edda;
    color: #155724;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid #c3e6cb;
    border-radius: 8px;
}

.error-message {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
    display: block;
}

.form-row {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.form-group {
    margin-bottom: 1.2rem;
    width: 100%;
}

.input-label {
    display: block;
    margin-bottom: 0.5rem;
    color: var(--dark);
    font-weight: 500;
}

.input-field {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid var(--gray);
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
    background-color: #fff;
}

.input-field:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 2px rgba(29, 191, 173, 0.2);
}

.input-field[aria-invalid="true"] {
    border-color: #dc3545;
}

.textarea {
    resize: vertical;
    min-height: 120px;
}

.radio-group {
    display: flex;
    gap: 2rem;
}

.radio-label {
    position: relative;
    cursor: pointer;
    font-size: 1rem;
    color: var(--dark);
    display: flex;
    align-items: center;
    user-select: none;
}

.radio-custom {
    height: 18px;
    width: 18px;
    border: 2px solid var(--primary);
    border-radius: 50%;
    margin-right: 0.5rem;
    display: inline-block;
    position: relative;
}

.radio-label input:checked + .radio-custom::after {
    content: "";
    position: absolute;
    top: 4px;
    left: 4px;
    height: 10px;
    width: 10px;
    border-radius: 50%;
    background: var(--primary);
}

.checkbox-label {
    display: flex;
    align-items: center;
    cursor: pointer;
    font-size: 0.95rem;
    color: var(--gray);
}

.checkmark {
    height: 20px;
    width: 20px;
    margin-right: 0.75rem;
    border: 2px solid var(--gray);
    border-radius: 4px;
    display: inline-block;
    transition: all 0.2s ease;
}

.checkbox-label input:checked + .checkmark {
    background: var(--primary);
    border-color: var(--primary);
}

.checkbox-label input:checked + .checkmark::after {
    content: "✔";
    color: white;
    font-size: 12px;
    position: absolute;
    top: 1px;
    left: 4px;
}

.submit-button {
    background: var(--gradient);
    color: var(--light);
    border: none;
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    border-radius: 8px;
    cursor: pointer;
    width: 100%;
    transition: background 0.3s ease;
}

.submit-button:hover {
    opacity: 0.9;
}

.link {
    color: var(--primary);
    text-decoration: underline;
}

/* Mobile styles */
@media (max-width: 600px) {
    .feedback-container {
        padding: 1rem;
    }
    
    .feedback-card {
        padding: 1.5rem;
    }
    
    .form-row {
        flex-direction: column;
        gap: 0;
    }
    
    .form-group {
        margin-bottom: 1rem;
    }
}
</style>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    function toggleFields() {
        const anonymous = document.getElementById('anonymous');
        const fields = document.getElementById('contact-fields');
        const hiddenInput = document.getElementById('is_anonymous');
        
        if (anonymous.checked) {
            fields.style.display = 'none';
            hiddenInput.value = '1';
            // Remove required attributes when anonymous
            document.getElementById('name').removeAttribute('required');
            document.getElementById('email').removeAttribute('required');
        } else {
            fields.style.display = 'block';
            hiddenInput.value = '0';
            // Add required attributes when not anonymous
            document.getElementById('name').setAttribute('required', 'true');
            document.getElementById('email').setAttribute('required', 'true');
        }
    }
    
    // Set initial state
    toggleFields();
    
    // Attach event listener
    document.getElementById('anonymous').addEventListener('change', toggleFields);
});
</script>