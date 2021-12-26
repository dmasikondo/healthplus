<div {{$attributes->merge(['class'=>"bg-green-500 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-600  text-white font-medium group"])}}>
  <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
    <x-icon name="{{$symbol}}" class="w-8 h-8 stroke-current text-green-800 transform transition-transform duration-500 ease-in-out" stroke-width="2"/>
  </div>
  <div class="text-right">
    <p class="text-2xl">{{$number}}</p>
    <p>{{$title}}</p>
  </div>
</div>