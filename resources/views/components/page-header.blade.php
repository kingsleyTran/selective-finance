<section class="relative h-[597px] w-full overflow-hidden mb-12 md:mb-28">
    {{-- Background image --}}
    <div class="absolute inset-0">
        <img src="{{ $image ?? '/images/about-hero.jpg' }}" alt="Page hero" class="h-full w-full object-cover" />
    </div>

    {{-- Green overlay --}}
    <div class="absolute inset-0 bg-dark-green/30"></div>

    {{-- Content --}}
    <div class="relative z-10 flex h-full items-end">
        <div class="mx-auto w-full max-w-screen-2xl px-6 pb-16">
            <h1 class="font-display font-medium text-[56px] text-white uppercase">
                {{ $postTitle ?? $title ?? 'About Us' }}
            </h1>
        </div>
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
    <div class="absolute bottom-0 left-0 right-0 bg-dark-green z-10">
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
</section>
