<!-- .Users Table --> 

      @if($users->count()>0)           	
              <table class="w-full">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b">
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Role</th>
                    <th class="px-4 py-3">Status</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
               @foreach($users as $user)
                  <tr class="bg-gray-50">
                    <td class="px-4 py-3">
                      <div class="flex items-center text-sm">
                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block bg-gray-800 border-1">
                        
                          <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                        <div>
                        <a href="#/{{-- dashboard/fees-clearances/{{$student->slug --}}}}" class="text-blue-400 hover:text-gray-400">
                          <p class="font-semibold">{{$user['surname']}} {{$user->first_name}} </p>
                          <p class="text-xs text-gray-600 dark:text-gray-400">Created 3 days ago</p>
                        </a>

                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                      {{$user->email}}
                    </td>
                    <td class="px-4 py-3 text-sm">
                      @foreach($user->roles as $role)
                      {{$role->name}}
                      @endforeach
                    </td>
                    <td class="px-4 py-3 text-xs">
     {{-- Display clearannce status--}}
             
                    @if(!$user->must_reset && !$user->is_suspended)
                      <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full"> 
                        Active 
                        <x-icon name="check-circle" class="inline w-4 h-4"/>
                      </span> 

                     @elseif($user->is_suspended && $user->must_reset)
                      <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full"> 
                        Suspended and deactivated
                        <x-icon name="exclamation" class="inline w-4 h-4"/>
                      </span>                       
                     @elseif($user->must_reset)
                      <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full"> 
                        Must Activate
                      </span>                       
                     @elseif($user->is_suspended)
                      <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full"> 
                        Suspended
                        <x-icon name="exclamation" class="inline w-4 h-4"/>
                      </span>  
                                          
                    @endif  

                      <button onclick="window.livewire.emitTo('users.suspend-user','suspendUserAccount','{{$user->slug}}')" 
                        class="text-sm mx-2 py-1 px-2 rounded-lg bg-indigo-500 text-white hover:text-indigo-500 hover:bg-white hover:border-1 hover:border-indigo-500">
                        <small>{{$user->is_suspended? 'Unsuspend User': 'Suspend User'}}</small>
                     </button>                                      
            

       {{-- ./ Display clearannce status--}}              
                      
                      <p class="text-xs text-gray-600 dark:text-gray-400">
                      	{{-- {{!is_null($student->user->fees[0]->cleared_at)? $student->user->fees[0]->cleared_at->diffForHumans():''}} --}}
                      </p>
                    </td>
                   
                  </tr>
                @endforeach              
                </tbody>
              </table>
        @else
            <h2 class="my-4 px-4 font-semibold text-xl text-center text-gray-400  bg-white inline-block self-center leading-loose rounded-lg">
              There are no registered users yet
            </h2>
        @endif