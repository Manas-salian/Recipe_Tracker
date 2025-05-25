<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'title',
        'description',
        'ingredients',
        'instructions',
        'cooking_time',
        'difficulty',
        'image_path'
    ];
}
