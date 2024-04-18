<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Technician;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->email(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'mobile' => fake()->unique()->phoneNumber(),
            'city' => fake()->city(),
            'bank_name' => fake()->word(1,true),
            'number_of_statement' => fake()->numberBetween(1000000,1000000000),
            'is_active' => fake()->numberBetween(0,1),
            'location' => fake()->sentence(7),
            'type' => 'technician',
            'remember_token' => Str::random(10),
        ];
    }
}
