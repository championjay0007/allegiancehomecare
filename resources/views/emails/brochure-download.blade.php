<!DOCTYPE html>
<html>
<head>
    <title>Your Allegiance Care Consumer Handbook</title>
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.6;
            color: #2D3748;
            background-color: #F7FAFC;
            padding: 20px;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            max-width: 180px;
            margin-bottom: 20px;
        }
        h1 {
            color: #1DBFAD;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .handbook-type {
            background-color: #E6FFFA;
            color: #065F46;
            padding: 8px 16px;
            border-radius: 50px;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background: linear-gradient(135deg, #1DBFAD 0%, #00A0C6 100%);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            margin: 20px 0;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #718096;
            text-align: center;
        }
        .contact-info {
            background-color: #F7FAFC;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <img src="" alt="Allegiance Heart & Home Care" class="logo">
            <h1>Thank you for your interest, {{ $name }}!</h1>
        </div>
        
        <p>We've attached your requested <strong>Consumer Handbook</strong>. This document contains detailed information about:</p>
        
        <ul>
            <li>Our comprehensive service offerings</li>
            <li>Consumer rights and responsibilities</li>
            <li>Service inclusions and options</li>
            <li>Funding and payment information</li>
        </ul>

        <div class="contact-info">
            <p>If you have any questions about the handbook or would like to discuss your specific needs, our care team is ready to help:</p>
            
            <p>
                <strong>Phone:</strong> 02 8730 9049<br>
                <strong>Email:</strong> admin@allegiancehearthomecare.com.au
            </p>
        </div>
        
        <p>We've also included some helpful resources in the attachment to guide you through understanding your options and next steps.</p>
        
        <p>We look forward to the opportunity to serve you with <em>"compassion you can trust, care you deserve"</em>.</p>
        
        <div class="footer">
            <p>© {{ date('Y') }} Allegiance Heart & Home Care. All rights reserved.</p>
            <p>If you didn't request this information, please ignore this email.</p>
        </div>
    </div>
</body>
</html>
