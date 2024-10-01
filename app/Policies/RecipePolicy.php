<?php

namespace App\Policies;

use App\Models\Recipe;
use App\Models\User;

class RecipePolicy
{
    /**
     * Create a new policy instance.
     */
    public function update(User $user, Recipe $recipe) : bool
    {
        return $user->id === $recipe->user_id; // True, False
    }
    public function delete(User $user, Recipe $recipe) : bool
    {
        return $user->id === $recipe->user_id; // True, False
    }
}