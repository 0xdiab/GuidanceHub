<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "name"          => "Islam Diab",
                "email"         => "diab@test.com",
                "password"      => Hash::make(1234567899),
                "is_admin"      => 1,
                "position"      => "Cybersecurity Analyst",
                "session_price" => 10,
                "image"         => "",
                "linkedin_url"  => "",
                "x_url"         => "",
                "cv_url"        => "",
                "github_url"    => "",
                "gender"        => "male",
                "account_type"  => "mentor",
            ],
            [
                "name"          => "Test",
                "email"         => "test@test.com",
                "password"      => Hash::make(1234567899),
                "is_admin"      => 0,
                "position"      => "Front-end Developer",
                "session_price" => 0,
                "image"         => "",
                "linkedin_url"  => "",
                "x_url"         => "",
                "cv_url"        => "",
                "github_url"    => "",
                "gender"        => "male",
                "account_type"  => "mentee",
            ]
        ];

        foreach ($users as $user) {
            User::create([
                "name"          => $user['name'],
                "email"         => $user["email"],
                "password"      => $user["password"],
                "is_admin"      => $user["is_admin"],
                "position"      => $user["position"],
                "session_price" => $user["session_price"],
                "image"         => $user["image"],
                "linkedin_url"  => $user["linkedin_url"],
                "x_url"         => $user["x_url"],
                "cv_url"        => $user["cv_url"],
                "github_url"    => $user["github_url"],
                "gender"        => $user["gender"],
                "account_type"  => $user["account_type"],
            ]);
        }
    }
}
