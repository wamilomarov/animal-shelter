<?php

namespace Database\Factories;

use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class AnimalFactory extends Factory
{
    protected $model = Animal::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_id' => null,
            'name' => $this->faker->firstName(),
            'birthdate' => $this->faker->date(),
            'vet_visits' => $this->faker->numberBetween(0, 10),
        ];
    }
}
