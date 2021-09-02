<label {{ $attributes->merge(['class' => 'absolute left-2 px-1 -top-2.5 bg-white text-indigo-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-placeholder-shown:text-xl peer-placeholder-shown:top-4 peer-placeholder-shown:mt-2 peer-focus:-top-2.5 peer-focus:mt-0 peer-focus:text-indigo-600 peer-focus:text-sm']) }}>
	{{  $slot }}
</label>

