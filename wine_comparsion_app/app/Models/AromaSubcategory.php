<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AromaSubcategory extends Model
{
    use HasFactory;

    public function futher_subcategories()
    {
        return $this->hasMany('App\FutherSubcategory');
    }
}
