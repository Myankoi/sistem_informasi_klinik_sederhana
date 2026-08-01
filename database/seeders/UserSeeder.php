<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roles = ['admin', 'pasien', 'dokter', 'apoteker', 'owner'];

        foreach ($roles as $role) {
            for ($i = 1; $i <= 3; $i++) {
                User::create([
                    'name'     => "User $i",
                    'username' => "{$role}{$i}",
                    'password' => Hash::make('password123'),
                    'email'    => "{$role}{$i}@gmail.com",
                    'nohp'     => "08123456780{$i}",
                    'jk'       => $i % 2 === 0 ? 'P' : 'L',
                    'role'     => $role,
                ]);
            }
        }

    }
}
