<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Role::create(['name'=>'admin']);
        \App\Models\Role::create(['name'=>'staff']);

        \App\Models\Message::create([
            'message'=>'',
            'type' => 'message'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => config('site.admin_email'),
            'password' => \Hash::make(config('site.admin_password')),
            'role_id' => 1
        ]);

    }
}
