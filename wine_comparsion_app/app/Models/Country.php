<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
    ];

    public function memos()
    {
        return $this->hasMany('App\Memo');
    }

    public function items()
    {
        return $this->hasMany('App\Item');
    }

    public function country_tastes()
    {
        return $this->hasMany('App\CountryTaste');
    }
}
