<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    /**
     * show all notifications
     */

    public function index()
    {
        $notifications = auth()->user()->notifications();
        if(request('notification_read'))
        {
            if(request('notification_read')=='read')
            {
                $notifications = $notifications->whereNotNull('read_at');
            }
            else{
                $notifications = $notifications->whereNull('read_at');
            }
        }
        $notifications =$notifications->paginate(20)->withQueryString();
        
        return view('notifications.index', compact('notifications'));
    }

    /**
     * mark all notications as read
     */
    public function markRead()
    {
        $notifications = auth()->user()->notifications()->whereNull('read_at')->get();
        foreach($notifications as $notification){
            $notification->markAsRead();
        }
        session()->flash('message', 'Notifications successfully marked as read');
        return redirect('/notifications');
    }

    /**
     * Delete all read notifications
     */
    public function destroyRead()
    {
        $notifications = auth()->user()->notifications()->whereNull('read_at')->get();
        foreach($notifications as $notification){
            $notification->delete();
        }
        session()->flash('message', 'Read notifications were successfully removed');
        return redirect('/notifications');        
    }

    /**
     * Delete all notifications
     */
    public function destroy()
    {
        $notifications = auth()->user()->notifications()->get();
        foreach($notifications as $notification){
            $notification->delete();
        }
        session()->flash('message', 'All notifications were successfully removed');
        return redirect('/notifications'); 
    }    
}
