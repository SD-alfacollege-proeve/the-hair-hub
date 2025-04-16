<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //use the factory to create users
        $admin = UserFactory::new()->create([
            "name"=> "Admin",
            "email"=> "admin@example.com",
            "password"=> bcrypt("password"),
        ]);
        $employee = UserFactory::new()->create([
            "name"=> "Employee",
            "email"=> "employee@example.com",
            "password"=> bcrypt("password"),
        ]);
        $user = UserFactory::new()->create([
            "name"=> "User",
            "email"=> "user@example.com",
            "password"=> bcrypt("password"),
        ]);
        
        $user->assignRole("user");
        $employee->assignRole("employee");
        $admin->assignRole("admin");

    }
}
