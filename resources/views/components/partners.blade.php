@props(['partners' => []])

@if (count($partners) > 0)
<section class="py-16 md:py-5">
    <div class="bg-[#fcfcfc] mix-blend-multiply mx-auto max-w-screen-2xl py-10 px-6 mb-5">
        <ul class="flex flex-wrap items-center justify-between gap-8 md:gap-12">
            @foreach ($partners as $partner)
                @php
                    $img = $partner->partner_logo ?? $partner->logo ?? $partner->image ?? null;
                    $url = $img->url ?? '';
                    $alt = $img->alt ?? '';
                @endphp
                @if ($url)
                    <li>
                        <img src="{{ $url }}" alt="{{ $alt }}" class="max-h-12 w-auto object-contain grayscale opacity-70 transition hover:grayscale-0 hover:opacity-100" />
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
    <div class="border-b border-dashed border-black/20 mx-auto max-w-screen-2xl px-6"></div>
</section>
@endif
