<?php

namespace App\Http\Controllers;

use App\Models\Timer;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogins()
    {
        $logins = Timer::get();
        return view('dash/logins')->with('logins', $logins);
    }
    //
}
