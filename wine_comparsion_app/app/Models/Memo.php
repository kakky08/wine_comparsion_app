<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'folder_id',
        'country_id',
        'type_id',
        'grape_id',
        'aroma_category_id',
        'name',
        'content',
        'comprehensive_evaluation',
        "flavor",
        'bitter_taste',
        'afterglow',
        'taste',
        'bodied',
        'sweet_taste',
        'fruit_taste',
        'acidity_taste'
    ];
}
