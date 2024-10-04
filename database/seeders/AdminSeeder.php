<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            ['name' => 'System Owner'],
            ['name' => 'Branch Manager'],
            ['name' => 'POS Operator'], 
            ['name' => 'Exchange Counter Operator'], 
        ]);

        Branch::create([
            'name' => 'Main Branch',
            'phone_number' => '+1234567890',
            'country' => 'Pakistan',
            'city' => 'Karachi',
            'email' => 'branch1@karachi.com',
            'is_active' => true,
            'address' => "Main street branch"
        ]);
        User::create([
            'username' => 'Super Admin',
            'User_Id' => 'REG-1',
            'phone_number' => '+1987654321',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'is_active' => true,
            'city' => 'Los Angeles',
            'country' => 'United States',
            'address' => '123 Main St',
            'role_id' => 1,
        ]);

    }
}
