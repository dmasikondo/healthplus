<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-yellow-900 leading-tight">
            {{ __('Articles') }} 
        </h2>
    </x-slot> 
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">                     
     <div class="mt-4 mx-4">
      <div class="max-w-7xl overflow-hidden rounded-lg shadow-xs">
        <div class="my-1">
          @php
            $random =time().time();
          @endphp                      
          @livewire('article.delete')             
          <x-session-message/>
        </div>        
    @if($articles->count()>0)
        <div class="grid md:grid-cols-2 auto-cols-min md:gap-8 text-gray-900 my-4 pr-6">
    @foreach($articles as $article)
            <div class=" p-4 md:px-6 text-xl text-gray-800 leading-normal border-b-2 border-yellow-300 shadow-lg rounded-lg" style="font-family:Georgia,serif; background: linear-gradient(white, #222), 
              linear-gradient(to right, red, purple);
  background-origin: padding-box, border-box;
  background-repeat: no-repeat; /* this is important */
  border: 5px solid transparent;">
                <div class="font-sans my-4">
                    <p class="text-base md:text-sm text-green-500 font-bold"> 
                        <a href="/articles/{{strtolower($article->category)}}" class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline uppercase">
                            {{$article->category}}
                        </a>
                    </p>
                    <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">
                        <a href="/articles/{{$article->slug}}" class="text-gray-400 hover:text-green-500">{{$article->title}}</a>                        
                    </h1>
                    <h4 class="flex justify-end">
                        <button title="Edit" onclick="window.location.href='/articles/{{$article->slug}}/edit'"  class="text-green-500 hover:text-green-700">
                            <x-icon name="edit" class="text-green-500 hover:text-green-700 w-6 h-6" stroke-width="2"/> {{-- Edit --}}                                       
                        </button>
                        <button title="Delete Article"   class="text-red-500 hover:text-red-700" onclick="window.livewire.emitTo('article.delete','deleteArticle','{{$article->slug}}')">
                            <x-icon name="trash" class="w-6 h-6"/> 
                        </button>
                                               
                    </h4>                     
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
                    <a href="{{$article->filePath}}"><img src="{{$article->filePath}}" alt=""  class="w-full"></a>
               
        {{-- file is a video  --}}
            @elseif($article->isVideo())
                <video controls="" class="w-full" name="media" onclick="this.paused ? this.play() : this.pause();"> 
                  <source src="/{{$article->filePath}}">
                </video>
            @elseif($article->isPdf())
                <iframe  class="w-full" 
                {{-- src="https://youtube.com/embed/bGS5sdmsUag"> --}}
                src="{{$article->filePath}}">
                </iframe>
            @elseif($article->haslink())
                <iframe width="420" height="315"
                {{-- src="https://youtube.com/embed/bGS5sdmsUag"> --}}
                src="{{$article->link}}">
                </iframe>
                             
            @endif                   
                </div> 
            </div>
        @endforeach
        </div>
    @else
        <div class="my-4">
            <h2>You currently do not have any articles. Please <a href="/articles/create" class="text-gray-400 hover:text-green-500">create </a>something amazing for your readers</h2>
        </div>
    @endif
      </div>
     </div>
 </div>
      
</x-app-layout>









