<div class="{{-- absolute w-full --}}max-w-6xl mx-auto flex justify-center  {{-- h-screen --}} items-center">
    
  <div class="rounded-xl bg-white w-full px-6 overflow-x-auto{{-- md:w-2/3 --}} {{-- lg:w-1/3 --}} shadow-lg"
        x-data="{ isUploading: false, progress: 0 }"
        x-on:livewire-upload-start="isUploading = true"
        x-on:livewire-upload-finish="isUploading = false"        
        x-on:livewire-upload-error="isUploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress">
    <div class="px-5 py-3 flex items-center justify-between text-green-400 border-b">
      {{-- <i class="fas fa-times text-xl"></i> --}}

      <p class="inline hover:bg-green-100 px-4 py-3 rounded-full font-bold">
       {{empty($quiz)? 'Create a quiz question': 'Edit the quiz question'}}
      </p>
    </div>
    <div class="my-1">
      <x-session-message/>
    </div>

 <form wire:submit.prevent="createQuiz">
  @include('partials.quiz-form')      
 </form>
</div>
</div>