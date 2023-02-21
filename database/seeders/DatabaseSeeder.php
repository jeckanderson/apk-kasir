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
            'name' => 'Admin',
            'username' => 'administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            // 'password' => 'adminpass',
            'is_admin' => 1
        ]);
        User::create([
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345'),
            // 'password' => 'userpass',
            'is_admin' => 0
        ]);

        Mahasiswa::create([
            'nama' => 'Jeck Anderson',
            'jurusan' => 'Teknik Informatika',
            'alamat' => 'Jogja',
            'jender' => 'Laki-Laki',
        ]);
        Mahasiswa::create([
            'nama' => 'Alexander',
            'jurusan' => 'Teknik Elektro',
            'alamat' => 'Surabaya',
            'jender' => 'Laki-Laki',
        ]);
    }
}
