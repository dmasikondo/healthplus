<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-yellow-300 leading-tight">
            {{ $article->title }} 
        </h2>
    </x-slot>               		
     <div class="mt-4 ">
      <div class="max-w-7xl overflow-hidden rounded-lg shadow-xs">
      	<div class=""> 
            @livewire('article.delete') 
            <x-card class="col-span-8 border-b-4 {{App\models\Article::randomColor()}}"> 
                <div class=" px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">
                    <div class="font-sans my-4 pb-6" style="  border-style: solid;
  border-width: 10px;
  border-top:0;
  border-right:0;
  border-left:0;
  border-image: linear-gradient(45deg, rgb(0,143,104), rgb(250,224,66)) 1;">
                        <p class="text-base md:text-sm text-green-500 font-bold"> 
                            <a href="/articles/{{strtolower($article->category)}}" class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline uppercase">
                                {{$article->category}}
                            </a>
                            @include('includes.article_published_status')
                        </p>
                    <h4 class="flex justify-end">
                    @can('publish',$article)
                        <button title="{{is_null($article->published_at)? 'Publish': 'Unpublish'}} Article"   class="text-red-500 hover:text-red-700" onclick="window.livewire.emitTo('article.publish','publishArticle','{{$article->slug}}')">
                            <x-icon name="{{is_null($article->published_at)? 'eye-off': 'eye'}}" class="w-6 h-6"/> 
                        </button> 
                    @endcan 

                    @can('update',$article)                      
                        <button title="Edit" onclick="window.location.href='/articles/{{$article->slug}}/edit'"  class="text-green-500 hover:text-green-700">
                            <x-icon name="edit" class="text-green-500 hover:text-green-700 w-6 h-6" stroke-width="2"/> {{-- Edit --}}                                       
                        </button>
                    @endcan

                    @can('delete',$article)
                        <button title="Delete Article"   class="text-red-500 hover:text-red-700" onclick="window.livewire.emitTo('article.delete','deleteArticle','{{$article->slug}}')">
                            <x-icon name="trash" class="w-6 h-6"/> 
                        </button>
                    @endcan                         
                    </h4>                        
                        <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">
                            {{$article->title}}                            
                        </h1>
                        <p class="text-sm md:text-base font-normal text-gray-600">
                            Created {{Carbon\Carbon::parse($article->created_at)->format('D d M Y h:i:s')}}
                        </p>
                    @if(!is_null($article->published_at))
                        <p class="text-xs text-gray-800">
                            <span  class="flex-1">Published {{$article->published_at->diffForHumans()}} </span>
                        </p>
                    @endif                        
                        <p class="text-xs text-gray-800 flex flex-col md:flex-row">
                            <span  class="flex-1">Written By {{$article->user->first_name}} {{$article->user->surname}} </span>                              
                            <span  class="flex-justify-end">Last Updated {{$article->updated_at->diffForHumans()}}</span>
                        </p>
                       {{--  <p class="flex-justify-end">
                            <x-icon name="dots-horizontal"/>
                        </p> --}}                        
                    </div>
                    
                    <div class="">
                       {!! nl2br(ucfirst($article->description)) !!}
                    </div>

                    <div class="my-4 rounded-lg">
                 @if($article->isImage())
                    <a href="{{$article->filePath}}"><img src="{{$article->filePath}}" alt=""  class="w-full"></a>

                {{-- file is a video  --}}
                    @elseif($article->isVideo())
                        <video controls=""  name="media" onclick="this.paused ? this.play() : this.pause();"> 
                          <source src="{{$article->filePath}}">
                        </video> 
                    @elseif($article->isPdf())
                        <a href="{{$article->filePath}}">
                            <embed src="{{$article->filePath}}" class="w-full" 
                             type="application/pdf">                            
                        </a>                        

                    @elseif($article->haslink())
                        <iframe width="100%" height=""
                        {{-- src="https://youtube.com/embed/bGS5sdmsUag"> --}}
                        src="{{$article->link}}">
                        </iframe>  
                    @endif                 
                    </div> 
                </div>
            </x-card>     
            </div>
          </div>
         </div>
      
</x-app-layout>