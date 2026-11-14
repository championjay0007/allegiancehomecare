<footer class="care-footer">
    
<style>
/* Footer Variables */
:root {
    --primary: #1DBFAD;
    --primary-dark: #159B8C;
    --secondary: #4A6FA5;
    --text-dark: #1A1A1A;
    --text-light: #FFFFFF;
    --gray-100: #F7FAFC;
    --gray-200: #EDF2F7;
    --gray-300: #E2E8F0;
    --gray-600: #718096;
    --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.08);
    --radius-sm: 6px;
    --radius-md: 12px;
    --transition: all 0.3s ease;
}

/* Footer Styles */
.care-footer {
    background-color: #0A2540;
    color: white;
    position: relative;
    padding-top: 80px;
    margin-top: 80px;
}

.footer-wave {
    position: absolute;
    top: -80px;
    left: 0;
    width: 100%;
    height: 80px;
    transform: rotate(180deg);
}

.footer-wave svg {
    width: 100%;
    height: 100%;
    display: block;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px 40px;
}

.footer-main {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
    margin-bottom: 50px;
}

.footer-brand h3 {
    font-size: 1.5rem;
    margin-bottom: 20px;
    color: white;
}

.footer-brand p {
    color: rgba(255, 255, 255, 0.7);
    line-height: 1.6;
    margin-bottom: 25px;
}

.footer-social {
    display: flex;
    gap: 15px;
}

.footer-social a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    color: white;
    transition: var(--transition);
}

.footer-social a:hover {
    background: var(--primary);
    transform: translateY(-3px);
}

.links-column h4 {
    font-size: 1.1rem;
    margin-bottom: 20px;
    color: white;
    position: relative;
    padding-bottom: 10px;
}

.links-column h4::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 40px;
    height: 3px;
    background: var(--primary);
}

.links-column ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.links-column li {
    margin-bottom: 12px;
}

.links-column a {
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    transition: var(--transition);
    display: inline-block;
    position: relative;
}

.links-column a::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 0;
    height: 1px;
    background: var(--primary);
    transition: var(--transition);
}

.links-column a:hover {
    color: white;
    padding-left: 8px;
}

.links-column a:hover::after {
    width: 100%;
}

.footer-contact h4 {
    font-size: 1.1rem;
    margin-bottom: 20px;
    color: white;
    position: relative;
    padding-bottom: 10px;
}

.footer-contact h4::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 40px;
    height: 3px;
    background: var(--primary);
}

.contact-info {
    list-style: none;
    padding: 0;
    margin: 0;
}

.contact-info li {
    margin-bottom: 15px;
    display: flex;
    align-items: flex-start;
    gap: 12px;
    color: rgba(255, 255, 255, 0.7);
    line-height: 1.5;
}

.contact-info i {
    color: var(--primary);
    margin-top: 3px;
}

.contact-info a {
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    transition: var(--transition);
}

.contact-info a:hover {
    color: white;
}

/* Office Locations Styles */
.footer-offices {
    margin-bottom: 50px;
    padding-bottom: 30px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.offices-title {
    text-align: center;
    margin-bottom: 30px;
    font-size: 1.3rem;
    position: relative;
    display: inline-block;
    width: 100%;
}

.offices-title h4 {
    display: inline-block;
    margin: 0;
    padding-bottom: 10px;
    position: relative;
}

.offices-title h4::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: var(--primary);
}

.offices-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 25px;
}

.office-card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 12px;
    padding: 20px;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.08);
}

.office-card:hover {
    background: rgba(255, 255, 255, 0.08);
    transform: translateY(-3px);
    border-color: var(--primary);
}

.office-state {
    display: inline-block;
    background: linear-gradient(135deg, var(--primary), #00C9A7);
    padding: 4px 12px;
    border-radius: 50px;
    font-size: 0.7rem;
    font-weight: 600;
    margin-bottom: 15px;
    color: white;
    letter-spacing: 0.5px;
}

.office-card h4 {
    margin: 0 0 15px 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: white;
}

.office-address {
    margin-bottom: 15px;
}

.office-address p {
    margin: 8px 0;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 0.85rem;
    color: rgba(255, 255, 255, 0.7);
    line-height: 1.5;
}

.office-address i {
    color: var(--primary);
    width: 16px;
    font-size: 0.85rem;
}

.office-phone {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding-top: 12px;
    margin-top: 5px;
}

.office-phone a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 0.85rem;
    transition: all 0.3s ease;
}

.office-phone a:hover {
    color: var(--primary);
    transform: translateX(5px);
}

.office-phone i {
    color: var(--primary);
    font-size: 0.85rem;
}

/* Responsive */
@media (max-width: 768px) {
    .offices-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .office-card {
        padding: 18px;
    }
}

.footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding-top: 30px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
}

.footer-legal {
    color: rgba(255, 255, 255, 0.5);
    font-size: 0.9rem;
}

.footer-badges {
    display: flex;
    gap: 15px;
    margin-top: 15px;
}

.footer-badges img {
    height: 40px;
    width: auto;
    filter: grayscale(100%) brightness(2);
    opacity: 0.7;
    transition: var(--transition);
}

.footer-badges img:hover {
    filter: none;
    opacity: 1;
}

.btn-footer {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--primary);
    color: white;
    padding: 12px 20px;
    border-radius: var(--radius-md);
    text-decoration: none;
    font-weight: 600;
    transition: var(--transition);
}

.btn-footer:hover {
    background: var(--primary-dark);
    transform: translateY(-3px);
    box-shadow: 0 4px 12px rgba(29, 191, 173, 0.3);
}

/* Responsive Design */
@media (max-width: 768px) {
    .footer-main {
        grid-template-columns: 1fr 1fr;
    }
    
    .footer-brand {
        grid-column: span 2;
    }
    
    .footer-bottom {
        flex-direction: column;
        text-align: center;
    }
    
    .footer-badges {
        justify-content: center;
    }
}

@media (max-width: 576px) {
    .footer-main {
        grid-template-columns: 1fr;
    }
    
    .footer-brand {
        grid-column: span 1;
    }
    
    .links-column h4 {
        margin-top: 30px;
    }
}
</style>

<!-- Wave Background Element -->
<div class="footer-wave">
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="#1DBFAD"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="#1DBFAD"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="#1DBFAD"></path>
    </svg>
</div>

<div class="footer-container">
    <!-- Main Footer Content -->
    <div class="footer-main">
        <div class="footer-brand">
            <h3>Allegiance Heart & Home Care</h3>
            <p>Delivering compassionate, professional support that empowers individuals to live
with dignity, independence, and confidence at home and in the community.</p>
            <div class="footer-social">
                <a href="https://www.facebook.com/share/177EvA4Y6N/" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href=" https://www.tiktok.com/@allegiance.heart" aria-label="tiktok"><i class="fab fa-tiktok"></i></a>
                <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
        
        <div class="footer-links">
            <div class="links-column">
                <h4>Services</h4>
                <ul>
                    <li><a href="{{ url('/ndis') }}">NDIS</a></li>
                    <li><a href="{{ url('/homecareservices') }}">Aged Care</a></li>
                    <li><a href="{{ url('/download-brochure') }}">Download Consumer Handbook</a></li>
                    <li><a href="{{ url('/pricingform') }}">Download Pricing Schedule</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-links">
            <div class="links-column">
                <h4>Company</h4>
                <ul>
                    <li><a href="{{ url('/aboutpage')}}">About Us</a></li>
                    <li><a href="{{ url('/contact#faq')}}">FAQs</a></li>
                    <li><a href="/#testimonialCarousel">Testimonials</a></li>
                    <li><a href="{{ url('/careers')}}">Careers</a></li>
                    <li><a href="{{ url('/blog')}}">News & Blog</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-links">
            <div class="links-column">
                <h4>Support</h4>
                <ul>
                    <li><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
                    <li><a href="{{ url('/terms') }}">Terms of Service</a></li>
                    <li><a href="/accessibility">Accessibility Statement</a></li>
                    <li><a href="https://www.agedcarequality.gov.au/for-providers/code-conduct" target="_blank">Aged Care Code of Conduct</a></li>
                    <li><a href="https://www.ndiscommission.gov.au/rules-and-standards/ndis-code-conduct" target="_blank">NDIS Code of Conduct</a></li>
                    <li><a href="https://www.agedcarequality.gov.au/older-people/statement-rights" target="_blank">Statement of Rights</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- OFFICE LOCATIONS SECTION - ADDED HERE -->
    <div class="footer-offices">
        <div class="offices-title">
            <h4>Our Office Locations</h4>
        </div>
        <div class="offices-grid">
            <!-- NSW Office -->
            <div class="office-card">
                <span class="office-state">📍 NEW SOUTH WALES</span>
                <h4>Bankstown Office</h4>
                <div class="office-address">
                    <p><i class="fas fa-building"></i> 25 Restwell Street</p>
                    <p><i class="fas fa-location-dot"></i> Bankstown NSW 2200</p>
                </div>
                <div class="office-phone">
                    <a href="tel:0287309049"><i class="fas fa-phone-alt"></i> 02 8730 9049</a>
                </div>
            </div>

            <!-- VIC Office -->
            <div class="office-card">
                <span class="office-state">📍 VICTORIA</span>
                <h4>Cremorne Office</h4>
                <div class="office-address">
                    <p><i class="fas fa-building"></i> 580 Church Street</p>
                    <p><i class="fas fa-location-dot"></i> Cremorne VIC 3121</p>
                </div>
                <div class="office-phone">
                    <a href="tel:0370346513"><i class="fas fa-phone-alt"></i> 03 7034 6513</a>
                </div>
            </div>

            <!-- SA Office -->
            <div class="office-card">
                <span class="office-state">📍 SOUTH AUSTRALIA</span>
                <h4>Mawson Lakes Office</h4>
                <div class="office-address">
                    <p><i class="fas fa-building"></i> 1–3 Metro Parade</p>
                    <p><i class="fas fa-location-dot"></i> Mawson Lakes SA 5095</p>
                </div>
                <div class="office-phone">
                    <a href="tel:0861022501"><i class="fas fa-phone-alt"></i> 08 6102 2501</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="footer-legal">
            <p>&copy; {{ now()->year }} Allegiance Heart & Home Care. All rights reserved.</p>
            <div class="footer-badges">
                <img src="{{ asset('images/accreditation-badge.png') }}" alt="Accredited Care Provider" loading="lazy">
                <img src="{{ asset('images/ndis-badge.png') }}" alt="NDIS Registered Provider" loading="lazy">
            </div>
        </div>
        
        <div class="footer-cta">
            <a href="/contact#feedback" class="btn-footer">
                <i class="fas fa-comment-dots"></i> Feedback
            </a>
        </div>
    </div>
</div>
</footer>