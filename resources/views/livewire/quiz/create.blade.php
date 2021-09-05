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
        Create a Quiz
      </p>
    </div>
    <div class="my-1">
      <x-session-message/>
    </div>

 <form wire:submit.prevent="createQuiz" enctype="multipart/form-data">
    <div class="flex p-4 ">
      <div>
        <img class="rounded-full w-8" src="{{Auth::user()->profile_photo_url }}" />
      </div>
  </div>
     
      <div class="ml-3 flex flex-col md:flex-row center my-4 gap-2 w-full">                  
        <div class="mt-4 relative flex-1">
            <x-form.input id="question" type="text" name="question" placeholder="Question" wire:model.defer="question" required/> 
            <x-form.label for="question">Question</x-form.label>             
            <div class="absolute right-0 top-0 mt-6 mr-2">
                <x-icon name="question-mark-circle" class="h-6 w-6 text-green-600 hidden md:block" stroke-width="1"/>                           
            </div>
            <small class="text-gray-400">Ask simple and to-the-point questions for best results</small>
            <p class="text-red-900 italic text-sm">@error('question') {{$message}} @enderror</p>                    
        </div> 
    </div>

      <div class="ml-3 flex flex-col md:flex-row center my-4 gap-2 w-full">
        <div class="mt-4 relative flex-1">
            <x-form.input id="answer" type="text" placeholder="Correct Answer" wire:model.defer="answer" required/> 
            <x-form.label for="answer">The Correct Answer</x-form.label>             
            <div class="absolute right-0 top-0 mt-6 mr-2">
                <x-icon name="chat" class="h-6 w-6 text-green-600 hidden md:block" stroke-width="1"/>                           
            </div>
            <small class="text-gray-400">The correct answer must be the most plausible option</small>
            <p class="text-red-900 italic text-sm">@error('answer') {{$message}} @enderror</p>                    
        </div> 
    </div> 

      <div class="ml-3 flex flex-col md:flex-row center my-4 gap-2 w-full">
        <div class="mt-4 relative flex-1">
            <x-form.input id="choice1" type="text"  placeholder="Choice 1" wire:model.defer="choice1" required/> 
            <x-form.label for="choice1">Choice 1 (incorrect answer)</x-form.label>             
            <div class="absolute right-0 top-0 mt-6 mr-2">
                <x-icon name="chat-alt" class="h-6 w-6 text-green-600 hidden md:block" stroke-width="1"/>                           
            </div>
            <small class="text-gray-400">Give choices that give the most insight into the question</small>
            <p class="text-red-900 italic text-sm">@error('choice1') {{$message}} @enderror</p>                    
        </div> 
    </div> 

      <div class="ml-3 flex flex-col md:flex-row center my-4 gap-2 w-full">
        <div class="mt-4 relative flex-1">
            <x-form.input id="choice2" type="text"  placeholder="Choice 2" wire:model.defer="choice2" required/> 
            <x-form.label for="choice2">Choice 2 (incorrect answer)</x-form.label>             
            <div class="absolute right-0 top-0 mt-6 mr-2">
                <x-icon name="chat-alt" class="h-6 w-6 text-green-600 hidden md:block" stroke-width="1"/>                           
            </div>
            <small class="text-gray-400">Give choices that give the most insight into the question</small>
            <p class="text-red-900 italic text-sm">@error('choice2') {{$message}} @enderror</p>                    
        </div> 
    </div>    

      <div class="ml-3 flex flex-col md:flex-row center my-4 gap-2 w-full">
        <div class="mt-4 relative flex-1">
            <x-form.input id="instruction" type="text"  placeholder="Choice 1" wire:model.defer="instruction" required/> 
            <x-form.label for="instruction">Question Instruction e.g. Please answer</x-form.label>             
            <div class="absolute right-0 top-0 mt-6 mr-2">
                <x-icon name="annotation" class="h-6 w-6 text-green-600 hidden md:block" stroke-width="1"/>                           
            </div>
            <p class="text-red-900 italic text-sm">@error('instruction') {{$message}} @enderror</p>                    
        </div> 
    </div>            



    <div class="flex items-center text-green-400 justify-between py-6 px-4 border-t">        

      <div>
        <button type="submit" class="inline px-4 py-3 rounded-full font-bold text-white bg-green-300 hover:bg-yellow-300 cursor-pointer" {>
          Create Quiz Question No. {{$quizCount + 1}}
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