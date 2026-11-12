@extends('layouts.care')

@section('content')

<!-- Hero Section with Animated Background -->
<!-- Hero Section with Animated Background -->
<section class="services-hero">
    <div class="hero-pattern"></div>
    <div class="container">
        <div class="hero-content animate__animated animate__fadeIn">
            <h1>Compassionate Care <span class="highlight">Services</span></h1>
            <p class="hero-subtitle">Discover personalized support solutions tailored to your unique needs and circumstances</p>
            
            <div class="hero-search-wrapper">
                <div class="hero-search">
                    <input type="text" placeholder="Search services... (e.g. 'home care', 'disability support')">
                    <button class="search-btn">
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>
                <div class="search-tags">
                    <span>Popular:</span>
                    <a href="#">Elderly Care</a>
                    <a href="#">NDIS Support</a>
                    <a href="#">Respite Care</a>
                </div>
            </div>
            
            <div class="hero-scroll-indicator">
                <span>Explore Services</span>
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </div>
</section>

<!-- Service Categories with Visual Icons -->
<section class="services-categories">
    <div class="container">
        <div class="category-tabs">
            <button class="active" data-category="all">
                <i class="fas fa-layer-group"></i> All Services
            </button>
            <button data-category="aged-care">
                <i class="fas fa-user-tie"></i> Aged Care
            </button>
            <button data-category="disability-support">
                <i class="fas fa-wheelchair"></i> Disability Support
            </button>
            <button data-category="home-care">
                <i class="fas fa-home"></i> Home Care
            </button>
            <button data-category="respite-care">
                <i class="fas fa-hands-helping"></i> Respite Care
            </button>
        </div>
    </div>
</section>

<!-- Services Listing with Enhanced Cards -->
<section class="services-listing">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">Our Offerings</span>
            <h2>Tailored Care <span class="text-gradient">Solutions</span></h2>
            <p class="section-description">Each service is designed with compassion, expertise, and your unique needs in mind</p>
        </div>

        <div class="services-filter">
            <div class="filter-group">
                <label for="sort-by"><i class="fas fa-sort"></i> Sort By:</label>
                <select id="sort-by" class="filter-select">
                    <option value="popular">Most Popular</option>
                    <option value="newest">Newest First</option>
                    <option value="featured">Featured</option>
                </select>
            </div>
            <div class="results-count">
                Showing <span id="filter-count">{{ $services->count() }}</span> services
            </div>
        </div>

        <div class="services-grid">
    @foreach($services as $service)
    <div class="service-card" data-category="{{ is_array($service->category) ? '' : $service->category }}" 
         data-featured="{{ $service->is_featured ? 'true' : 'false' }}">
        
        <!-- Image Section -->
        <div class="card-image">
            <img src="{{ is_string($service->image_url) ? $service->image_url : asset('images/default-service.jpg') }}" 
                 alt="{{ is_string($service->title) ? $service->title : 'Service Image' }}" 
                 loading="lazy">
            
            @if($service->is_featured)
            <span class="featured-badge">
                <i class="fas fa-star"></i> Featured
            </span>
            @endif
            
            <div class="category-badge" style="background-color: {{ is_string($service->category_color) ? $service->category_color : '#64748b' }}">
                {{ is_string($service->category_label) ? $service->category_label : 'Service' }}
            </div>
        </div>
        
        <!-- Content Section -->
        <div class="card-content">
            <div class="service-icon">
                <i class="{{ is_string($service->icon) ? $service->icon : 'fas fa-heart' }}"></i>
            </div>
            
            <h3>{{ is_string($service->title) ? $service->title : 'Service Title' }}</h3>
            
            <div class="service-text">
                @if(!empty($service->short_description) && is_string($service->short_description))
                    <p>{{ Str::limit($service->short_description, 120) }}</p>
                @elseif(!empty($service->description) && is_string($service->description))
                    <div class="service-description">
                        {!! Str::limit(strip_tags($service->description), 120) !!}
                    </div>
                @else
                    <p>Description not available</p>
                @endif
            </div>
            
            <!-- Features List with Array Check -->
            @if(!empty($service->features) && is_array($service->features))
            <div class="service-features">
                <ul>
                    @foreach(array_slice($service->features, 0, 3) as $feature)
                        @if(is_string($feature))
                        <li>
                            <i class="fas fa-check-circle"></i> {{ $feature }}
                        </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            @endif
            
            <div class="card-footer">
                <a href="{{ route('services.show', is_string($service->slug) ? $service->slug : '') }}" class="btn service-link">
                    Find out more <i class="fas fa-arrow-right"></i>
                </a>
                
                @if(!empty($service->duration) && is_string($service->duration))
                <div class="service-meta">
                    <span class="meta-item">
                        <i class="fas fa-clock"></i> {{ $service->duration }}
                    </span>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
        
        @if($services instanceof \Illuminate\Pagination\LengthAwarePaginator && $services->hasPages())
        <div class="pagination-wrapper">
            {{ $services->links() }}
        </div>
        @endif
    </div>
</section>




<!-- CTA Section with Steps -->
<section class="services-cta">
    <div class="cta-pattern"></div>
    <div class="container">
        <div class="cta-content">
            <div class="cta-text">
                <span class="cta-badge">Get Started</span>
                <h2>Ready to Find Your <span class="text-gradient">Perfect Care Match</span>?</h2>
                <p>Our simple process makes it easy to get the support you need</p>
                
                <div class="steps-wrapper">
                    <div class="step">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <h4>Explore Services</h4>
                            <p>Browse our comprehensive care options</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <h4>Consultation</h4>
                            <p>Schedule a free needs assessment</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <h4>Personalized Plan</h4>
                            <p>We create a tailored care solution</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="cta-buttons">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-phone-alt"></i> Speak to Our Team
                </a>
                <a href="/aboutpage" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-info-circle"></i> How We Work
                </a>
            </div>
        </div>
    </div>
</section>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/services-index.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.6.1/dist/lazyload.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize lazy loading
    var lazyLoadInstance = new LazyLoad({
        elements_selector: ".lazy"
    });
    
    // Category filtering functionality
    const categoryButtons = document.querySelectorAll('.category-tabs button');
    const serviceCards = document.querySelectorAll('.service-card');
    const sortSelect = document.getElementById('sort-by');
    const filterCount = document.getElementById('filter-count');
    
    // Filter by category
    categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.dataset.category;
            
            // Update active button
            categoryButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter services
            let visibleCount = 0;
            serviceCards.forEach(card => {
                const matchesCategory = category === 'all' || card.dataset.category === category;
                
                if (matchesCategory) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });
            
            // Update visible count
            filterCount.textContent = visibleCount;
        });
    });
    
    // Sort functionality
    sortSelect.addEventListener('change', function() {
        const sortValue = this.value;
        const container = document.querySelector('.services-grid');
        const cards = Array.from(document.querySelectorAll('.service-card[style="display: block"], .service-card:not([style])'));
        
        cards.sort((a, b) => {
            if (sortValue === 'featured') {
                return (b.dataset.featured === 'true') - (a.dataset.featured === 'true');
            } else if (sortValue === 'newest') {
                // Assuming you have a data-date attribute with timestamp
                return new Date(b.dataset.date) - new Date(a.dataset.date);
            } else {
                // Default sorting (popular)
                return 0;
            }
        });
        
        // Re-append cards in new order
        cards.forEach(card => {
            container.appendChild(card);
        });
    });
    
    // Smooth scroll for hero indicator
    document.querySelector('.hero-scroll-indicator').addEventListener('click', function() {
        document.querySelector('.services-categories').scrollIntoView({
            behavior: 'smooth'
        });
    });
});
</script>
@endpush

<style>
/* ================ */
/* Design System */
/* ================ */
:root {
    /* Colors */
    --primary: #1DBFAD;
    --primary-dark: #159B8C;
    --primary-light: #E0F7F5;
    --secondary: #4A6FA5;
    --accent: #FF7E5D;
    --accent-light: #FFEEE8;
    --text-dark: #1A1A1A;
    --text-medium: #4A5568;
    --text-light: #FFFFFF;
    --gray-100: #F7FAFC;
    --gray-200: #EDF2F7;
    --gray-300: #E2E8F0;
    --gray-400: #CBD5E0;
    --gray-500: #A0AEC0;
    --gray-600: #718096;
    --gray-700: #4A5568;
    --gray-800: #2D3748;
    --gray-900: #1A202C;
    
    /* Gradients */
    --gradient-primary: linear-gradient(135deg, var(--primary), #00B4A6);
    --gradient-accent: linear-gradient(135deg, var(--accent), #FF906E);
    --gradient-dark: linear-gradient(135deg, var(--gray-800), var(--gray-900));
    
    /* Shadows */
    --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.08);
    --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
    --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
    --shadow-xl: 0 20px 25px rgba(0, 0, 0, 0.1);
    --shadow-xxl: 0 25px 50px rgba(0, 0, 0, 0.15);
    
    /* Transitions */
    --transition-fast: all 0.15s ease;
    --transition-medium: all 0.3s ease;
    --transition-slow: all 0.5s ease;
    
    /* Borders */
    --radius-sm: 6px;
    --radius-md: 12px;
    --radius-lg: 16px;
    --radius-xl: 24px;
    --radius-full: 9999px;
}




section{
    padding: 50px 100px 100px 100px !important;
}
/* ================ */
/* Base Styles */
/* ================ */
.services-hero {
    background: var(--gradient-primary);
    color: var(--text-light);
    padding: 120px 0 100px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.hero-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd' opacity='0.1'%3E%3Cg fill='%23FFFFFF' fill-opacity='0.4'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

.services-hero .container {
    position: relative;
    z-index: 2;
}

.services-hero h1 {
    font-size: 3.5rem;
    font-weight: 800;
    margin-bottom: 1.5rem;
    line-height: 1.2;
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
}

.highlight {
    position: relative;
    display: inline-block;
}

.highlight::after {
    content: '';
    position: absolute;
    bottom: 10px;
    left: 0;
    width: 100%;
    height: 12px;
    background-color: rgba(255, 255, 255, 0.3);
    z-index: -1;
    transform: skewY(-2deg);
}

.hero-subtitle {
    font-size: 1.35rem;
    opacity: 0.9;
    margin-bottom: 2.5rem;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
    font-weight: 300;
    line-height: 1.6;
}

.text-gradient {
    background: linear-gradient(90deg, var(--primary), var(--secondary));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-fill-color: transparent;
}

/* Hero Search */
.hero-search-wrapper {
    max-width: 700px;
    margin: 0 auto 3rem;
}

.hero-search {
    display: flex;
    margin-bottom: 1rem;
    box-shadow: var(--shadow-lg);
    border-radius: var(--radius-lg);
    overflow: hidden;
}

.hero-search input {
    flex: 1;
    padding: 1.25rem 1.5rem;
    border: none;
    font-size: 1.05rem;
    color: var(--gray-800);
}

.hero-search input::placeholder {
    color: var(--gray-500);
}

.search-btn {
    background: var(--accent);
    color: white;
    border: none;
    padding: 0 2rem;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition-medium);
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.search-btn:hover {
    background: #FF6E47;
}

.search-tags {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    flex-wrap: wrap;
    justify-content: center;
    font-size: 0.9rem;
}

.search-tags span {
    opacity: 0.8;
}

.search-tags a {
    color: white;
    text-decoration: none;
    padding: 0.25rem 0.75rem;
    background: rgba(255, 255, 255, 0.15);
    border-radius: var(--radius-full);
    transition: var(--transition-fast);
}

.search-tags a:hover {
    background: rgba(255, 255, 255, 0.25);
}

/* Scroll Indicator */
.hero-scroll-indicator {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    color: white;
    opacity: 0.8;
    cursor: pointer;
    transition: var(--transition-medium);
    animation: bounce 2s infinite;
}

.hero-scroll-indicator:hover {
    opacity: 1;
    transform: translateY(5px);
}

.hero-scroll-indicator span {
    font-size: 0.9rem;
}

.hero-scroll-indicator i {
    font-size: 1.2rem;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-10px);
    }
    60% {
        transform: translateY(-5px);
    }
}

/* ================ */
/* Categories Tabs */
/* ================ */
.services-categories {
    background: white;
    padding: 1.5rem 0;
    position: sticky;
    top: 0;
    z-index: 100;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
}

.category-tabs {
    display: flex;
    gap: 0.75rem;
    overflow-x: auto;
    padding-bottom: 0.5rem;
    scrollbar-width: none; /* Firefox */
}

.category-tabs::-webkit-scrollbar {
    display: none; /* Chrome/Safari */
}

.category-tabs button {
    background: var(--gray-100);
    border: none;
    padding: 0.75rem 1.25rem;
    border-radius: var(--radius-full);
    font-weight: 600;
    cursor: pointer;
    white-space: nowrap;
    transition: var(--transition-medium);
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--gray-700);
    font-size: 0.95rem;
}

.category-tabs button i {
    font-size: 0.9rem;
    color: var(--gray-500);
}

.category-tabs button.active {
    background: var(--primary);
    color: white;
    box-shadow: 0 4px 12px rgba(29, 191, 173, 0.3);
}

.category-tabs button.active i {
    color: white;
}

.category-tabs button:hover:not(.active) {
    background: var(--gray-200);
    color: var(--gray-800);
}

/* ================ */
/* Services Listing */
/* ================ */
.services-listing {
    padding: 5rem 0;
    background: var(--gray-100);
}

.section-header {
    text-align: center;
    margin-bottom: 3rem;
}

.section-badge {
    display: inline-block;
    background: rgba(29, 191, 173, 0.1);
    color: var(--primary);
    padding: 0.5rem 1.25rem;
    border-radius: var(--radius-full);
    font-size: 0.85rem;
    font-weight: 700;
    margin-bottom: 1.25rem;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

.section-header h2 {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.section-description {
    font-size: 1.15rem;
    color: var(--gray-600);
    max-width: 700px;
    margin: 0 auto;
    line-height: 1.6;
}

/* Services Filter */
.services-filter {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    background: white;
    padding: 1rem 1.5rem;
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
}

.filter-group {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.filter-group label {
    font-size: 0.9rem;
    color: var(--gray-600);
    font-weight: 500;
}

.filter-select {
    border: 1px solid var(--gray-300);
    border-radius: var(--radius-sm);
    padding: 0.5rem 1rem;
    font-size: 0.9rem;
    background: white;
    cursor: pointer;
    transition: var(--transition-fast);
}

.filter-select:hover {
    border-color: var(--gray-400);
}

.results-count {
    font-size: 0.9rem;
    color: var(--gray-600);
}

.results-count span {
    font-weight: 600;
    color: var(--primary);
}

/* Services Grid */
.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 2rem;
}

/* Service Card */
.service-card {
    background: white;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: var(--transition-medium);
    display: flex;
    flex-direction: column;
    height: 100%;
}

.service-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
}

.card-image {
    height: 220px;
    position: relative;
    overflow: hidden;
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition-slow);
}

.service-card:hover .card-image img {
    transform: scale(1.05);
}

.featured-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: var(--accent);
    color: white;
    padding: 0.35rem 0.75rem;
    border-radius: var(--radius-full);
    font-size: 0.75rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 0.35rem;
    z-index: 2;
    box-shadow: 0 2px 8px rgba(255, 126, 93, 0.3);
}

.featured-badge i {
    font-size: 0.7rem;
}

.category-badge {
    position: absolute;
    bottom: 1rem;
    left: 1rem;
    color: white;
    padding: 0.35rem 0.75rem;
    border-radius: var(--radius-sm);
    font-size: 0.75rem;
    font-weight: 700;
    z-index: 2;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.card-content {
    padding: 1.75rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.service-icon {
    width: 50px;
    height: 50px;
    background: var(--primary-light);
    color: var(--primary);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    margin-bottom: 1.25rem;
}

.service-card h3 {
    font-size: 1.4rem;
    font-weight: 700;
    margin-bottom: 0.75rem;
    color: var(--text-dark);
    line-height: 1.3;
}

.service-card p {
    color: var(--gray-600);
    margin-bottom: 1.25rem;
    line-height: 1.6;
    font-size: 0.95rem;
}

/* Service Features */
.service-features {
    margin-bottom: 1.5rem;
    flex: 1;
}

.service-features ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.service-features li {
    font-size: 0.9rem;
    color: var(--gray-700);
    display: flex;
    align-items: flex-start;
    gap: 0.5rem;
    line-height: 1.5;
}

.service-features li i {
    color: var(--primary);
    font-size: 0.8rem;
    margin-top: 0.2rem;
    flex-shrink: 0;
}

/* Card Footer */
.card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: auto;
    padding-top: 1rem;
    border-top: 1px solid var(--gray-200);
}

.service-link {
    color: var(--primary);
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.95rem;
    transition: var(--transition-fast);
}

.service-link:hover {
    color: var(--primary-dark);
    text-decoration: underline;
}

.service-link i {
    transition: var(--transition-fast);
    font-size: 0.8rem;
}

.service-link:hover i {
    transform: translateX(3px);
}

.service-meta {
    display: flex;
    gap: 0.75rem;
}

.meta-item {
    font-size: 0.8rem;
    color: var(--gray-500);
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.meta-item i {
    font-size: 0.7rem;
}

/* Pagination */
.pagination-wrapper {
    margin-top: 3rem;
    display: flex;
    justify-content: center;
}

/* ================ */
/* Testimonials */
/* ================ */
.services-testimonials {
    padding: 5rem 0;
    background: white;
}

.testimonials-slider {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.testimonial-card {
    background: var(--gray-100);
    border-radius: var(--radius-lg);
    padding: 2rem;
    transition: var(--transition-medium);
    box-shadow: var(--shadow-sm);
}

.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-md);
}

.testimonial-content {
    position: relative;
    margin-bottom: 1.5rem;
}

.quote-icon {
    position: absolute;
    top: -10px;
    left: -10px;
    color: var(--primary-light);
    font-size: 3rem;
    opacity: 0.7;
    z-index: 1;
}

.testimonial-content p {
    position: relative;
    z-index: 2;
    font-size: 1.05rem;
    line-height: 1.7;
    color: var(--gray-700);
    font-style: italic;
}

.testimonial-author {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.testimonial-author img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid var(--primary-light);
}

.author-info h4 {
    font-size: 1.1rem;
    margin-bottom: 0.25rem;
    color: var(--text-dark);
}

.author-info span {
    font-size: 0.85rem;
    color: var(--gray-500);
}

/* ================ */
/* CTA Section */
/* ================ */
.services-cta {
    background: var(--gradient-dark);
    color: white;
    padding: 5rem 0;
    position: relative;
    overflow: hidden;
}

.cta-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd' opacity='0.05'%3E%3Cg fill='%23FFFFFF' fill-opacity='0.4'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

.cta-content {
    position: relative;
    z-index: 2;
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 3rem;
    align-items: center;
}

.cta-badge {
    display: inline-block;
    background: rgba(255, 255, 255, 0.15);
    color: white;
    padding: 0.5rem 1.25rem;
    border-radius: var(--radius-full);
    font-size: 0.85rem;
    font-weight: 700;
    margin-bottom: 1.25rem;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

.cta-content h2 {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 1.5rem;
    line-height: 1.3;
}

.cta-content p {
    font-size: 1.15rem;
    opacity: 0.9;
    margin-bottom: 2rem;
    line-height: 1.6;
}

/* Steps */
.steps-wrapper {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.step {
    display: flex;
    gap: 1rem;
    align-items: flex-start;
}

.step-number {
    background: var(--primary);
    color: white;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
    font-weight: 700;
    flex-shrink: 0;
    margin-top: 0.15rem;
}

.step-content h4 {
    font-size: 1.1rem;
    margin-bottom: 0.25rem;
    color: white;
}

.step-content p {
    font-size: 0.95rem;
    opacity: 0.8;
    margin-bottom: 0;
}

/* CTA Buttons */
.cta-buttons {
    display: flex;
    gap: 1rem;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem 2rem;
    border-radius: var(--radius-md);
    font-weight: 600;
    text-decoration: none;
    transition: var(--transition-medium);
    text-align: center;
}

.btn-primary {
    background: var(--primary);
    color: white;
}

.btn-primary:hover {
    background: var(--primary-dark);
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(29, 191, 173, 0.3);
}

.btn-outline-light {
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    background: transparent;
}

.btn-outline-light:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.5);
    transform: translateY(-3px);
}

.btn-lg {
    padding: 1.15rem 2.25rem;
    font-size: 1.05rem;
}

/* ================ */
/* Responsive Styles */
/* ================ */
@media (max-width: 1200px) {
    .services-hero h1 {
        font-size: 3rem;
    }
    
    .services-grid {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    }
}

@media (max-width: 992px) {
    .cta-content {
        grid-template-columns: 1fr;
        text-align: center;
    }
    
    .steps-wrapper {
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .cta-buttons {
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .services-hero {
        padding: 100px 0 80px;
    }
    
    .services-hero h1 {
        font-size: 2.5rem;
    }
    
    .hero-subtitle {
        font-size: 1.2rem;
    }
    
    .section-header h2 {
        font-size: 2rem;
    }
    
    .services-filter {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }
    
    .search-btn span {
        display: none;
    }
    
    .testimonials-slider {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 576px) {
    .services-hero h1 {
        font-size: 2rem;
    }
    
    .hero-search {
        flex-direction: column;
    }
    
    .hero-search input {
        padding: 1rem;
    }
    
    .search-btn {
        padding: 0.75rem;
        justify-content: center;
    }
    
    .category-tabs {
        gap: 0.5rem;
    }
    
    .category-tabs button {
        padding: 0.5rem 1rem;
        font-size: 0.85rem;
    }
    
    .cta-buttons {
        flex-direction: column;
    }
    
    .btn {
        width: 100%;
        justify-content: center;
    }
}
</style>
@endsection