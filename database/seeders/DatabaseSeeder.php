<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Deposit::factory(10)->create();
        \App\Models\Issue::factory(10)->create();
        \App\Models\Support_ticket_category::factory(5)->create();
        \App\Models\Support_ticket::factory(10)->create();
        \App\Models\Todos_category::factory(5)->create();
        \App\Models\Todo::factory(10)->create();
        \App\Models\Trading_account::factory(10)->create();
        \App\Models\Notification::factory(10)->create();
        \App\Models\Timer::factory(20)->create();
        \App\Models\Portfolio::factory(10)->create();
    }
}
