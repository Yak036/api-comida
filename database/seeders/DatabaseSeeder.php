<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create(['email'=>'i@admin.com']);
        \App\Models\User::factory(29)->create();
        
        \App\Models\Category::factory(12)->create();

        \App\Models\Recipe::factory(100)->create();
        
        \App\Models\Tag::factory(40)->create();

        //? Para las relaciones muchos a muchos

        $recipes = \App\Models\Recipe::all();
        $tags = \App\Models\Tag::all();

        // ? un bucle para riterar en los recipes y agregarle 2 o 4 Tags mediante el Attach
        foreach ($recipes as $recipe) {
            $recipe->tags()->attach($tags->random((rand(2,4))));    
        }
    }
}