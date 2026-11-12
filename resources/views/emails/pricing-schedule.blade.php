<!DOCTYPE html>
<html>
<head>
    <title>Your Pricing Schedule</title>
    <style>
        /* Same styling as your brochure email for consistency */
        body { font-family: 'Inter', sans-serif; line-height: 1.6; color: #2D3748; }
        .email-container { max-width: 600px; margin: 0 auto; padding: 30px; background: white; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .header { text-align: center; margin-bottom: 30px; }
        h1 { color: #1DBFAD; font-size: 24px; margin-bottom: 20px; }
        .footer { margin-top: 30px; font-size: 14px; color: #718096; text-align: center; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Your Pricing Schedule, {{ $name }}</h1>
        </div>
        
        <p>Thank you for your interest in Allegiance heart and home. We've attached our detailed pricing schedule as requested.</p>
        
        <p>If you have any questions about our pricing or services, please don't hesitate to contact us:</p>
        
        <p>
            <strong>Phone:</strong>02 8730 9049<br>
            <strong>Email:</strong> admin@allegiancehearthomecare.com.au
        </p>
        
        <div class="footer">
            <p>© {{ date('Y') }} Allegiance Heart & Home Care</p>
        </div>
    </div>
</body>
</html>