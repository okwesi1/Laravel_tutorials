<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Girl>
 */
class GirlFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create('en_US');
        return [
            'name' => $faker->name(),
            'is_human' => 'YES',
            'blood_type' => $faker->bloodGroup(),
        ];
    }
}
