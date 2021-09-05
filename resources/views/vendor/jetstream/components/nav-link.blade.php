@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-green-400  leading-5 tracking-widest text-lg text-gray-200 font-semibold focus:outline-none focus:border-green-700 transition'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-lg leading-5 text-gray-400 hover:text-yellow-500 hover:border-yellow-300 focus:outline-none focus:text-yellow-400 focus:border-yellow-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
