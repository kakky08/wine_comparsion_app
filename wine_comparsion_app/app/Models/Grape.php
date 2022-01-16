<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grape extends Model
{
    use HasFactory;

    protected $fillable = [
        'grape',
        'value',
    ];

    public function memos()
    {
        return $this->hasMany('App\Memo');
    }

    public function items()
    {
        return $this->hasMany('App\Item');
    }
}
