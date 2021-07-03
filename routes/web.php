<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/fxadmin', '/admin')->name('admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('dash')->middleware('auth')->group(function () {
    Route::get('accounts', [AccountController::class, 'getUserAccounts'])->name('accounts');
    Route::get('issues', [IssueController::class, 'getUserIssues'])->name('issues');
    Route::get('requests', [RequestController::class, 'getUserRequests'])->name('requests');
});
