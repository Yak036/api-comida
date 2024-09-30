<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function recipes(){
        // ? esto es para la relacion muchos a muchos
        return $this->belongsToMany(Recipe::class);
    }
}