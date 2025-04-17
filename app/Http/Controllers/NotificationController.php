<?php


namespace App\Http\Controllers;

use App\Models\NotificationModel;
use App\Models\Notification;
use App\Models\User;
use App\Notifications\AdminToLecturersNotification;
use App\Notifications\LecturerToStudentsNotification;
use App\Notifications\GeneralNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

 class NotificationController extends Controller
 {

    public function notifications() 
    {
        $notifications = Notification::all();
        
        return view('notifications.allNotifications' , compact('notifications'));

    }

    public function index()
    {
        $role = auth()->user()->role;

        $notifications = Notification::where('target', $role)->orderBy('created_at', 'desc')->get();

        Notification::where('target', $role)->where('is_read', false)->update(['is_read' => true]);
        return view('notifications.index' , compact('notifications'));
    }
    public function create()
    {
        return view('notifications.create');
    }

    public function store(Request $request)
    {
       $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'target' => 'required|in:students,lecturers',
        ]); 

        $notifications  = Notification::create([
            'title' => $request->title,
            'message' => $request->message,
            'target' => $request->target,
            'sender_id' => auth()->id(),
        ]);
         return redirect()->back()->with('success','Notification Sent Successfully');
    }

    public function destroy($id)
    {
        $notifications  = Notification::findOrFail($id);
        $notifications->delete();
            return redirect()->route('notifications.all')->with('success','Notification Deleted Successfully!');
            
    }
 }


