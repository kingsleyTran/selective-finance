<header class="fixed top-0 left-0 right-0 z-50 w-full transition-colors duration-300"
    x-data="{ scrolled: false }"
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 80 })"
    :class="scrolled ? 'bg-dark-green' : ''">
    <div class="mx-auto max-w-screen-2xl px-6">
        <div
            class="my-6 flex items-center justify-between px-4 md:px-0"
            :class="scrolled ? 'mt-4' : ''">

            {{-- Logo --}}
            <a href="/" class="flex items-center">
                <img src="/images/logo.svg" alt="Selective Finance" class="h-20 w-auto">
            </a>

            {{-- Menu --}}
            <div class="flex flex-row items-center gap-2">
                <nav
                    class="hidden md:flex items-center gap-8 border border-white/20 rounded-full bg-white/10 px-10 py-3">
                    <x-nav-link href="/our-services">Our Services</x-nav-link>
                    <x-nav-link href="/about-us">About Us</x-nav-link>
                    <x-nav-link href="/blogs">Blog</x-nav-link>
                </nav>

                {{-- CTA --}}
                <div class="hidden md:block">
                    <a href="/contact" class="rounded-full bg-white px-8 py-3 font-medium text-black transition hover:bg-gray-200">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
