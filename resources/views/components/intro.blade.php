<section class="py-28">
    <div>

        {{-- Top content --}}
        <div class="flex flex-col md:flex-row md:justify-between mx-auto max-w-screen-2xl px-6">
            {{-- Headline --}}
            <h2 class="font-display font-medium text-4xl md:text-5xl text-dark-green uppercase">
                {!! $title !!}
            </h2>

            {{-- Description --}}
            <div class="max-w-xl font-sans leading-relaxed text-davy-grey">
                {!! $description !!}
            </div>
        </div>

        {{-- Image slider --}}
        <div class="mt-20 splide mx-auto max-w-screen-2xl pl-6" id="intro-slider" aria-label="Intro images">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($images as $image)
                        @php
                            $url = is_object($image) ? ($image->url ?? $image->images->url ?? '') : ($image['url'] ?? $image['image']['url'] ?? '');
                            $alt = is_object($image) ? ($image->alt ?? $image->images->alt ?? '') : ($image['alt'] ?? $image['image']['alt'] ?? '');
                        @endphp
                        @if ($url)
                            <li class="splide__slide">
                                <img src="{{ $url }}" alt="{{ $alt }}" class="h-[480px] w-full rounded-sm object-cover" />
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
