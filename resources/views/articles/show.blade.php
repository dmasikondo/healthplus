<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-yellow-300 leading-tight">
            {{ $article->title }} 
        </h2>
    </x-slot> 
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">              		
     <div class="mt-4 mx-4">
      <div class="max-w-7xl overflow-hidden rounded-lg shadow-xs">
      	<div class="md:grid md:grid-cols-12 gap-8"> 
            <x-card class="col-span-8 border-b-4 {{App\models\Article::randomColor()}}"> 
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
                       {{--  <p class="flex-justify-end">
                            <x-icon name="dots-horizontal"/>
                        </p> --}}                        
                    </div>
                    <div class="">
                       {!! nl2br(ucfirst($article->description)) !!}
                    </div>

                    <div class="my-4 rounded-lg">
                     @if($article->isImage())
                        <a href="/{{$article->filePath}}"><img src="/{{$article->filePath}}" alt=""  class="w-48"></a>
                {{-- file is a video  --}}
                    @elseif($article->isVideo())
                        <video controls=""  name="media" onclick="this.paused ? this.play() : this.pause();"> 
                          <source src="/{{$article->filePath}}">
                        </video> 
                    @elseif($article->isPdf())
                    
                        <div class="mt-4">
                        
                            <iframe width="" height="500" class="w-full" 
                            {{-- src="https://youtube.com/embed/bGS5sdmsUag"> --}}
                            src="/{{$article->filePath}}">
                            </iframe>
                        
                        </div>
                       
                    @endif                   
                    </div> 
                </div>
            </x-card>
            
            <x-card class="col-span-4 border-t-4 {{App\models\Article::randomColor()}}">
                {{-- horizontal dots button --}}
                <div class="sticky top-0">                                          
                    {{-- <livewire:article.create/> --}}
                    <x-dropdown>
                        <x-slot name="trigger">
                            <x-icon name="dots-horizontal"/>
                        </x-slot>
                        <x-dropdown-item wire:loading.class="animate-pulse" wire:click="editArticle({{ $article->slug }}) ">
                            <x-icon name="edit"/> 
                              <span wire:loading.remove wire:target="edit({{ $article->slug }})">
                                 Edit Article
                              </span>
                              <span wire:loading wire:target="edit({{ $article->slug }})">
                                Editing ...
                              </span>
                        </x-dropdown-item>
                        <x-dropdown-item onclick="confirm('All the details of the member will be lost, Are you sure you want to delete the member and all the associated files?') || event.stopImmediatePropagation()"  wire:click="delete({{ $article->slug }})" wire:loading.class="animate-pulse">
                                <x-icon name="user-remove" class="text-red-700"/>
                                  <span wire:loading.remove wire:target="delete({{ $article->slug }})">
                                     Delete Article
                                  </span>
                                  <span wire:loading wire:target="delete({{ $article->slug }})">
                                    Deleting ...
                                  </span>
                        </x-dropdown-item>                              
                    </x-dropdown>
                    </div>
                </x-card>     
            </div>
          </div>
         </div>
     </div>
      
</x-app-layout>