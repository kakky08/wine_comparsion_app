<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\Request as FacadesRequest;

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

    public function myMemo($user_id)
    {
        $folder = Folder::query('folder');

        if (empty($folder)) {
            return Memo::where('user_id', $user_id)->where('status', 1)->get();
        } else {
            $memos = Memo::leftJoin('folders', 'folders.id', '=', 'memos.folder_id')
                ->where('folders.name', $folder)
                ->where('folders.user_id', $user_id)
                ->where('memos.user_id', $user_id)
                ->where('status', 1)
                ->get();
            return $memos;
        }
    }
}
