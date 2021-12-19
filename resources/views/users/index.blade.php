<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-200 leading-tight">
            {{ __('HealthPlus Users') }} 
        </h2>
    </x-slot>

    <div class="mt-4 mx-4">
      <div class="max-w-7xl overflow-hidden rounded-lg shadow-xs">

        <div class="overflow-x-auto"> 
              @php
                $random =time().time();
              @endphp                      
              @livewire('users.suspend-user', key($random)) 
              @livewire('users.manage-roles', key($random)) 
            @include('includes.search_user') 
            <x-session-warning/>
            <x-session-message/>            
            @include('includes.users_list')
      </div>
     </div> 
    </div>   
</x-app-layout>