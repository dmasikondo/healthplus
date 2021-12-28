@if(request('mark_as_read'))
	{{auth()->user()->unreadNotifications->where('id', request()->mark_as_read)->markAsRead()}}
@endif