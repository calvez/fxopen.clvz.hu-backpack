<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;

class IssueController extends Controller
{
    public function getUserIssues()
    {
        return view('dash/issues');
    }
}
