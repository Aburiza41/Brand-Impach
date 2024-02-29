<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chart>
 */
class ChartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            // Faker Numbers long 12 digits
            'whatapps' => $this->faker->phoneNumber,
            'kota' => $this->faker->city,
            'prov' => $this->faker->state,
            // Sumber faker from enum (whatapps, facebook, instagram, iklan)
            'sumber' => $this->faker->randomElement(['whatapps', 'facebook', 'instagram', 'iklan']),
            'nama_iklan' => Str::title($this->faker->sentence(3)),
        ];
    }
}
