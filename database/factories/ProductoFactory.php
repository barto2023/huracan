<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'categoria_id'=>random_int(1,10),
            'marca'=>"marca".random_int(1,10),
            'descripcion'=>$this->faker->address(),
            'foto'=>$this->faker->url(),
            'estado'=>$this->faker->randomElement(['1', '0'])
        ];
    }
}
