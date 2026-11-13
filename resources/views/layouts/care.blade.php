<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Allegiance Heart & Home Care')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
   

    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest"> <!-- For PWA support -->
       
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- AOS JS (add before closing </body>) -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=G-340H8XGZEE">
</script>


<!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-L3JNR16C8R"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-L3JNR16C8R'); </script>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>


<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-340H8XGZEE');
</script>

<style>
.admin-custom-content img {
    max-width: 100%;
    height: auto;
}
.admin-custom-content iframe {
    max-width: 100%;
}

:root {
            --primary: #1DBFAD;
            --accent: #E53935;
            --gradient: linear-gradient(135deg, #00A0C6 0%, #004E92 100%);
            --dark: #1A1A1A;
            --light: #FFFFFF;
            --gray: #6C757D;
            --light-bg: #F8F9FA;
        }
</style>



</head>
<body>

    {{-- Header --}}
    @include('layouts.header')

    <main class="content-wrapper">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

<style>
    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        color: #333;
        line-height: 1.6;
    }



/* Modal Styles */
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
}

.modal-container {
    background: white;
    border-radius: 15px;
    width: 90%;
    max-width: 800px;
    position: relative;
    animation: modalFadeIn 0.3s ease-out;
}

.modal-close {
    position: absolute;
    top: 20px;
    right: 20px;
    background: none;
    border: none;
    cursor: pointer;
    color: var(--gray);
    transition: all 0.3s ease;
}

.modal-close:hover {
    color: var(--accent);
    transform: rotate(90deg);
}

.modal-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
    padding: 3rem;
}

.modal-left {
    display: flex;
    align-items: center;
}

.brochure-preview {
    width: 100%;
    border-radius: 10px;
    box-shadow: var(--shadow-md);
}

.modal-right h3 {
    font-size: 1.8rem;
    margin-bottom: 1rem;
    color: var(--dark);
}

.modal-right p {
    color: var(--gray);
    margin-bottom: 2rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group input {
    width: 100%;
    padding: 1rem;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.form-group input:focus {
    border-color: var(--primary);
    outline: none;
    box-shadow: 0 0 0 3px rgba(29, 191, 173, 0.2);
}

.submit-btn {
    width: 100%;
    padding: 1rem;
    background: var(--gradient);
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

/* Animations */
@keyframes modalFadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive */
@media (max-width: 768px) {
    .modal-content {
        grid-template-columns: 1fr;
        padding: 2rem;
    }
    
    .modal-left {
        display: none;
    }
}

    
</style>

<!-- Download Brochure Modal -->
<div class="modal-overlay" id="brochureModal" style="display: none;">
    <div class="modal-container">
        <button class="modal-close" onclick="closeModal()">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
        
        <div class="modal-content">
            <div class="modal-left">
                <img src="{{ asset('images/brochure-preview.png') }}" alt="Care Services Brochure" class="brochure-preview">
            </div>
            <div class="modal-right">
                <h3>Download Our <span class="gradient-text">Care Services Brochure</span></h3>
                <p>Get complete information about our aged care, disability support, and home care services.</p>
                
                <form id="brochureForm" action="/download-brochure" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="first_name" id="first_name" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="last_name" id="last_name" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" id="phone" placeholder="Phone Number" required>
                    </div>
                    <button type="submit" class="submit-btn">
                        Download Now
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Open modal function (call this from your download buttons)
function openBrochureModal() {
    document.getElementById('brochureModal').style.display = 'flex';
    document.body.style.overflow = 'hidden'; // Prevent scrolling
}

// Close modal function
function closeModal() {
    document.getElementById('brochureModal').style.display = 'none';
    document.body.style.overflow = 'auto'; // Re-enable scrolling
}

// Close when clicking outside modal
document.getElementById('brochureModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});

// Form submission handling
document.getElementById('brochureForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // You can add AJAX submission here if needed
    // Otherwise, the form will submit normally to your controller
    
    this.submit();
});
</script>




<script>
  document.addEventListener('DOMContentLoaded', function() {
    AOS.init({
      duration: 600,
      easing: 'ease-in-out-quad',
      once: true,
      offset: 120
    });
    
    // Refresh AOS when Livewire updates
    document.addEventListener('livewire:navigated', () => AOS.refresh());
  });
</script>
</body>
</html>
