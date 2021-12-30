@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-green-400 text-base font-medium text-green-700 bg-green-50 focus:outline-none focus:text-green-800 focus:bg-green-100 focus:border-green-700 transition text-right'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-yellow-600 hover:text-yellow-800 hover:bg-yellow-50 hover:border-yellow-300 focus:outline-none focus:text-yellow-800 focus:bg-yellow-50 focus:border-yellow-300 transition text-right';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
