<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'content',
        'types_id',
        'countries_id',
        'grapes_id',
        'country_taste',
        'grape_taste',
        'taste_category',
    ];

    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }
}
