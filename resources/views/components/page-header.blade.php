<section class="relative min-h-[300px] md:min-h-[597px] w-full overflow-hidden mb-14 md:mb-28">
    {{-- Background image --}}
    <div class="absolute inset-0">
        <img src="{{ $image ?? '/images/about-hero.jpg' }}" alt="Page hero" class="h-full w-full object-cover" />
    </div>

    {{-- Green overlay --}}
    <div class="absolute inset-0 bg-dark-green/30"></div>

    {{-- Content + Breadcrumb (stacked at bottom) --}}
    <div class="absolute bottom-0 left-0 right-0 z-10 flex flex-col">
        <div class="mx-auto w-full max-w-screen-2xl px-6 pb-8">
            <h1 class="font-display font-medium text-3xl md:text-4xl lg:text-[56px] text-white uppercase line-clamp-2">
                {{ $postTitle ?? $title ?? 'About Us' }}
            </h1>
        </div>
        {{-- Breadcrumb --}}
        @php
        // Current request path, e.g. "services/loan-structuring" or "/"
        $currentPath = request()->path();

        // Path segments as an array, e.g. ["services", "loan-structuring"]
        $segments = request()->segments();

        // URL to first segment (e.g. "/services") or homepage if none
        $firstSegmentUrl = isset($segments[0]) ? url($segments[0]) : url('/');
    @endphp
    <div class="bg-dark-green">
        <div class="mx-auto max-w-screen-2xl px-6 py-4">
            <p class="font-sans text-sm uppercase tracking-widest text-white/70">
                <a href="/" class="text-light-yellow hover:text-dark-yellow">Homepage</a>
                <span class="mx-2 {{ !empty($postTitle) ? 'text-light-yellow' : 'text-dark-yellow' }}">/</span>
                @if(!empty($postTitle))
                    <a href="{{ $firstSegmentUrl }}"
                        class="{{ !empty($postTitle) ? 'text-light-yellow hover:text-dark-yellow' : 'text-dark-yellow' }}">
                        {{ $title ?? '' }}
                    </a>
                    <span class="mx-2 text-dark-yellow">/</span>
                    <span class="text-dark-yellow">{{ $postTitle }}</span>
                @else
                    <span class="text-dark-yellow">{{ $title }}</span>
                @endif
            </p>
        </div>
    </div>
    </div>
</section>
