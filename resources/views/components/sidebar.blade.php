  <!-- Sidebar -->
  @auth
      <div class="fixed flex flex-col {{-- top-28 --}}  sm:top-28 left-0 w-12 hover:w-64 md:w-64 bg-indigo-900 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10  sidebar opacity-75" style="top: 4em;">
        <div class=" {{-- overflow-x-hidden --}} flex flex-col justify-between {{-- flex-grow --}}">
          <ul class="flex flex-col py-4 space-y-1">
            <li class="px-5 hidden md:block">
          @if(Auth::user()->hasRole('author'))
              <!-- author -->
              <div class="flex flex-row items-center h-8">
                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Author</div>
              </div>
            </li>
            <li class="@if(request()->routeIs('articles-create')) bg-blue-800 @endif">
              <a href="/my-results" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4 ">
                  <x-icon name="home" class="w-5 h-5"/>
                <span class="ml-2 text-sm tracking-wide truncate">Home</span>
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
          <!-- ./author -->

          {{-- Publisher --}}
          @if(Auth::user()->hasRole('editor'))
            <li class="px-5 hidden md:block">
              <div class="flex flex-row items-center mt-5 h-8">
                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Publisher</div>
              </div>
            </li>
            <li class="@if(request()->routeIs('articles-create')) bg-blue-800 @endif">
              <a href="/dashboard/fees-clearances" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="home" class="w-5 h-5"/>
                <span class="ml-2 text-sm tracking-wide truncate">Home</span>
              </a>
            </li>            
            <li>           
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
              <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="users" class="h-5 w-5"/>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Profiles</span>
                {{-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span> --}}
              </a>
            </li>
          @endif
            {{-- ./Publisher --}}
          {{-- ITU --}}

      @if(Auth::user()->hasRole('admin')  || Auth::user()->hasRole('superadmin'))
            <li class="px-5 hidden md:block">
              <div class="flex flex-row items-center mt-5 h-8">
                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">{{Auth::user()->roles[0]->name}}</div>
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
            
          </ul>
        </div>
      </div>
@endauth
      <!-- ./Sidebar -->
