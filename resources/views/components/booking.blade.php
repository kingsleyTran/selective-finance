<section class="relative max-w-screen-2xl mx-auto overflow-hidden mb-[105px] px-6">
    <div class="relative h-[597px] w-full rounded-sm bg-cover bg-center bg-no-repeat"
        @if($image && !str_starts_with($image, 'blob:'))
            style="background-image: url('{{ $image }}');"
        @endif>
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/20 rounded-sm"></div>

        <!-- Content -->
        <div class="relative z-10 flex h-full items-end pl-[90px] pb-[76px]">
            <div class="max-w-xl text-white">
                <h1 class="text-4xl md:text-[56px] font-display font-medium text-white uppercase mb-6">
                    {!! $title !!}
                </h1>

                <div class="text-white leading-relaxed max-w-xl mb-8">
                    {!! $description !!}
                </div>

                <a href="#"
                    class="inline-flex items-center justify-center rounded-full bg-white px-8 py-3 text-sm font-medium text-black transition hover:bg-neutral-200">
                    Schedule a Session
                </a>
            </div>
        </div>
    </div>
</section>
