<section class="mb-12 md:28">
    <div class="mx-auto max-w-screen-2xl px-6">

        {{-- Header --}}
        <div class="mb-8 md:mb-20 grid grid-cols-1 lg:grid-cols-2">
            <p class="subtitle">
                {{ $subtitle }}
            </p>

            <h2 class="font-display text-4xl leading-tight text-dark-green md:text-5xl uppercase">
                {!! $title !!}
            </h2>
        </div>
        @foreach ($services as $service)
        <div class="grid grid-cols-1 gap-4 md:gap-16 lg:grid-cols-2 pt-2.5 pb-6 md:pb-12 border-t border-dashed border-black/20">
            <div class="relative flex items-center gap-6">
                <div class="w-16 h-16">
                    <img src="{{ $service->icon }}" alt="{{ $service->title }}" class="h-full w-full object-cover" />
                </div>
                <h3 class="font-display font-medium text-4xl text-dark-green uppercase">
                    {{ $service->title }}
                </h3>
            </div>
            <div class="relative flex justify-between">
                <p class="text-dark">
                    {{ $service->description }}
                </p>
                <div class="ml-3">
                    <a
                        href="our-services/{{ $service->slug }}"
                        class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-dark-yellow text-light-yellow transition hover:bg-dark-yellow/30"
                        aria-label="Read more"
                    >
                        <svg class="w-6 h-4.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 18" fill="currentColor">
                            <path d="M0 8.30697H18.9219C18.9219 8.30697 14.3252 6.56741 13.4164 0.207249L14.2983 0C14.2983 0 15.1802 8.30697 24 8.30697V9.44847C24 9.44847 15.7016 8.75562 14.2983 17.8065L13.4164 17.5618C13.4164 17.5618 14.1514 11.5278 18.9219 9.44847H0V8.30697Z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
