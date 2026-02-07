<section class="mb-30">
    <div class="mx-auto max-w-5xl">

        {{-- Title --}}
        <h2 class="mb-16 text-center font-serif text-4xl md:text-5xl tracking-wide text-dark-green uppercase">
            {{ $title ?? 'FREQUENTLY ASKED QUESTIONS' }}
        </h2>

        <div x-data="{ open: 0 }" class="space-y-8">

            @foreach ($items as $index => $item)
                <div class="border-b border-dashed border-black/20 pb-8">

                    <button @click="open === {{ $index }} ? open = null : open = {{ $index }}"
                        class="flex w-full items-start justify-between gap-6 text-left">

                        <div class="max-w-3xl">
                            <h3 class="font-display text-[28px] -tracking-[0.32px] leading-[100%] transition-colors uppercase"
                                :class="open === {{ $index }} ? 'text-dark-yellow' : 'text-dark-green'">
                                {{ $item->question }}
                            </h3>

                            <div x-show="open === {{ $index }}" x-collapse
                                class="mt-4 text-sm leading-relaxed text-davy-grey">
                                {{ $item->answer }}
                            </div>
                        </div>

                        {{-- Toggle --}}
                        <span
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-dark-yellow"
                            aria-hidden="true">
                            <span class="relative block size-6 text-white" :class="open === {{ $index }} ? 'rotate-0' : ''">
                                {{-- Minus (expanded) --}}
                                <svg class="absolute inset-0 size-full" x-show="open === {{ $index }}" x-cloak xmlns="http://www.w3.org/2000/svg" width="24" height="2" viewBox="0 0 24 2" fill="none">
                                    <path d="M0 0C24.3262 0 4.3808 0 24 0V1.1415C16.2137 0.491404 8.47453 1.1415 0 1.1415V0Z" fill="#F8F5EA"/>
                                </svg>
                                {{-- Plus (collapsed) --}}
                                <svg class="absolute inset-0 size-full" x-show="open !== {{ $index }}" x-cloak xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M0 11.4292C24.3262 11.4292 4.3808 11.4292 24 11.4292V12.5707C16.2137 11.9206 8.47453 12.5707 0 12.5707V11.4292Z" fill="#F8F5EA"/>
                                    <path d="M11.4292 24C11.4292 -0.32617 11.4292 19.6192 11.4292 0L12.5707 -4.98966e-08C11.9206 7.78631 12.5707 15.5255 12.5707 24L11.4292 24Z" fill="#F8F5EA"/>
                                </svg>
                            </span>
                        </span>

                    </button>
                </div>
            @endforeach

        </div>
    </div>
</section>
