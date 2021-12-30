<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tightt">
            {{ __('Create a Quiz') }} 
        </h2>
    </x-slot> 
<div class="max-w-7xl {{-- mx-auto --}} sm:px-6 lg:px-8">              		
     <div class="mt-4 mx-4">
      <div class="max-w-7xl overflow-hidden rounded-lg shadow-xs">
      	@livewire('quiz.create')
      </div>
     </div>
 </div>
      
</x-app-layout>