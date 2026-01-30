<footer class="bg-dark-green text-white font-sans">
    <div class="mx-auto max-w-screen-2xl px-6 py-16">
        <div class="mb-8">
            <a href="{{ url('/') }}" class="inline-block">
                <img src="{{ asset('images/logo.svg') }}" alt="Selective Finance" class="h-full w-auto" />
            </a>
        </div>
        {{-- Top border --}}
        <div class="border-t border-dashed border-white/30"></div>
        <div class="grid gap-12 md:grid-cols-3 py-8">
            {{-- CONTACT --}}
            <div>
                <p class="mb-6 font-bold text-sm text-dark-yellow tracking-[0.2em]">
                    CONTACT
                </p>

                <p class="font-medium max-w-xs leading-relaxed text-xl text-light-yellow/60">
                    4517 Washington Ave.<br>
                    Manchester, Kentucky 39495
                </p>

                <p class="font-medium mt-4 text-xl text-light-yellow/60">
                    (225) 555-0118
                </p>

                <p class="font-medium mt-2 text-xl text-light-yellow/60">
                    info@selectivefinance.com.au
                </p>
            </div>

            {{-- NAVIGATION --}}
            <div>
                <p class="mb-6 font-bold text-sm text-dark-yellow tracking-[0.2em]">
                    NAVIGATION
                </p>

                <ul class="space-y-4 font-medium text-[32px] leading-[130%] tracking-[-0.32px]">
                    <li>
                        <a href="#" class="transition text-light-yellow hover:text-dark-yellow">
                            Our Services
                        </a>
                    </li>
                    <li>
                        <a href="#" class="transition text-light-yellow hover:text-dark-yellow">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="#" class="transition text-light-yellow hover:text-dark-yellow">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="#" class="transition text-light-yellow hover:text-dark-yellow">
                            Contact Us
                        </a>
                    </li>
                </ul>
            </div>

            {{-- CONNECT --}}
            <div>
                <p class="mb-6 font-bold text-sm text-dark-yellow tracking-[0.2em]">
                    CONNECT
                </p>

                <ul class="space-y-3 font-medium text-xl text-light-yellow tracking-[-0.32px]">
                    <li>
                        <a href="#" class="group inline-flex items-center gap-2 transition hover:text-[#C9A24D]">
                            Linkedin
                            <span class="transition group-hover:translate-x-1">↗</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="group inline-flex items-center gap-2 transition hover:text-[#C9A24D]">
                            Youtube
                            <span class="transition group-hover:translate-x-1">↗</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="group inline-flex items-center gap-2 transition hover:text-[#C9A24D]">
                            Facebook
                            <span class="transition group-hover:translate-x-1">↗</span>
                        </a>
                    </li>
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
