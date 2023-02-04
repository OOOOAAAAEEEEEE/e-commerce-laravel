<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Store;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Arif Laksonodhewo',
            'email' => 'arifldhewo234@gmail.com',
            'password' => '$2a$12$ntdHR4jO7vJm3xtMKaU7UuXjsW4sWbdvs8zORTuKBHEVFFNL6OjaC', //password
            'role' => 'admin',
        ]);

        User::factory(2)->create();

        // Store::factory(100)->create();
    }
}
