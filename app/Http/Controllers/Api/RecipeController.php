<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Http\Resources\RecipesResource;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class RecipeController extends Controller
{


    public function index(){
        //? se usa all() para traerlo todo y get() para algo mas personalizado
        return RecipesResource::collection(Recipe::with('category','tags','user')->get());
    }
    
    //! Validaciones
    //? cuando creas validaciones debes importarlas y cambiar el modelo q afecta a la funcion por el modelo de las validaciones
    public function store(StoreRecipeRequest $request){

        
        //? vas a crear el recipe y devolveras la respuesta de todo lo que creaste
        $recipe = Recipe::create($request->all());
        // ? vamos a recibir las etiquetas, las pasaremos a formato JSON
        if ($tags = json_decode($request->tags)) {
            // ? Se le agrega (attach()) las etiquetas al recipe que creamos
            $recipe->tags()->attach($tags);
        }
        //? devuelves la respuesta junto a su estado HTTP, debes importar use 
        //? Symfony\Component\HttpFoundation\Response; 
        //? para las respuestas HTTP
        return response()->json(new RecipesResource($recipe), Response::HTTP_CREATED);// http 201
    }

    public function show(Recipe $recipe){
        $recipe = $recipe->load('category','tags','user');
        return new RecipesResource($recipe);
    }

    public function update(UpdateRecipeRequest $recipe, Request $request){
        //? vas a Actualizar con update
        $recipe->update($request->all());

        // ? vamos a recibir las etiquetas, las pasaremos a formato JSON
        if ($tags = json_decode($request->tag)) {
            // ? Se le agrega (async()) para q se sincronicen las nuevas etiquetas y elimine las viejas
            $recipe->tags()->sync($tags);
        }
        //? devuelves la respuesta junto a su estado HTTP, debes importar use 
        //? Symfony\Component\HttpFoundation\Response; 
        //? para las respuestas HTTP
        return response()->json(new RecipesResource($recipe), Response::HTTP_OK);// http 200
    }

    public function destroy(Recipe $recipe){
        $recipe->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT); //204
    }
}