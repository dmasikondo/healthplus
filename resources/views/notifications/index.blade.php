<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-yellow-200 leading-tight">
            {{ __('Notifications') }} 
        </h2>
    </x-slot> 
<div class="max-w-7xl sm:px-6 lg:px-8">              		
     <div class="mt-4 mx-4">
      <div class="max-w-7xl overflow-hidden rounded-lg shadow-lg px-6">
      	@if($notifications->count()<1)
      		You currently do not have any notifications
      	@endif
      	{{$notifications->links()}}
      	<div class="flex justify-between mt-3">
      		<ul>
			@foreach($notifications as $notification)
	            <li class="flex items-start {{!is_null($notification->read_at)? 'bg-white': 'bg-gray-50'}} p-2 rounded mt-1 border-b border-gray-100 cursor-pointer hover:bg-gray-100" onclick="window.location.href='{{$notification->data['url']}}'">
	              <div class="bg-green-200 rounded-full p-2 fill-current text-green-700">
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