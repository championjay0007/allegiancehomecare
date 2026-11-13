
@extends('layouts.care')

@section('title', 'Support at Home & NDIS Provider | NSW, VIC & SA | Allegiance Heart & Home Care')

@section('content')
<style>
        :root {
            --primary: #1DBFAD;
            --accent: #E53935;
            --gradient-start: #00A0C6;
            --gradient-end: #004E92;
            --bg: #FFFFFF;
            --text-dark: #1A1A1A;
            --text-light: #FFFFFF;
        }




        :root {
    --primary: #1DBFAD;
    --primary-dark: #159B8C;
    --secondary: #4A6FA5;
    --accent: #FF7E5D;
    --text-dark: #1A1A1A;
    --text-light: #FFFFFF;
    --gray-100: #F7FAFC;
    --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.08);
    --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
    --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
    --radius-sm: 6px;
    --radius-md: 12px;
    --radius-lg: 16px;
    --transition: all 0.3s ease;
}
        
.care-hero {
    padding: 80px 0;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: var(--text-light);
    position: relative;
    overflow: hidden;
}

.hero-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    align-items: center;
}

.hero-content {
    position: relative;
    z-index: 2;
}

.hero-badge {
    display: inline-block;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(5px);
    padding: 8px 16px;
    border-radius: var(--radius-full);
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.care-hero h1 {
    font-size: 3.2rem;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 20px;
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
    font-size: 1.2rem;
    line-height: 1.6;
    margin-bottom: 30px;
    max-width: 500px;
    opacity: 0.9;
}

.hero-actions {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.btn-primary, .btn-secondary {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 14px 28px;
    border-radius: var(--radius-md);
    font-weight: 600;
    text-decoration: none;
    transition: var(--transition);
}

.btn-primary {
    background: var(--accent);
    color: white;
}

.btn-primary:hover {
    background: #FF6E47;
    transform: translateY(-3px);
    box-shadow: var(--shadow-md);
}

.btn-secondary {
    background: transparent;
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.btn-secondary:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.5);
    transform: translateY(-3px);
}

.hero-image {
    position: relative;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
}

.image-wrapper {
    position: relative;
    border-radius: var(--radius-lg);
    overflow: hidden;
    aspect-ratio: 4/5;
}

.hero-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent 50%);
}

.hero-features {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
    padding: 20px;
    z-index: 2;
}

.feature-item {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(5px);
    padding: 15px;
    border-radius: var(--radius-sm);
    text-align: center;
    transition: var(--transition);
}

.feature-item:hover {
    transform: translateY(-5px);
    background: white;
}

.feature-item i {
    color: var(--primary);
    font-size: 1.5rem;
    margin-bottom: 8px;
    display: block;
}

.feature-item span {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--text-dark);
    display: block;
}

/* Responsive Design */
@media (max-width: 992px) {
    .hero-container {
        grid-template-columns: 1fr;
    }
    
    .hero-content {
        text-align: center;
        margin-bottom: 40px;
    }
    
    .hero-subtitle {
        margin-left: auto;
        margin-right: auto;
    }
    
    .hero-actions {
        justify-content: center;
    }
    
    .hero-image {
        max-width: 600px;
        margin: 0 auto;
    }
}

@media (max-width: 768px) {
    .care-hero {
        padding: 60px 0;
    }
    
    .care-hero h1 {
        font-size: 2.5rem;
    }
    
    .hero-badge {
        font-size: 0.8rem;
    }
    
    .hero-features {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 576px) {
    .care-hero h1 {
        font-size: 2rem;
    }
    
    .hero-subtitle {
        font-size: 1.1rem;
    }
    
    .btn-primary, .btn-secondary {
        padding: 12px 20px;
        font-size: 0.9rem;
    }
    
    .hero-actions {
        flex-direction: column;
        gap: 10px;
    }
}





        .about-section {
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .section-header h2 {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }
        
        .section-header h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--gradient);
            border-radius: 2px;
        }
        
        .section-header h2 span {
            color: var(--primary);
        }
        
        .about-content {
            display: flex;
            flex-wrap: wrap;
            gap: 50px;
            align-items: center;
        }
        
        .about-text {
            flex: 1;
            min-width: 300px;
        }
        
        .about-text h3 {
            font-size: 2rem;
            margin-bottom: 20px;
            background: var(--gradient);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .about-text p {
            margin-bottom: 25px;
            font-size: 1.05rem;
            color: var(--gray);
        }
        
        .highlight-box {
            background-color: rgba(29, 191, 173, 0.1);
            border-left: 4px solid var(--primary);
            padding: 20px;
            margin: 30px 0;
            border-radius: 0 8px 8px 0;
        }
        
        .about-image {
            flex: 1;
            min-width: 300px;
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
        }
        
        .about-image img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.5s ease;
        }
        
        .about-image:hover img {
            transform: scale(1.03);
        }
        
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: var(--gradient);
            color: var(--light);
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 160, 198, 0.3);
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 160, 198, 0.4);
        }
        
        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: -1;
        }
        
        .floating-element {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
        }
        
        .element-1 {
            width: 300px;
            height: 300px;
            background: var(--gradient);
            top: -100px;
            right: -100px;
        }
        
        .element-2 {
            width: 150px;
            height: 150px;
            background-color: var(--accent);
            bottom: 50px;
            right: 200px;
        }
        
        @media (max-width: 768px) {
            .section-header h2 {
                font-size: 2.2rem;
            }
            
            .about-content {
                flex-direction: column-reverse;
            }
            
            .about-text h3 {
                font-size: 1.8rem;
            }
        }






        .CTA {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding: 80px 0;
            background: var( --primary);
            margin-bottom:100px;
        }
        
        .CTA-container {
            display: flex;
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 40px;
            align-items: center;
            position: relative;
            z-index: 2;
        }
        
        .CTA-image {
            flex: 1;
            min-width: 300px;
            position: relative;
            z-index: 1;
            margin-right: 60px;
            transform: perspective(1000px) rotateY(-10deg) translateX(-20px);
            transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .CTA-image::before {
            content: '';
            position: absolute;
            width: 120%;
            height: 120%;
            top: -10%;
            left: -10%;
            background: radial-gradient(circle, rgba(29,191,173,0.15) 0%, rgba(0,0,0,0) 70%);
            z-index: -1;
            border-radius: 50%;
            animation: pulse 8s infinite alternate;
        }
        
        .CTA-image img {
            width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4);
            border: 2px solid rgba(100, 255, 218, 0.2);
        }
        
        .CTA-image:hover {
            transform: perspective(1000px) rotateY(-5deg) translateX(0);
        }
        
        .CTA-content {
            flex: 1;
            min-width: 300px;
            position: relative;
            padding: 60px 0;
        }
        
        .CTA-title {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            position: relative;
           
        }
        
        .CTA-title span {
            color: var(--highlight);
            position: relative;
            display: inline-block;
        }
        
        .CTA-title span::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 0;
            width: 100%;
            height: 8px;
            background-color: rgba(100, 255, 218, 0.3);
            z-index: -1;
            border-radius: 4px;
        }
        
        .CTA-subtitle {
            font-size: 1.25rem;
            color: var(--light);
            margin-bottom: 2.5rem;
            max-width: 500px;
            line-height: 1.8;
            position: relative;
        }
        
        .CTA-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 1rem 2.2rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.4s ease;
            font-size: 1.1rem;
            position: relative;
            overflow: hidden;
            z-index: 1;
            background: var(--gradient);
            color: var(--light);
            box-shadow: 0 4px 20px rgba(0, 160, 198, 0.4);
            border: none;
            cursor: pointer;
        }
        
        .CTA-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(100,255,218,0.8) 0%, rgba(29,191,173,0.8) 100%);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        
        .CTA-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(29, 191, 173, 0.5);
        }
        
        .CTA-btn:hover::before {
            opacity: 1;
        }
        
        .CTA-btn::after {
            content: '→';
            margin-left: 10px;
            transition: all 0.4s ease;
        }
        
        .CTA-btn:hover::after {
            transform: translateX(6px);
        }
        
        .curve-element {
            position: absolute;
            width: 800px;
            height: 800px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(100,255,218,0.1) 0%, rgba(0,0,0,0) 70%);
            z-index: 0;
            animation: float 15s infinite ease-in-out;
        }
        
        .curve-1 {
            top: -400px;
            right: -400px;
            width: 1000px;
            height: 1000px;
            animation-delay: 0s;
        }
        
        .curve-2 {
            bottom: -300px;
            left: -300px;
            background: radial-gradient(circle, rgba(29,191,173,0.1) 0%, rgba(0,0,0,0) 70%);
            animation-delay: 3s;
        }
        
        .dots-pattern {
            position: absolute;
            width: 200px;
            height: 200px;
            background-image: radial-gradient(circle, var(--highlight) 2px, transparent 2px);
            background-size: 20px 20px;
            opacity: 0.1;
            z-index: 0;
            animation: float 12s infinite ease-in-out;
        }
        
        .dots-1 {
            top: 20%;
            right: 10%;
            animation-delay: 1s;
        }
        
        .dots-2 {
            bottom: 15%;
            left: 15%;
            animation-delay: 2s;
        }
        
        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }
        
        .shape {
            position: absolute;
            opacity: 0.1;
            animation: float 20s infinite linear;
        }
        
        .triangle {
            width: 120px;
            height: 120px;
            clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
            background-color: var(--accent);
            top: 30%;
            left: 10%;
            animation-delay: 0s;
        }
        
        .circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: var(--primary);
            bottom: 25%;
            right: 15%;
            animation-delay: 4s;
        }
        
        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(5deg); }
            100% { transform: translateY(0) rotate(0deg); }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); opacity: 0.15; }
            100% { transform: scale(1.1); opacity: 0.25; }
        }
        
        @media (max-width: 1200px) {
            .CTA-container {
                padding: 0 30px;
            }
            
            .CTA-title {
                font-size: 3rem;
            }
        }
        
        @media (max-width: 992px) {
            .CTA-container {
                flex-direction: column;
                padding: 100px 30px;
            }
            
            .CTA-image {
                margin-right: 0;
                margin-bottom: 60px;
                max-width: 500px;
                transform: perspective(1000px) rotateY(-5deg) translateX(0);
            }
            
            .CTA-content {
                text-align: center;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            
            .curve-1 {
                top: -500px;
                right: -500px;
            }
        }
        
        .CTA-subtitle {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }
        @media (max-width: 768px) {
            .CTA-title {
                font-size: 2.5rem;
            }
            
            .CTA-subtitle {
                font-size: 1.1rem;
            }
            
            .CTA-btn {
                padding: 0.9rem 1.8rem;
                font-size: 1rem;
            }
        }



        .testimonial-carousel {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            padding-bottom:100px;
        }
        
        .carousel-header {
            text-align: center;
            margin-bottom: 50px;
        }
        
        
        .carousel-header h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            background: var(--gradient);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .testimonial-slides {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .testimonial-track {
            display: flex;
            transition: transform 0.5s ease;
        }
        
        .testimonial-slide {
            min-width: 100%;
            padding: 50px;
            background-color: var(--light);
            text-align: center;
        }
        
        .testimonial-photo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--primary);
            margin: 0 auto 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .testimonial-quote {
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 25px;
            color: var(--dark);
            position: relative;
            padding: 0 20px;
        }
        
        .testimonial-quote::before,
        .testimonial-quote::after {
            content: '"';
            font-size: 3rem;
            color: var(--primary);
            opacity: 0.3;
            position: absolute;
        }
        
        .testimonial-quote::before {
            top: -20px;
            left: -10px;
        }
        
        .testimonial-quote::after {
            bottom: -40px;
            right: -10px;
        }
        
        .testimonial-author {
            margin-top: 20px;
        }
        
        .testimonial-author h4 {
            font-size: 1.2rem;
            color: var(--dark);
            margin-bottom: 5px;
        }
        
        .testimonial-author p {
            color: var(--gray);
            font-size: 0.9rem;
        }
        
        .carousel-nav {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }
        
        .carousel-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: var(--gray);
            opacity: 0.5;
            margin: 0 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .carousel-dot.active {
            background: var(--gradient);
            opacity: 1;
            transform: scale(1.2);
        }
        
        .carousel-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            z-index: 10;
        }
        
        .carousel-arrow:hover {
            background: var(--gradient);
            color: var(--light);
        }
        
        .carousel-arrow.prev {
            left: 0;
        }
        
        .carousel-arrow.next {
            right: 0;
        }
        
        .carousel-arrow i {
            font-size: 1.2rem;
        }
        
        @media (max-width: 768px) {
            .testimonial-slide {
                padding: 30px 20px;
            }
            
            .testimonial-quote {
                font-size: 1rem;
                padding: 0 10px;
            }
            
            .carousel-arrow {
                width: 40px;
                height: 40px;
            }
            
            .carousel-header h2 {
                font-size: 2rem;
            }
        }

        .partner-section {
            padding: 100px 0;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(0,160,198,0.05) 0%, rgba(0,78,146,0.05) 100%);
        }
        
        .container-partner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            gap: 50px;
        }
        
        .partner-content {
            flex: 1;
            position: relative;
            z-index: 2;
        }
        
        .partner-image {
            flex: 1;
            position: relative;
            min-width: 400px;
        }
        
        .partner-image::before {
            content: '';
            position: absolute;
            width: 120%;
            height: 120%;
            top: -10%;
            left: -10%;
            background: radial-gradient(circle, rgba(29,191,173,0.15) 0%, rgba(0,0,0,0) 70%);
            z-index: -1;
            border-radius: 50%;
            animation: pulse 8s infinite alternate;
        }
        
        .partner-image img {
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
            transform: perspective(1000px) rotateY(10deg);
            transition: transform 0.5s ease;
        }
        
        .partner-image:hover img {
            transform: perspective(1000px) rotateY(5deg);
        }
        
        .section-header {
            margin-bottom: 30px;
        }
        
        .section-header h2 {
            font-size: 2.8rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 15px;
        }
        
        .section-header h2 span {
            background: var(--gradient);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .partner-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--gray);
            margin-bottom: 30px;
            max-width: 500px;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 15px 35px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1rem;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .btn-primary {
            background: var(--gradient);
            color: var(--light);
            box-shadow: 0 4px 20px rgba(0, 160, 198, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(0, 160, 198, 0.4);
        }
        
        .btn-primary::after {
            content: '→';
            margin-left: 10px;
            transition: transform 0.3s ease;
        }
        
        .btn-primary:hover::after {
            transform: translateX(5px);
        }
        
        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: 0;
        }
        
        .floating-element {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
        }
        
        .element-1 {
            width: 300px;
            height: 300px;
            background: var(--gradient);
            top: 20%;
            left: -100px;
            animation: float 15s infinite ease-in-out;
        }
        
        .element-2 {
            width: 150px;
            height: 150px;
            background-color: var(--accent);
            bottom: 20%;
            right: 10%;
            animation: float 12s infinite ease-in-out 2s;
        }
        
        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
            100% { transform: translateY(0) rotate(0deg); }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); opacity: 0.15; }
            100% { transform: scale(1.1); opacity: 0.25; }
        }
        
        @media (max-width: 992px) {
            .container {
                flex-direction: column;
                text-align: center;
            }
            
            .partner-image {
                min-width: auto;
                max-width: 500px;
                order: -1;
            }
            
            .partner-text {
                margin-left: auto;
                margin-right: auto;
            }
            
            .section-header h2 {
                font-size: 2.4rem;
            }
        }
        
        @media (max-width: 768px) {
            .partner-section {
                padding: 70px 0;
            }
            
            .section-header h2 {
                font-size: 2rem;
            }
            
            .partner-text {
                font-size: 1rem;
            }
            
            .btn {
                padding: 12px 30px;
            }
        }

        :root {
    --primary: #1DBFAD;
    --accent: #E53935;
    --gradient: linear-gradient(135deg, #00A0C6 0%, #004E92 100%);
    --dark: #1A1A1A;
    --light: #FFFFFF;
    --gray: #6C757D;
    --light-bg: #F8F9FA;
}

.experience-section {
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .section-header h2 {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 15px;
            background: var(--gradient);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .experience-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .experience-card {
            background-color: var(--light);
            border-radius: 12px;
            padding: 40px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .experience-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }
        
        .experience-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: var(--gradient);
        }
        
        .card-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, rgba(0,160,198,0.1) 0%, rgba(0,78,146,0.1) 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            color: var(--primary);
            font-size: 1.8rem;
        }
        
        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--dark);
        }
        
        .card-content {
            font-size: 1rem;
            line-height: 1.8;
            color: var(--gray);
        }
        
        .highlight-box {
            background-color: rgba(29, 191, 173, 0.08);
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            border-left: 4px solid var(--primary);
        }
        
        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: 0;
        }
        
        .floating-element {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
            animation: float 15s infinite ease-in-out;
        }
        
        .element-1 {
            width: 300px;
            height: 300px;
            background: var(--gradient);
            top: 10%;
            right: -100px;
        }
        
        .element-2 {
            width: 200px;
            height: 200px;
            background-color: var(--accent);
            bottom: 10%;
            left: -50px;
            animation-delay: 2s;
        }
        
        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
            100% { transform: translateY(0) rotate(0deg); }
        }
        
        @media (max-width: 768px) {
            .section-header h2 {
                font-size: 2.2rem;
            }
            
            .experience-card {
                padding: 30px 20px;
            }
            
            .experience-section {
                padding: 70px 0;
            }
        }





        /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif; /* Use a modern font */
    line-height: 1.6;
    color: #333;
    background-color: #f9fafb; /* Light gray background */
}

/* Container */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Section Styling */
.blog-section {
    padding: 80px 0; /* Add vertical spacing */
    background: linear-gradient(to bottom, #f9fafb, #ffffff); /* Subtle gradient */
}

/* Section Header */
.section-header {
    text-align: center;
    margin-bottom: 60px;
}

.section-title {
    font-size: 48px;
    font-weight: 800;
    color: #1e293b; /* Dark gray */
    position: relative;
    display: inline-block;
}

.section-title .highlight {
    background: linear-gradient(90deg, #3b82f6, #6366f1); /* Gradient highlight */
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.section-subtitle {
    font-size: 18px;
    color: #64748b; /* Medium gray */
    margin-top: 10px;
}

/* Blog Grid */
.blog-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); /* Responsive grid */
    gap: 30px;
}

/* Blog Card */
.blog-card {
    background: #fff;
    border-radius: 16px; /* Rounded corners */
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05); /* Subtle shadow */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth hover effect */
}

.blog-card:hover {
    transform: translateY(-10px); /* Lift on hover */
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); /* Enhanced shadow on hover */
}

/* Blog Image */
.blog-image {
    width: 100%;
    height: 240px; /* Fixed height for consistency */
    object-fit: cover; /* Ensure images cover the area */
}

/* Blog Content */
.blog-content {
    padding: 20px;
}

.blog-title {
    font-size: 24px;
    font-weight: 700;
    color: #1e293b; /* Dark gray */
    margin-bottom: 10px;
}

.blog-excerpt {
    font-size: 16px;
    color: #64748b; /* Medium gray */
    margin-bottom: 15px;
    display: -webkit-box;
    -webkit-line-clamp: 3; /* Limit to 3 lines */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

.read-more {
    font-size: 16px;
    font-weight: 600;
    color: #3b82f6; /* Blue */
    text-decoration: none;
    transition: color 0.3s ease; /* Smooth color transition */
}

.read-more:hover {
    color: #6366f1; /* Indigo */
}

/* Empty State */
.empty-state {
    text-align: center;
    font-size: 18px;
    color: #64748b; /* Medium gray */
    padding: 40px 0;
}

/* Pagination */
.pagination {
    margin-top: 40px;
    text-align: center;
}

.pagination a {
    font-size: 16px;
    color: #3b82f6; /* Blue */
    text-decoration: none;
    margin: 0 5px;
    padding: 8px 12px;
    border-radius: 8px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.pagination a:hover {
    background-color: #3b82f6; /* Blue */
    color: #fff;
}


.home-pricing {
    padding: 80px 0;
    background: var(--gray-100);
}

.home-pricing .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.section-header {
    text-align: center;
    margin-bottom: 50px;
}

.section-badge {
    display: inline-block;
    background: rgba(29, 191, 173, 0.1);
    color: var(--primary);
    padding: 6px 15px;
    border-radius: 50px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 20px;
    text-transform: uppercase;
}

.section-header h2 {
    font-size: 2.2rem;
    font-weight: 800;
    margin-bottom: 15px;
}

.text-gradient {
    background: linear-gradient(90deg, var(--primary), var(--secondary));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-fill-color: transparent;
}

.section-description {
    font-size: 1.1rem;
    color: var(--gray-600);
    max-width: 700px;
    margin: 0 auto;
    line-height: 1.6;
}

.pricing-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
    margin: 0 auto;
    max-width: 1100px;
}

.pricing-card {
    background: white;
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    position: relative;
    border: 1px solid var(--gray-200);
}

.pricing-card.featured {
    border: 1px solid var(--primary);
    transform: translateY(-10px);
    box-shadow: 0 10px 25px rgba(29, 191, 173, 0.2);
}

.popular-badge {
    position: absolute;
    top: -12px;
    right: 20px;
    background: var(--secondary);
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
}

.pricing-header {
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid var(--gray-200);
}

.pricing-header h3 {
    font-size: 1.4rem;
    margin-bottom: 10px;
    color: var(--text-dark);
}

.price {
    font-size: 2rem;
    font-weight: 800;
    color: var(--primary);
}

.price span {
    font-size: 1rem;
    font-weight: normal;
    color: var(--gray-600);
}

.pricing-features {
    margin: 25px 0;
    padding: 0;
    list-style: none;
}

.pricing-features li {
    margin-bottom: 12px;
    padding-left: 28px;
    position: relative;
    color: var(--gray-600);
    line-height: 1.5;
}

.pricing-features li i {
    position: absolute;
    left: 0;
    top: 3px;
    color: var(--primary);
    font-size: 0.9rem;
}

.btn-pricing {
    display: block;
    text-align: center;
    background: var(--primary);
    color: white;
    padding: 12px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    margin-top: 20px;
}

.btn-pricing:hover {
    background: var(--secondary);
    transform: translateY(-3px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.pricing-footer {
    text-align: center;
    margin-top: 50px;
    color: var(--gray-600);
}

.pricing-footer a {
    color: var(--primary);
    font-weight: 600;
    text-decoration: none;
    transition: color 0.2s ease;
}

.pricing-footer a:hover {
    color: var(--secondary);
    text-decoration: underline;
}

/* Responsive Adjustments */
@media (max-width: 992px) {
    .pricing-cards {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .pricing-card.featured {
        transform: translateY(0);
    }
}

@media (max-width: 768px) {
    .home-pricing {
        padding: 60px 0;
    }
    
    .section-header h2 {
        font-size: 2rem;
    }
}

@media (max-width: 576px) {
    .pricing-cards {
        grid-template-columns: 1fr;
        max-width: 400px;
    }
    
    .section-header h2 {
        font-size: 1.8rem;
    }
    
    .price {
        font-size: 1.8rem;
    }
}







/* FAQ Section */
.care-faq {
    padding: 80px 0;
    background: var(--gray-100);
}

.care-faq .container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 0 20px;
}

.faq-container {
    margin-top: 40px;
}

.faq-item {
    margin-bottom: 15px;
    border-radius: var(--radius-md);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    background: white;
    transition: var(--transition);
}

.faq-item:hover {
    box-shadow: var(--shadow-md);
}

.faq-question {
    padding: 20px 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    background: white;
}

.faq-question h3 {
    margin: 0;
    font-size: 1.2rem;
    color: var(--primary);
    font-weight: 600;
}

.faq-question i {
    color: var(--primary);
    transition: var(--transition);
}

.faq-answer {
    padding: 0 25px;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
}

.faq-answer-inner {
    padding: 0 0 25px;
}

.faq-answer p {
    color: var(--gray-600);
    line-height: 1.7;
    margin-bottom: 15px;
}

.contact-list {
    margin: 15px 0;
    padding-left: 20px;
    list-style: none;
}

.contact-list li {
    margin-bottom: 8px;
    position: relative;
    padding-left: 25px;
}

.contact-list li:before {
    content: "•";
    color: var(--primary);
    font-size: 1.5rem;
    position: absolute;
    left: 0;
    top: -5px;
}

.important-note {
    background: #FFF8E1;
    border-left: 4px solid #FFC107;
    padding: 15px;
    margin: 20px 0;
    display: flex;
    gap: 15px;
    border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
}

.important-note i {
    color: #FFA000;
    font-size: 1.2rem;
    margin-top: 3px;
}

.important-note p {
    margin: 0;
    color: var(--gray-800);
}

.supplements-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 15px;
    margin: 20px 0;
}

.supplement-item {
    background: var(--primary-light);
    padding: 15px;
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 0.9rem;
}

.supplement-item i {
    color: var(--primary);
    font-size: 1.1rem;
}

.leave-types {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin: 25px 0;
}

.leave-card {
    background: white;
    border: 1px solid var(--gray-200);
    border-radius: var(--radius-md);
    padding: 20px;
    box-shadow: var(--shadow-sm);
}

.leave-card h4 {
    margin-top: 0;
    display: flex;
    align-items: center;
    gap: 10px;
    color: var(--primary);
}

.leave-card h4 i {
    font-size: 1.2rem;
}

.care-list {
    list-style: none;
    padding: 0;
    margin: 20px 0;
}

.care-list li {
    margin-bottom: 12px;
    padding-left: 30px;
    position: relative;
}

.care-list li i {
    position: absolute;
    left: 0;
    color: var(--primary);
}

.contact-box {
    display: flex;
    align-items: center;
    gap: 15px;
    background: var(--primary-light);
    padding: 15px 20px;
    border-radius: var(--radius-md);
    margin-top: 20px;
}

.contact-box i {
    font-size: 1.5rem;
    color: var(--primary);
}

.contact-box h4 {
    margin: 5px 0 0;
    color: var(--primary);
}

.faq-footer {
    text-align: center;
    margin-top: 50px;
}

.faq-footer p {
    font-size: 1.1rem;
    color: var(--gray-600);
    margin-bottom: 20px;
}

.btn-cont {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--primary);
    color: white;
    padding: 12px 25px;
    border-radius: var(--radius-md);
    text-decoration: none;
    font-weight: 600;
    transition: var(--transition);
}

.btn-cont:hover {
    background: var(--primary-dark);
    transform: translateY(-3px);
    box-shadow: var(--shadow-md);
}

/* Active State */
.faq-item.active .faq-question i {
    transform: rotate(180deg);
}

.faq-item.active .faq-answer {
    max-height: 2000px;
    padding: 0 25px 25px;
    border-top: 1px solid var(--gray-200);
}

/* Responsive */
@media (max-width: 768px) {
    .leave-types {
        grid-template-columns: 1fr;
    }
    
    .faq-question {
        padding: 15px 20px;
    }
    
    .faq-question h3 {
        font-size: 1.1rem;
    }
    
    .supplements-grid {
        grid-template-columns: 1fr 1fr;
    }
}

@media (max-width: 576px) {
    .care-faq {
        padding: 60px 0;
    }
    
    .supplements-grid {
        grid-template-columns: 1fr;
    }
    
    .faq-question h3 {
        font-size: 1rem;
    }
}

    </style>
</head>
<body>
    <!-- <section class="hero">
        <div class="floating-elements">
            <div class="floating-element element-1"></div>
            <div class="floating-element element-2"></div>
        </div>
        
        <div class="hero-container">
            <div class="hero-image-left">
                <img src="{{asset('images/image1.jpg')}}" alt="Caregiver assisting elderly woman">
            </div>
            
            <div class="hero-content">
                <h1 class="hero-title">Your <span class="highlight">FIRST Choice</span> for Aged & Disability Care</h1>
                <p class="hero-subtitle">Compassionate, professional care services tailored to individual needs. Helping families and individuals live with dignity and independence.</p>
                <div class="hero-buttons">
                    <a href="/book-services" class="btn btn-primary">Get Started</a>
                    <a href="/download-brochure" class="btn btn-secondary">Download Brochure</a>
                </div>
            </div>
            
            <div class="hero-image-right">
                <img src="{{asset('images/image2.jpg')}}" alt="Happy senior couple">
            </div>
        </div>
    </section> -->

<section class="care-hero">
    <div class="hero-container">
        <div class="hero-content">
            <div class="hero-badge">Trusted Care Provider</div>
            <h1>Your <span class="highlight">FIRST Choice</span>For NDIS and
Support at Home Services</h1>
            <p class="hero-subtitle">
                Delivering compassionate, professional support tailored to your unique needs. At
            Allegiance, we empower individuals and families to live with dignity, independence,
            and confidence every step of the way. Support at Home replaced the former Home Care
            Packages Program on 1 November 2025. People who transitioned from the former program
            retained an equivalent Transitioned HCP funding level. They may remain on Transitioned
            HCP Levels 1–4 unless reassessed and approved for a Support at Home classification.
            </p>
            
            <div class="hero-actions">
 <a href="/support-at-home-enquiry" class="btn-primary">
                    <i class="fas fa-user-plus"></i> Submit an Enquiry
                </a>
                <a href="https://allegiancehearthomecare.com.au/download-brochure" class="btn-secondary" >
                    <i class="fas fa-download"></i> Download Brochure
                </a>
            </div>
        </div>
        
        <div class="hero-image">
            <div class="image-wrapper">
                <img src="https://images.dotmed.com/images/news/stories/7227.jpg" alt="Compassionate caregiver assisting senior client" loading="lazy">
                <div class="image-overlay"></div>
            </div>
            <div class="hero-features">
                <div class="feature-item">
                    <i class="fas fa-heart"></i>
                    <span>Compassionate Care</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-certificate"></i>
                    <span>Certified Professionals</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-home"></i>
                    <span>In-Home Support</span>
                </div>
            </div>
        </div>
    </div>
</section>




















    

    <section class="about-section" data-aos="fade-up" data-aos-duration="1000">
        <div class="floating-elements">
            <div class="floating-element element-1"></div>
            <div class="floating-element element-2"></div>
        </div>
        
        <div class="container">
            <div class="section-header">
                <h2>About <span>Us</span></h2>
                <p>Your Trusted One-Stop Provider for NDIS and Support at Home Services</p>
            </div>
            
            <div class="about-content">
                <div class="about-text">
                    <h3>Compassionate Care with Professional Excellence</h3>
                    <p>At Allegiance Heart &amp; Home Care, our team of qualified care
professionals delivers a wide range of personalised services under both NDIS and
Support at Home. We empower individuals to live independently, safely, and with dignity.
As a trusted and vetted provider, you can count on us for care that makes a real
difference.</p>
                    
                    <div class="highlight-box">
                        <p>At Allegiance, we don’t believe in one-size-fits-all solutions. Every individual is
unique, and so are their needs. That’s why we take the time to understand each
participant’s lifestyle, preferences, and personal goals designing customised support
plans that truly make a difference.</p>
                    </div>
                    
                    <p>At Allegiance, our dedicated team of healthcare and support professionals brings
both empathy and expertise to every interaction. We’re not just service providers, we
are trusted partners in each participant’s and consumers journey toward
independence, confidence, and dignity.</p>
                    
                    <a href="/aboutpage" class="btn">Learn More</a>
                </div>
                
                <div class="about-image">
                    <img src="https://g5-assets-cld-res.cloudinary.com/image/upload/x_480,y_0,h_1414,w_1159,c_crop/q_auto,f_auto,c_fill,g_center,h_1100,w_900/v1683845276/g5/g5-c-iqa3e76t-brightwater-senior-living-group-client/g5-cl-57asxxzp9-brightwater-tuxedo/uploads/GettyImages-1401532985_1_f7jswv.jpg" alt="Caregiver assisting NDIS participant">
                </div>
            </div>
        </div>
    </section>





@include('layouts.services')

@include('layouts.packages')



    <section class="CTA" data-aos="fade-down" data-aos-duration="1000">
        <div class="floating-shapes">
            <div class="shape triangle"></div>
            <div class="shape circle"></div>
        </div>
        <div class="floating-elements">
            <div class="floating-element element-1"></div>
            <div class="floating-element element-2"></div>
        </div>

        <div class="curve-element curve-1"></div>
        <div class="curve-element curve-2"></div>
        <div class="dots-pattern dots-1"></div>
        <div class="dots-pattern dots-2"></div>
        
        <div class="CTA-container">
            <div class="CTA-image">
                <img src="https://avatars.mds.yandex.net/get-altay/492154/2a000001855c6bca1c54c03943ddfeeffb7f/XXL_height" alt="Compassionate care provider">
            </div>
            
            <div class="CTA-content">
                <h1 class="CTA-title">We've got <span>YOU</span> covered, rain, hail or shine.</h1>
                <p class="CTA-subtitle">At Allegiance Heart &amp; Home Care, we’re committed to enhancing your wellbeing and
quality of life. If you’re seeking independence with the right care and support, we’ll be
by your side every step of the way.</p>
                <a href="/support-at-home-enquiry" class="CTA-btn">Get Started</a>
            </div>
        </div>
    </section>











        <!-- <div class="global-details">
            <div class="global-header">
                <i class="fas fa-star"></i>
                <h4>All Our Care Packages Include</h4>
            </div>
            <ul>
                <li><i class="fas fa-compass"></i> Navigation of the My Aged Care system</li>
                <li><i class="fas fa-chart-line"></i> Maximizing your government subsidy</li>
                <li><i class="fas fa-clipboard-list"></i> Personalized care planning</li>
                <li><i class="fas fa-users"></i> Staff matching your values</li>
            </ul>
            <div class="contact-cta">
                <div class="cta-content">
                    <i class="fas fa-comments"></i>
                    <div>
                        <p>Not sure which level is right for you?</p>
                        <a href="tel:0450085223" class="cta-link">
                            <i class="fas fa-phone-alt"></i> 0450 085 223
                        </a>
                        <span>or</span>
                        <a href="mailto:admin@allegiancehearthomecare.com.au" class="cta-link">
                            <i class="fas fa-envelope"></i> Email Us
                        </a>
                    </div>
                </div>
                <p class="tagline">"Compassion you can trust, care you deserve"</p>
            </div>
        </div>
    </div> 
</section> -->


        

    <section class="partner-section">
        <div class="floating-elements">
            <div class="floating-element element-1"></div>
            <div class="floating-element element-2"></div>
        </div>
        
        <div class="container-partner">
            <div class="partner-content">
                <div class="section-header">
                    <h2>Join our dedicated <span>team of care workers</span></h2>
                </div>
                
                <p class="partner-text">Become a part of our compassionate and supportive environment at Allegiance Heart & Home Care. Make a meaningful impact in the lives of those we serve and grow your career with us.</p>
                
                <a href="/careers" class="btn btn-primary">Find out more</a>
            </div>
            
            <div class="partner-image">
                <img src="https://media.istockphoto.com/id/1484014976/ru/%D1%84%D0%BE%D1%82%D0%BE/%D0%B2%D1%80%D0%B0%D1%87-%D0%BA%D0%BE%D0%BC%D0%B0%D0%BD%D0%B4%D0%B0-%D0%B8-%D0%B1%D0%BE%D0%BB%D1%8C%D0%BD%D0%B8%D1%86%D0%B0-%D0%BD%D0%B0-%D1%80%D0%B0%D0%B1%D0%BE%D1%82%D0%B5-%D1%83%D0%BB%D1%8B%D0%B1%D0%B0%D1%8E%D1%82%D1%81%D1%8F-%D0%B2%D0%BC%D0%B5%D1%81%D1%82%D0%B5-%D0%B4%D0%BB%D1%8F-%D0%BF%D0%BE%D1%80%D1%82%D1%80%D0%B5%D1%82%D0%B0-%D0%B2-%D0%BC%D0%B5%D0%B4%D0%B8%D1%86%D0%B8%D0%BD%D1%81%D0%BA%D0%BE%D0%BC-%D1%83%D1%87%D1%80%D0%B5%D0%B6%D0%B4%D0%B5%D0%BD%D0%B8%D0%B8-%D0%BC%D0%B5%D0%B4%D0%B8%D0%BA.jpg?s=612x612&w=0&k=20&c=3b3v-aQWU-WPfBIxnp_MKiAEvwwYBDeEVZi_FQYSYnE=">
            </div>
        </div>
    </section>


    <section class="experience-section">
        <div class="floating-elements">
            <div class="floating-element element-1"></div>
            <div class="floating-element element-2"></div>
        </div>
        
        <div class="container">
            <div class="section-header">
                <h2>Why Choose Us</h2>
            </div>
            
            <div class="experience-grid">
                <!-- Experience Card -->
                <div class="experience-card">
                    <div class="card-icon">
                        <i class="fas fa-history"></i>
                    </div>
                    <h3 class="card-title">Over 20 Years of Combined Experience in Disability &amp;
Aged Care
</h3>
                    <div class="card-content">
                        <p>At Allegiance Heart &amp; Home Care, our team brings together more than two decades
of experience supporting people across both the NDIS and Support at Home sectors.
We’re committed to delivering personalised, high-quality care that empowers
individuals to live safely, independently, and with dignity.</p>
                    </div>
                </div>
                
                <!-- Services Card -->
                <div class="experience-card">
                    <div class="card-icon">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h3 class="card-title">Comprehensive and Culturally Sensitive
Support</h3>
                    <div class="card-content">
                        <p>At Allegiance Heart &amp; Home Care, we deliver a wide range of personalised services
through our diverse team of healthcare and support professionals. From personal
care and domestic assistance to clinical nursing, allied health, mental health support,
and community participation.</p>
                        <div class="highlight-box">
                            <p>we’re here to help individuals live safely and independently. Our team speaks
multiple languages and reflects a variety of cultural backgrounds, ensuring
respectful, inclusive support that honours each person’s values and preferences.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Qualifications Card -->
                <div class="experience-card">
                    <div class="card-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3 class="card-title">Expertise You Can Trust</h3>
                    <div class="card-content">
                        <p>As a trusted provider of aged care and disability support in Australia, Allegiance
Heart &amp; Home Care is committed to excellence. We invest in ongoing professional
development and maintain a skilled team including Registered Nurses and qualified
specialists to deliver high-quality, personalised care.</p>
                        <p>Unlike many providers, we continually expand our services to meet the evolving
needs of our community. Our dedicated team works closely with each individual to
develop tailored support plans that reflect their goals, preferences, and lifestyle.</p>
                    </div>
                </div>
                
                <!-- New Card 1: Personalized Approach -->
                <div class="experience-card">
                    <div class="card-icon">
                        <i class="fas fa-user-cog"></i>
                    </div>
                    <h3 class="card-title">Personalized Care Plans</h3>
                    <div class="card-content">
                        <p>At Allegiance Heart &amp; Home Care, we design tailored support plans that reflect your
individual needs, lifestyle, and personal goals. Ensuring you receive the right care,
your way.</p>
                        <div class="highlight-box">
                            <p>We regularly review and adjust your plan as your needs change, so you always
receive the most relevant and effective support, every step of the way.</p>
                        </div>
                    </div>
                </div>
                
                <!-- New Card 2: Technology Integration -->
                <div class="experience-card">
                    <div class="card-icon">
                        <i class="fas fa-tablet-alt"></i>
                    </div>
                    <h3 class="card-title">Innovative Care Technology</h3>
                    <div class="card-content">
                        <p>At Allegiance Heart &amp; Home Care, we utilise advanced technology to improve the
quality, safety, and responsiveness of our services. From smart medication
management and emergency response systems to secure family communication
portals, our digital tools are designed to enhance every aspect of care.</p>
                        <p>Our digital tools provide peace of mind while maintaining the human touch that defines quality care.While technology strengthens our support, it&#39;s the human connection and
compassion of our team that continues to define the heart of what we do.</p>
                    </div>
                </div>
                
                <!-- New Card 3: Family Support -->
                <div class="experience-card">
                    <div class="card-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3 class="card-title">Family-Centered Support</h3>
                    <div class="card-content">
                        <p>At Allegiance Heart &amp; Home Care, we recognise that quality care supports not just
the individual, but the entire family. That’s why we offer ongoing guidance, respite
care, and regular updates to keep families informed and involved every step of the
way.</p>
                        <div class="highlight-box">
                            <p>With 24/7 access to our care coordinators, you’ll always have the support you
need—because no one should navigate the care journey alone.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






<!-- Allegiance Heart & Home Care CTA -->
<section class="ahhc-cta" id="self-management-cta">
    <div class="ahhc-cta-bg"></div>

    <div class="ahhc-cta-container">

        <div class="ahhc-cta-content">

            <div class="ahhc-cta-badge">
                <span class="ahhc-status-dot"></span>
                Self-Management Support
            </div>

            <h2>
                More choice.
                <span>More control.</span>
                <br>
                More confidence in your care.
            </h2>

            <p>
                Take greater control of your care arrangements while
                staying supported by Allegiance Heart & Home Care.
                Manage workers, services, documents, approvals and
                invoices securely in one place.
            </p>

            <div class="ahhc-cta-buttons">
                <a href="https://allegiancehearthomecareportal.com/" class="ahhc-btn ahhc-btn-primary">
                    Apply for Self-Management
                    <span class="ahhc-arrow">→</span>
                </a>

                <a href="https://allegiancehearthomecareportal.com/portal"
                   class="ahhc-btn ahhc-btn-secondary">
                    Login to Portal
                    <span class="ahhc-arrow">→</span>
                </a>
            </div>

            <div class="ahhc-trust">
                <div class="ahhc-trust-item">
                    <span class="ahhc-icon">✓</span>
                    Secure Portal
                </div>

                <div class="ahhc-trust-item">
                    <span class="ahhc-icon">✓</span>
                    Provider Oversight
                </div>

                <div class="ahhc-trust-item">
                    <span class="ahhc-icon">✓</span>
                    MFA Protected
                </div>
            </div>

        </div>


        <!-- Right Side Card -->
        <div class="ahhc-cta-card">

            <div class="ahhc-card-glow"></div>

            <div class="ahhc-card-top">
                <div class="ahhc-card-icon">
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M12 3L20 6V11C20 16.5 16.5 20.2 12 21C7.5 20.2 4 16.5 4 11V6L12 3Z"
                              stroke="currentColor"
                              stroke-width="1.8"
                              stroke-linejoin="round"/>
                        <path d="M8.5 12L10.8 14.3L15.5 9.6"
                              stroke="currentColor"
                              stroke-width="1.8"
                              stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </div>

                <div>
                    <strong>Secure Self-Management</strong>
                    <small>Everything in one place</small>
                </div>
            </div>


            <div class="ahhc-dashboard">

                <div class="ahhc-dashboard-row">
                    <span>
                        <i class="ahhc-mini-icon">✓</i>
                        Service approvals
                    </span>
                    <b>Ready</b>
                </div>

                <div class="ahhc-dashboard-row">
                    <span>
                        <i class="ahhc-mini-icon">✓</i>
                        Documents
                    </span>
                    <b>Secure</b>
                </div>

                <div class="ahhc-dashboard-row">
                    <span>
                        <i class="ahhc-mini-icon">✓</i>
                        Invoices & evidence
                    </span>
                    <b>Tracked</b>
                </div>

                <div class="ahhc-dashboard-row">
                    <span>
                        <i class="ahhc-mini-icon">✓</i>
                        Ongoing reviews
                    </span>
                    <b>Supported</b>
                </div>

            </div>


            <div class="ahhc-card-footer">
                <div class="ahhc-avatar-stack">
                    <span>AH</span>
                    <span>✓</span>
                </div>

                <p>
                    Supported by<br>
                    <strong>Allegiance Heart & Home Care</strong>
                </p>
            </div>

        </div>

    </div>
</section>


<style>
/* ==========================================
   ALLEGIANCE HEART & HOME CARE CTA
   ========================================== */

.ahhc-cta {
    position: relative;
    overflow: hidden;
    padding: 90px 25px;
    background:
        radial-gradient(
            circle at 85% 20%,
            rgba(22, 153, 161, 0.16),
            transparent 35%
        ),
        linear-gradient(135deg, #071c2b 0%, #0e3863 55%, #0b293f 100%);
    font-family: "Inter", "Segoe UI", Arial, sans-serif;
    color: #ffffff;
}

.ahhc-cta-bg {
    position: absolute;
    width: 500px;
    height: 500px;
    right: -200px;
    bottom: -280px;
    border-radius: 50%;
    background: rgba(22, 153, 161, 0.12);
    filter: blur(20px);
    pointer-events: none;
}

.ahhc-cta-container {
    position: relative;
    z-index: 2;
    max-width: 1180px;
    margin: auto;
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 80px;
    align-items: center;
}


/* ---------- CONTENT ---------- */

.ahhc-cta-badge {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 8px 14px;
    margin-bottom: 22px;

    border: 1px solid rgba(255,255,255,0.15);
    border-radius: 50px;

    background: rgba(255,255,255,0.07);
    backdrop-filter: blur(10px);

    font-size: 13px;
    font-weight: 600;
    letter-spacing: 0.2px;
}

.ahhc-status-dot {
    width: 8px;
    height: 8px;
    background: #32d583;
    border-radius: 50%;
    box-shadow: 0 0 0 5px rgba(50,213,131,0.12);
}

.ahhc-cta h2 {
    margin: 0;
    max-width: 700px;

    font-size: clamp(38px, 5vw, 62px);
    line-height: 1.08;
    letter-spacing: -2px;
    font-weight: 750;
}

.ahhc-cta h2 span {
    color: #55cbd0;
}

.ahhc-cta-content > p {
    max-width: 650px;
    margin: 25px 0 30px;

    color: rgba(255,255,255,0.75);
    font-size: 17px;
    line-height: 1.75;
}


/* ---------- BUTTONS ---------- */

.ahhc-cta-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 13px;
}

.ahhc-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 13px;

    min-height: 52px;
    padding: 0 22px;

    border-radius: 10px;
    text-decoration: none;

    font-size: 14px;
    font-weight: 700;

    transition:
        transform 0.25s ease,
        box-shadow 0.25s ease,
        background 0.25s ease;
}

.ahhc-btn:hover {
    transform: translateY(-3px);
}

.ahhc-btn-primary {
    color: #063441;
    background: #ffffff;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.ahhc-btn-primary:hover {
    box-shadow: 0 15px 35px rgba(0,0,0,0.25);
}

.ahhc-btn-secondary {
    color: #ffffff;
    border: 1px solid rgba(255,255,255,0.25);
    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(8px);
}

.ahhc-btn-secondary:hover {
    background: rgba(255,255,255,0.12);
}

.ahhc-arrow {
    font-size: 20px;
    line-height: 1;
    transition: transform 0.25s ease;
}

.ahhc-btn:hover .ahhc-arrow {
    transform: translateX(4px);
}


/* ---------- TRUST ITEMS ---------- */

.ahhc-trust {
    display: flex;
    flex-wrap: wrap;
    gap: 22px;
    margin-top: 28px;
}

.ahhc-trust-item {
    display: flex;
    align-items: center;
    gap: 8px;

    color: rgba(255,255,255,0.65);
    font-size: 12px;
    font-weight: 600;
}

.ahhc-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    width: 19px;
    height: 19px;

    border-radius: 50%;
    background: rgba(50,213,131,0.15);
    color: #55d99a;

    font-size: 11px;
}


/* ==========================================
   RIGHT DASHBOARD CARD
   ========================================== */

.ahhc-cta-card {
    position: relative;

    padding: 28px;

    border: 1px solid rgba(255,255,255,0.14);
    border-radius: 22px;

    background:
        linear-gradient(
            145deg,
            rgba(255,255,255,0.12),
            rgba(255,255,255,0.035)
        );

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    box-shadow:
        0 30px 80px rgba(0,0,0,0.28),
        inset 0 1px rgba(255,255,255,0.08);

    animation: ahhcFloat 6s ease-in-out infinite;
}

.ahhc-card-glow {
    position: absolute;
    width: 180px;
    height: 180px;
    top: -80px;
    right: -70px;

    border-radius: 50%;
    background: rgba(22,153,161,0.22);
    filter: blur(45px);

    pointer-events: none;
}


/* Card Header */

.ahhc-card-top {
    position: relative;
    z-index: 1;

    display: flex;
    align-items: center;
    gap: 15px;

    padding-bottom: 24px;

    border-bottom: 1px solid rgba(255,255,255,0.09);
}

.ahhc-card-icon {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 50px;
    height: 50px;

    border-radius: 14px;

    background: rgba(22,153,161,0.15);
    color: #55cbd0;
}

.ahhc-card-icon svg {
    width: 26px;
    height: 26px;
}

.ahhc-card-top strong {
    display: block;
    font-size: 15px;
}

.ahhc-card-top small {
    display: block;
    margin-top: 4px;

    color: rgba(255,255,255,0.5);
    font-size: 12px;
}


/* Dashboard */

.ahhc-dashboard {
    position: relative;
    z-index: 1;
    padding: 10px 0;
}

.ahhc-dashboard-row {
    display: flex;
    justify-content: space-between;
    align-items: center;

    padding: 16px 4px;

    border-bottom: 1px solid rgba(255,255,255,0.07);
}

.ahhc-dashboard-row:last-child {
    border-bottom: none;
}

.ahhc-dashboard-row span {
    display: flex;
    align-items: center;
    gap: 10px;

    color: rgba(255,255,255,0.78);
    font-size: 13px;
}

.ahhc-dashboard-row b {
    color: #55d99a;
    font-size: 11px;
    font-weight: 600;
}

.ahhc-mini-icon {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 23px;
    height: 23px;

    border-radius: 7px;

    background: rgba(50,213,131,0.12);
    color: #55d99a;

    font-style: normal;
    font-size: 11px;
}


/* Card Footer */

.ahhc-card-footer {
    display: flex;
    align-items: center;
    gap: 12px;

    margin-top: 8px;
    padding-top: 20px;

    border-top: 1px solid rgba(255,255,255,0.09);
}

.ahhc-avatar-stack {
    display: flex;
    align-items: center;
}

.ahhc-avatar-stack span {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 36px;
    height: 36px;

    margin-right: -8px;

    border: 2px solid #123752;
    border-radius: 50%;

    background: #1699a1;
    color: #ffffff;

    font-size: 10px;
    font-weight: 700;
}

.ahhc-avatar-stack span:last-child {
    background: #32d583;
    color: #063b2a;
}

.ahhc-card-footer p {
    margin: 0;
    color: rgba(255,255,255,0.48);
    font-size: 10px;
    line-height: 1.5;
}

.ahhc-card-footer strong {
    color: rgba(255,255,255,0.8);
    font-size: 11px;
}


/* ==========================================
   ANIMATION
   ========================================== */

@keyframes ahhcFloat {
    0%, 100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-8px);
    }
}


/* ==========================================
   RESPONSIVE
   ========================================== */

@media (max-width: 900px) {

    .ahhc-cta {
        padding: 70px 22px;
    }

    .ahhc-cta-container {
        grid-template-columns: 1fr;
        gap: 50px;
    }

    .ahhc-cta h2 {
        letter-spacing: -1.5px;
    }

    .ahhc-cta-card {
        max-width: 600px;
        width: 100%;
        margin: auto;
    }
}


@media (max-width: 600px) {

    .ahhc-cta {
        padding: 60px 18px;
    }

    .ahhc-cta h2 {
        font-size: 39px;
        line-height: 1.1;
    }

    .ahhc-cta-content > p {
        font-size: 15px;
        line-height: 1.65;
    }

    .ahhc-cta-buttons {
        flex-direction: column;
    }

    .ahhc-btn {
        width: 100%;
    }

    .ahhc-trust {
        gap: 12px 18px;
    }

    .ahhc-cta-card {
        padding: 21px;
        border-radius: 18px;
    }
}
</style>


<script>
/* ==========================================
   ALLEGIANCE CTA INTERACTIONS
   ========================================== */

document.addEventListener("DOMContentLoaded", function () {

    const cta = document.querySelector("#self-management-cta");

    if (!cta) return;

    /* Reveal animation */
    const observer = new IntersectionObserver(
        function(entries) {

            entries.forEach(function(entry) {

                if (entry.isIntersecting) {

                    entry.target.classList.add("ahhc-visible");

                    observer.unobserve(entry.target);
                }

            });

        },
        {
            threshold: 0.15
        }
    );

    observer.observe(cta);


    /* Smooth scroll for internal CTA links */
    cta.querySelectorAll('a[href^="#"]').forEach(function(link) {

        link.addEventListener("click", function(e) {

            const target = document.querySelector(
                this.getAttribute("href")
            );

            if (target) {

                e.preventDefault();

                target.scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });

            }

        });

    });

});
</script>









    <!-- <div class="testimonial-carousel" id="testimonialCarousel">
        <div class="carousel-header">
            <h2>What Our Clients Say</h2>
        </div>
        
        <div class="testimonial-slides">
            <div class="carousel-arrow prev"><i class="fas fa-chevron-left"></i></div>
            <div class="carousel-arrow next"><i class="fas fa-chevron-right"></i></div>
            
            <div class="testimonial-track" id="testimonialTrack">
                @foreach($testimonials as $testimonial)
                <div class="testimonial-slide">
                    <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="{{ $testimonial->name }}" class="testimonial-photo">
                    <p class="testimonial-quote">{{ $testimonial->message }}</p>
                    <div class="testimonial-author">
                        <h4>{{ $testimonial->name }}</h4>
                        <p>{{ $testimonial->position }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <div class="carousel-nav" id="carouselDots">
            @for($i = 0; $i < count($testimonials); $i++)
            <div class="carousel-dot {{ $i === 0 ? 'active' : '' }}" data-index="{{ $i }}"></div>
            @endfor
        </div>
    </div> -->



@include('layouts.testimonial')

    <section class="blog-section">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header">
            <h2 class="section-title">Latest <span class="highlight">Blog Posts</span></h2>
            <p class="section-subtitle">Explore our latest updates and insights.</p>
        </div>

        <!-- Blog Grid -->
        <div class="blog-grid">
            @forelse ($posts as $post)
                <div class="blog-card">
                    <!-- Featured Image -->
                    @if ($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="blog-image">
                    @endif

                    <!-- Content -->
                    <div class="blog-content">
                        <h3 class="blog-title">{{ $post->title }}</h3>
                        <p class="blog-excerpt">{{ $post->excerpt }}</p>
                        <a href="{{ route('blog.show', $post->slug) }}" class="read-more">Read More →</a>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <p>No blog posts available yet. Stay tuned for updates!</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
      <div class="blog-pagination">
    {{ $posts->links() }}

</div>
    </div>
</section>

<style>
    
   .blog-pagination {
    display: flex;
    justify-content: center;
    margin-top: 40px;
}

.blog-pagination .pagination {
    display: flex;
    padding-left: 0;
    list-style: none;
    margin: 0;
}

.blog-pagination .page-link {
    position: relative;
    display: block;
    padding: 0.5rem 0.9rem;
    margin: 0 3px;
    color: #0E3863;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: 6px;
}

.blog-pagination .page-link:hover {
    color: #fff;
    background-color: #0E3863;
    border-color: #0E3863;
}

.blog-pagination .page-item.active .page-link {
    color: #fff;
    background-color: #0E3863;
    border-color: #0E3863;
}

.blog-pagination .page-item.disabled .page-link {
    color: #6c757d;
    background-color: #fff;
} 
    
</style>

   
@include('layouts.faq')













<!-- Service Switch JS -->
<script>


    document.addEventListener('DOMContentLoaded', function() {
            const track = document.getElementById('testimonialTrack');
            const slides = document.querySelectorAll('.testimonial-slide');
            const dots = document.querySelectorAll('.carousel-dot');
            const prevBtn = document.querySelector('.prev');
            const nextBtn = document.querySelector('.next');
            let currentIndex = 0;
            let slideInterval;
            
            // Update carousel position
            function updateCarousel() {
                track.style.transform = `translateX(-${currentIndex * 100}%)`;
                
                // Update dots
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentIndex);
                });
            }
            
            // Go to specific slide
            function goToSlide(index) {
                currentIndex = index;
                updateCarousel();
                resetInterval();
            }
            
            // Next slide
            function nextSlide() {
                currentIndex = (currentIndex + 1) % slides.length;
                updateCarousel();
                resetInterval();
            }
            
            // Previous slide
            function prevSlide() {
                currentIndex = (currentIndex - 1 + slides.length) % slides.length;
                updateCarousel();
                resetInterval();
            }
            
            // Reset auto-rotation interval
            function resetInterval() {
                clearInterval(slideInterval);
                slideInterval = setInterval(nextSlide, 5000);
            }
            
            // Dot click event
            dots.forEach(dot => {
                dot.addEventListener('click', function() {
                    const slideIndex = parseInt(this.getAttribute('data-index'));
                    goToSlide(slideIndex);
                });
            });
            
            // Button events
            prevBtn.addEventListener('click', prevSlide);
            nextBtn.addEventListener('click', nextSlide);
            
            // Keyboard navigation
            document.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowLeft') prevSlide();
                if (e.key === 'ArrowRight') nextSlide();
            });
            
            // Touch support for mobile
            let touchStartX = 0;
            let touchEndX = 0;
            
            track.addEventListener('touchstart', function(e) {
                touchStartX = e.changedTouches[0].screenX;
                clearInterval(slideInterval);
            }, {passive: true});
            
            track.addEventListener('touchend', function(e) {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
                resetInterval();
            }, {passive: true});
            
            function handleSwipe() {
                if (touchEndX < touchStartX - 50) nextSlide();
                if (touchEndX > touchStartX + 50) prevSlide();
            }
            
            // Start auto-rotation
            resetInterval();
        });

    document.addEventListener('DOMContentLoaded', function() {
    // FAQ accordion functionality
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        
        question.addEventListener('click', () => {
            // Close all other items
            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                    otherItem.querySelector('.faq-answer').style.maxHeight = '0';
                    otherItem.querySelector('.faq-answer').style.padding = '0 25px';
                    otherItem.querySelector('.faq-question i').style.transform = 'rotate(0)';
                }
            });
            
            // Toggle current item
            item.classList.toggle('active');
            const answer = item.querySelector('.faq-answer');
            const icon = item.querySelector('.faq-question i');
            
            if (item.classList.contains('active')) {
                answer.style.maxHeight = answer.scrollHeight + 'px';
                answer.style.padding = '0 25px 25px';
                icon.style.transform = 'rotate(180deg)';
            } else {
                answer.style.maxHeight = '0';
                answer.style.padding = '0 25px';
                icon.style.transform = 'rotate(0)';
            }
        });
    });
});



document.addEventListener('DOMContentLoaded', function() {
    // Hero image hover effect
    const heroImage = document.querySelector('.hero-image img');
    if (heroImage) {
        heroImage.parentElement.addEventListener('mouseenter', function() {
            heroImage.style.transform = 'scale(1.05)';
        });
        
        heroImage.parentElement.addEventListener('mouseleave', function() {
            heroImage.style.transform = 'scale(1)';
        });
    }
});






</script>

    
    @endsection