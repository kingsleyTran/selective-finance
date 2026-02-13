<section class="mb-12 md:mb-28">
    <div class="max-w-screen-2xl mx-auto px-6">
        <div class="mb-6 md:mb-14">
            <h2 class="font-display font-medium text-4xl leading-tight text-dark-green md:text-5xl uppercase">
                {!! $title !!}
            </h2>
        </div>

        <div class="mt-10 space-y-8">
            @foreach ($items as $item)
                <div
                    class="grid grid-cols-1 md:grid-cols-2 items-center gap-8
                   rounded-sm border border-dark-green/20
                   bg-white px-6 py-7.5">
                    <!-- LEFT -->
                    <div class="flex flex-col md:flex-row md:items-center font-display gap-6">
                        <h2 class="text-4xl font-medium text-dark-green/30 leading-[100%]">
                            {{ $item->index ?? $loop->iteration }}.
                        </h2>

                        <h3 class="text-[32px] font-medium text-dark-green -tracking-[0.32px] uppercase leading-[100%]">
                            {!! $item->title !!}
                        </h3>
                    </div>

                    <!-- RIGHT -->
                    <div class="text-dark text-lg leading-[130%]">
                        {!! $item->description !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
