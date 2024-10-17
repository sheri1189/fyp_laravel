<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AuthenticationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Admin",
            "father_name" => "Admin",
            "cnic" => "33102-2577569-9",
            "email" => "itsme.shaharyar@gmail.com",
            "password" => Hash::make(123123123),
            "email_verified_at" => now(),
            "contact_no" => "0300-0000000",
            "gender" => "Male",
            "date_of_birth" => "01,Oct,2000",
            "address" => "Faisalabad",
            "is_email_verified" => 1,
            "is_active" => 1,
            "role_assign" => "Admin",
        ]);
        User::create([
            "name" => "Admin",
            "father_name" => "Admin",
            "cnic" => "33102-3848483-3",
            "email" => "itsme.shaharyar@gmail.com",
            "password" => Hash::make(123123123),
            "email_verified_at" => now(),
            "contact_no" => "0300-0000000",
            "gender" => "Male",
            "date_of_birth" => "01,Oct,2000",
            "address" => "Faisalabad",
            "is_email_verified" => 1,
            "is_active" => 1,
            "role_assign" => "Admin",
        ]);
    }
}
