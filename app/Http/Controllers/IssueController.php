<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use Illuminate\Support\Facades\Auth;

class IssueController extends Controller
{
    public function getUserIssues()
    {
        $id = Auth::user()->id;
        $userIssues = Issue::where('user_id', $id)->get();
        return view('dash/issues')->with('userIssues', $userIssues);
    }
}
