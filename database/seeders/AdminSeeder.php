<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'mobile' => fake()->unique()->phoneNumber(),
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'city' => fake()->city(),
            'bank_name' => fake()->word(1,true),
            'number_of_statement' => fake()->numberBetween(1000000,1000000000),
            'is_active' => 1,
            'location' => fake()->sentence(7),
            'type' => 'admin',
            'remember_token' => Str::random(10),
        ]);
        $url = 'https://picsum.photos/200/300';
        $user->addMediaFromUrl($url)->toMediaCollection("avatar");
        $user->addMediaFromUrl($url)->toMediaCollection("residence");
        $user->assignRole(['admin']);

    }
}
