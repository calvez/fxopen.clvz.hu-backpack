<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function getUserNotifications()
    {
        $id = Auth::user()->id;
        $userNotifications = Notification::where('user_id', $id)->get();
        //print_r($userRequests);
        return view('dash/notification')->with('userNotifications', $userNotifications);
    }
}
