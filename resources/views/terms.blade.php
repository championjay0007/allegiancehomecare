@extends('layouts.care')
@section('title', 'Terms and Conditions')

@section('content')
    <style>
        .terms-conditions {
            padding: 80px 0;
            background-color: #f9f9f9;
            font-family: 'Poppins', sans-serif;
            line-height: 1.8;
            color: #333;
        }
        
        .terms-container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 50px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        
        .terms-header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 2px solid #00A651;
            padding-bottom: 20px;
        }
        
        .terms-header img {
            max-height: 80px;
            margin-bottom: 20px;
        }
        
        .terms-header h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 10px;
            font-family: 'Montserrat', sans-serif;
        }
        
        .terms-header .effective-date {
            color: #666;
            font-size: 1rem;
            font-weight: 500;
        }
        
        .terms-section {
            margin-bottom: 40px;
        }
        
        .terms-section h2 {
            font-size: 1.5rem;
            color: #00A651;
            margin-bottom: 15px;
            font-family: 'Montserrat', sans-serif;
            padding-bottom: 5px;
            border-bottom: 1px solid #eee;
        }
        
        .terms-section h3 {
            font-size: 1.2rem;
            color: #F26522;
            margin: 25px 0 10px;
        }
        
        .terms-section p, .terms-section li {
            margin-bottom: 10px;
            color: #555;
        }
        
        .terms-section ul {
            padding-left: 25px;
            margin: 15px 0;
        }
        
        .terms-section li {
            margin-bottom: 8px;
        }
        
        .highlight-box {
            background-color: rgba(0,166,81,0.05);
            border-left: 4px solid #00A651;
            padding: 20px;
            margin: 25px 0;
            border-radius: 0 8px 8px 0;
        }
        
        .warning-box {
            background-color: rgba(242,101,34,0.05);
            border-left: 4px solid #F26522;
            padding: 20px;
            margin: 25px 0;
            border-radius: 0 8px 8px 0;
        }
        
        @media (max-width: 768px) {
            .terms-container {
                padding: 30px;
            }
            
            .terms-header h1 {
                font-size: 2rem;
            }
        }
    </style>

    <section class="terms-conditions">
        <div class="container terms-container">
            <div class="terms-header">
                <img src="{{asset('images/logo.jpg')}}" alt="Allegiance Heart & Home Care Logo">
                <h1>Website Terms and Conditions</h1>
                <div class="effective-date">Effective Date: June 2025</div>
            </div>
            
            <div class="terms-section">
                <h2>1. Acceptance of Terms</h2>
                <p>By accessing or using this website ("Site"), you agree to comply with and be bound by the following Terms and Conditions. If you do not agree to these Terms, you must not use this Site. The Site is owned and operated by Allegiance Heart & Home Care Pty Ltd ("we", "us", "our").</p>
            </div>
            
            <div class="terms-section">
                <h2>2. Use of Website</h2>
                <p>This Site is intended for individuals seeking information about our services or submitting service-related enquiries. You must use this Site in a lawful and responsible manner. You must not:</p>
                <ul>
                    <li>Use the Site for any fraudulent or unlawful purpose;</li>
                    <li>Submit false or misleading information via any form;</li>
                    <li>Interfere with the proper functioning of the Site;</li>
                    <li>Upload harmful code or attempt to breach the Site's security.</li>
                </ul>
                <p>We reserve the right to restrict or revoke access to any user who breaches these Terms.</p>
            </div>
            
            <div class="terms-section">
                <h2>3. Information Disclaimer</h2>
                <p>The content on this Site is for general informational purposes only and should not be taken as medical, legal, or financial advice. Submitting a form or enquiry does not constitute a contract or guarantee of service delivery.</p>
                <p>For NDIS or Home Care services, service agreements and eligibility requirements apply.</p>
            </div>
            
            <div class="terms-section">
                <h2>4. Services and Submissions</h2>
                <p>You may use the Site to:</p>
                <ul>
                    <li>Submit interest for NDIS or Home Care services;</li>
                    <li>Request support personnel (e.g., support workers, nurses, allied health);</li>
                    <li>Make general enquiries;</li>
                    <li>Submit feedback or complaints;</li>
                    <li>Request access to Home Care Consumer Handbooks and Pricing Schedules.</li>
                </ul>
                <p>By submitting any form, you confirm that the information provided is accurate and you have the authority to submit it. We may contact you using the provided contact details. Submission does not imply obligation or approval of services.</p>
            </div>
            
            <div class="terms-section">
                <h2>5. Intellectual Property</h2>
                <p>All content on this Site, including text, graphics, images, logos, downloadable documents, and software, is the property of Allegiance Heart & Home Care or its licensors and is protected under Australian intellectual property laws.</p>
                <p>You may view or print pages for personal, non-commercial use only. You must not copy, reproduce, distribute, or modify any content without our written permission.</p>
            </div>
            
            <div class="terms-section">
                <h2>6. Third-Party Links</h2>
                <p>Our Site may contain links to external websites or platforms. These are provided for your convenience only. We are not responsible for the content, accuracy, or availability of any external site and do not endorse their services.</p>
            </div>
            
            <div class="terms-section">
                <h2>7. Privacy</h2>
                <p>Use of this Site is also governed by our <a href="/privacy-policy" style="color: #00A651; text-decoration: underline;">Privacy Policy</a>, which outlines how we collect, store, and handle your personal information. By using the Site or submitting forms, you consent to our handling of your information in accordance with that policy.</p>
            </div>
            
            <div class="terms-section">
                <h2>8. Disclaimers and Limitation of Liability</h2>
                <div class="warning-box">
                    <p><strong>Disclaimer:</strong> Our services are provided "as is" and without warranties except those implied by law. We do not guarantee any specific health or life outcomes from our services. We are not medical professionals, and nothing on this site constitutes medical or legal advice.</p>
                </div>
                <p>To the fullest extent permitted by law, we exclude liability for any indirect, consequential or special losses arising from using our services or site. Our total liability for any claim related to our services is limited to the amount of fees paid for those services.</p>
                <p>This includes, without limitation, direct, indirect, incidental, or consequential damages.</p>
            </div>
            
            <div class="terms-section">
                <h2>9. Changes to Terms</h2>
                <p>We reserve the right to update or modify these Terms and Conditions at any time. Changes will be effective upon publication on this Site. Your continued use of the Site after changes indicates your acceptance of the new Terms.</p>
            </div>
            
            <div class="terms-section">
                <h2>10. Bookings and Cancellations</h2>
                <p>Bookings can be made via our website, by email or phone. Once booked, you must notify us as soon as possible if you wish to cancel or reschedule a service.</p>
                <ul>
                    <li>Under the NDIS rules, a "short notice" cancellation is generally one made with less than 7 days' notice and may incur cancellation fees.</li>
                    <li>For other (non-NDIS) appointments, we require at least 48 hours' notice to cancel or change a booking. Cancellations with less notice may be treated as a no-show and charged in full.</li>
                </ul>
                <p>We reserve the right to levy a cancellation fee or retain any prepaid fees if you cancel at short notice or do not attend the booking.</p>
            </div>
            
            <div class="terms-section">
                <h2>11. Fees and Payments</h2>
                <p>Service fees (including any deposits or co-payments) will be detailed in your service agreement or quote. NDIS-funded supports will be billed as per the NDIA's Price Guide.</p>
                <p>You agree to pay all charges on time via the agreed payment method. We may suspend services if fees are overdue. Where applicable, we will issue invoices and provide receipts. GST will be applied where required by Australian taxation law. Some eligible aged care, health and NDIS services may be GST-free.</p>
            </div>
            
            <div class="terms-section">
                <h2>12. Client and Provider Responsibilities</h2>
                <h3>Our Responsibilities:</h3>
                <p>We will provide services with reasonable care and skill, using suitably qualified and trained staff. We must comply with all relevant laws (including NDIS Quality and Safeguards Commission requirements, privacy laws, health and safety regulations, and the NDIS Code of Conduct). We will take care to protect your property and privacy, and to tailor supports to your needs. If required, we will obtain your consent for any changes or third-party referrals.</p>
                
                <h3>Your Responsibilities:</h3>
                <p>You agree to cooperate with us to enable safe and effective service delivery. This includes providing accurate and complete personal, medical and contact information, following any agreed care instructions, and notifying us of changes in your health or circumstances. You must treat our staff and subcontractors with respect and not harass or harm them. You also agree to provide a safe environment for our workers (for example, free from hazards or abuse). You are responsible for payment of fees, including any cancellation fees as stated above.</p>
            </div>
            
            <div class="terms-section">
                <h2>13. Governing Law</h2>
                <p>These Terms are governed by the laws of Australia. Any dispute arising from these Terms or our services will be subject to the exclusive jurisdiction of the Australian courts. We operate in all Australian states and territories and comply with their respective laws (e.g. privacy laws, disability services regulations). Use of our website or services from jurisdictions that do not honor these Terms is not authorized.</p>
            </div>
        </div>
    </section>
@endsection