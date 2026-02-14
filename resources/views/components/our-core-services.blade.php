<section class="mb-12 md:mb-28">
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-4">

        {{-- LEFT CONTENT (sticky, follows scroll) --}}
        <div class="md:sticky md:top-24 md:self-start">
            <p class="font-bold text-dark-yellow uppercase tracking-widest text-sm mb-4">
                Our Services
            </p>

            <h2 class="text-4xl md:text-[56px] font-display font-medium text-dark-green mb-6 uppercase">
                {{ $title }}
            </h2>

            <p class="text-davy-grey mb-8 leading-relaxed">
                {!! $subtitle !!}
            </p>

            {{-- @if ($slice->primary->cta_link)
                <a href="{{ $slice->primary->cta_link->url }}"
                    class="inline-block bg-gold text-black px-8 py-4 rounded-full font-medium hover:opacity-90 transition">
                    {{ $slice->primary->cta_label[0]->text ?? 'Explore All Services' }}
                </a>
            @endif --}}
        </div>

        {{-- RIGHT GRID --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($services as $service)
                <x-our-service-card
                    :title="$service->title"
                    :excerpt="$service->description"
                    :icon="$service->icon"
                    :uid="$service->uid" />
            @endforeach
        </div>

    </div>
</section>
