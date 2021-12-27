@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'peer h-12 w-full border border-1.5 rounded-md border-gray-300 text-gray-900 placeholder-transparent focus:border-green-300 focus:ring focus:ring-green-900 focus:ring-opacity-50 focus:border-2 p-3']) !!}>
	{{$slot}}
</select>