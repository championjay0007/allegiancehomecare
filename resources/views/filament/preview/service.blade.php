@php
    $isAdminPreview = $is_admin_preview ?? false;
    $serviceData = [
        'title' => 'New Service',
        'short_description' => '',
        'description' => '',
        'more_info' => '',
        'icon' => 'fas fa-heart',
        'image' => null,
        'features' => [],
        'custom_html' => ''
    ];

    if (isset($service)) {
        $serviceData = is_array($service) ? $service : $service->toArray();
    }
    
    // Merge with defaults to ensure all keys exist
    $serviceData = array_merge([
        'title' => 'New Service',
        'short_description' => '',
        'description' => '',
        'more_info' => '',
        'icon' => 'fas fa-heart',
        'image' => null,
        'features' => [],
        'custom_html' => ''
    ], $serviceData);
    
    // Set image URL for preview
    $serviceData['image_url'] = $serviceData['image'] ? 
        (Str::startsWith($serviceData['image'], ['http://', 'https://']) ? 
            $serviceData['image'] : 
            '#') : 
        asset('images/default-service.jpg');
@endphp
<div class="preview-container @if($isAdminPreview) admin-preview @endif">
    <style>
        .preview-container {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
        }
        
        .admin-preview {
            max-width: 100%;
            overflow-x: auto;
        }
        
        .preview-container h1, 
        .preview-container h2, 
        .preview-container h3 {
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .preview-container h1 { font-size: 2rem; }
        .preview-container h2 { font-size: 1.75rem; }
        .preview-container h3 { font-size: 1.5rem; }
        
        .preview-container p {
            margin-bottom: 1rem;
        }
        
        .preview-container img {
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem;
        }
        
        .admin-preview-note {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 1rem;
            margin-top: 2rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
        }
    </style>

    <!-- Hero Section -->
    <section class="service-hero bg-gradient-to-r from-blue-600 to-blue-800 text-white p-6 rounded-t-lg">
        <div class="container mx-auto">
            <div class="max-w-3xl mx-auto text-center">
                <div class="inline-flex items-center bg-white bg-opacity-20 rounded-full px-4 py-1 mb-4">
                    <div class="mr-2">
                        <i class="{{ $serviceData['icon'] ?? 'fas fa-heart' }}"></i>
                    </div>
                    <span class="text-sm font-semibold">Our Services</span>
                </div>
                <h1>{{ $serviceData['title'] ?? 'Service Title' }}</h1>
                <p>{{ $serviceData['short_description'] ?? \Illuminate\Support\Str::limit($serviceData['description'] ?? '', 180) }}</p>
            </div>
        </div>
    </section>

    <!-- Service Details -->
    <section class="service-details bg-white p-6 rounded-b-lg">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @if($serviceData['image_url'])
            <div>
                <img src="{{ $serviceData['image_url'] }}" alt="{{ $serviceData['title'] ?? 'Service Image' }}" class="w-full h-auto">
            </div>
            @endif
            
            <div>
                <h2>About Our {{ $serviceData['title'] ?? 'Service' }}</h2>
                <div class="prose max-w-none">
                    {!! $serviceData['description'] ?? '' !!}
                </div>
                
                @if(!empty($serviceData['features']))
                <div class="mt-6">
                    <h3>Key Features</h3>
                    <div class="grid grid-cols-1 gap-4">
                        @foreach($serviceData['features'] as $feature)
                        <div class="flex items-start gap-3">
                            <div class="text-blue-600">
                                <i class="{{ $feature['icon'] ?? 'fas fa-check-circle' }}"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">{{ $feature['title'] ?? 'Feature' }}</h4>
                                <p class="text-sm">{{ $feature['description'] ?? '' }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
        
        @if(!empty($serviceData['more_info']))
        <div class="mt-8">
            <h3>Additional Information</h3>
            <div class="prose max-w-none">
                {!! $serviceData['more_info'] !!}
            </div>
        </div>
        @endif
        
        @if(!empty($serviceData['custom_html']))
        <div class="mt-8">
            {!! $serviceData['custom_html'] !!}
        </div>
        @endif
    </section>

    @if($isAdminPreview)
    <div class="admin-preview-note">
        <p>This is a preview of how the service will appear on your website. Some styling may differ in the live version.</p>
    </div>
    @endif
</div>