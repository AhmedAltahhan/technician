<?php

namespace Database\Seeders;

use App\Models\PublicService;
use App\Models\SubService;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Add 2 users
        // User::factory()->count(2)->create();

        User::factory()->count(4)
        ->hasAttached(PublicService::factory()->count(2), [] ,'publicServices')
        ->hasAttached(SubService::factory()->count(2), [] ,'subServices')
        ->create();

        // to add random pictures of users & pictures of residence
        foreach (User::all() as $user) {
            $url = 'https://picsum.photos/200/300';
            $user->addMediaFromUrl($url)->toMediaCollection("avatar");
            $user->addMediaFromUrl($url)->toMediaCollection("residence");
            // to add role of users
            $user->assignRole(['technician']);
        }
    }
}
