@if (count($banks) > 0)
<section class="md:pb-5 mb-12 px-6">
    <div class="bg-[#fcfcfc] mix-blend-multiply mx-auto max-w-screen-2xl px-6 py-10 mb-5 overflow-hidden">
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
                            <li class="splide__slide flex h-20 items-center justify-center px-2 md:px-3">
                                <img src="{{ $bank->logo }}" alt="{{ $bank->name }}" class="h-12 w-40 max-w-full object-contain grayscale opacity-70 transition hover:grayscale-0 hover:opacity-100" />
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="border-b border-dashed border-black/20 mx-auto max-w-screen-2xl px-6"></div>
</section>
@endif
