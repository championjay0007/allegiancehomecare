@extends('layouts.care')

@section('content')
<!-- Blog Hero Section -->
@extends('layouts.care')

@section('content')
<!-- Blog Hero Section -->
<section class="blog-hero">
    <div class="container">
        <div class="hero-content">
            <h1>Our Latest <span class="highlight">Insights</span></h1>
            <p>Discover helpful articles and resources about care services</p>
        </div>
    </div>
</section>

<!-- Blog Content Section -->
<section class="blog-listing">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">Blog Articles</span>
            <h2>Care <span class="text-gradient">Knowledge</span> Center</h2>
            <p class="section-description">Expert advice and practical tips for caregivers and families</p>
        </div>

        <!-- Blog Grid -->
        <div class="blog-grid">
            @foreach($blogs as $blog)
            <article class="blog-card">
                <div class="card-image">
                    <img src="{{ $blog->featured_image ? asset('storage/' . $blog->featured_image) : asset('images/default-blog.jpg') }}" 
                         alt="{{ $blog->title }}" 
                         loading="lazy">
                    @if($blog->is_published)
                    <span class="published-badge">Published</span>
                    @else
                    <span class="draft-badge">Draft</span>
                    @endif
                </div>
                <div class="card-content">
                    <div class="post-meta">
                        <span class="meta-date"><i class="far fa-calendar-alt"></i> {{ $blog->created_at->format('M d, Y') }}</span>
                    </div>
                    <h3><a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a></h3>
                    <p class="excerpt">{{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 150) }}</p>
                    <a href="{{ route('blog.show', $blog->slug) }}" class="read-more">
                        Read Article <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($blogs->hasPages())
        <div class="pagination-wrapper">
            {{ $blogs->links() }}
        </div>
        @endif
    </div>
</section>


<style>
/* Blog Variables */
:root {
    --primary: #1DBFAD;
    --secondary: #4A6FA5;
    --success: #28a745;
    --text-dark: #1A1A1A;
    --gray-100: #F7FAFC;
    --gray-300: #E2E8F0;
    --gray-400: #CBD5E0;
    --gray-600: #718096;
    --gray-800: #2D3748;
    --radius-sm: 6px;
    --radius-md: 12px;
    --radius-lg: 16px;
    --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.08);
    --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
    --transition-fast: all 0.15s ease;
    --transition-medium: all 0.3s ease;
}

/* Blog Hero */
.blog-hero {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
    padding: 100px 0;
    text-align: center;
    position: relative;
}

.blog-hero .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.blog-hero .hero-content h1 {
    font-size: 3rem;
    margin-bottom: 1rem;
    font-weight: 800;
}

.blog-hero .hero-content p {
    font-size: 1.25rem;
    opacity: 0.9;
    max-width: 700px;
    margin: 0 auto;
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

/* Blog Listing */
.blog-listing {
    padding: 80px 0;
    background: var(--gray-100);
}

.blog-listing .container {
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
    font-size: 2.5rem;
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

/* Blog Grid */
.blog-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 30px;
    margin-bottom: 50px;
}

.blog-card {
    background: white;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: var(--transition-medium);
}

.blog-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-md);
}

.blog-card .card-image {
    height: 220px;
    position: relative;
    overflow: hidden;
}

.blog-card .card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.blog-card:hover .card-image img {
    transform: scale(1.05);
}

.published-badge, .draft-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    padding: 5px 10px;
    border-radius: var(--radius-sm);
    font-size: 0.8rem;
    font-weight: 600;
}

.published-badge {
    background: var(--success);
    color: white;
}

.draft-badge {
    background: var(--gray-400);
    color: var(--gray-800);
}

.blog-card .card-content {
    padding: 25px;
}

.post-meta {
    display: flex;
    gap: 15px;
    margin-bottom: 15px;
    font-size: 0.9rem;
    color: var(--gray-600);
}

.post-meta i {
    margin-right: 5px;
}

.blog-card h3 {
    font-size: 1.4rem;
    margin-bottom: 15px;
    line-height: 1.4;
}

.blog-card h3 a {
    color: var(--text-dark);
    text-decoration: none;
    transition: color 0.2s ease;
}

.blog-card h3 a:hover {
    color: var(--primary);
}

.blog-card .excerpt {
    color: var(--gray-600);
    margin-bottom: 20px;
    line-height: 1.6;
}

.read-more {
    color: var(--primary);
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    transition: var(--transition-fast);
}

.read-more:hover {
    color: var(--secondary);
}

.read-more i {
    transition: var(--transition-fast);
    font-size: 0.8rem;
}

.read-more:hover i {
    transform: translateX(3px);
}

/* Pagination */
.pagination-wrapper {
    display: flex;
    justify-content: center;
}

/* Responsive */
@media (max-width: 768px) {
    .blog-hero {
        padding: 80px 0;
    }
    
    .blog-hero .hero-content h1 {
        font-size: 2.5rem;
    }
    
    .blog-grid {
        grid-template-columns: 1fr;
    }
    
    .section-header h2 {
        font-size: 2rem;
    }
}




</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const categoryFilter = document.getElementById('category-filter');
    if (categoryFilter) {
        categoryFilter.addEventListener('change', function() {
            // Implement your filtering logic here
            console.log('Filter by:', this.value);
        });
    }
    
    // Search functionality
    const searchBox = document.querySelector('.search-box input');
    const searchButton = document.querySelector('.search-box button');
    
    if (searchButton) {
        searchButton.addEventListener('click', function(e) {
            e.preventDefault();
            // Implement search functionality
            console.log('Search for:', searchBox.value);
        });
    }
});
</script>

@endsection