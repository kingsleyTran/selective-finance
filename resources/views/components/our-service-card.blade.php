<a href="{{ $link }}"
    class="bg-white flex flex-col justify-between items-start p-8 rounded-sm border border-dark-green/20 hover:border-dark-green transition group min-h-[425px]">

    @if ($icon)
        <img src="{{ $icon }}" class="h-20 mb-8" alt="">
    @endif

    <div>
        <h3 class="text-4xl font-display font-medium text-dark-green mb-4 uppercase">
            {{ $title }}
        </h3>

        <p class="text-gray-600 leading-relaxed">
            {!! $excerpt !!}
        </p>
    </div>
</a>
