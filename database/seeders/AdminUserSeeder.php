<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRoleId = DB::table('user_roles')->where('name', 'Seller')->value('id');

        DB::table('users')->insert([
            'name' => 'Admin',
            'phone' => '07564678',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role_id' => $adminRoleId,
            'balance' => 0,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
