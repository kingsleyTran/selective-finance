<section class="relative h-[520px] w-full overflow-hidden">
    {{-- Background image --}}
    <img
        src="{{ $image ?? '/images/about-hero.jpg' }}"
        alt="Page hero"
        class="absolute inset-0 min-h-[536px] h-full w-full object-cover"
    />

    {{-- Green overlay --}}
    <div class="absolute inset-0 bg-dark-greeb/70"></div>

    {{-- Content --}}
    <div class="relative z-10 flex h-full items-end">
        <div class="mx-auto w-full max-w-screen-2xl px-6 pb-16">
            <h1 class="font-display text-6xl text-white">
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
                <span class="text-dark-yellow">About Us</span>
            </p>
        </div>
    </div>
</section>
