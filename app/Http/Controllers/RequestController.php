<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Support_ticket;
use App\Models\Support_ticket_category;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\New_;

class RequestController extends Controller
{
    public function getUserRequests()
    {
        $id = Auth::user()->id;
        $userRequests = Support_ticket::where('user_id', $id)->get();
        //print_r($userRequests);
        return view('dash/requests')->with('userRequests', $userRequests);
    }

    public function create()
    {
        $id = Auth::user()->id;
        $categories = Support_ticket_category::get();
        return view('dash/requests-create')->with(
            [
                'user' => $id,
                'categories' => $categories
            ]
        );
    }

    public function add(Request $request)
    {

        $request['time']= now();

        //  Store data in database
        Support_ticket::create($request->all());

        //
        return back()->with('success', 'We have received your message.');
    }
}
