@props(['symbol'])
<a {{$attributes->merge(['class'=>"relative flex flex-row items-center h-11 focus:outline-none focus:border-green-500 hover:bg-green-900 text-green-500 hover:text-white border-l-4 border-transparent hover:border-green-500  pr-6"])}}>
  <span class="inline-flex justify-center items-center ml-4">
    <x-icon name="{{$symbol}}" class="w-5 h-5"/>
  <span class="ml-2 text-sm tracking-wide truncate">{{$slot}}</span>
</a>