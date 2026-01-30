<article class="group w-full overflow-hidden">
    {{-- Image --}}
    <div class="relative overflow-hidden mb-6 rounded-sm">
        <img
            src="{{ $image ?? '' }}"
            alt="{{ $title ?? '' }}"
            class="h-[358px] rounded-sm w-full object-cover transition duration-700 group-hover:scale-105"
        />

        {{-- Gradient overlay --}}
        <div class="absolute rounded-sm inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
    </div>

    {{-- Content --}}
    <div class="relative pb-8">
        {{-- Date --}}
        <p class="mb-6 font-sans text-davy-grey">
            {{ $createdDate ?? '5th January 2025' }}
        </p>

        {{-- Title --}}
        <h3 class="font-display font-medium text-[32px] leading-[130%] tracking-[-0.32px] text-dark-green uppercase">
            {{ $title ?? 'Unlocking Equity: How to Grow Your Investment Portfolio' }}
        </h3>

        {{-- CTA --}}
        <div class="mt-6">
            <a
                href="{{ $url ?? '#' }}"
                class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-dark-yellow text-light-yellow transition hover:bg-dark-yellow/30"
                aria-label="Read more"
            >
                <svg class="w-6 h-4.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 18" fill="currentColor">
                    <path d="M0 8.30697H18.9219C18.9219 8.30697 14.3252 6.56741 13.4164 0.207249L14.2983 0C14.2983 0 15.1802 8.30697 24 8.30697V9.44847C24 9.44847 15.7016 8.75562 14.2983 17.8065L13.4164 17.5618C13.4164 17.5618 14.1514 11.5278 18.9219 9.44847H0V8.30697Z"/>
                </svg>
            </a>
        </div>
    </div>
</article>
