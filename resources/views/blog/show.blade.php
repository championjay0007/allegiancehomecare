@extends('layouts.care')

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

.single-blog-section {
        padding: 100px 0;
        background: var(--light-bg);
        position: relative;
        overflow: hidden;
    }

    .single-blog-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 300px;
        background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
        z-index: 0;
        clip-path: ellipse(100% 80% at 50% 0%);
    }

    .container {
        position: relative;
        z-index: 1;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .blog-header {
        text-align: center;
        margin-bottom: 50px;
        position: relative;
    }

    .blog-header h1 {
        font-size: 2.8rem;
        color: white;
        margin-bottom: 15px;
        font-weight: 700;
        line-height: 1.3;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .blog-meta {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        color: rgba(255,255,255,0.9);
        font-size: 1.05rem;
        margin-bottom: 30px;
    }

    .blog-meta .divider {
        width: 6px;
        height: 6px;
        background: var(--primary);
        border-radius: 50%;
    }

    .category {
        background: rgba(255,255,255,0.15);
        padding: 5px 15px;
        border-radius: 50px;
        color: white;
        font-weight: 600;
        backdrop-filter: blur(5px);
        transition: all 0.3s ease;
    }

    .category:hover {
        background: var(--primary);
        transform: translateY(-2px);
    }

    .blog-featured-image {
        position: relative;
        margin-bottom: 50px;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: var(--card-shadow);
        transform: translateY(0);
        transition: transform 0.3s ease;
    }

    .blog-featured-image:hover {
        transform: translateY(-5px);
    }

    .blog-featured-image img {
        width: 100%;
        max-height: 500px;
        object-fit: cover;
        display: block;
    }

    .image-caption {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 15px 25px;
        background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
        color: white;
        font-size: 0.9rem;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .blog-featured-image:hover .image-caption {
        opacity: 1;
    }

    .blog-body {
        background: white;
        padding: 50px;
        border-radius: 16px;
        box-shadow: var(--card-shadow);
        font-size: 1.1rem;
        color: var(--dark);
        line-height: 1.8;
        position: relative;
    }

    .blog-body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
        background: linear-gradient(to bottom, var(--gradient-start), var(--gradient-end));
        border-radius: 16px 0 0 16px;
    }

    .blog-body h2 {
        color: var(--gradient-end);
        margin: 40px 0 20px;
        font-weight: 600;
    }

    .blog-body p {
        margin-bottom: 25px;
    }

    .blog-body a {
        color: var(--primary);
        text-decoration: none;
        border-bottom: 2px solid rgba(29, 191, 173, 0.3);
        transition: all 0.3s ease;
    }

    .blog-body a:hover {
        color: var(--gradient-end);
        border-bottom-color: var(--gradient-end);
    }

    .blog-body blockquote {
        border-left: 4px solid var(--primary);
        padding-left: 25px;
        margin: 30px 0;
        font-style: italic;
        color: var(--gray);
        background: rgba(29, 191, 173, 0.05);
        padding: 20px;
        border-radius: 0 8px 8px 0;
    }

    /* Floating share buttons */
    .share-buttons {
        position: fixed;
        left: 30px;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
        gap: 15px;
        z-index: 10;
    }

    .share-button {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        color: var(--dark);
    }

    .share-button:hover {
        transform: scale(1.1);
        color: var(--primary);
    }

    @media (max-width: 992px) {
        .blog-header h1 {
            font-size: 2.2rem;
        }
        
        .blog-body {
            padding: 30px;
        }
        
        .share-buttons {
            left: 15px;
        }
    }

    @media (max-width: 768px) {
        .single-blog-section {
            padding: 70px 0;
        }
        
        .blog-header h1 {
            font-size: 1.8rem;
        }
        
        .blog-meta {
            flex-direction: column;
            gap: 10px;
        }
        
        .blog-body {
            padding: 25px 20px;
        }
        
        .share-buttons {
            position: static;
            flex-direction: row;
            justify-content: center;
            margin: 40px 0;
            transform: none;
        }
        
    }










</style>


<section class="single-blog-section">
    <div class="container">
        <!-- Floating share buttons -->
        <div class="share-buttons">
            <a href="#" class="share-button" aria-label="Share on Facebook">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="share-button" aria-label="Share on Twitter">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="share-button" aria-label="Share on LinkedIn">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="#" class="share-button" aria-label="Copy link">
                <i class="fas fa-link"></i>
            </a>
        </div>

        <div class="blog-header">
            <h1>{{ $post->title }}</h1>
            <div class="blog-meta">
                <span>Posted on {{ $post->created_at->format('F d, Y') }}</span>
                @if($post->category)
                <span class="divider"></span>
                <a href="#" class="category">{{ $post->category->name }}</a>
                @endif
            </div>
        </div>

        <div class="blog-featured-image">
            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}">
            <div class="image-caption">{{ $post->title }}</div>
        </div>

        <div class="blog-body">
            {!! $post->content !!}
        </div>
    </div>
</section>







<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<script>
    // Simple animation for elements when they come into view
    document.addEventListener('DOMContentLoaded', function() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = 1;
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });

        const animatedElements = document.querySelectorAll('.blog-header, .blog-featured-image, .blog-body');
        animatedElements.forEach(el => {
            el.style.opacity = 0;
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'all 0.6s ease-out';
            observer.observe(el);
        });
    });
</script>
@endsection