<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'status',
    ];

    public function memos()
    {
        return $this->hasMany('App\Memo');
    }
}
