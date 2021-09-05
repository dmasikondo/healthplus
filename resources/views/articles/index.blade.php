<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-yellow-900 leading-tight">
            {{ __('Articles') }} 
        </h2>
    </x-slot> 
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">                     
     <div class="mt-4 mx-4">
      <div class="max-w-7xl overflow-hidden rounded-lg shadow-xs">
        <div class="grid md:grid-cols-2 md:gap-4 text-gray-900 my-4 pr-6">
    @foreach($articles as $article)
            <div class=" px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">
                <div class="font-sans my-4">
                    <p class="text-base md:text-sm text-green-500 font-bold"> 
                        <a href="/articles/{{strtolower($article->category)}}" class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline uppercase">
                            {{$article->category}}
                        </a>
                    </p>
                    <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">
                        {{$article->title}}
                    </h1>
                    <p class="text-sm md:text-base font-normal text-gray-600">
                        Published {{Carbon\Carbon::parse($article->created_at)->format('D d M Y h:i:s')}}
                    </p>
                    <p class="text-xs text-gray-800 flex flex-col md:flex-row">
                        <span  class="flex-1">Written By {{$article->user->first_name}} {{$article->user->surname}} </span>                              
                        <span  class="flex-justify-end">Last Updated {{$article->updated_at->diffForHumans()}}</span>
                    </p>                        
                </div>
                <div class="">
                   {{Str::words($article->description, 40)}}
                </div>

                <div class="{{-- max-h-32 --}}">
                 @if($article->isImage())
                    <a href="/{{$article->filePath}}"><img src="/{{$article->filePath}}" alt=""  class="w-48"></a>
               
        {{-- file is a video  --}}
            @elseif($article->isVideo())
                <video controls="" width="320" height="240" name="media" onclick="this.paused ? this.play() : this.pause();"> 
                  <source src="/{{$article->filePath}}">
                </video> 
            @endif                   
                </div> 
            </div>
        @endforeach
        </div>
      </div>
     </div>
 </div>
      
</x-app-layout>









