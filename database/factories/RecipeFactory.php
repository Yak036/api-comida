<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //? vas a ingresar en el model categoria, seleccionaras todas las tablas y luego sacaras el id de una para vincularlo con esta
            'category_id'=> \App\Models\Category::all()->random()->id,
            'user_id'=> \App\Models\User::all()->random()->id,
            'title'=> fake()->sentence(),
            'description'=> fake()->text(),
            'ingredients'=>fake()->text(),
            'instructions'=> fake()->text(),
            'image'=> fake()->imageUrl(640, 480),

        ];
    }
}