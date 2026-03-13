@if (count($banks) > 0)
<section class="mb-14 md:mb-28">
    <div class="mx-auto max-w-screen-2xl px-6">
        <div class="bg-[#fcfcfc] mix-blend-multiply py-10 overflow-hidden">
            <div class="max-w-2xl mx-auto mb-6 md:mb-10">
                <h2 class="text-center text-3xl md:text-4xl lg:text-[56px] font-display font-medium text-dark-green uppercase">
                    {{ $title }}
                </h2>
            </div>
            <div id="banks-slider" class="splide" aria-label="Banking Partners">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($banks as $bank)
                            @if ($bank->logo)
                            <li class="splide__slide flex items-center justify-center">
                                <img src="{{ $bank->logo }}" alt="{{ $bank->name }}" class="max-w-40 max-h-12 w-auto object-contain grayscale opacity-70 transition hover:grayscale-0 hover:opacity-100" />
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endif