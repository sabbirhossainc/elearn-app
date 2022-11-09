<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'image' => 'profiles/H6uQs92IXUNpkjO0rOQ5byMiLjrNFW8DVpvAwB4ZCkOZ.png', // image
            'email' => fake()->unique()->safeEmail(),
            // 'remember_token' => Str::random(10),
        ];
    }
}
