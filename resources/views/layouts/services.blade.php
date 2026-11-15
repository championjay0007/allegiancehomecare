
    <style>
        :root {
        --primary: #1DBFAD;
        --primary-dark: #159B8C;
        --secondary: #4A6FA5;
        --accent: #FF7E5D;
        --text-dark: #1A1A1A;
        --text-light: #FFFFFF;
        --gray-100: #F7FAFC;
        --gray-200: #EDF2F7;
        --gray-400: #CBD5E0;
        --gray-600: #718096;
        --gray-800: #2D3748;
        --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.08);
        --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
        --radius-sm: 6px;
        --radius-md: 12px;
        --radius-lg: 16px;
        --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        --gradient: linear-gradient(135deg, var(--primary), var(--secondary));
    }
    
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
    
    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        line-height: 1.6;
        color: var(--gray-800);
        -webkit-font-smoothing: antialiased;
    }
    
    .services-section {
        padding: 100px 0;
        background-color: var(--gray-100);
        position: relative;
        overflow: hidden;
    }
    
    .container-services {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 40px;
        position: relative;
        z-index: 2;
    }
    
    .section-header {
        text-align: center;
        margin: 0 auto 60px;
        max-width: 800px;
    }
    
    .section-header h2 {
        font-size: 2.75rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: var(--text-dark);
        line-height: 1.2;
    }
    
    .section-header h2 span {
        color: var(--primary);
        position: relative;
    }
    
    .section-header h2 span:after {
        content: '';
        position: absolute;
        bottom: 5px;
        left: 0;
        width: 100%;
        height: 8px;
        background-color: rgba(29, 191, 173, 0.2);
        z-index: -1;
    }
    
    .section-header p.subtitle {
        color: var(--gray-600);
        font-size: 1.1rem;
        max-width: 700px;
        margin: 0 auto;
    }
    
    .services-container {
        display: flex;
        gap: 12px;
        margin-bottom: 50px;
        justify-content: center;
    }
    
    .service-btn {
        padding: 14px 32px;
        background-color: white;
        color: var(--primary);
        border: 2px solid var(--primary);
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        font-size: 1rem;
        white-space: nowrap;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    
    .service-btn:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--gradient);
        z-index: -1;
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.4s cubic-bezier(0.65, 0, 0.35, 1);
    }
    
    .service-btn:hover, .service-btn.active {
        color: var(--text-light);
        border-color: transparent;
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }
    
    .service-btn:hover:before, .service-btn.active:before {
        transform: scaleX(1);
        transform-origin: left;
    }
    
    .service-content-container {
        min-height: 500px;
        position: relative;
    }
    
    .service-content {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        background-color: white;
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        opacity: 0;
        visibility: hidden;
        transition: all 0.5s cubic-bezier(0.33, 1, 0.68, 1);
        display: flex;
        flex-wrap: wrap;
        align-items: stretch;
    }
    
    .service-content.active {
        opacity: 1;
        visibility: visible;
        position: relative;
    }
    
    .service-text {
        flex: 1;
        min-width: 300px;
        padding: 60px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    
    .service-text h3 {
        font-size: 2rem;
        margin-bottom: 20px;
        color: var(--primary);
        font-weight: 700;
    }
    
    .service-text p {
        margin-bottom: 30px;
        color: var(--gray-600);
        font-size: 1.1rem;
        line-height: 1.7;
    }
    
    .service-image {
        flex: 1;
        min-width: 300px;
        position: relative;
        overflow: hidden;
    }
    
    .service-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
        top: 0;
        left: 0;
        transition: transform 1s cubic-bezier(0.16, 1, 0.3, 1);
    }
    
    .service-image:hover img {
        transform: scale(1.03);
    }
    
    .btn {
        display: inline-flex;
        align-items: center;
        padding: 16px 36px;
        background: var(--gradient);
        color: white;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        transition: var(--transition);
        box-shadow: var(--shadow-sm);
        border: none;
        cursor: pointer;
        font-size: 1rem;
        max-width: fit-content;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    
    .btn:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--secondary), var(--primary));
        z-index: -1;
        opacity: 0;
        transition: opacity 0.4s ease;
    }
    
    .btn:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
    }
    
    .btn:hover:before {
        opacity: 1;
    }
    
    .btn i {
        margin-left: 8px;
        transition: transform 0.3s ease;
    }
    
    .btn:hover i {
        transform: translateX(3px);
    }
    
    .service-features {
        margin: 35px 0;
    }
    
    .feature-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 20px;
    }
    
    .feature-icon {
        color: var(--primary);
        margin-right: 18px;
        font-size: 1.3rem;
        margin-top: 3px;
        flex-shrink: 0;
    }
    
    .feature-item h4 {
        font-size: 1.1rem;
        color: var(--gray-800);
        margin-bottom: 5px;
        font-weight: 600;
    }
    
    .feature-item p {
        margin-bottom: 0;
        color: var(--gray-600);
        font-size: 0.95rem;
        line-height: 1.6;
    }
    
    .decorative-shape {
        position: absolute;
        width: 600px;
        height: 600px;
        background: linear-gradient(135deg, rgba(29, 191, 173, 0.05) 0%, rgba(74, 111, 165, 0.05) 100%);
        border-radius: 50%;
        z-index: 1;
    }
    
    .shape-1 {
        top: -300px;
        right: -300px;
    }
    
    .shape-2 {
        bottom: -200px;
        left: -200px;
        width: 400px;
        height: 400px;
    }
    
    @media (max-width: 1024px) {
        .container-services {
            padding: 0 30px;
        }
        
        .service-text {
            padding: 50px;
        }
    }
    
    @media (max-width: 768px) {
        .services-section {
            padding: 80px 0;
        }
        
        .section-header {
            margin-bottom: 40px;
        }
        
        .section-header h2 {
            font-size: 2.25rem;
        }
        
        .services-container {
            flex-wrap: wrap;
            gap: 8px;
        }
        
        .service-btn {
            padding: 12px 24px;
            font-size: 0.95rem;
        }
        
        .service-content {
            flex-direction: column;
        }
        
        .service-image {
            height: 300px;
            order: -1;
        }
        
        .service-text {
            padding: 40px 30px;
        }
        
        .btn {
            padding: 14px 30px;
        }
    }
    
    @media (max-width: 480px) {
        .container-services {
            padding: 0 20px;
        }
        
        .section-header h2 {
            font-size: 2rem;
        }
        
        .service-text {
            padding: 35px 25px;
        }
        
        .service-text h3 {
            font-size: 1.7rem;
        }
    }
    </style>

    <section class="services-section" data-aos="fade-left" data-aos-duration="800">
        <div class="decorative-shape shape-1"></div>
        <div class="decorative-shape shape-2"></div>
        
        <div class="container-services">
            <div class="section-header">
                <h2>Premium <span>NDIS & Homecare</span> Services</h2>
                <p style="color: var(--gray-600); font-size: 1.1rem;">Discover our comprehensive support services designed to enhance independence and quality of life</p>
            </div>

            <!-- Service Switch Buttons -->
            <div class="services-container">
                <button class="service-btn active" onclick="showService(0)">
                    NDIS Services
                </button>
                <button class="service-btn" onclick="showService(1)">
                    Homecare Services
                </button>
            </div>

            <!-- Service Content Container -->
            <div class="service-content-container">
                <!-- NDIS Services Content -->
                <div id="ndis" class="service-content active">
                    <div class="service-text">
                        <h3>Comprehensive and Person-Centred NDIS Support Services</h3>
                        <p>At Allegiance Heart &amp; Home Care, we are dedicated to delivering high-quality,
tailored support under the National Disability Insurance Scheme (NDIS). Our focus is
on empowering participants to achieve their goals, build independence, and lead
meaningful lives. Through a compassionate, person-centred approach, we ensure
that every service is individually designed to reflect each participant’s unique needs,
preferences, and aspirations.</p>
                        
          
                        <a class="btn" href="{{url('/ndis')}}">
                            Explore NDIS Services
                            <i class="fas fa-arrow-right"></i>
</a>
                    </div>
                    <div class="service-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1HoDZVbb8sPqLovOQN-YE2pSnFyEWDWlyJcb4cq11wA&s=10">
                    </div>
                </div>

                <!-- Homecare Services Content -->
                <div id="homecare" class="service-content">
                    <div class="service-text">
                        <h3>Premium In-Home Care Services</h3>
                        <p>At Allegiance Heart &amp; Home Care, we understand that home is more than just a
place. It is where comfort, familiarity, and dignity reside. That’s why we’re dedicated
to delivering compassionate, high-quality care that supports older Australians to live
safely, independently, and with confidence in their own homes.
Our experienced team provides a wide range of personalised services, including
personal care, help with daily tasks, medication support, nursing care, and
meaningful companionship. We work closely with you and your loved ones to
develop flexible care plans that evolve as your needs change ensuring peace of
mind, comfort, and consistent support every step of the way.</p>
                                                
                        <a class="btn" href="{{url('/homecareservices')}}">
                            Learn About Homecare
                            <i class="fas fa-arrow-right"></i>
</a>
                    </div>
                    <div class="service-image">
                        <img src="https://avatars.mds.yandex.net/i?id=fa49d3940ee4d7671f84aa19606be3ce390608ed-5236855-images-thumbs&n=13">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    function showService(index) {
        // Hide all content blocks
        document.querySelectorAll('.service-content').forEach(el => {
            el.classList.remove('active');
            el.style.opacity = '0';
            el.style.visibility = 'hidden';
        });

        // Remove active class from buttons
        document.querySelectorAll('.service-btn').forEach(el => {
            el.classList.remove('active');
        });

        // Show selected content with smooth transition
        const services = ['ndis', 'homecare'];
        const activeContent = document.getElementById(services[index]);
        activeContent.classList.add('active');
        
        // Force reflow to enable transition
        void activeContent.offsetWidth;
        
        activeContent.style.opacity = '1';
        activeContent.style.visibility = 'visible';

        // Add active class to clicked button
        document.querySelectorAll('.service-btn')[index].classList.add('active');
        
        // Smooth scroll to section if mobile view
        if (window.innerWidth <= 768) {
            activeContent.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
    }

    // Initialize with NDIS service showing
    document.addEventListener('DOMContentLoaded', function() {
        showService(0);
        
        // Add animation to images on load
        setTimeout(() => {
            document.querySelectorAll('.service-image img').forEach(img => {
                img.style.transform = 'scale(1.03)';
                setTimeout(() => {
                    img.style.transform = 'scale(1)';
                }, 300);
            });
        }, 500);
    });
    </script>
