<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' => 'administrator@example.com',
            'password' => Hash::make('P@ssw0rd'),
            'usertype' => 'admin']);

        \App\Models\User::factory()->create([
           'name' => 'Normaluser1',
           'email' => 'normaluser1@example.com',
           'password' => Hash::make('P@ssw0rd'),
           'usertype' => 'normal' ]);

        \App\Models\User::factory()->create([
           'name' => 'Normaluser2',
           'email' => 'normaluser2@example.com',
           'password' => Hash::make('P@ssw0rd'),
           'usertype' => 'normal' ]);
    }
}
