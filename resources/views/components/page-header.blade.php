<section class="relative h-[597px] w-full overflow-hidden mb-12 md:mb-28">
    {{-- Background image --}}
    <div class="absolute inset-0">
        <img src="{{ $image ?? '/images/about-hero.jpg' }}" alt="Page hero" class="h-full w-full object-cover" />
    </div>

    {{-- Green overlay --}}
    <div class="absolute inset-0 bg-dark-greeb/70"></div>

    {{-- Content --}}
    <div class="relative z-10 flex h-full items-end">
        <div class="mx-auto w-full max-w-screen-2xl px-6 pb-16">
            <h1 class="font-display text-[56px] text-white uppercase">
                {{ $title ?? 'About Us' }}
            </h1>
        </div>
    </div>

    {{-- Breadcrumb --}}
    <div class="absolute bottom-0 left-0 right-0 bg-dark-green z-10">
        <div class="mx-auto max-w-screen-2xl px-6 py-4">
            <p class="font-sans text-sm uppercase tracking-widest text-white/70">
                <a href="/" class="text-light-yellow hover:text-dark-yellow">Homepage</a>
                <span class="mx-2 text-dark-yellow">/</span>
                <span class="text-dark-yellow">{{ $title ?? '' }}</span>
            </p>
        </div>
    </div>
</section>
