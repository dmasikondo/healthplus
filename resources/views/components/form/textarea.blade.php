@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'peer h-32 w-full border-gray-300 border-1.5 rounded-md  placeholder-transparent focus:border-green-300 focus:ring focus:ring-green-900 focus:ring-opacity-50 rounded-md py-6 px-6 text-gray-400 text-lg font-semibold']) !!}></textarea>