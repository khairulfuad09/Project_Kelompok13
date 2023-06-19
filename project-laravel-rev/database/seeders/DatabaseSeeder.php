<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\status_user;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'username' => 'fuad',
            'email' => 'kfuad9977@gmail.com',
            'password' => bcrypt('12345'),
            'alamat' => 'mandiangin',
            'id_status' => 'adm'
        ]);
        User::create([
            'username' => 'fuad1',
            'email' => 'kfuad9933@gmail.com',
            'password' => bcrypt('12345'),
            'alamat' => 'mandiangin',
            'id_status' => 'pnj'
        ]);
        status_user::create([
            'id_status' => 'adm',
            'nama_status' => 'admin'
        ]);
        status_user::create([
            'id_status' => 'pnj',
            'nama_status' => 'penjual'
        ]);
        status_user::create([
            'id_status' => 'usr',
            'nama_status' => 'user'
        ]);
    }
}
