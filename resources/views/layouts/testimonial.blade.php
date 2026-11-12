<div class="testimonial-section" data-aos="fade-down" data-aos-duration="1000">
    <div class="testimonial-carousel" id="testimonialCarousel">
        <!-- Decorative elements -->
        <div class="decorative-circle circle-1"></div>
        <div class="decorative-circle circle-2"></div>
        <div class="quote-icon-top">❝</div>
        
        <div class="carousel-header">
            <h2>Voices of Satisfaction</h2>
            <p class="subtitle">Trusted by amazing clients worldwide</p>
        </div>
        
        <div class="testimonial-slides">
            <!-- Enhanced arrows with hover effects -->
            <button class="carousel-arrow prev" aria-label="Previous testimonial">
                <i class="fas fa-chevron-left"></i>
                <span class="arrow-hover-effect"></span>
            </button>
            <button class="carousel-arrow next" aria-label="Next testimonial">
                <i class="fas fa-chevron-right"></i>
                <span class="arrow-hover-effect"></span>
            </button>
            
            <div class="testimonial-track" id="testimonialTrack">
                @foreach($testimonials as $testimonial)
                <div class="testimonial-slide">
                    <!-- Rating stars -->
                    <div class="testimonial-rating">
                        @for($i = 0; $i < 5; $i++)
                            <i class="fas fa-star {{ $i < $testimonial->rating ? 'filled' : '' }}"></i>
                        @endfor
                    </div>
                    
                    <!-- Photo with decorative border -->
                    <!--<div class="photo-container">-->
                    <!--    <img src="{{ asset('storage/' . $testimonial->photo) }}" -->
                    <!--         alt="{{ $testimonial->name }}" -->
                    <!--         class="testimonial-photo"-->
                    <!--         loading="lazy">-->
                    <!--    <div class="photo-border"></div>-->
                    <!--</div>-->
                    
                    <!-- Quote with animated underline -->
                    <div class="quote-container">
                        <p class="testimonial-quote">"{{ $testimonial->message }}"</p>
                        <div class="quote-underline"></div>
                    </div>
                    
                    <!-- Author info with hover effect -->
                    <div class="testimonial-author">
                        <h4>{{ $testimonial->name }}</h4>
                        <p class="position">{{ $testimonial->position }}</p>
                        @if($testimonial->company)
                        <p class="company">
                            <i class="fas fa-building"></i> {{ $testimonial->company }}
                        </p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <!-- Enhanced dots navigation with progress indicator -->
        <div class="carousel-controls">
            <div class="carousel-progress">
                <div class="progress-bar"></div>
            </div>
            <div class="carousel-nav" id="carouselDots">
                @for($i = 0; $i < count($testimonials); $i++)
                <button class="carousel-dot {{ $i === 0 ? 'active' : '' }}" 
                        data-index="{{ $i }}"
                        aria-label="Go to testimonial {{ $i+1 }}">
                    <span class="dot-circle"></span>
                </button>
                @endfor
            </div>
        </div>
        
        <div class="quote-icon-bottom">❞</div>
    </div>
</div>

<style>
.testimonial-section {
    position: relative;
    padding: 4rem 2rem;
    background: linear-gradient(135deg, #f9f9ff 0%, #f0f4ff 100%);
    overflow: hidden;
}

.testimonial-carousel {
    max-width: 1200px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
}

.decorative-circle {
    position: absolute;
    border-radius: 50%;
    background: rgba(100, 150, 255, 0.1);
    z-index: -1;
}

.circle-1 {
    width: 300px;
    height: 300px;
    top: -150px;
    right: -150px;
}

.circle-2 {
    width: 200px;
    height: 200px;
    bottom: -100px;
    left: -100px;
}

.quote-icon-top, .quote-icon-bottom {
    position: absolute;
    font-size: 5rem;
    color: rgba(70, 130, 255, 0.15);
    font-family: serif;
}

.quote-icon-top {
    top: 20px;
    left: 20px;
}

.quote-icon-bottom {
    bottom: 20px;
    right: 20px;
}

.carousel-header {
    text-align: center;
    margin-bottom: 3rem;
}

.carousel-header h2 {
    font-size: 2.5rem;
    color: #2c3e50;
    margin-bottom: 0.5rem;
    position: relative;
    display: inline-block;
}

.carousel-header h2:after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: linear-gradient(90deg, #4a6bff, #88a1ff);
    border-radius: 3px;
}

.carousel-header .subtitle {
    color: #7f8c8d;
    font-size: 1.1rem;
}

.testimonial-slides {
    position: relative;
    padding: 0 50px;
}

.testimonial-track {
    display: flex;
    transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    will-change: transform;
}

.testimonial-slide {
    min-width: 100%;
    padding: 2rem;
    text-align: center;
    transition: all 0.3s ease;
}

.testimonial-rating {
    margin-bottom: 1.5rem;
}

.testimonial-rating .fa-star {
    color: orANGE;
    font-size: 1.2rem;
    margin: 0 2px;
}

.testimonial-rating .fa-star.filled {
    color: #ffc107;
}

.photo-container {
    position: relative;
    width: 100px;
    height: 100px;
    margin: 0 auto 1.5rem;
}

.testimonial-photo {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    position: relative;
    z-index: 2;
    border: 3px solid white;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.photo-border {
    position: absolute;
    top: -5px;
    left: -5px;
    right: -5px;
    bottom: -5px;
    border-radius: 50%;
    background: linear-gradient(135deg, #4a6bff, #88a1ff);
    z-index: 1;
    animation: rotate 8s linear infinite;
}

@keyframes rotate {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.quote-container {
    position: relative;
    margin-bottom: 2rem;
}

.testimonial-quote {
    font-size: 1.2rem;
    line-height: 1.6;
    color: #34495e;
    font-style: italic;
    margin-bottom: 1rem;
    position: relative;
    padding: 0 20px;
}

.quote-underline {
    width: 50px;
    height: 2px;
    background: linear-gradient(90deg, #4a6bff, #88a1ff);
    margin: 0 auto;
    transition: all 0.3s ease;
}

.testimonial-slide:hover .quote-underline {
    width: 80px;
    background: linear-gradient(90deg, #88a1ff, #4a6bff);
}

.testimonial-author h4 {
    font-size: 1.2rem;
    color: #2c3e50;
    margin-bottom: 0.3rem;
}

.testimonial-author .position {
    color: #7f8c8d;
    font-size: 0.9rem;
    margin-bottom: 0.3rem;
}

.testimonial-author .company {
    color: #4a6bff;
    font-size: 0.9rem;
    margin-top: 0.5rem;
}

.testimonial-author .company i {
    margin-right: 5px;
}

.carousel-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: white;
    border: none;
    box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
    color: #4a6bff;
    font-size: 1.2rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
    transition: all 0.3s ease;
    overflow: hidden;
}

.carousel-arrow:hover {
    background: #4a6bff;
    color: white;
    transform: translateY(-50%) scale(1.1);
}

.carousel-arrow.prev {
    left: 0;
}

.carousel-arrow.next {
    right: 0;
}

.arrow-hover-effect {
    position: absolute;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0) 70%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.carousel-arrow:hover .arrow-hover-effect {
    opacity: 1;
}

.carousel-controls {
    margin-top: 2rem;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.carousel-progress {
    width: 100%;
    max-width: 300px;
    height: 3px;
    background: #e0e0e0;
    border-radius: 3px;
    margin-bottom: 1rem;
    overflow: hidden;
}

.progress-bar {
    height: 100%;
    width: 0;
    background: linear-gradient(90deg, #4a6bff, #88a1ff);
    transition: width 0.3s ease;
}

.carousel-nav {
    display: flex;
    gap: 10px;
}

.carousel-dot {
    width: 12px;
    height: 12px;
    border: none;
    background: none;
    padding: 0;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

.dot-circle {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #ddd;
    transition: all 0.3s ease;
}

.carousel-dot.active .dot-circle {
    width: 12px;
    height: 12px;
    background: #4a6bff;
}

.carousel-dot:hover .dot-circle {
    background: #88a1ff;
}

@media (max-width: 768px) {
    .testimonial-slides {
        padding: 0 30px;
    }
    
    .carousel-arrow {
        width: 40px;
        height: 40px;
    }
    
    .testimonial-quote {
        font-size: 1rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const track = document.getElementById('testimonialTrack');
    const slides = document.querySelectorAll('.testimonial-slide');
    const dots = document.querySelectorAll('.carousel-dot');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');
    const progressBar = document.querySelector('.progress-bar');
    
    let currentIndex = 0;
    let autoPlayInterval;
    const slideCount = slides.length;
    const slideDuration = 5000; // 5 seconds
    
    // Initialize carousel
    function initCarousel() {
        updateCarousel();
        startAutoPlay();
        
        // Pause autoplay on hover
        const carousel = document.querySelector('.testimonial-carousel');
        carousel.addEventListener('mouseenter', pauseAutoPlay);
        carousel.addEventListener('mouseleave', startAutoPlay);
    }
    
    // Update carousel position and active dot
    function updateCarousel() {
        track.style.transform = `translateX(-${currentIndex * 100}%)`;
        
        // Update dots
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentIndex);
        });
        
        // Update progress bar
        progressBar.style.width = '0';
        void progressBar.offsetWidth; // Trigger reflow
        progressBar.style.width = '100%';
        progressBar.style.transitionDuration = `${slideDuration/1000}s`;
    }
    
    // Go to specific slide
    function goToSlide(index) {
        currentIndex = (index + slideCount) % slideCount;
        updateCarousel();
        resetAutoPlay();
    }
    
    // Navigation handlers
    function goPrev() {
        goToSlide(currentIndex - 1);
    }
    
    function goNext() {
        goToSlide(currentIndex + 1);
    }
    
    // Autoplay functions
    function startAutoPlay() {
        if (autoPlayInterval) clearInterval(autoPlayInterval);
        autoPlayInterval = setInterval(goNext, slideDuration);
    }
    
    function pauseAutoPlay() {
        clearInterval(autoPlayInterval);
    }
    
    function resetAutoPlay() {
        pauseAutoPlay();
        startAutoPlay();
    }
    
    // Event listeners
    prevBtn.addEventListener('click', goPrev);
    nextBtn.addEventListener('click', goNext);
    
    dots.forEach(dot => {
        dot.addEventListener('click', function() {
            const index = parseInt(this.getAttribute('data-index'));
            goToSlide(index);
        });
    });
    
    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') {
            goPrev();
        } else if (e.key === 'ArrowRight') {
            goNext();
        }
    });
    
    // Initialize
    initCarousel();
    
    // Responsive handling
    window.addEventListener('resize', function() {
        track.style.transition = 'none';
        updateCarousel();
        setTimeout(() => {
            track.style.transition = '';
        }, 10);
    });
});
</script>