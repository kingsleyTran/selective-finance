<section class="mb-12 md:mb-28">
    <div class="mx-auto max-w-screen-2xl px-6">

        {{-- Header --}}
        <div class="mb-12 flex items-center justify-between">
            <h2 class="font-display text-4xl md:text-[56px] leading-[130%] tracking-[-0.56px] text-dark-green uppercase">
                {{ $title ?? 'OTHER SERVICES' }}
            </h2>

            {{-- Custom arrows --}}
            <div class="flex gap-4">
                <button type="button" class="splide-prev text-dark-yellow-100 hover:opacity-70 disabled:text-dark/40 disabled:pointer-events-none disabled:cursor-not-allowed" aria-label="Previous">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="38" viewBox="0 0 50 38" fill="currentColor">
                        <path opacity="0.4" d="M50 17.3062H10.5794C10.5794 17.3062 20.1558 13.6821 22.0491 0.431769L20.2118 0C20.2118 0 18.3745 17.3062 0 17.3062V19.6843C0 19.6843 17.2884 18.2409 20.2118 37.0968L22.0491 36.5872C22.0491 36.5872 20.5179 24.0163 10.5794 19.6843H50V17.3062Z"/>
                    </svg>
                </button>
                <button type="button" class="splide-next text-dark-yellow-100 hover:opacity-70 disabled:text-dark/40 disabled:pointer-events-none disabled:cursor-not-allowed" aria-label="Next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="38" viewBox="0 0 50 38" fill="currentColor">
                        <path opacity="0.4" d="M0 17.3062H39.4206C39.4206 17.3062 29.8442 13.6821 27.9509 0.431769L29.7882 0C29.7882 0 31.6255 17.3062 50 17.3062V19.6843C50 19.6843 32.7116 18.2409 29.7882 37.0968L27.9509 36.5872C27.9509 36.5872 29.4821 24.0163 39.4206 19.6843H0V17.3062Z"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Slider --}}
        <div id="other-services-slider" class="splide">
            <div class="splide__track">
                <ul class="splide__list">

                    @foreach ($services as $service)
                        @php
                            $link = '/our-services/' . $service->slug;
                        @endphp
                        <li class="splide__slide">
                            <x-our-service-card
                                :title="$service->title"
                                :excerpt="$service->description"
                                :icon="$service->icon"
                                :link="$link"
                            />
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>

    </div>
</section>
