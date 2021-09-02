@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'peer h-13 w-full border-gray-300 border-1.5 rounded-md  placeholder-transparent focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md py-6 px-8 text-gray-400 text-lg font-semibold']) !!}>
	{{$slot}}
</select>