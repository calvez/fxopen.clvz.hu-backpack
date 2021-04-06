<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('notification', 'NotificationCrudController');
    Route::crud('todo', 'TodoCrudController');
    Route::crud('support_ticket', 'Support_ticketCrudController');
    Route::crud('trading_account', 'Trading_accountCrudController');
    Route::crud('todos_category', 'Todos_categoryCrudController');
    Route::crud('support_ticket_category', 'Support_ticket_categoryCrudController');
    Route::crud('timer', 'TimerCrudController');
    Route::crud('issue', 'IssueCrudController');
    Route::crud('deposit', 'DepositCrudController');
}); // this should be the absolute last line of this file