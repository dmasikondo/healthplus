<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Notifications') }} 
        </h2>
    </x-slot>
<div class="max-w-7xl sm:px-6 lg:px-8">              		
     <div class="mt-4 mx-4">
      <div class="max-w-7xl {{-- overflow-hidden --}} rounded-lg shadow-lg px-6">

      	<x-session-message/>
      	<p>
	      	@if($notifications->count()<1)
	      		You currently do not have the requested notifications
	      	@endif
      	</p>

      	{{$notifications->links()}}

      	{{-- read notifications filter --}}
        	<div class="relative lg:flex lg:inline-flex items-center bg-gradient-to-br from-yellow-50 via-white to-green-50 border border-1 border-black mt-8" >
            	<x-articles.dropdown> 
                 <x-slot name="title">
                    {{isset(request()->notification_read)? ucwords(request()->notification_read): 'All'}}
                 </x-slot>
                    <x-articles.dropdown-item  href="/notifications">All</x-articles.dropdown-item>
                    <x-articles.dropdown-item  href="/notifications?notification_read=read">
                        Read
                    </x-articles.dropdown-item>
                    <x-articles.dropdown-item  href="/notifications?notification_read=unread">
                        Unread
                    </x-articles.dropdown-item>
                </x-articles.dropdown>
           </div>
         {{-- delete notifications --}}
        	<div class="relative lg:flex lg:inline-flex items-center bg-gradient-to-br from-yellow-50 via-white to-green-50 border border-1 border-black mt-8" >
            	<x-articles.dropdown> 
                 <x-slot name="title">
                    Mark as Read
                 </x-slot>
                    <x-articles.dropdown-item  href="/notifications/mark-as-read">Mark All as Read</x-articles.dropdown-item>
                    <x-articles.dropdown-item  href="/notifications/delete-read">
                        Delete Read
                    </x-articles.dropdown-item>
                    <x-articles.dropdown-item  href="/notifications/delete-all">
                        Delete All
                    </x-articles.dropdown-item>
                </x-articles.dropdown>
           </div>         

      	<div class="flex justify-between mt-3">

      		<ul>
			@foreach($notifications as $notification)
	            <li class="flex items-start {{!is_null($notification->read_at)? 'bg-white': 'bg-gray-50'}} p-2 rounded mt-1 border-b border-gray-100 cursor-pointer hover:bg-gray-100" 
	            	onclick="window.location.href='{{$notification->data['url']}}?&mark_as_read={{$notification->id}}'">
	              <div class="{{-- bg-green-200 --}} rounded-full p-2 fill-current {{-- text-green-700  --}}  bg-green-100 text-green-900">
	                <x-icon name="{{$notification->data['icon']}}" class="h-6 w-6"/>
	              </div>
	              <p class="text-gray-700 text-lg ml-3 space-x-6">
	              	<span>
	              		{{$notification->data['user']['first_name'] }}
						{{$notification->data['user']['surname']}}
	              	</span>		      			      		
		      		<span>{{$notification->data['message']}}	</span> 
		      		<small>{{$notification->created_at->diffForHumans()}}</small> 
		      	@if(!is_null($notification->read_at)) 
		      		<div class="bg-blue-200 rounded-full p-1 fill-current">
		      			<x-icon name="check-circle" class="h-4 w-4"/>
		      		</div>
		      	@endif           	
	              </p>
	              <p>

	              </p>
	            </li>			
			@endforeach
      		</ul>
      	</div>      	
      </div>
     </div>
 </div>
      
</x-app-layout>



 {{--    	<div class="bg-white p-2 rounded mt-1 border-b border-grey cursor-pointer hover:bg-grey-lighter">
        Check the meta tags
	</div>  --}}