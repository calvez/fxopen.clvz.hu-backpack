<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deposit;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function getUserTransactions()
    {
        $id = Auth::user()->id;
        $transactions = Deposit::where('user_id', $id)->get();
        //print_r($userRequests);
        return view('dash/transactions')->with('transactions', $transactions);
    }
}
