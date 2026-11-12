@extends('layouts.app')

@section('content')
    @foreach ($page->builder_content ?? [] as $block)
        @switch($block['type'])

            @case('hero')
                <section class="py-16 text-center bg-gray-100">
                    <h1 class="text-4xl font-bold">{{ $block['data']['heading'] }}</h1>
                    <p class="mt-2 text-xl">{{ $block['data']['subheading'] ?? '' }}</p>
                    @if($block['data']['button_text'])
                        <a href="{{ $block['data']['button_url'] }}" class="mt-4 inline-block px-6 py-3 bg-blue-600 text-white rounded">
                            {{ $block['data']['button_text'] }}
                        </a>
                    @endif
                </section>
                @break

            @case('text_image')
                <section class="py-12">
                    <div class="container mx-auto flex flex-col md:flex-row {{ $block['data']['image_on_left'] ? 'md:flex-row-reverse' : '' }}">
                        <div class="md:w-1/2 p-4">
                            <img src="{{ asset('storage/' . $block['data']['image']) }}" class="rounded shadow">
                        </div>
                        <div class="md:w-1/2 p-4">
                            <h2 class="text-2xl font-semibold">{{ $block['data']['title'] }}</h2>
                            <p>{{ $block['data']['body'] }}</p>
                        </div>
                    </div>
                </section>
                @break

            @case('faq')
                <section class="py-12 bg-gray-50">
                    <div class="container mx-auto">
                        <h2 class="text-3xl font-bold mb-6">FAQs</h2>
                        <div class="space-y-4">
                            @foreach ($block['data']['faqs'] as $faq)
                                <div class="border p-4 rounded">
                                    <strong>{{ $faq['question'] }}</strong>
                                    <p class="mt-1">{{ $faq['answer'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                @break

            @case('cta')
                <section class="py-12 text-center bg-blue-700 text-white">
                    <p class="text-xl mb-4">{{ $block['data']['text'] }}</p>
                    <a href="{{ $block['data']['button_url'] }}" class="inline-block px-6 py-3 bg-white text-blue-700 rounded">
                        {{ $block['data']['button_text'] }}
                    </a>
                </section>
                @break
                @case('features')
        <section class="py-12 bg-white">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold mb-6">{{ $block['data']['heading'] }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($block['data']['items'] as $item)
                        <div class="p-6 shadow rounded bg-gray-50">
                            <div class="text-blue-600 text-3xl mb-2">
                                <i class="{{ $item['icon'] }}"></i>
                            </div>
                            <h3 class="text-xl font-semibold">{{ $item['title'] }}</h3>
                            <p class="text-sm">{{ $item['description'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @break

    {{-- Video --}}
    @case('video_embed')
        <section class="py-12 text-center bg-black text-white">
            <h2 class="text-2xl mb-4">{{ $block['data']['title'] }}</h2>
            <div class="aspect-w-16 aspect-h-9">
                <iframe src="{{ str_replace('watch?v=', 'embed/', $block['data']['youtube_url']) }}"
                        frameborder="0" allowfullscreen class="w-full h-full"></iframe>
            </div>
        </section>
        @break

    {{-- Raw HTML --}}
    @case('html')
        {!! $block['data']['html_content'] !!}
        @break

    {{-- Stats --}}
    @case('stats')
        <section class="py-12 bg-gray-100 text-center">
            <h2 class="text-3xl font-bold mb-6">{{ $block['data']['title'] }}</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-2xl font-bold">
                @foreach($block['data']['counters'] as $counter)
                    <div>
                        <div>{{ $counter['value'] }}</div>
                        <div class="text-sm text-gray-600">{{ $counter['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </section>
        @endswitch
    @endforeach

    @foreach ($page->sections->sortBy('order') as $section)
    @includeIf('components.page-builder.' . $section->layout_type, ['content' => $section->content])
@endforeach
@endsection
