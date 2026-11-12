@extends('layouts.care')
@section('title', 'About Us')

@section('content')

<style>
:root {
    --primary: #1DBFAD;
    --accent: #E53935;
    --gradient: linear-gradient(135deg, #00A0C6 0%, #004E92 100%);
    --dark: #1A1A1A;
    --light: #FFFFFF;
    --gray: #6C757D;
    --light-bg: #F8F9FA;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    color: var(--dark);
    background-color: var(--light-bg);
    overflow-x: hidden;
}

.about-hero {
    min-height: 90vh;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, rgba(0,160,198,0.05) 0%, rgba(0,78,146,0.05) 100%);
}

.hero-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 40px;
    display: flex;
    align-items: center;
    gap: 50px;
    position: relative;
    z-index: 2;
}

.hero-content {
    flex: 1;
}

.hero-image {
    flex: 1;
    position: relative;
    min-width: 400px;
}

.hero-image::before {
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

.hero-image img {
    width: 100%;
    border-radius: 16px;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
    transform: perspective(1000px) rotateY(-10deg);
    transition: transform 0.5s ease;
}

.hero-image:hover img {
    transform: perspective(1000px) rotateY(-5deg);
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 20px;
    position: relative;
}

.hero-title span {
    background: var(--gradient);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    position: relative;
}

.hero-title span::after {
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

.hero-subtitle {
    font-size: 1.25rem;
    color: var(--gray);
    line-height: 1.8;
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
    animation: float 15s infinite ease-in-out;
}

.element-1 {
    width: 300px;
    height: 300px;
    background: var(--gradient);
    top: 20%;
    left: -100px;
    animation-delay: 0s;
}

.element-2 {
    width: 150px;
    height: 150px;
    background-color: var(--accent);
    bottom: 20%;
    right: 10%;
    animation-delay: 2s;
}

.element-3 {
    width: 200px;
    height: 200px;
    background: var(--gradient);
    top: 60%;
    right: -50px;
    animation-delay: 4s;
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

.shape-divider {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
    transform: rotate(180deg);
}

.shape-divider svg {
    position: relative;
    display: block;
    width: calc(100% + 1.3px);
    height: 100px;
}

.shape-divider .shape-fill {
    fill: var(--light-bg);
}

@media (max-width: 992px) {
    .hero-container {
        flex-direction: column;
        text-align: center;
        padding: 100px 40px 60px;
    }
    
    .hero-image {
        min-width: auto;
        max-width: 500px;
        order: -1;
    }
    
    .hero-subtitle {
        margin-left: auto;
        margin-right: auto;
    }
    
    .hero-title {
        font-size: 2.8rem;
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.2rem;
    }
    
    .hero-subtitle {
        font-size: 1.1rem;
    }
    
    .btn {
        padding: 12px 30px;
    }
    
    .hero-container {
        padding: 80px 20px 40px;
    }
}


.our-story-section {
            position: relative;
            padding: 3rem 0;
            overflow: hidden;
        }
        
        @media (min-width: 768px) {
            .our-story-section {
                padding: 5rem 0;
            }
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            position: relative;
            z-index: 10;
        }
        
        /* Decorative elements */
        .decorative-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.05;
            z-index: 0;
        }
        
        .decorative-bg div:first-child {
            position: absolute;
            top: 5rem;
            left: 2.5rem;
            width: 10rem;
            height: 10rem;
            border-radius: 50%;
            background: linear-gradient(to right, var(--gradient-start), var(--gradient-end));
            filter: blur(20px);
        }
        
        .decorative-bg div:last-child {
            position: absolute;
            bottom: 2.5rem;
            right: 2.5rem;
            width: 15rem;
            height: 15rem;
            border-radius: 50%;
            background-color: var(--primary);
            filter: blur(20px);
        }
        
        /* Section header */
        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }
        
        .section-tag {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: var(--primary);
            color: var(--text-light);
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .section-title {
            font-size: 2.25rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1.5rem;
        }
        
        @media (min-width: 768px) {
            .section-title {
                font-size: 3rem;
            }
        }
        
        .section-title span {
            color: var(--primary);
        }
        
        
         .mission-card, .vision-card{
             display:flex !important;
             
         }
        
        
        
        .section-divider {
            width: 6rem;
            height: 0.125rem;
            background: linear-gradient(to right, var(--gradient-start), var(--gradient-end));
            margin: 0 auto;
        }
        
        /* Story timeline */
        .story-timeline {
            max-width: 72rem;
            margin: 0 auto;
        }
        
        .story-item {
            display: flex;
            flex-direction: column;
            margin-bottom: 4rem;
            position: relative;
        }
        
        @media (min-width: 768px) {
            .story-item {
                flex-direction: row;
            }
            
            /* Timeline connector */
            .story-item:not(:last-child)::after {
                content: '';
                position: absolute;
                left: 25%;
                top: 6.25rem;
                bottom: -5rem;
                width: 2px;
                background: linear-gradient(to bottom, var(--primary), var(--gradient-end));
                transform: translateX(-50%);
                z-index: -1;
            }
            
            .story-item.right-aligned::after {
                left: 75%;
            }
        }
        
        .story-card-container {
            width: 100%;
            padding-right: 2.5rem;
            margin-bottom: 1.5rem;
        }
        
        @media (min-width: 768px) {
            .story-card-container {
                width: 33.3333%;
                margin-bottom: 0;
            }
            
            .right-aligned .story-card-container {
                order: 2;
            }
        }
        
        .story-card {
            background: linear-gradient(to bottom right, var(--gradient-start), var(--gradient-end));
            padding: 0.125rem;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .story-item:hover .story-card {
            transform: translateY(-0.5rem);
        }
        
        .story-card-inner {
            background-color: var(--bg);
            border-radius: 0.375rem;
            padding: 1.5rem;
            height: 100%;
        }
        
        .story-card-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }
        
        .story-card-date {
            font-size: 0.875rem;
            color: #6B7280;
        }
        
        .story-content {
            width: 100%;
        }
        
        @media (min-width: 768px) {
            .story-content {
                width: 66.6666%;
            }
            
            .right-aligned .story-content {
                padding-right: 2.5rem;
                order: 1;
            }
        }
        
        .story-text {
            font-size: 1.125rem;
            color: var(--text-dark);
            line-height: 1.75;
        }
        
        /* Mission highlight */
        .mission-highlight {
            margin-top: 5rem;
            background: linear-gradient(to right, var(--gradient-start), var(--gradient-end));
            border-radius: 0.75rem;
            padding: 2rem;
            color: var(--text-light);
            text-align: center;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        @media (min-width: 768px) {
            .mission-highlight {
                padding: 3rem;
            }
        }
        
        .mission-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        
        @media (min-width: 768px) {
            .mission-title {
                font-size: 1.875rem;
            }
        }
        
        .mission-features {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
            margin-top: 2rem;
        }
        
        @media (min-width: 768px) {
            .mission-features {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (min-width: 1024px) {
            .mission-features {
                grid-template-columns: repeat(4, 1fr);
            }
        }
        
        .feature-card {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 1.5rem;
            border-radius: 0.5rem;
            backdrop-filter: blur(10px);
        }
        
        .feature-icon {
            width: 3rem;
            height: 3rem;
            background-color: var(--primary);
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }
        
        .feature-icon svg {
            width: 1.5rem;
            height: 1.5rem;
            color: var(--text-light);
        }
        
        .feature-title {
            font-size: 1.125rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .feature-description {
            font-size: 0.875rem;
            opacity: 0.9;
        }
        
        /* CTA */
        .cta-section {
            text-align: center;
            margin-top: 5rem;
        }
        
        .cta-title {
            font-size: 1.875rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1.5rem;
        }
        
        .cta-text {
            font-size: 1.25rem;
            color: #4B5563;
            max-width: 42rem;
            margin: 0 auto 2rem;
        }
        
        .cta-button {
            display: inline-block;
            padding: 1rem 2rem;
            background-color: var(--accent);
            color: var(--text-light);
            font-weight: 700;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .cta-button:hover {
            background-color: #D32F2F;
            transform: scale(1.05);
        }



        .container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    position: relative;
}

/* Mission & Vision Section */
.mission-vision {
    padding: 5rem 0;
    position: relative;
    overflow: hidden;
}

/* Decorative Elements */
.decorative-circle {
    position: absolute;
    border-radius: 50%;
    filter: blur(60px);
    opacity: 0.15;
    z-index: 0;
}

.circle-1 {
    width: 300px;
    height: 300px;
    background: var(--gradient-start);
    top: -50px;
    left: -50px;
}

.circle-2 {
    width: 400px;
    height: 400px;
    background: var(--primary);
    bottom: -100px;
    right: -100px;
}

.circle-3 {
    width: 200px;
    height: 200px;
    background: var(--gradient-end);
    top: 30%;
    right: 10%;
}

/* Section Header */
.section-header {
    text-align: center;
    margin-bottom: 4rem;
    position: relative;
    z-index: 1;
}

.section-badge {
    display: inline-block;
    padding: 0.5rem 1.5rem;
    background-color: var(--primary);
    color: var(--text-light);
    border-radius: 2rem;
    font-size: 0.9rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 1.5rem;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    line-height: 1.2;
}

.section-title span {
    color: var(--primary);
    position: relative;
}

.section-divider {
    width: 80px;
    height: 4px;
    background: linear-gradient(to right, var(--gradient-start), var(--gradient-end));
    margin: 0 auto;
    border-radius: 2px;
}

/* Mission/Vision Grid */
.mv-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2rem;
    position: relative;
    z-index: 1;
}

@media (min-width: 992px) {
    .mv-grid {
        grid-template-columns: 1fr 1fr;
    }
}

/* Mission/Vision Cards */
.mv-card {
    background: var(--bg);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
}

.mv-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
}

.card-header {
    padding: 2rem 2rem 1rem;
    position: relative;
}

.card-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, rgba(29, 191, 173, 0.1) 0%, rgba(0, 160, 198, 0.1) 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
}

.icon-img {
    width: 40px;
    height: 40px;
    object-fit: contain;
}

.card-title {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: var(--text-dark);
}

.mission-card .card-title {
    color: var(--gradient-start);
}

.vision-card .card-title {
    color: var(--gradient-end);
}

.card-content {
    padding: 0 2rem 2rem;
    flex-grow: 1;
}

.card-content p {
    margin-bottom: 1.5rem;
    font-size: 1.1rem;
    color: #555;
}

.card-image {
    height: 250px;
    overflow: hidden;
}

.content-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.mv-card:hover .content-img {
    transform: scale(1.05);
}

/* Mission Card Specific */
.highlight-box {
    background: rgba(29, 191, 173, 0.1);
    border-left: 4px solid var(--primary);
    padding: 1.5rem;
    margin: 1.5rem 0;
    border-radius: 0 8px 8px 0;
}

.highlight-box p {
    font-style: italic;
    font-weight: 600;
    color: var(--text-dark);
    margin: 0;
    font-size: 1.1rem;
}

.highlight-box i {
    color: var(--primary);
    opacity: 0.7;
}

/* Vision Card Specific */
.vision-statement {
    margin: 2rem 0;
}

.vision-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 1rem;
}

.vision-item i {
    color: var(--gradient-end);
    margin-right: 1rem;
    margin-top: 0.2rem;
    font-size: 1.2rem;
}

.vision-item p {
    margin: 0;
    flex: 1;
}

/* Values Section */
.values-section {
    background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
    border-radius: 16px;
    padding: 3rem 2rem;
    margin-top: 4rem;
    position: relative;
    z-index: 1;
    overflow: hidden;
    box-shadow: var(--shadow);
}

.values-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('https://via.placeholder.com/1920x1080/004E92/FFFFFF?text=Texture') center/cover;
    opacity: 0.05;
    z-index: -1;
}

.values-title {
    text-align: center;
    color: var(--text-light);
    font-size: 2rem;
    margin-bottom: 3rem;
    font-weight: 700;
}

.values-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
}

.value-card {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border-radius: 12px;
    padding: 2rem 1.5rem;
    text-align: center;
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: transform 0.3s ease;
}

.value-card:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.25);
}

.value-icon {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 1.5rem;
    color: var(--text-light);
}

.value-name {
    color: var(--text-light);
    font-size: 1.3rem;
    margin-bottom: 1rem;
    font-weight: 600;
}

.value-desc {
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.95rem;
    margin: 0;
}




.philosophy-section {
            background: linear-gradient(135deg, rgba(0, 160, 198, 0.1) 0%, rgba(29, 191, 173, 0.15) 100%);
            padding: 5rem 0;
            position: relative;
            overflow: hidden;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .philosophy-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 3rem;
        }

        @media (min-width: 992px) {
            .philosophy-content {
                flex-direction: row;
                align-items: stretch;
            }
        }

        .philosophy-image {
            flex: 1;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transform: rotate(-2deg);
            transition: transform 0.5s ease;
            min-height: 400px;
            position: relative;
        }

        .philosophy-image:hover {
            transform: rotate(0deg) scale(1.02);
        }

        .philosophy-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s ease;
        }

        .philosophy-image:hover img {
            transform: scale(1.05);
        }

        .philosophy-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(0, 160, 198, 0.3) 0%, rgba(29, 191, 173, 0.2) 100%);
            z-index: 1;
            mix-blend-mode: multiply;
        }

        .philosophy-text {
            flex: 1;
            background: white;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            position: relative;
            z-index: 2;
        }

        .section-badge {
            display: inline-block;
            padding: 0.5rem 1.5rem;
            background-color: var(--primary);
            color: var(--text-light);
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 1.5rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            color: var(--text-dark);
        }

        .section-title span {
            color: var(--primary);
            position: relative;
        }

        .section-divider {
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--gradient-start), var(--gradient-end));
            margin: 1.5rem 0;
            border-radius: 2px;
        }

        .philosophy-description {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
            margin-bottom: 2rem;
        }

        .philosophy-points {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
            margin-top: 2rem;
        }

        @media (min-width: 768px) {
            .philosophy-points {
                grid-template-columns: 1fr 1fr;
            }
        }

        .point-card {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1.5rem;
            background: rgba(29, 191, 173, 0.05);
            border-radius: 12px;
            transition: all 0.3s ease;
            border-left: 4px solid var(--primary);
        }

        .point-card:hover {
            background: rgba(29, 191, 173, 0.1);
            transform: translateY(-5px);
        }

        .point-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--gradient-start), var(--primary));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .point-content h4 {
            font-size: 1.2rem;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .point-content p {
            font-size: 0.95rem;
            color: #666;
            line-height: 1.6;
        }

        .decorative-shape {
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(0, 160, 198, 0.08);
            z-index: 0;
        }

        .shape-1 {
            top: -50px;
            right: -50px;
            width: 300px;
            height: 300px;
        }

        .shape-2 {
            bottom: -100px;
            left: -50px;
            width: 250px;
            height: 250px;
            background: rgba(29, 191, 173, 0.08);
        }

        .watermark {
            position: absolute;
            font-size: 15rem;
            font-weight: 900;
            color: rgba(0, 160, 198, 0.03);
            z-index: 0;
            bottom: -50px;
            right: -30px;
            line-height: 1;
            pointer-events: none;
            user-select: none;
        }

        :root {
            --primary: #1DBFAD;
            --accent: #E53935;
            --gradient-start: #00A0C6;
            --gradient-end: #004E92;
            --bg: #FFFFFF;
            --text-dark: #1A1A1A;
            --text-light: #FFFFFF;
            --card-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.1);
            --transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .values-section {
            width: 100%;
            padding: 100px 0;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            position: relative;
            overflow: hidden;
        }

        .container-values {
            width: 90%;
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
            z-index: 10;
        }

        .section-header {
            text-align: center;
            margin-bottom: 70px;
        }

        .section-badge {
            display: inline-block;
            padding: 12px 28px;
            background: linear-gradient(90deg, var(--gradient-start), var(--gradient-end));
            color: var(--text-light);
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 25px;
            box-shadow: 0 10px 20px rgba(0, 160, 198, 0.2);
        }

        .section-title {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
            color: var(--text-dark);
            background: linear-gradient(90deg, var(--gradient-start), var(--gradient-end));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }

        .section-description {
            font-size: 18px;
            color: #555;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.8;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .value-card {
            background: var(--bg);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            position: relative;
            z-index: 1;
            border: 1px solid rgba(0, 0, 0, 0.03);
        }

        .value-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0, 160, 198, 0.03) 0%, rgba(29, 191, 173, 0.03) 100%);
            z-index: -1;
        }

        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 60px -10px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            height: 200px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
        }

        .card-icon {
            width: 90px;
            height: 90px;
            background: var(--gradient-start);
            backdrop-filter: blur(8px);
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            transition: var(--transition);
        }

        .value-card:hover .card-icon {
            transform: scale(1.1) rotate(5deg);
            background: rgba(255, 255, 255, 0.3);
        }

        .card-body {
            padding: 35px;
            text-align: center;
        }

        .value-name {
            font-size: 22px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        .value-name::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: var(--primary);
            border-radius: 3px;
            transition: var(--transition);
        }

        .value-card:hover .value-name::after {
            width: 70px;
            background: var(--accent);
        }

        .value-description {
            font-size: 16px;
            color: #666;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        .value-number {
            position: absolute;
            top: 25px;
            right: 25px;
            font-size: 60px;
            font-weight: 900;
            color: rgba(255, 255, 255, 0.15);
            line-height: 1;
            transition: var(--transition);
        }

        .value-card:hover .value-number {
            transform: scale(1.1);
            color: rgba(255, 255, 255, 0.2);
        }

        /* Decorative elements */
        .decorative-shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.2;
            z-index: 1;
        }

        .shape-1 {
            width: 400px;
            height: 400px;
            background: var(--gradient-start);
            top: -100px;
            left: -100px;
            animation: float 8s ease-in-out infinite;
        }

        .shape-2 {
            width: 500px;
            height: 500px;
            background: var(--primary);
            bottom: -150px;
            right: -150px;
            animation: float 10s ease-in-out infinite reverse;
        }

        .shape-3 {
            width: 300px;
            height: 300px;
            background: var(--accent);
            top: 30%;
            right: 10%;
            animation: float 12s ease-in-out infinite 2s;
        }

        /* Animation */
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(2deg); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .values-section {
                padding: 70px 0;
            }
            
            .section-title {
                font-size: 36px;
            }
            
            .section-description {
                font-size: 16px;
            }
            
            .values-grid {
                grid-template-columns: 1fr;
            }
            
            .card-header {
                height: 160px;
            }
        }



        .services-section {
            width: 100%;
            padding: 100px 0;
            background-color: #f9fafc;
            position: relative;
            overflow: hidden;
        }

        .container-service {
            width: 90%;
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
            z-index: 10;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-badge {
            display: inline-block;
            padding: 10px 25px;
            background: linear-gradient(90deg, var(--gradient-start), var(--gradient-end));
            color: var(--text-light);
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0, 160, 198, 0.2);
        }

        .section-title {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 15px;
            line-height: 1.2;
            color: var(--text-dark);
        }

        .section-title span {
            background: linear-gradient(90deg, var(--gradient-start), var(--gradient-end));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-description {
            font-size: 18px;
            color: #555;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.8;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .service-card {
            background: var(--bg);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
        }

        .service-card.featured {
            border: 2px solid var(--primary);
            box-shadow: 0 15px 40px rgba(29, 191, 173, 0.2);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .service-image {
            height: 220px;
            position: relative;
            overflow: hidden;
        }

        .service-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .service-card:hover .service-image img {
            transform: scale(1.05);
        }

        .featured-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--accent);
            color: white;
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            z-index: 2;
        }

        .service-content {
            padding: 30px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .service-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, rgba(0, 160, 198, 0.1) 0%, rgba(29, 191, 173, 0.1) 100%);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: var(--primary);
            margin-bottom: 20px;
        }

        .service-title {
            font-size: 22px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 15px;
        }

        .service-description {
            font-size: 16px;
            color: #666;
            line-height: 1.8;
            margin-bottom: 20px;
            flex-grow: 1;
        }

        .service-link {
            display: inline-flex;
            align-items: center;
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
        }

        .service-link i {
            margin-left: 8px;
            transition: var(--transition);
        }

        .service-link:hover {
            color: var(--gradient-end);
        }

        .service-link:hover i {
            transform: translateX(5px);
        }

        /* Decorative elements */
        .decorative-shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.15;
            z-index: 1;
        }

        .shape-1 {
            width: 400px;
            height: 400px;
            background: var(--gradient-start);
            top: -100px;
            left: -100px;
        }

        .shape-2 {
            width: 500px;
            height: 500px;
            background: var(--primary);
            bottom: -150px;
            right: -150px;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .services-grid {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .services-section {
                padding: 70px 0;
            }
            
            .section-title {
                font-size: 36px;
            }
            
            .section-description {
                font-size: 16px;
            }
        }
</style>



<section class="about-hero">
    <div class="floating-elements">
        <div class="floating-element element-1"></div>
        <div class="floating-element element-2"></div>
        <div class="floating-element element-3"></div>
    </div>
    
    <div class="hero-container">
        <div class="hero-content">
            <h1 class="hero-title">Our <span>Story</span> of Compassionate Care</h1>
            <p class="hero-subtitle">At Allegiance Heart &amp; Home Care, our journey began with a simple but powerful
mission to deliver personalised, high-quality care that respects dignity, values
individuality, and supports independent living. Backed by a team with decades of
combined experience, we’re proud to be making a meaningful difference in the lives
of those we serve.</p>
            <a href="#our-story" class="btn btn-primary">Discover Our Journey</a>
        </div>
        
        <div class="hero-image">
            <img src="https://cdn.prod.website-files.com/66e0bae286385c11f5c17328/670eb024bd77795c4592b80b_Universal%20Stock%20Photos%20(3)-p-1600.png" alt="My Guardian care team">
        </div>
    </div>
    
    <div class="shape-divider">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
        </svg>
    </div>
</section>

<section class="our-story-section">
        <!-- Decorative elements -->
        <div class="decorative-bg">
            <div></div>
            <div></div>
        </div>

        <div class="container">
            <!-- Section header -->
            <div class="section-header">
                <span class="section-tag">Our Journey</span>
                <h2 class="section-title">
                    Compassion You Can Trust, <span>Care You Deserve</span>
                </h2>
                <div class="section-divider"></div>
            </div>

            <!-- Story timeline -->
            <div class="story-timeline">
                <!-- Story item 1 -->
                <div class="story-item">
                    <div class="story-card-container">
                        <div class="story-card">
                            <div class="story-card-inner">
                                <h3 class="story-card-title">Our Humble Beginnings</h3>
                                <p class="story-card-date">2024</p>
                            </div>
                        </div>
                    </div>
                    <div class="story-content">
                        <p class="story-text">
                            Allegiance Heart &amp; Home Care was founded with a heartfelt mission: To deliver care
that empowers individuals to live with dignity, comfort, and independence in their
own homes. Our leadership team brings decades of combined experience in aged
care and disability support. We saw a need for more personalised, culturally
sensitive, and community-focused care and Allegiance was born.
                        </p>
                    </div>
                </div>

                <!-- Story item 2 -->
                <div class="story-item right-aligned">
                    <div class="story-card-container">
                        <div class="story-card" style="background: linear-gradient(to bottom right, var(--primary), var(--gradient-end));">
                            <div class="story-card-inner">
                                <h3 class="story-card-title">Building A New Standard of Care</h3>
                                <p class="story-card-date">2025</p>
                            </div>
                        </div>
                    </div>
                    <div class="story-content">
                        <p class="story-text">
                            From the outset, we’ve embraced a model of care that blends professional
excellence with compassion and respect. Our growing team of dedicated
professionals is committed to providing services that are tailored, inclusive, and truly
person-centred. We’re proud to be building a reputation for quality, flexibility, and
trust across the communities we serve.
                        </p>
                    </div>
                </div>

                <!-- Story item 3 -->
                <div class="story-item">
                    <div class="story-card-container">
                        <div class="story-card" style="background: linear-gradient(to bottom right, var(--gradient-start), var(--primary));">
                            <div class="story-card-inner">
                                <h3 class="story-card-title">Today & Beyond</h3>
                                <p class="story-card-date">Present</p>
                            </div>
                        </div>
                    </div>
                    <div class="story-content">
                        <p class="story-text">
                            Our journey has just begun but our vision is clear. We’re committed to setting a new
benchmark in in-home care and Disability, where every individual regardless of age,
ability, or background has access to exceptional support. At Allegiance, every step
forward is guided by the lives we touch and the trust we build.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Mission highlight -->
            <div class="mission-highlight">
                <h3 class="mission-title">Our Promise to You</h3>
                <div class="mission-features">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <h4 class="feature-title">Culturally Respectful Care</h4>
                        <p class="feature-description">We honour your culture, language, and beliefs delivering support that truly respects
who you are.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <h4 class="feature-title">Tailored Support</h4>
                        <p class="feature-description">No two individuals are the same. Your care plan is thoughtfully tailored to meet your
unique needs and lifestyle.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h4 class="feature-title">Trusted Professionals</h4>
                        <p class="feature-description">Our dedicated professionals are thoroughly trained and deeply committed to
delivering care with empathy and excellence.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h4 class="feature-title">Care Where You Are</h4>
                        <p class="feature-description">From city centres to regional communities, we proudly offer consistent, high-quality
support across Australia.</p>
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <div class="cta-section">
                <h3 class="cta-title">Join Us on This Journey</h3>
                <p class="cta-text">
                   Because care isn’t just a service; it’s a heartfelt promise to walk beside you with
empathy, respect, and unwavering dedication to your wellbeing.
                </p>
                <a href="/contact" class="cta-button">Send a Feedback</a>
            </div>
        </div>
    </section>

 


<section class="mission-vision">
        <!-- Decorative elements -->
        <div class="decorative-circle circle-1"></div>
        <div class="decorative-circle circle-2"></div>
        <div class="decorative-circle circle-3"></div>
        
        <div class="container">
            <!-- Section header -->
            <div class="section-header">
                <span class="section-badge">Our Core</span>
                <h2 class="section-title">Guiding Principles: <span>Mission & Vision</span></h2>
                <div class="section-divider"></div>
            </div>

            <div class="mv-grid">

                <!-- Vision Card -->
                <div class="mv-card vision-card">
                    <div class="card-header">
                     
                        <h3 class="card-title text-light">Our Vision</h3>
                    </div>
                    <div class="card-content">
                        <p>To become Australia’s most trusted provider of home care, disability, and aged care
services. Recognised for our heartfelt compassion, ethical standards, and
unwavering commitment to those we serve.</p>
                        <div class="vision-statement">
                            <div class="vision-item">
                                <i class="fas fa-star"></i>
                                <p>Where every individual has access to high-quality, person-centred support.</p>
                            </div>
                            <div class="vision-item">
                                <i class="fas fa-star"></i>
                                <p>Where we set new benchmarks for excellence in care.</p>
                            </div>
                            <div class="vision-item">
                                <i class="fas fa-star"></i>
                                <p>Where we inspire lasting confidence through compassion, integrity, and respect.</p>
                            </div>
                        </div>
                    </div>
                 </div>
                </div>
            </div>






                <!-- Mission Card -->
                <div class="mv-card mission-card">
                    <div class="card-header">
                        
                        <h3 class="card-title text-light">Our Mission</h3>
                    </div>
                    <div class="card-content">
                        <p>At Allegiance Heart &amp; Home Care, our mission is to empower individuals to live
safely, independently, and joyfully in their own homes and communities through
compassionate, person-centred care.</p>
                        <div class="highlight-box">
                            <p><i class="fas fa-quote-left"></i> Compassion You Can Trust, Care You Deserve <i class="fas fa-quote-right"></i></p>
                        </div>
                        <p>We are committed to delivering services that go beyond meeting practical needs
enriching lives by honouring each person’s choices, individuality, and dignity. As a
trusted partner in care, we strive to enhance quality of life and support lasting
independence for every individual we serve.</p>
                    </div>
                    
                </div>


            <!-- Values Section -->
            
        </div>
    </section>

    <section class="philosophy-section">
        <div class="decorative-shape shape-1"></div>
        <div class="decorative-shape shape-2"></div>
        <span class="watermark">CARE</span>
        
        <div class="container">
            <div class="philosophy-content">
                <div class="philosophy-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1HoDZVbb8sPqLovOQN-YE2pSnFyEWDWlyJcb4cq11wA&s=10">
                </div>
                
                <div class="philosophy-text">
                    <span class="section-badge">Our Philosophy</span>
                    <h2 class="section-title">The Heart Behind <span>Our Care</span></h2>
                    <div class="section-divider"></div>
                    
                    <p class="philosophy-description">
                        At Allegiance Heart &amp; Home Care, we believe that truly exceptional care begins with

understanding everyone’s unique journey. Our philosophy is grounded in
compassion, dignity, and the belief that every person deserves holistic support care
that honours the body, nurtures the mind, and uplifts the spirit.
                    </p>
                    
                    <div class="philosophy-points">
                        <div class="point-card">
                            <div class="point-icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="point-content">
                                <h4>Person-Centered Approach</h4>
                                <p>We start by listening with empathy and respect so we can tailor our care to
everyone’s unique needs, preferences, and life story.</p>
                            </div>
                        </div>
                        
                        <div class="point-card">
                            <div class="point-icon">
                                <i class="fas fa-hands-helping"></i>
                            </div>
                            <div class="point-content">
                                <h4>Dignity in Care</h4>
                                <p>We ensure every interaction upholds and enhances the dignity, respect, and
individuality of those we support.</p>
                            </div>
                        </div>
                        
                        <div class="point-card">
                            <div class="point-icon">
                                <i class="fas fa-home"></i>
                            </div>
                            <div class="point-content">
                                <h4>Home as Sanctuary</h4>
                                <p>We believe home should be a place of safety, comfort, and dignity. That’s why we
deliver high-quality care right where it matters most at home, supporting
independence every step of the way.</p>
                            </div>
                        </div>
                        
                        <div class="point-card">
                            <div class="point-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="point-content">
                                <h4>Family Partnership</h4>
                                <p>We believe in working together with families valuing their insight and involvement to
create a care experience that’s supportive, personalised, and truly aligned with their
loved one’s needs.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="values-section">
        <div class="decorative-shape shape-1"></div>
        <div class="decorative-shape shape-2"></div>
        <div class="decorative-shape shape-3"></div>
        
        <div class="container-values">
            <div class="section-header">
                <span class="section-badge">Our Foundation</span>
                <h2 class="section-title">Core Values That Define Us</h2>
                <p class="section-description">
                    These principles guide every decision we make and every interaction we have, ensuring we deliver the exceptional care you deserve.
                </p>
            </div>

            <div class="values-grid">
                <!-- Value 1 -->
                <div class="value-card">
                    <div class="value-number">01</div>
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="value-name">Compassionate Care</h3>
                        <p class="value-description">
                           We deliver every service with genuine empathy, warmth, and respect caring for each
person as we would for our own family, with kindness at the heart of everything we
do
                        </p>
                    </div>
                </div>

                <!-- Value 2 -->
                <div class="value-card">
                    <div class="value-number">02</div>
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="value-name">Unwavering Integrity</h3>
                        <p class="value-description">
                            We uphold the highest ethical standards, fostering trust through transparency,
honesty, and accountability in every service we provide and every relationship we
build.
                        </p>
                    </div>
                </div>

                <!-- Value 3 -->
                <div class="value-card">
                    <div class="value-number">03</div>
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="value-name">Deep Respect</h3>
                        <p class="value-description">
                            We honour each person’s dignity, autonomy, and cultural heritage fostering an
environment built on empathy, inclusion, and mutual understanding.
                        </p>
                    </div>
                </div>

                <!-- Value 4 -->
                <div class="value-card">
                    <div class="value-number">04</div>
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="value-name">Relentless Excellence</h3>
                        <p class="value-description">
                            We are committed to continuous improvement setting new standards in quality care
                        </p>
                    </div>
                </div>

                <!-- Value 5 -->
                <div class="value-card">
                    <div class="value-number">05</div>
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="value-name">True Partnership</h3>
                        <p class="value-description">
                            We collaborate closely with clients, families, and professionals to create customized care solutions that work.through innovation, precision, and an unwavering focus on the details that matter
most.
                        </p>
                    </div>
                </div>

                <!-- Value 6 -->
                <div class="value-card">
                    <div class="value-number">06</div>
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="value-name">Innovative Spirit</h3>
                        <p class="value-description">
                           We work together with clients/consumer, families, and professionals to co-create
personalised care solutions built on trust, communication, and shared goals.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>




@include('layouts.services')





    
@endsection


