  <!-- Sidebar -->
  @auth
      <div class="fixed flex flex-col {{-- top-28 --}}  sm:top-28 left-0 w-12 hover:w-64 md:w-64 bg-gradient-to-br from-yellow-50 via-white to-green-50 border border-black border-opacity-5 h-full text-white transition-all duration-300 {{-- border-none --}} z-10  sidebar opacity-75" style="top: 4em;">
        <div class=" {{-- overflow-x-hidden --}} flex flex-col justify-between {{-- flex-grow --}}">
          <ul class="flex flex-col py-4 space-y-1">
            <li class="px-5 hidden md:block">
        <!-- author and publisher -->
          @if(Auth::user()->hasRole('author') || Auth::user()->hasRole('publisher')) 
              <div class="flex flex-row items-center h-8">
                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">{{Auth::user()->roles[0]->name}}</div>
              </div>
            </li>
            <li  class="@if(request()->routeIs('articles-create')) bg-green-900 @endif">
              <x-sidebar.link-item href="/articles/create">
                <x-slot name='symbol'>
                  home
                </x-slot>
                Home
              </x-sidebar.link-item>
            </li> 

          @endif            
          <!-- ./author and publisher -->
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
            <li  class="{{Request::is('users')? 'bg-green-900':''}}" >   
              <x-sidebar.link-item  href="/users">
                <x-slot name='symbol'>
                  users
                </x-slot>
                Profiles
              </x-sidebar.link-item>  
            </li>              
        @endif
         {{-- ./ITU --}}
         {{-- superadmin --}}
         @if(Auth::user()->hasRole('superadmin'))
            <li  class="@if(request()->routeIs('articles-create')) bg-green-900 @endif">
              <x-sidebar.link-item  href="/articles/create">
                <x-slot name='symbol'>
                  edit
                </x-slot>
                Create Article
              </x-sidebar.link-item> 
            </li>          
         @endif
         {{-- ./superadmin --}}

         {{-- publisher and superadmin --}}
          @if(Auth::user()->hasRole('publisher') || Auth::user()->hasRole('superadmin')) 
            <li class="@if(request()->routeIs('articles-unpublished')) bg-green-900 @endif" >   
              <x-sidebar.link-item  href="/articles/unpublished">
                <x-slot name='symbol'>
                  ban
                </x-slot>
                  Unpublished Articles
              </x-sidebar.link-item>  
            </li>          
          @endif
         {{-- ./publisher and superadmin --}}
            <li  class="{{Request::is('articles/my-articles')? 'bg-green-900':''}}" >   
              <x-sidebar.link-item  href="/articles/my-articles">
                <x-slot name='symbol'>
                  clipboard-list
                </x-slot>
                My Articles
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
        {{-- ./superadmin, admin, publisher --}}
          @if(Auth::user()->hasRole('superadmin')||Auth::user()->hasRole('admin')||Auth::user()->hasRole('publisher')) 
            <li  class="@if(request()->routeIs('statistics')) bg-green-900 @endif">
              <x-sidebar.link-item  href="/statistics">
                <x-slot name='symbol'>
                  trending-up
                </x-slot>
                Statistics
              </x-sidebar.link-item> 
            </li> 
          @endif
          {{-- ./superadmin, admin, publisher --}}
            <li  class="{{Request::is('notifications')? 'bg-green-900':''}}" >   
              <x-sidebar.link-item  href="/notifications">
                <x-slot name='symbol'>
                  bell
                </x-slot>
                Notifications {{auth()->user()->unreadNotifications->count()}}
              </x-sidebar.link-item>  
            </li>                      
          </ul>
        </div>
      </div>
@endauth
      <!-- ./Sidebar -->
