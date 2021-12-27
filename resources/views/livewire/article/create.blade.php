<div class="{{-- absolute w-full --}} flex justify-center bg-gray-200  {{-- h-screen --}} items-center">
    
  <div class="rounded-xl bg-white w-full px-6 overflow-x-auto{{-- md:w-2/3 --}} {{-- lg:w-1/3 --}}"
        x-data="{ isUploading: false, progress: 0 }"
        x-on:livewire-upload-start="isUploading = true"
        x-on:livewire-upload-finish="isUploading = false"        
        x-on:livewire-upload-error="isUploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress"
  >
    <div class="px-5 py-3 flex items-center justify-between text-green-400 border-b">
      {{-- <i class="fas fa-times text-xl"></i> --}}

      <p class="inline hover:bg-green-100 px-4 py-3 rounded-full font-bold">
        {{empty($article_id)? 'Create an article': 'Update article'}}
      </p>
    </div>
  <div class="py-6" >
    <x-session-message/>
@if(isset($article))

    @if($article->isImage())
        <p>
            <x-link wire:click="deleteFile()" class="cursor-pointer">Remove Attached File</x-link>
        </p>
        <a href="{{$article->filePath}}"><img src="{{$article->filePath}}" alt="{{$title}}" style="max-height: 19.6875em; min-width: 50%;"></a>

        {{-- file is a video  --}}
    @elseif($article->isVideo())
        <p>
            <x-link wire:click="deleteFile()" class="cursor-pointer">Remove Attached File</x-link>
        </p>    
        <video controls="" class="w-full" name="media" onclick="this.paused ? this.play() : this.pause();"  style="max-height: 19.6875em; min-width: 50%;"> 
          <source src="{{$article->filePath}}" >
        </video>
    @elseif($article->isPdf())
        <p>
            <x-link wire:click="deleteFile()" class="cursor-pointer">Remove Attached File</x-link>
        </p>        
        <iframe  class="w-full" 
        src="{{$article->filePath}}">
        </iframe>
    @elseif($article->haslink())
        <iframe width="100%" height="315" class="rounded-xl" 
        src="{{$article->link}}">
        </iframe>
    @endif                        
@endif
                        
  </div>
 <form wire:submit.prevent="createArticle" enctype="multipart/form-data">
    <div class="flex p-4 ">
      <div>
        <img class="rounded-full w-8" src="{{Auth::user()->profile_photo_url }}" />
      </div>
  </div>


     
      <div class="ml-3 flex flex-col md:flex-row center my-4 gap-2 w-full">

        <div class="mt-4 relative flex-1">
            <x-form.select id="category"  name="category" placeholder="Select a Category" wire:model.defer="category" required> 
                <option value="" class="hover:bg-green-100">All: Categories</option>
                <option value="PMTCT" class="h-12">PMTCT</option>
                <option value="Prevention" class="h-12">Prevention</option>
                <option value="Treatment" class="h-12">Treatment</option>           
            </x-form.select>
            <x-form.label for="category">Select a Category</x-form.label>
            <p class="text-red-900 italic text-sm">@error('role') {{$message}} @enderror</p>                    
        </div>

        <div class="mt-4 relative flex-1">
            <x-form.input id="title" type="text" name="title" placeholder="Surname" wire:model.defer="title" required/> 
            <x-form.label for="title">Title</x-form.label>             
            <div class="absolute right-0 top-0 mt-2 mr-2">
                <x-icon name="book-open" class="h-6 w-6 text-green-600 hidden md:block" stroke-width="1"/>                           
            </div>
            <p class="text-red-900 italic text-sm">@error('title') {{$message}} @enderror</p>                    
        </div> 

    </div>

        <div class="ml-3 flex flex-col md:flex-row center my-4 gap-2 w-full">      
            <div class="flex-1 mt-4">
                <x-form.textarea placeholder="A helpful slightly detailed information here" wire:model.defer="description"/>
                 <p wire:loading.remove>
                    @error('description')
                        <span class="text-red-500 text-sm italic">{{ $message }}</span>
                    @enderror
                 </p>            
            </div>
        </div>

        <div class="my-4 relative flex-1 ml-4">
            <x-form.input id="link" type="text" name="link" placeholder="Url link" wire:model="link"/> 
            <x-form.label for="link">Url embeded link e.g https://www.youtube.com/embed/value</x-form.label>             
            <div class="absolute right-0 top-0 mt-2 mr-2">
                <x-icon name="link" class="h-6 w-6 text-green-600 hidden md:block" stroke-width="1"/>                           
            </div>
            <p class="text-red-900 italic text-sm">@error('link') {{$message}} @enderror</p>                    
        </div>  

    @if(empty($link) || is_null($link))
        <div class="flex items-center text-green-400 justify-between py-6 px-4 border-t">    
            {{-- file input and submit --}}
            <div x-data="{fileSelected: true}" x-on:livewire-upload-finish="fileSelected = true" class="border-b-4 pb-4 space-y-4">

                <input id="upload{{ $iteration }}"  type="file" wire:model.defer="fileName" {{-- accept="image/*,video/*,pdf" --}} wire:click="clearErrors" {{-- id="{{$randomu}}{{$ayd}} --}}
                class="text-xs"/>  
                 <p wire:loading.remove>
                    @error('fileName')
                        <span class="text-red-500 text-sm italic">{{ $message }}</span>
                    @enderror
                 </p>
               <div x-show="isUploading" style="display: none;">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>             
            </div> 
        </div>
    @endif 

        <button type="submit" class="inline px-4 py-3 rounded-full font-bold text-white bg-green-300 hover:bg-yellow-300 cursor-pointer" >
            {{empty($article_id)? 'Create Aticle': 'Update Article'}}
          
        </button>
        <div>
            <span wire:loading>
                Processing ...
            </span>
        </div>

      </div>
    </div>      
  </form>
</div>
</div>