<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Support_ticket;

class RequestController extends Controller
{
    public function getUserRequests()
    {
        return view('dash/requests');
    }
}
