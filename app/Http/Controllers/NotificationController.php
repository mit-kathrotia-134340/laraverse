<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //
    public function index(){
        $notifications = Notification::where('notify_id',auth()->user()->id)->latest()->get();
        // dd($notifications);
        return Auth::check() ? view('tweets.notifications',[
            'notifications' => $notifications,
        ]) : route('/');
    }
}
