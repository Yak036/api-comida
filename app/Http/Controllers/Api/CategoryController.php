<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index(){
        return CategoryResource::collection(Category::all());
    }

    public function store(){

    }
    
    public function show(Category $category){
        // ? Load se usa cuando ya hiciste la consulta y quieres precargarle otra cosa
        $category = $category->load('recipes');
        return new CategoryResource($category);
    }

    public function update(){
        
    }

    public function des(){
        
    }
}