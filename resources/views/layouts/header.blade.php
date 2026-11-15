<style>
    :root {
        --primary: #1DBFAD;
        --primary-light: rgba(29, 191, 173, 0.1);
        --primary-dark: #159B8A;
        --accent: #FF6B6B;
        --accent-light: rgba(255, 107, 107, 0.1);
        --dark: #2D3748;
        --darker: #1A202C;
        --light: #FFFFFF;
        --light-gray: #F7FAFC;
        --gray: #718096;
        --border: rgba(0, 0, 0, 0.08);
        --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
        --shadow-xl: 0 20px 25px rgba(0, 0, 0, 0.15);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Reset and Base Styles */
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        line-height: 1.6;
        color: var(--dark);
        overflow-x: hidden;
    }

    /* Announcement Bar */
    .announcement-bar {
        background: linear-gradient(90deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: var(--light);
        font-size: 0.875rem;
        padding: 0.5rem 1rem;
        position: relative;
        overflow: hidden;
        z-index: 1001;
    }

    .announcement-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .announcement-links {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    .announcement-links a {
        color: var(--light);
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: var(--transition);
        white-space: nowrap;
    }

    .announcement-links a:hover {
        opacity: 0.9;
    }

    .announcement-contact {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        white-space: nowrap;
    }

    /* Main Navigation */
    .main-header {
        background-color: var(--light);
        box-shadow: var(--shadow-md);
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    .nav-container {
        max-width: 1600px;
        margin: 0 auto;
        padding: 0 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 70px;
    }

    .logo-container {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        text-decoration: none;
        z-index: 1002;
    }

    .logo-img {
        height: 40px;
        width: auto;
    }

    .logo-text {
        font-size: 1.0rem;
        font-weight: 700;
        color: var(--primary);
        transition: var(--transition);
        width: 250px;
    }

    /* Desktop Navigation */
    .desktop-nav {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .nav-menu {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .nav-item {
        position: relative;
    }

    .nav-link {
        display: flex;
        align-items: center;
        padding: 1rem 1.25rem;
        color: var(--dark);
        text-decoration: none;
        font-weight: 600;
        transition: var(--transition);
        white-space: nowrap;
    }

    .nav-link:hover {
        color: var(--primary);
    }

    .nav-link.has-dropdown::after {
        content: '';
        display: inline-block;
        margin-left: 0.5rem;
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid currentColor;
        transition: var(--transition);
    }

    /* Mega Menu */
    .mega-menu {
        position: absolute;
        left: 0;
        top: 100%;
        width: 100vw;
        background-color: var(--light);
        box-shadow: var(--shadow-xl);
        padding: 2rem 0;
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: var(--transition);
        z-index: 999;
        border-top: 1px solid var(--border);
        left: 50%;
        transform: translateX(-50%) translateY(10px);
    }

    .nav-item:hover .mega-menu {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(0);
    }

    .mega-menu-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
    }

    .mega-menu-column {
        padding: 0.5rem;
    }

    .mega-menu-column h3 {
        font-size: 1rem;
        color: var(--primary);
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 1px solid var(--border);
    }

    .mega-menu-links {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .mega-menu-links li {
        margin-bottom: 0.75rem;
    }

    .mega-menu-links a {
        color: var(--dark);
        text-decoration: none;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 0;
        font-size: 0.9375rem;
    }

    .mega-menu-links a:hover {
        color: var(--primary);
        padding-left: 0.5rem;
    }

    .mega-menu-featured {
        grid-column: span 2;
        background-color: var(--light-gray);
        border-radius: 8px;
        padding: 1.5rem;
        display: flex;
        gap: 1.5rem;
    }

    .featured-image {
        width: 150px;
        height: 100px;
        border-radius: 6px;
        overflow: hidden;
        flex-shrink: 0;
    }

    .featured-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: var(--transition);
    }

    .featured-image:hover img {
        transform: scale(1.05);
    }

    .featured-content h3 {
        color: var(--primary);
        margin-top: 0;
        margin-bottom: 0.5rem;
    }

    .featured-content p {
        color: var(--gray);
        font-size: 0.875rem;
        margin-bottom: 1rem;
    }

    .featured-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--primary);
        font-weight: 600;
        text-decoration: none;
        font-size: 0.875rem;
    }

    /* Search and CTA */
    .nav-actions {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-left: 1rem;
    }

    .search-toggle {
        background: none;
        border: none;
        color: var(--dark);
        cursor: pointer;
        padding: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
    }

    .search-form {
        position: absolute;
        top: 100%;
        right: 1rem;
        width: 400px;
        max-width: calc(100% - 2rem);
        background-color: var(--light);
        box-shadow: var(--shadow-xl);
        padding: 1.5rem;
        border-radius: 8px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: var(--transition);
        z-index: 1001;
    }

    .search-form.active {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .search-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--border);
        border-radius: 6px;
        font-size: 1rem;
        transition: var(--transition);
    }

    .cta-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background-color: var(--primary);
        color: var(--light);
        border: none;
        border-radius: 6px;
        font-weight: 600;
        text-decoration: none;
        transition: var(--transition);
        cursor: pointer;
        white-space: nowrap;
    }

    .cta-button:hover {
        background-color: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    /* Mobile Navigation */
    .mobile-toggle {
        display: none;
        background: none;
        border: none;
        color: var(--dark);
        font-size: 1.5rem;
        cursor: pointer;
        padding: 0.5rem;
        z-index: 1002;
    }

    .mobile-nav {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        box-sizing: border-box;
        height: 100vh;
        background-color: var(--light);
        z-index: 1001;
        transform: translateX(100%);
        transition: var(--transition);
        overflow-y: auto;
        padding: 1.5rem;
        padding-top: 5rem;
    }

    .mobile-nav.active {
        transform: translateX(0);
    }

    .mobile-close {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        background: none;
        border: none;
        font-size: 1.5rem;
        color: var(--dark);
        cursor: pointer;
    }

    .mobile-menu {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .mobile-item {
        border-bottom: 1px solid var(--border);
    }

    .mobile-link {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 0;
        color: var(--dark);
        text-decoration: none;
        font-weight: 600;
    }

    .mobile-submenu {
        list-style: none;
        margin: 0;
        padding: 0 0 1rem 1rem;
        display: none;
    }

    .mobile-submenu.active {
        display: block;
    }

    .mobile-submenu li {
        margin-bottom: 0.75rem;
    }

    .mobile-submenu a {
        color: var(--gray);
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 0;
        font-size: 0.9375rem;
    }

    .mobile-actions {
        margin-top: 2rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    /* Responsive Adjustments */
    @media (max-width: 1024px) {
        .mega-menu-container {
            grid-template-columns: repeat(3, 1fr);
        }
        
        .mega-menu-featured {
            grid-column: span 3;
        }
    }

    @media (min-width: 1361px) and (max-width: 1500px) {
        .desktop-nav {
            gap: 0.5rem;
        }

        .nav-link {
            padding-right: 0.5rem;
            padding-left: 0.5rem;
        }

        .cta-button {
            padding-right: 1rem;
            padding-left: 1rem;
        }
    }

    @media (max-width: 1360px) {
        .desktop-nav {
            display: none;
        }

        .mobile-toggle {
            display: block;
        }
    }

    @media (max-width: 768px) {
        .desktop-nav {
            display: none;
        }

        .mobile-toggle {
            display: block;
        }

        .announcement-links {
            display: none;
        }

        .announcement-container {
            justify-content: center;
        }

        .mega-menu {
            display: none;
        }

        .nav-container {
            height: 60px;
        }

        .logo-img {
            height: 36px;
        }

        .logo-text {
            font-size: 1.25rem;
        }
    }

    @media (max-width: 576px) {
        .mega-menu-container {
            grid-template-columns: 1fr;
        }
        
        .mega-menu-featured {
            grid-column: span 1;
            flex-direction: column;
        }
        
        .featured-image {
            width: 100%;
            height: 150px;
        }
        
        .mobile-nav {
            padding-top: 4rem;
        }
        
        .logo-text {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 400px) {
        .logo-text {
            display: none;
        }
        
        .nav-actions .cta-button span {
            display: none;
        }
        
        .nav-actions .cta-button {
            padding: 0.75rem;
            border-radius: 50%;
        }
    }
</style>

<header>
    <!-- Announcement Bar -->
    <div class="announcement-bar">
        <div class="announcement-container">
            <div class="announcement-links">
             
                <a href="/contact">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    Contact Us
                </a>
                <a href="/careers">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2a10 10 0 1 0 10 10 4 4 0 0 1-5-5 4 4 0 0 1-5-5"></path>
                        <path d="M8.5 8.5v.01"></path>
                        <path d="M16 15.5v.01"></path>
                        <path d="M12 12v.01"></path>
                        <path d="M11 17v.01"></path>
                        <path d="M7 14v.01"></path>
                    </svg>
                    Careers
                </a>
            </div>
            <div class="announcement-contact">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                </svg>
                <span>02 8730 9049</span>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <div class="main-header">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="logo-container">
                <img src="{{asset('images/logo.jpg')}}" alt="Allegiance Heart &amp; Home Care" class="logo-img">
                <span class="logo-text">Allegiance Heart & Home Care</span>
            </a>

            <!-- Desktop Navigation -->
            <nav class="desktop-nav">
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">Home</a>
                    </li>
<li class="nav-item">
                        <a href="{{ url('/aboutpage') }}" class="nav-link">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/ndis') }}" class="nav-link ">NDIS Services</a>
                        <!-- <div class="mega-menu">
                            <div class="mega-menu-container">
                                <div class="mega-menu-column">
                                    <h3>Pages</h3>
                                    <ul class="mega-menu-links">
                                        <li><a href="services/aged-care-service">Age Care </a></li>
                                        <li><a href="services/disability-care-service">Disability Care</a></li>
                                        <li><a href="services/home-care-service-entry">Home Care</a></li>
                                        
                                    </ul>
                                </div>
                                <div class="mega-menu-column">
                                    <h3>Resources</h3>
                                    <ul class="mega-menu-links">
                                        <li><a href="/resource">Resources</a></li>
                                        <li><a href="#faq">FAQs</a></li>
                                        <li><a href="#">Eligibility</a></li>
                                        <li><a href="#pricing">Pricing</a></li>
                                    </ul>
                                </div>
                                <div class="mega-menu-featured">
                                    <div class="featured-image">
                                        <img src="https://avatars.mds.yandex.net/get-altay/492154/2a000001855c6bca1c54c03943ddfeeffb7f/XXL_height" alt="Compassionate Aged Care">
                                    </div>
                                    <div class="featured-content">
                                        <h3>Personalized Care Plans</h3>
                                        <p>Discover how we create customized care solutions tailored to each individual's needs.</p>
                                        <a href="#" class="featured-link">Learn more</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/homecareservices') }}" class="nav-link ">Aged Care Services</a>
                      
                    </li>
                   
                    <li class="nav-item">
                        <a href="{{ url('/contact') }}" class="nav-link">Feedback &amp; Complaints</a>
                    </li>
                    
                    
                     <li class="nav-item">
                        <a href="{{ url('https://allegiancehearthomecareportal.com/') }}" class="nav-link"> Self Management</a>
                    </li>
                </ul>

                <!--<div class="nav-actions">-->
                <!--    <button class="search-toggle">-->
                <!--        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
                <!--            <circle cx="11" cy="11" r="8"></circle>-->
                <!--            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>-->
                <!--        </svg>-->
                <!--    </button>-->
                  
                    <a href="{{ url('/support-at-home-enquiry') }}" class="cta-button">
                        <span>Submit an Enquiry</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </nav>

            <!-- Mobile Toggle -->
            <button class="mobile-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div class="mobile-nav">
        <button class="mobile-close">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
        
        <ul class="mobile-menu">
            <li class="mobile-item">
                <a href="{{ url('/aboutpage') }}" class="mobile-link">About Us</a>
            </li>



            <li class="mobile-item">
                <a href="{{ route('home') }}" class="mobile-link">Home</a>
            </li>
            
            <li class="mobile-item">
<li><a href="{{ url('/ndis') }}" class="mobile-link">NDIS</a></li>
                                        <li><a href="{{ url('/homecareservices') }}" class="mobile-link">Aged Care 
                                            Services</a></li>
                                            
                                            
                                            
                                            <li><a href="{{ url('/ndis') }}" class="mobile-link">NDIS</a></li>
                                        <li><a href="{{ url('/homecareservices') }}" class="mobile-link">Aged Care 
                                            Services</a></li>

                <!-- <a href="/services" class="mobile-link">
                   Services
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </a>
                <ul class="mobile-submenu">
                   <li><a href="services/aged-care-service">Age Care </a></li>
                                        <li><a href="services/disability-care-service">Disability Care</a></li>
                                        <li><a href="services/home-care-service-entry">Home Care</a></li>
                </ul> -->
            </li>
            <!-- <li class="mobile-item">
                <a href="services/disability-care-service" class="mobile-link">
                    Disability Care
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </a> -->
                <!-- <ul class="mobile-submenu">
                    <li><a href="#">Support Coordination</a></li>
                    <li><a href="#">Therapeutic Supports</a></li>
                    <li><a href="#">Daily Living Support</a></li>
                </ul> -->
            </li>
            
            <!--<li class="mobile-item">-->
            <!--    <a href="/resources" class="mobile-link">Resources</a>-->
            <!--</li>-->
        </ul>

        <div class="mobile-actions">
        
            <a href="{{ url('/support-at-home-enquiry') }}" class="cta-button" style="justify-content: center;">
                <span>Submit an Enquiry</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        
        
        
        
        
        
         <div class="mobile-actions">
            
        
            <a href="{{ url('https://allegiancehearthomecareportal.com/') }}" class="cta-button primary" style="justify-content: center;">
                <span>Self Management Portal</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        
        
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile menu toggle
        const mobileToggle = document.querySelector('.mobile-toggle');
        const mobileNav = document.querySelector('.mobile-nav');
        const mobileClose = document.querySelector('.mobile-close');
        
        function toggleMobileMenu() {
            mobileNav.classList.toggle('active');
            document.body.style.overflow = mobileNav.classList.contains('active') ? 'hidden' : '';
        }
        
        mobileToggle.addEventListener('click', toggleMobileMenu);
        mobileClose.addEventListener('click', toggleMobileMenu);
        
        // Mobile submenu toggle
        const mobileLinks = document.querySelectorAll('.mobile-link');
        mobileLinks.forEach(link => {
            if (link.nextElementSibling && link.nextElementSibling.classList.contains('mobile-submenu')) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    this.classList.toggle('active');
                    this.nextElementSibling.classList.toggle('active');
                });
            }
        });
        
        // Search toggle
        const searchToggle = document.querySelector('.search-toggle');
        const searchForm = document.querySelector('.search-form');
        
        if (searchToggle && searchForm) {
            searchToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                searchForm.classList.toggle('active');
            });
            
            // Close search when clicking outside
            document.addEventListener('click', function(e) {
                if (!searchForm.contains(e.target) && e.target !== searchToggle) {
                    searchForm.classList.remove('active');
                }
            });
        }
        
        // Close mobile menu when clicking on a link (except those with submenus)
        const mobileMenuLinks = document.querySelectorAll('.mobile-menu a');
        mobileMenuLinks.forEach(link => {
            if (!link.nextElementSibling) {
                link.addEventListener('click', function() {
                    mobileNav.classList.remove('active');
                    document.body.style.overflow = '';
                });
            }
        });

        // Close mobile menu when resizing to desktop
        function handleResize() {
            if (window.innerWidth > 1024 && mobileNav.classList.contains('active')) {
                mobileNav.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        window.addEventListener('resize', handleResize);
    });
</script>
