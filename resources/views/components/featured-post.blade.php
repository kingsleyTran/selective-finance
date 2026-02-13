<section class="mb-24">
    <div class="mx-auto max-w-screen-2xl px-6">
        <article class="grid grid-cols-1 overflow-hidden rounded-sm border border-dark-green/20 bg-white md:grid-cols-2 gap-8 p-8">
            <!-- IMAGE -->
            <div class="relative md:h-[453px] w-full rounded-sm">
                <img src="{{ $image }}" alt="{{ $title }}" class="h-full w-full object-cover rounded-sm" />
            </div>

            <!-- CONTENT -->
            <div class="flex flex-col justify-start">
                <span class="mb-6 text-davy-grey">
                    {{ $createdDate }}
                </span>

                <h2 class="font-display font-medium text-4xl text-dark-green md:text-5xl uppercase">
                    {{ $title }}
                </h2>

                <p class="mt-6 leading-relaxed text-davy-grey">
                    {{ $excerpt }}
                </p>

                <!-- CTA -->
                <div class="mt-6">
                    <a
                        href="/blogs/{{ $slug ?? '#' }}"
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
    </div>
</section>
