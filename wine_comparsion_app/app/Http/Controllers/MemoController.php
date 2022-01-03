<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Memo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MemoController extends Controller
{


    /**
     * メモの新規作成画面の表示
     */

    public function createView()
    {
        $user_id = Auth::id();
        $folders = Folder::where('user_id', $user_id)->orderBy('updated_at', 'desc')->get();
        return view('memo_create', [
            'folders' => $folders,
            'select_folder' => session()->get('select_folder'),
            'user_id' => $user_id,
        ]);
    }
    /**
     * メモの作成
     */

    public function create(Request $request)
    {
        $user_id = Auth::id();
        Memo::create([
            'user_id' => $user_id,
            'folder_id' => $request->folder_id,
            'countries_id' => $request->countries_id,
            'type_id' => $request->type_id,
            'grape_id' => $request->grape_id,
            'aroma_category_id' => $request->aroma_category_id,
            'name' => $request->name,
            'content' => $request->content,
            'comprehensive_evaluation' => $request->comprehensive_evaluation,
            'flavor' => $request->flavor,
            'bitter_taste' => $request->bitter_taste,
            'afterglow' => $request->afterglow,
            'taste' => $request->taste,
            'bodied' => $request->bodied,
            'sweet_taste' => $request->sweet_taste,
            'fruit_taste' => $request->fruit_taste,
            'acidity_taste' => $request->acidity_taste,
        ]);

        return redirect()->route('mymemo.index');
    }
}
