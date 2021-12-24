<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-yellow-200 leading-tight">
            {{ __('Create an awesome article') }} 
        </h2>
    </x-slot> 
<div class="max-w-7xl sm:px-6 lg:px-8">              		
     <div class="mt-4 mx-4">
      <div class="max-w-7xl overflow-hidden rounded-lg shadow-lg">
      	@livewire('article.create')
      </div>
     </div>
 </div>
      
</x-app-layout>