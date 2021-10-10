<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Todo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create(['email' => env('DEVELOPER_EMAIL', 'admin@pluto.com'), 'name' => env('DEVELOPER_NAME', 'Hapák Józsi')]);
        //TodoFactory's definition() adds what you don't add by yourself
        \App\Models\User::factory(10)->create();
        \App\Models\Todo::factory(20)->create();
        $todos=Todo::get();
        foreach ($todos as $todo)
        {
          $todo->users_assigned()->attach($todo->user_id);
        }
    }
}
