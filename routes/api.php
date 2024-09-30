<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\RecipeController;
use App\Http\Controllers\Api\TagController;
use Database\Factories\RecipeFactory;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix("V1")->group(function () {
            Route::apiResource("categories", CategoryController::class)->only(["index",'store','destroy', "show", 'update']);
            
            Route::apiResource("recipes",    RecipeController::class)->only(["index",'store','destroy', "show", 'update']);

            Route::apiResource("tags",       TagController::class)->only(["index",'store','destroy', "show", 'update']);
        },
    );