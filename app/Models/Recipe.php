<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    public function tags(){
        // ? esto es para la relacion muchos a muchos
        return $this->belongsToMany(Tag::class);
    }
}