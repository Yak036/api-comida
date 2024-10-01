<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'ingredients',
        'instructions',
        'image',
    ];


    public function category(){
        // ? esto es para la relacion muchos a muchos
        return $this->belongsTo(Category::class);
    }
    
    public function user(){
        // ? esto es para la relacion muchos a muchos
        return $this->belongsTo(User::class);
    }

    public function tags(){
        // ? esto es para la relacion muchos a muchos
        return $this->belongsToMany(Tag::class);
    }
}