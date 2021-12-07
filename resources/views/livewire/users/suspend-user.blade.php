<div>
    <x-modal wire:model="show">   
        <!-- content -->
      <x-slot name="title">
        {{$status =='suspended'? 'Unsuspend': 'Suspend'}} User: {{$surname}}  {{$first_name}}
      </x-slot>
      <div class="m-4 p-4">
         <div class="md:col-span-2 xl:col-span-1">            
            <x-session-warning/>
            <x-session-message/>
            <div class="rounded bg-indigo-500 p-3">
              <div class="flex justify-between py-1 text-white">
                <h3 class="text-sm font-semibold overflow-auto">  {{$surname}}  {{$first_name}}</h3>
                <p class="uppercase text-sm">  {{$email}}</p>
              </div>
              <div class="text-sm text-black dark:text-gray-50 mt-2">
                <div class="bg-white  p-2 rounded mt-1 border-b border-indigo-100 text-lg font-semibold">  
                    @if(count($listRoles)>0)
                        @foreach($listRoles as $role)
                            {{$role->name}}
                        @endforeach
                    @else
                        {{$surname}}  {{$first_name}} hasn't been assigned any role
                    @endif
                </div>
                <div class="bg-white  p-2 rounded mt-1 border-b border-indigo-100 ">
                  Registered
                  <div class="text-gray-500  mt-2 ml-2 flex justify-between items-start">
                    <span class="text-xs flex items-center">
                      <svg class="h-4 fill-current mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50"><path d="M11 4c-3.855 0-7 3.145-7 7v28c0 3.855 3.145 7 7 7h28c3.855 0 7-3.145 7-7V11c0-3.855-3.145-7-7-7zm0 2h28c2.773 0 5 2.227 5 5v28c0 2.773-2.227 5-5 5H11c-2.773 0-5-2.227-5-5V11c0-2.773 2.227-5 5-5zm25.234 9.832l-13.32 15.723-8.133-7.586-1.363 1.465 9.664 9.015 14.684-17.324z"></path></svg>
                      &nbsp;{{$created}}
                    </span>
                            Status: 
                     @if($status =='suspended and deactivated')
                        <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full"> 
                           {{$status}}
                        </span>                         
                     @elseif($status =='deactivated')
                        <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full"> 
                            {{$status}}
                        </span>
                     @elseif($status =='suspended')
                        <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full"> 
                            {{$status}}
                        </span>                        
                     @else
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full"> 
                            {{$status}}
                        </span>
                     @endif 
                                                  
                  </div>
                </div>
                <div class="bg-white p-2 rounded mt-1 border-b border-gray-100 ">
                    Are you really sure you want to {{$status =='suspended'? 'Unsuspend': 'Suspend'}} the user?
                </div>
               
              </div>
            </div>
          </div> 

        <div class="flex justify-center pb-3 text-grey-dark my-4">
          <div class="text-center mr-3 border-r mx-8 pr-3">
            <h2></h2>
            <button class="font-semibold text-red-700" @click="show = false">Cancel</button>
                               
          </div>
          <div class="ml-16 text-center">
            <h2></h2>
        @if($showSuspendUserBtn)
            <button class="font-semibold text-green-500" wire:click="suspendUser" wire:loading.remove wire:target="suspendUser">
                Suspend User
            </button>
        @endif
                  <span wire:loading wire:target="suspendUser">
                    Suspending ...
                  </span> 

        @if(!$showSuspendUserBtn)
            <button class="font-semibold text-green-500" wire:click="unsuspendUser" wire:loading.remove wire:target="unsuspendUser">
                Unuspend User
            </button>
        @endif
                  <span wire:loading wire:target="unsuspendUser">
                    Unsuspending ...
                  </span>                              
          </div>
        </div>        
                                             

      </div>
  </x-modal>
</div>
