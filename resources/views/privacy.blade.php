@extends('layouts.care')
@section('title', 'Privacy Policy')

@section('content')
    <style>
        .privacy-policy {
            padding: 80px 0;
            background-color: #f9f9f9;
            font-family: 'Poppins', sans-serif;
            line-height: 1.8;
            color: #333;
        }
        
        .privacy-container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 50px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        
        .privacy-header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 2px solid #00A651;
            padding-bottom: 20px;
        }
        
        .privacy-header img {
            max-height: 80px;
            margin-bottom: 20px;
        }
        
        .privacy-header h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 10px;
            font-family: 'Montserrat', sans-serif;
        }
        
        .privacy-header .effective-date {
            color: #666;
            font-size: 1rem;
            font-weight: 500;
        }
        
        .policy-section {
            margin-bottom: 40px;
        }
        
        .policy-section h2 {
            font-size: 1.5rem;
            color: #00A651;
            margin-bottom: 15px;
            font-family: 'Montserrat', sans-serif;
            padding-bottom: 5px;
            border-bottom: 1px solid #eee;
        }
        
        .policy-section h3 {
            font-size: 1.2rem;
            color: #F26522;
            margin: 25px 0 10px;
        }
        
        .policy-section p, .policy-section li {
            margin-bottom: 10px;
            color: #555;
        }
        
        .policy-section ul {
            padding-left: 25px;
            margin: 15px 0;
        }
        
        .policy-section li {
            margin-bottom: 8px;
        }
        
        .highlight-box {
            background-color: rgba(0,166,81,0.05);
            border-left: 4px solid #00A651;
            padding: 20px;
            margin: 25px 0;
            border-radius: 0 8px 8px 0;
        }
        
        .contact-info {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 8px;
            margin-top: 30px;
        }
        
        @media (max-width: 768px) {
            .privacy-container {
                padding: 30px;
            }
            
            .privacy-header h1 {
                font-size: 2rem;
            }
        }
    </style>

    <section class="privacy-policy">
        <div class="container privacy-container">
            <div class="privacy-header">
                <img src="{{asset('images/logo.jpg')}}" alt="Allegiance Heart & Home Care Logo">
                <h1>Privacy Policy</h1>
                <div class="effective-date">Effective Date: June 2025</div>
            </div>
            
            <div class="policy-section">
                <h2>1. Purpose</h2>
                <p>Allegiance Heart &amp; Home Care ("we", "us", "our") respects your privacy and handles personal and health information in accordance with the Privacy Act 1988 (Cth), the Australian Privacy Principles (APPs), equivalent state/territory health privacy laws, and the NDIS Code of Conduct.</p>
                <p>We are committed to protecting the privacy of our consumers, participants, employees, and website visitors. Under these laws, health or disability information is considered sensitive and must be handled with extra care. In line with the NDIS Code, people with disability have rights to privacy over the collection, use and disclosure of information about them, and we protect privacy in accordance with all Commonwealth and state/territory privacy laws. We follow our published privacy procedures to ensure you are informed about what information we collect, why we hold it, how we use and share it, and how we can keep it secure.</p>
            </div>
            
            <div class="policy-section">
                <h2>2. Scope</h2>
                <p>This policy applies to all personal information collected by us in connection with:</p>
                <ul>
                    <li>Home Care Package services</li>
                    <li>NDIS-funded supports</li>
                    <li>Employment applications</li>
                    <li>Website interactions (including form submissions)</li>
                </ul>
            </div>
            
            <div class="policy-section">
                <h2>3. What Personal Information We Collect</h2>
                <p>We may collect the following types of personal information:</p>
                <ul>
                    <li>Full name, date of birth, gender</li>
                    <li>Contact details (phone, email, address)</li>
                    <li>NDIS number or aged care client ID</li>
                    <li>Medical history, disability or health-related data</li>
                    <li>Emergency contact and next of kin information</li>
                    <li>Employment and qualification details (for staff)</li>
                    <li>Feedback, enquiries, complaints, and service preferences</li>
                </ul>
            </div>
            
            <div class="policy-section">
                <h2>4. How We Collect Your Information</h2>
                <p>We collect personal information necessary to provide NDIS and home care supports such as accommodation, personal activities, transport, therapy and nursing services, plan management and support coordination. This may include:</p>
                <ul>
                    <li><strong>Identity and contact details:</strong> name, address, date of birth, email, phone numbers, emergency contacts.</li>
                    <li><strong>Health and disability information:</strong> diagnoses, functional needs, NDIS plan details, medical history, medication and care instructions.</li>
                    <li><strong>Service and support data:</strong> notes on supports provided, assessments, allied health reports, insurer or funding records (e.g. NDIA plan, Medicare/PBS data).</li>
                    <li><strong>Payment and billing information:</strong> bank or credit card details, invoicing data, or other payment records where relevant.</li>
                    <li><strong>Online activity data:</strong> technical and usage data from our website (IP address, browser, pages viewed), and information collected via cookies or similar tracking technologies.</li>
                </ul>
                <p>We may also collect information from third parties, such as referees, other service providers, medical professionals or government agencies, but only where permitted by law or with your consent.</p>
            </div>
            
            <div class="policy-section">
                <h2>5. How we use Your Information</h2>
                <p>Your information is used solely to deliver and manage the supports and services you request. For example, we use your details to schedule appointments, coordinate healthcare providers, contact you about your service, bill for services, and comply with funding or regulatory requirements. We explain to you (when you start with us) how and why we collect your information, who will access it, and how we will keep it secure. We do not use your personal or health information for unrelated purposes without obtaining your prior consent.</p>
                <p>We may share information with third-party providers who assist in delivering your supports (such as allied health professionals, transport companies, or subcontracted support workers). Any third party we engage is required to handle your information in accordance with this Policy and applicable privacy laws.</p>
                <p>We also comply with any legal obligations to disclose information for example, if required by a court order or mandatory reporting laws. Except as permitted by law, we will not disclose your sensitive health or disability information without your informed consent.</p>
                <p>We collect your personal information to:</p>
                <ul>
                    <li>Provide and coordinate quality home care or NDIS supports</li>
                    <li>Meet our obligations under the Aged Care Act 1997 and NDIS Act 2013</li>
                    <li>Manage and train our workforce</li>
                    <li>Process payments, subsidies, and claims</li>
                    <li>Respond to feedback, complaints, and service requests</li>
                    <li>Comply with legal, regulatory, and reporting requirements</li>
                </ul>
            </div>
            
            <div class="policy-section">
                <h2>6. Disclosure of Personal Information</h2>
                <p>We may disclose your personal information to:</p>
                <ul>
                    <li>Government agencies (e.g., My Aged Care, NDIA, ACQSC)</li>
                    <li>Medical and allied health professionals involved in your care</li>
                    <li>IT providers and cloud storage services (with appropriate safeguards)</li>
                    <li>Third-party service providers, only where necessary</li>
                    <li>Law enforcement or regulatory bodies where required by law</li>
                </ul>
                <div class="highlight-box">
                    <p><strong>We will never sell or rent your personal information.</strong></p>
                </div>
            </div>
            
            <div class="policy-section">
                <h2>7. Consent and Choice</h2>
                <p>By using our website or services, you consent to the collection and use of your personal information as outlined in this Policy. We collect sensitive information (including health data) only with your explicit consent or as authorized by law. You have the right to refuse or withdraw consent to certain uses of your information, subject to legal or contractual limitations. If you withdraw consent, it may affect our ability to provide some services. We encourage you to ask questions about how your information will be used before you provide it.</p>
            </div>
            
            <div class="policy-section">
                <h2>8. Data Security and storage</h2>
                <p>We store personal information both electronically and physically. We implement reasonable security measures (such as locked storage for paper files, password protection, encryption and restricted access for electronic records) to protect against misuse, loss and unauthorized access. However, no internet or data storage system is completely secure. Our systems are aligned with ISO 27001 data governance principles. But despite precautions like secure storage and encryption, there is always some risk with electronic transmission and storage. By using our services, you acknowledge and accept this inherent risk. We retain personal information only as long as needed for business or legal purposes and then dispose of it securely.</p>
            </div>
            
            <div class="policy-section">
                <h2>9. Cookies and Website Tracking</h2>
                <p>Our website uses cookies and similar technologies to improve functionality and user experience. Cookies are small text files placed on your device by the website. We use them for purposes such as remembering your preferences and analyzing site usage. We clearly disclose our use of cookies in our Cookie Policy and in our Privacy Policy. You can control or disable cookies through your browser settings, but doing so may affect certain features of our site. Under the APPs, we must be transparent about data collection through cookies, and we do not use cookies to collect personal information beyond what is explained in our policies.</p>
            </div>
            
            <div class="policy-section">
                <h2>10. Access and Correction</h2>
                <p>You have the right to access and correct the personal information we hold about you. If you wish to view or update your data, please contact us. We will respond to your request promptly and in accordance with legal requirements. You may also ask us to explain how we will use or have used your information. If you believe any information is inaccurate, please let us know so we can amend it.</p>
                <p>If you have questions, concerns or wish to make a complaint about our handling of your personal information, please contact our Privacy Officer via our website or at admin@allegianceheartandhomecare.au. We take privacy seriously and will do our best to resolve any issues. You also have the right to complain to the Office of the Australian Information Commissioner (OAIC) if you believe your privacy rights under the Privacy Act have been breached.</p>
            </div>
            
            <div class="policy-section">
                <h2>11. Feedback and Complaints</h2>
                <p>If you believe we have breached your privacy or wish to make a complaint, please contact:</p>
                <div class="contact-info">
                    <p><strong>Privacy Officer</strong><br>
                    Allegiance Heart & Home Care Pty Ltd<br>
                    Email: admin@allegiancehearthomecare.com.au</p>
                </div>
                <p>We will investigate your concerns and respond in writing. If you are not satisfied, you may also contact the Office of the Australian Information Commissioner (OAIC).</p>
            </div>
            
            <div class="policy-section">
                <h2>12. Changes to This Policy</h2>
                <p>We may update this policy from time to time. The latest version will always be available on our website.</p>
            </div>
        </div>
    </section>
@endsection