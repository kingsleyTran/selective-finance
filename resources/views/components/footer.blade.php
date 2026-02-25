<footer class="bg-dark-green text-white font-sans">
    <div class="mx-auto max-w-screen-2xl px-6 py-16">
        <div class="mb-8">
            <a href="{{ url('/') }}" class="inline-block">
                <img src="{{ asset('images/logo.svg') }}" alt="Selective Finance" class="h-20 md:h-full w-auto" />
            </a>
        </div>
        {{-- Top border --}}
        <div class="border-t border-dashed border-white/30"></div>
        <div class="grid gap-12 md:grid-cols-3 py-8">
            {{-- CONTACT --}}
            <div>
                <p class="mb-6 font-bold text-sm text-dark-yellow tracking-[0.2em]">
                    {{ $footerContact?->title ?? 'CONTACT' }}
                </p>

                @if($footerContact && ($footerContact->address ?? null))
                    <p class="font-medium max-w-xs leading-relaxed md:text-xl text-light-yellow/60">
                        {!! nl2br(e($footerContact->address)) !!}
                    </p>
                @else
                    <p class="font-medium max-w-xs leading-relaxed md:text-xl text-light-yellow/60">
                        4517 Washington Ave.<br>
                        Manchester, Kentucky 39495
                    </p>
                @endif

                @if($footerContact && ($footerContact->phone_number ?? null))
                    <p class="font-medium mt-4 md:text-xl text-light-yellow/60">
                        {{ $footerContact->phone_number }}
                    </p>
                @else
                    <p class="font-medium mt-4 md:text-xl text-light-yellow/60">
                        (225) 555-0118
                    </p>
                @endif

                @if($footerContact && ($footerContact->email ?? null))
                    <p class="font-medium mt-2 md:text-xl text-light-yellow/60">
                        <a href="mailto:{{ $footerContact->email }}" class="transition hover:text-dark-yellow">{{ $footerContact->email }}</a>
                    </p>
                @else
                    <p class="font-medium mt-2 md:text-xl text-light-yellow/60">
                        info@selectivefinance.com.au
                    </p>
                @endif
            </div>

            {{-- NAVIGATION --}}
            <div>
                <p class="mb-6 font-bold text-sm text-dark-yellow tracking-[0.2em]">
                    {{ $footerNavigation?->title ?? 'NAVIGATION' }}
                </p>

                <ul class="space-y-4 font-medium text-2xl md:text-[32px] leading-[130%] tracking-[-0.32px]">
                    @forelse($footerNavigation?->items ?? [] as $item)
                        <li>
                            <a href="{{ $item->link ?? '#' }}" class="transition text-light-yellow hover:text-dark-yellow">
                                {{ $item->label ?? '' }}
                            </a>
                        </li>
                    @empty
                        <li>
                            <a href="/our-services" class="transition text-light-yellow hover:text-dark-yellow">Our Services</a>
                        </li>
                        <li>
                            <a href="/about-us" class="transition text-light-yellow hover:text-dark-yellow">About Us</a>
                        </li>
                        <li>
                            <a href="/blogs" class="transition text-light-yellow hover:text-dark-yellow">Blog</a>
                        </li>
                        <li>
                            <a href="/contact" class="transition text-light-yellow hover:text-dark-yellow">Contact Us</a>
                        </li>
                    @endforelse
                </ul>
            </div>

            {{-- CONNECT --}}
            <div>
                <p class="mb-6 font-bold text-sm text-dark-yellow tracking-[0.2em]">
                    {{ $footerConnection?->title ?? 'CONNECT' }}
                </p>

                <ul class="space-y-3 font-medium text-xl text-light-yellow tracking-[-0.32px]">
                    @forelse($footerConnection?->items ?? [] as $item)
                        <li>
                            <a href="{{ $item->link ?? '#' }}" class="group inline-flex items-center gap-2 transition hover:text-[#C9A24D]">
                                {{ $item->label ?? '' }}
                                <span class="transition group-hover:translate-x-1">↗</span>
                            </a>
                        </li>
                    @empty
                        <li>
                            <a href="#" class="group inline-flex items-center gap-2 transition hover:text-[#C9A24D]">Linkedin <span class="transition group-hover:translate-x-1">↗</span></a>
                        </li>
                        <li>
                            <a href="#" class="group inline-flex items-center gap-2 transition hover:text-[#C9A24D]">Youtube <span class="transition group-hover:translate-x-1">↗</span></a>
                        </li>
                        <li>
                            <a href="#" class="group inline-flex items-center gap-2 transition hover:text-[#C9A24D]">Facebook <span class="transition group-hover:translate-x-1">↗</span></a>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
        {{-- Bottom border --}}
        <div class="border-t border-dashed border-white/30"></div>

        {{-- Bottom bar --}}
        <div class="mx-auto flex flex-col items-center justify-between gap-4 pt-6 font-medium text-light-yellow/60 md:flex-row">
            <p>© Copyright 2025 Selective Finance. All Rights Reserved</p>

            <a href="#" class="transition hover:text-[#C9A24D]">
                Terms + Conditions
            </a>
        </div>
    </div>
</footer>
