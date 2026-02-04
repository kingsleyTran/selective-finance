<section class="md:mb-28">
    <div class="grid max-w-screen-2xl mx-auto grid-cols-1 lg:grid-cols-2 gap-16 px-6">

        {{-- LEFT CONTENT --}}
        <div class="relative flex flex-col justify-between items-start">

            {{-- Logo --}}
            <div class="">
                <div
                    class="flex h-14 w-14 items-center justify-center">
                    <img src="{{ $logo }}" alt="Logo" class="h-full w-full object-cover" />
                </div>
            </div>

            {{-- Text --}}
            <h1
                class="font-display font-medium text-[40px] leading-snug text-dark-green uppercase">
                {{ $title }}
            </h1>
        </div>

        {{-- RIGHT IMAGE --}}
        <div class="relative h-[435px] rounded-sm">
            <img src="{{ $image }}" alt="{{ $title }}" class="h-full w-full object-cover rounded-sm" />
        </div>

    </div>
</section>
