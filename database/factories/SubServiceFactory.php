<?php

namespace Database\Factories;

use App\Models\PublicService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubService>
 */
class SubServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->name(),
            'public_service_id' => PublicService::inRandomOrder()->first()?->id,
        ];
    }
}
