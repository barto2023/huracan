<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'nombre'=> $this->faker->firstNameFemale().random_int(10,10000),
            'nombre'=>"CAT".random_int(10000,19999),
            'estado'=> $this->faker->randomElement(['1', '0'])
        ];
    }

}