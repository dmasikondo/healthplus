  <!-- Sidebar -->
  @auth
      <div class="fixed flex flex-col {{-- top-28 --}}  sm:top-28 left-0 w-12 hover:w-64 md:w-64 bg-gradient-to-br from-yellow-50 via-white to-green-50 border border-black border-opacity-5 h-full text-white transition-all duration-300 {{-- border-none --}} z-10  sidebar opacity-75" style="top: 4em;">
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
              <a href="/my-results" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800  text-green-500 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
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
              <a href="/users" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
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
              <x-sidebar.link-item href="/users/registration">
                <x-slot name='symbol'>
                  home
                </x-slot>
                Home
              </x-sidebar.link-item>
            </li> 
            <li  class="@if(request()->routeIs('user-registration')) bg-green-900 @endif">
              <x-sidebar.link-item  href="/users/registration">
                <x-slot name='symbol'>
                  user-add
                </x-slot>
                Add Users
              </x-sidebar.link-item> 
            </li> 
            <li  class="@if(request()->routeIs('statistics')) bg-green-900 @endif">
              <x-sidebar.link-item  href="/Statistics">
                <x-slot name='symbol'>
                  trending-up
                </x-slot>
                Statistics
              </x-sidebar.link-item> 
            </li>                        
            <li  class="{{Request::is('user/profile')? 'bg-green-900':''}}" >   
              <x-sidebar.link-item  href="/user/profile">
                <x-slot name='symbol'>
                  user
                </x-slot>
                My Profile
              </x-sidebar.link-item>  
            </li>
            <li  class="{{Request::is('users')? 'bg-green-900':''}}" >   
              <x-sidebar.link-item  href="/users">
                <x-slot name='symbol'>
                  users
                </x-slot>
                Profiles
              </x-sidebar.link-item>  
            </li> 
            <li  class="{{Request::is('notifications')? 'bg-green-900':''}}" >   
              <x-sidebar.link-item  href="/notifications">
                <x-slot name='symbol'>
                  bell
                </x-slot>
                Notifications {{auth()->user()->unreadNotifications->count()}}
              </x-sidebar.link-item>  
            </li>             
        @endif
            {{-- notifications --}} 
{{--             <li>              
              <a href="/notifications" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <x-icon name="bell" class="h-5 w-5"/>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Notifications</span>  
                <span class="tracking-wide truncate px-2 py-1 mr-2 text-xs font-bold leading-none text-green-100 bg-green-600 rounded-full mx-4">{{auth()->user()->unreadNotifications->count()}}</span>            
              </a>
            </li>  --}}           
          </ul>
        </div>
      </div>
@endauth
      <!-- ./Sidebar -->
