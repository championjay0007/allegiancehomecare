@extends('layouts.care')

@section('title', 'Resources - Allegiance Heart & Home Care')

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

    /* Hero Section */
    .resources-hero {
        position: relative;
        height: 60vh;
        min-height: 500px;
        display: flex;
        align-items: center;
        background: linear-gradient(rgba(0, 78, 146, 0.85), rgba(0, 160, 198, 0.85)), url('https://images.unsplash.com/photo-1505751172876-fa1923c5c528?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
        background-size: cover;
        background-position: center;
        color: white;
        text-align: center;
    }

    .hero-content {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
        position: relative;
        z-index: 2;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        line-height: 1.1;
    }

    .hero-subtitle {
        font-size: 1.5rem;
        max-width: 800px;
        margin: 0 auto 2rem;
        opacity: 0.9;
        font-weight: 300;
    }

    /* Resources Navigation */
    .resources-nav {
        background: white;
        box-shadow: var(--shadow-sm);
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .nav-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        overflow-x: auto;
        padding: 1rem 2rem;
    }

    .nav-link {
        padding: 0.75rem 1.5rem;
        white-space: nowrap;
        color: var(--gray);
        font-weight: 600;
        text-decoration: none;
        border-radius: 50px;
        transition: all 0.3s ease;
    }

    .nav-link:hover, .nav-link.active {
        color: var(--primary);
        background: rgba(29, 191, 173, 0.1);
    }

    /* Resources Grid */
    .resources-section {
        padding: 5rem 2rem;
        background: var(--light-bg);
    }

    .section-header {
        max-width: 1200px;
        margin: 0 auto 3rem;
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
    }

    .section-title {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        color: var(--primary);
    }

    .gradient-text {
        background: var(--gradient);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .resources-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2rem;
    }

    .resource-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .resource-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .resource-image {
        height: 200px;
        overflow: hidden;
    }

    .resource-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s ease;
    }

    .resource-card:hover .resource-image img {
        transform: scale(1.05);
    }

    .resource-content {
        padding: 1.5rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .resource-type {
        display: inline-block;
        color: var(--primary);
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .resource-title {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        color: var(--dark);
    }

    .resource-description {
        color: var(--gray);
        margin-bottom: 1.5rem;
        flex-grow: 1;
    }

    .resource-meta {
        display: flex;
        align-items: center;
        color: var(--gray);
        font-size: 0.9rem;
        margin-bottom: 1rem;
    }

    .resource-meta svg {
        margin-right: 0.5rem;
    }

    .resource-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem 1.5rem;
        background: var(--primary);
        color: white;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        margin-top: auto;
    }

    .resource-btn:hover {
        background: #159b8a;
        transform: translateY(-2px);
        box-shadow: var(--shadow-sm);
    }

    .resource-btn svg {
        margin-left: 0.5rem;
    }

    /* FAQ Section */
    .faq-section {
        padding: 5rem 2rem;
        background: white;
    }

    .faq-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .faq-item {
        border-bottom: 1px solid #eee;
        padding: 1.5rem 0;
    }

    .faq-question {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-align: left;
        background: none;
        border: none;
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--dark);
        padding: 0.5rem 0;
        cursor: pointer;
    }

    .faq-answer {
        padding-top: 1rem;
        color: var(--gray);
        line-height: 1.7;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
        }
        
        .resources-grid {
            grid-template-columns: 1fr;
        }
        
        .nav-container {
            padding: 1rem;
        }
    }
</style>

<!-- Hero Section -->
<section class="resources-hero">
    <div class="hero-content">
        <h1 class="hero-title">Helpful <span class="gradient-text">Resources</span></h1>
        <p class="hero-subtitle">Find guides, forms, and information to support your care journey</p>
    </div>
</section>

<!-- Resources Navigation -->
<nav class="resources-nav">
    <div class="nav-container">
        <a href="#guides" class="nav-link active">Articles</a>
        <a href="#forms" class="nav-link">Downloadable Forms</a>
        <a href="#faqs" class="nav-link">FAQs</a>
        <a href="#videos" class="nav-link">Video Resources</a>
        <a href="#funding" class="nav-link">Funding Options</a>
    </div>
</nav>

<!-- Guides Section -->


<section class="resources-section" id="articles">
    <div class="section-header">
        <span class="section-badge">Articles</span>
        <h2 class="section-title">Latest <span class="gradient-text">Insights</span></h2>
    </div>
    <div class="resources-grid">
        @foreach($blogs as $blog)
        <div class="resource-card">
            @if($blog->featured_image)
            <div class="resource-image">
                <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}">
            </div>
            @endif
            <div class="resource-content">
                <span class="resource-type">Article • {{ $blog->reading_time ?? '5' }} min read</span>
                <h3 class="resource-title">{{ $blog->title }}</h3>
                <p class="resource-description">{{ $blog->excerpt }}</p>
                <div class="resource-meta">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    Published: {{ $blog->created_at->format('M Y') }}
                </div>
                <a href="{{ route('blog.show', $blog->slug) }}" class="resource-btn">
                    Read Article
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</section>










<!-- Forms Section -->
<section class="resources-section" id="forms" style="background: white;">
    <div class="section-header">
        <span class="section-badge">Forms</span>
        <h2 class="section-title">Downloadable <span class="gradient-text">Forms</span></h2>
    </div>
    <div class="resources-grid">
        <div class="resource-card">
            <div class="resource-content">
                <span class="resource-type">Appy for Brochure</span>
                <h3 class="resource-title">Download Brochure </h3>
                <p class="resource-description">Complete this form to begin services with Allegiance Heart & Home Care.</p>
                <a href="#" onclick="openBrochureModal()" class="resource-btn">
                    Download Customer Handbook
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                </a>
            </div>
        </div>
<div class="resource-card">
    <!-- <div class="resource-image">
        <img src="{{ asset('images/carer-application-thumbnail.jpg') }}" alt="Join Our Care Team">
    </div> -->
    <div class="resource-content">
        <span class="resource-type">Career Opportunity</span>
        <h3 class="resource-title">Become Part of Us</h3>
        <p class="resource-description">Join our compassionate team and make a real difference in people's lives.</p>
        <div class="resource-meta">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 20h9"></path>
                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
            </svg>
            Full training provided
        </div>
        <a href="#carerApplicationModal" onclick="openCarerModal()" class="resource-btn">
            Apply Now
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
        </a>
    </div>
</div>
        
        <div class="resource-card">
            <div class="resource-content">
                <span class="resource-type">Feedback Form</span>
                <h3 class="resource-title">Client Satisfaction Survey</h3>
                <p class="resource-description">Help us improve our services by sharing your feedback.</p>
                <a href="#" class="resource-btn">
                    Feed back Form
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section" id="faqs">
    <div class="section-header">
        <span class="section-badge">FAQs</span>
        <h2 class="section-title">Frequently Asked <span class="gradient-text">Questions</span></h2>
    </div>
    <div class="faq-container">
        <div class="faq-item">
            <button class="faq-question">
                How do I know if my loved one needs home care?
                <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 9l6 6 6-6"/>
                </svg>
            </button>
            <div class="faq-answer">
                <p>Common signs include difficulty with daily activities, unexplained weight loss, poor hygiene, frequent falls, social withdrawal, or forgetfulness with medications. We offer free assessments to help determine if home care would be beneficial.</p>
            </div>
        </div>
        
        <div class="faq-item">
            <button class="faq-question">
                What's the difference between aged care and NDIS services?
                <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 9l6 6 6-6"/>
                </svg>
            </button>
            <div class="faq-answer">
                <p>Aged care services are for seniors (typically 65+), while NDIS supports Australians with permanent disabilities (any age). Both provide funding for care services, but through different government systems with separate eligibility criteria.</p>
            </div>
        </div>
        
        <div class="faq-item">
            <button class="faq-question">
                Can I change my care plan if my needs evolve?
                <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 9l6 6 6-6"/>
                </svg>
            </button>
            <div class="faq-answer">
                <p>Absolutely! We regularly review care plans and can adjust services as your needs change. Just contact your care coordinator to discuss modifications.</p>
            </div>
        </div>
    </div>
</section>

<script>
    // FAQ functionality
    document.querySelectorAll('.faq-question').forEach(question => {
        question.addEventListener('click', () => {
            const item = question.parentNode;
            const isOpen = item.classList.contains('active');
            
            // Close all first
            document.querySelectorAll('.faq-item').forEach(el => {
                el.classList.remove('active');
            });
            
            // Open current if wasn't open
            if (!isOpen) {
                item.classList.add('active');
            }
        });
    });
    
    // Smooth scrolling for navigation
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Update active nav link
            document.querySelectorAll('.nav-link').forEach(el => {
                el.classList.remove('active');
            });
            this.classList.add('active');
            
            // Scroll to section
            const targetId = this.getAttribute('href');
            document.querySelector(targetId).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    
    // Highlight nav link based on scroll position
    window.addEventListener('scroll', function() {
        const sections = document.querySelectorAll('.resources-section, .faq-section');
        let currentSection = '';
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 100;
            if (window.scrollY >= sectionTop) {
                currentSection = '#' + section.getAttribute('id');
            }
        });
        
        document.querySelectorAll('.nav-link').forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === currentSection) {
                link.classList.add('active');
            }
        });
    });
</script>
@endsection