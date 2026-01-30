@props(['href'])

@php
    $active = request()->is(trim($href, '/') . '*');
@endphp

<a href="{{ $href }}"
    class="transition
    {{ $active ? 'text-white font-medium' : 'text-white hover:text-white/80' }}">
    {{ $slot }}
</a>
