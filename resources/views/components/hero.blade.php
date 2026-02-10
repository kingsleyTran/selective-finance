<section class="relative isolate min-h-[90vh] w-full overflow-hidden">
    {{-- Background image --}}
    <img src="{{ $image }}" alt="{{ $imageAlt ?? '' }}" class="absolute inset-0 -z-10 h-full w-full object-cover" />

    {{-- Overlay gradient --}}
    <div class="absolute inset-0 -z-10 bg-gradient-to-r
                from-black/60 via-black/30 to-transparent"></div>

    <div class="mx-auto flex min-h-[90vh] max-w-screen-2xl flex-col justify-end px-6 pb-[69px]">
        <div class="max-w-2xl text-white">
            {{-- Eyebrow / optional --}}
            @isset($eyebrow)
                <p class="mb-4 text-sm uppercase tracking-widest text-white/70">
                    {{ $eyebrow }}
                </p>
            @endisset

            {{-- Title --}}
            <h1 class="font-display text-4xl font-medium md:text-[56px] uppercase">
                {!! $title !!}
            </h1>

            {{-- Description --}}
            <p class="mt-6 max-w-xl text-base text-white md:text-lg mb-10">
                {{ $subtitle }}
            </p>
            <div class="flex flex-col md:flex-row gap-2">
                <a href="#" class="rounded-full bg-white px-10 py-3 text-black text-center transition hover:bg-gray-200">
                    Book a Consultation
                </a>
                <a href="{{ route('services.index') }}" class="rounded-full bg-transparent border border-white px-10 py-3 text-white text-center transition hover:bg-white hover:text-black">
                    Explore Our Services
                </a>
            </div>
        </div>
    </div>
</section>
