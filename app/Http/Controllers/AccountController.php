<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trading_account;

class AccountController extends Controller
{
    public function getUserAccounts()
    {
        //$account = Trading_account::where('')
        return view('dash/accounts');
    }
}
