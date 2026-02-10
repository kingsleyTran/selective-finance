<section class="text-white mb-12 md:mb-28">
    <div class="mx-auto max-w-screen-2xl px-6">

        {{-- TOP CONTENT --}}
        <p class="text-sm font-bold tracking-widest text-dark-yellow mb-5">
            ABOUT US
        </p>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-16 mb-14">
            <div>
                <h2 class="text-5xl lg:text-[56px] font-display text-dark-green uppercase">{{ $title }}</h2>
            </div>

            <div class="text-davy-grey space-y-6 prose prose-invert max-w-none">
                {!! $description !!}
            </div>
        </div>

        {{-- STACKED IMAGES --}}
        <div class="lg:col-span-1 md:-mr-6">
            <div
                id="about-stacked-slider"
                class="splide h-full"
                aria-label="About us images"
            >
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($images as $image)
                            @php
                                $url = is_object($image) ? ($image->url ?? $image->image->url ?? '') : ($image['url'] ?? $image['image']['url'] ?? '');
                                $alt = is_object($image) ? ($image->alt ?? $image->image->alt ?? '') : ($image['alt'] ?? $image['image']['alt'] ?? '');
                            @endphp
                            @if ($url)
                                <li class="splide__slide">
                                    <div class=" w-full h-full rounded-sm">
                                        <img
                                            src="{{ $url }}"
                                            class="w-full object-cover h-full rounded-sm"
                                            alt="{{ $alt }}"
                                        >
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>
