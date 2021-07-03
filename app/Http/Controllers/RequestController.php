<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Support_ticket;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function getUserRequests()
    {
        $id = Auth::user()->id;
        $userRequests = Support_ticket::where('user_id', $id)->get();
        //print_r($userRequests);
        return view('dash/requests')->with('userRequests', $userRequests);
    }
}
