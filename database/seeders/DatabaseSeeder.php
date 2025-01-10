<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Mahasiswa;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'username' => 'administrator',
            'nama' => 'Admin',
            'akses' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'is_admin' => 1
        ]);
        User::create([
            'username' => 'user',
            'nama' => 'User',
            'email' => 'user@gmail.com',
            'akses' => 'kasir',
            'password' => bcrypt('kasir'),
            'is_admin' => 0
        ]);
    }
}
