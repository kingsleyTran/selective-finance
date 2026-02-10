<header class="fixed top-0 left-0 right-0 z-50 w-full transition-colors duration-300"
    x-data="{ scrolled: false, mobileOpen: false }"
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 80 })"
    @resize.window="if (window.innerWidth >= 768) mobileOpen = false"
    :class="scrolled || mobileOpen ? 'bg-dark-green' : ''">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-6">
        <div
            class="flex h-16 items-center justify-between md:my-6 md:h-auto"
            :class="scrolled ? 'md:mt-4' : ''">

            {{-- Logo --}}
            <a href="/" class="flex shrink-0 items-center" @click="mobileOpen = false">
                <img src="/images/logo.svg" alt="Selective Finance" class="h-10 w-auto md:h-20">
            </a>

            {{-- Desktop menu --}}
            <div class="hidden flex-row items-center gap-2 md:flex">
                <nav
                    class="flex items-center gap-8 border border-white/20 rounded-full bg-white/10 px-10 py-3">
                    <x-nav-link href="/our-services">Our Services</x-nav-link>
                    <x-nav-link href="/about-us">About Us</x-nav-link>
                    <x-nav-link href="/blogs">Blog</x-nav-link>
                </nav>
                <a href="/contact" class="rounded-full bg-white px-8 py-3 font-medium text-black transition hover:bg-gray-200">
                    Contact Us
                </a>
            </div>

            {{-- Mobile menu button --}}
            <button type="button"
                class="flex h-10 w-10 items-center justify-center rounded-lg text-white transition hover:bg-white/10 md:hidden"
                aria-label="Toggle menu"
                aria-expanded="false"
                :aria-expanded="mobileOpen"
                @click="mobileOpen = !mobileOpen">
                <svg x-show="!mobileOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg x-show="mobileOpen" x-cloak class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile menu panel --}}
    <div class="md:hidden"
        x-show="mobileOpen"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        @click.outside="mobileOpen = false">
        <div class="border-t border-white/20 px-4 pb-6 pt-4">
            <nav class="flex flex-col gap-1">
                <a href="/our-services" class="rounded-lg px-4 py-3 text-white transition hover:bg-white/10" @click="mobileOpen = false">Our Services</a>
                <a href="/about-us" class="rounded-lg px-4 py-3 text-white transition hover:bg-white/10" @click="mobileOpen = false">About Us</a>
                <a href="/blogs" class="rounded-lg px-4 py-3 text-white transition hover:bg-white/10" @click="mobileOpen = false">Blog</a>
            </nav>
            <a href="/contact" class="mt-4 block w-full rounded-full bg-white px-8 py-3 text-center font-medium text-black transition hover:bg-gray-200" @click="mobileOpen = false">
                Contact Us
            </a>
        </div>
    </div>
</header>
