<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Car;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'model' => $this->faker->randomElement(['Nebula', 'Quantum', 'Velocity', 'Solaris', 'Pinnacle', 'Horizon', 'Zenith', 'Eclipse', 'Nova', 'Fusion', 'Mirage', 'Vortex', 'Thunder', 'Stratosphere', 'Radiance', 'Titan', 'Infinity']),
            'year' => $this->faker->year('-10 years'),
            'manufacturer_id' => $this->faker->numberBetween(1,\App\Models\Manufacturer::count()),
        ];
    }
}
