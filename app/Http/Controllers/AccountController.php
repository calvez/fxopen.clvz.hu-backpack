<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trading_account;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function getUserAccounts()
    {
        $id = Auth::user()->id;
        $userAccounts = Trading_account::where('user_id', $id)->get();
        return view('dash/accounts')->with('userAccounts', $userAccounts);
    }
}
