  <!-- Sidebar -->
      <div class="fixed flex flex-col top-32  sm:top-32 left-0 w-12 hover:w-64 md:w-64 bg-indigo-900 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10  sidebar opacity-75" style="top:">
        <div class=" {{-- overflow-x-hidden --}} flex flex-col justify-between {{-- flex-grow --}}">
          <ul class="flex flex-col py-4 space-y-1">
            <li class="px-5 hidden md:block">
          @if(Auth::user()->isStudent())
              <!-- Student -->
              <div class="flex flex-row items-center h-8">
                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Student</div>
              </div>
            </li>
            <li class="@if(request()->routeIs('my-results')) bg-blue-800 @endif">
              <a href="/my-results" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4 ">
                  <x-icon name="home" class="w-5 h-5"/>
                <span class="ml-2 text-sm tracking-wide truncate">Home</span>
              </a>
            </li>
            <li  class="@if(request()->routeIs('my-clearance')) bg-blue-800 @endif">
              <a href="/results/clearance/{{Auth::user()->slug}}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Fees Clearance</span>
              {{--   <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">New</span> --}}
              </a>
            </li>
            <li>
              <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="book-open" class="w-5 h-5"/>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Exam Queries</span>
              </a>
            </li>
            <li>
              <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="bell" class="h-5 w-5"/>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Notifications</span>
                {{-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span> --}}
              </a>
            </li>
            <li class="{{Request::is('user/profile')? 'bg-blue-800':''}}" >
              <a href="/user/profile" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="user" class="h-5 w-5"/>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">My Profile</span>
                {{-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span> --}}
              </a>
            </li>
          @endif            
          <!-- ./Student -->

          {{-- Accounts --}}
          @if((Auth::user()->hasRole('hod') && Auth::user()->belongsTodepartmentOf('accounts')) || Auth::user()->hasRole('accounts'))
            <li class="px-5 hidden md:block">
              <div class="flex flex-row items-center mt-5 h-8">
                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Accounts</div>
              </div>
            </li>
            <li class="@if(request()->routeIs('fees-clearances') || request()->routeIs('fees-clearance') || request()->routeIs('dashboard')) bg-blue-800 @endif">
              <a href="/dashboard/fees-clearances" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="home" class="w-5 h-5"/>
                <span class="ml-2 text-sm tracking-wide truncate">Home</span>
              </a>
            </li>            
            <li>
            <li  class="@if(request()->routeIs('statistics')) bg-blue-800 @endif">
              <a href="/statistics" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="trending-up" class="w-5 h-5"/>
                <span class="ml-2 text-sm tracking-wide truncate">Statistics</span>
              </a>
            </li>            
            <li class="{{Request::is('user/profile')? 'bg-blue-800':''}}" >              
              <a href="/user/profile" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="user" class="h-5 w-5"/>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">My Profile</span>
               {{--  <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span> --}}
              </a>
            </li>
            <li>
            <li>              
              <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="users" class="h-5 w-5"/>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Profiles</span>
                {{-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span> --}}
              </a>
            </li>
          @endif
            {{-- ./Accounts --}}
          {{-- exams --}}
          @if(Auth::user()->hasRole('hod') && Auth::user()->belongsTodepartmentOf('examinations') || Auth::user()->hasRole('exams'))
            <li class="px-5 hidden md:block">
              <div class="flex flex-row items-center mt-5 h-8">
                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Examinations</div>
              </div>
            </li>
            <li class="@if(request()->routeIs('candidates')) bg-blue-800 @endif">
              <a href="/candidates" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="home" class="w-5 h-5"/>
                <span class="ml-2 text-sm tracking-wide truncate">Home</span>
              </a>
            </li>            
            <li>
              <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="academic-cap" class="w-5 h-5 text-white"/>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Queries</span>
              </a>
            </li>
            <li>       
            <li  class="@if(request()->routeIs('statistics')) bg-blue-800 @endif">
              <a href="/statistics" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="trending-up" class="w-5 h-5"/>
                <span class="ml-2 text-sm tracking-wide truncate">Statistics</span>
              </a>
            </li>                    
              <a href="/user/profile" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="user" class="h-5 w-5"/>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">My Profile</span>
                {{-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span> --}}
              </a>
            </li>
            <li>
            <li>              
              <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="users" class="h-5 w-5"/>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Profiles</span>
                {{-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span> --}}
              </a>
            </li>
            <li>
      @endif              

            {{-- ./exams  --}}
          {{-- ITU --}}

      @if(Auth::user()->hasRole('hod') && Auth::user()->belongsTodepartmentOf('IT Unit') || Auth::user()->hasRole('superadmin'))
            <li class="px-5 hidden md:block">
              <div class="flex flex-row items-center mt-5 h-8">
                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">IT Unit</div>
              </div>
            </li>
            <li>
              <a href="/users/registration" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="home" class="w-5 h-5"/>
                <span class="ml-2 text-sm tracking-wide truncate">Home</span>
              </a>
            </li>            
            <li>
            <li  class="@if(request()->routeIs('user-registration')) bg-blue-800 @endif">
              <a href="/users/registration" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6 ">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="user-add" class="w-5 h-5"/>
                <span class="ml-2 text-sm tracking-wide truncate">Add Users</span>
              </a>
            </li> 
            <li  class="@if(request()->routeIs('statistics')) bg-blue-800 @endif">
              <a href="/statistics" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="trending-up" class="w-5 h-5"/>
                <span class="ml-2 text-sm tracking-wide truncate">Statistics</span>
              </a>
            </li>                        
            <li  class="{{Request::is('user/profile')? 'bg-blue-800':''}}" >              
              <a href="/user/profile" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="user" class="h-5 w-5"/>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">My Profile</span>
                {{-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span> --}}
              </a>
            </li>
            <li>
            <li>              
              <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="users" class="h-5 w-5"/>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Profiles</span>
                {{-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span> --}}
              </a>
            </li>
        @endif
            {{-- ./ITU --}} 
             {{-- /principal --}}
 @if(Auth::user()->hasRole('manager') && Auth::user()->belongsTodepartmentOf('principal office') || Auth::user()->hasRole('principal office'))
            <li class="px-5 hidden md:block">
              <div class="flex flex-row items-center mt-5 h-8">
                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Principal's Office</div>
              </div>
            </li>
            <li class="@if(request()->routeIs('candidates')) bg-blue-800 @endif">
              <a href="/candidates" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="home" class="w-5 h-5"/>
                <span class="ml-2 text-sm tracking-wide truncate">Home</span>
              </a>
            </li> 
            <li>       
            <li  class="@if(request()->routeIs('statistics')) bg-blue-800 @endif">
              <a href="/statistics" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="trending-up" class="w-5 h-5"/>
                <span class="ml-2 text-sm tracking-wide truncate">Statistics</span>
              </a>
            </li>                    
              <a href="/user/profile" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="user" class="h-5 w-5"/>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">My Profile</span>
                {{-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span> --}}
              </a>
            </li>
    @endif
       {{--./principal  --}}
          </ul>
        </div>
      </div>
      <!-- ./Sidebar -->
    


    {{-- fiddle working example --}}

{{-- <div class="min-h-screen md:flex">
  <div class="flex-none w-full md:max-w-xs bg-purple text-white">
    Sidebar
  </div>
  <div class="flex-1 bg-blue text-white">
    Main content area
  </div>
</div> --}}