<?php

namespace App\Http\Controllers;

use App\Models\AromaCategory;
use App\Models\Folder;
use App\Models\Memo;
use App\Models\Country;
use App\Models\Grape;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use SebastianBergmann\LinesOfCode\Counter;

class MemoController extends Controller
{


    /**
     * メモの新規作成画面の表示
     */

    public function createView()
    {
        $user_id = Auth::id();
        $folders = Folder::where('user_id', $user_id)->orderBy('updated_at', 'desc')->get();
        $select_folder = session()->get('select_folder');
        $memos_list = Memo::where('user_id', $user_id)->where('folder_id', $select_folder['id'])->get();
        $memo_select = session()->get('memo_select');
        $memo = Memo::where('user_id', $user_id)->where('id', $memo_select)->get();
        // dd($select_folder_id);
        return view('memo_create', [
            'folders' => $folders,
            'countries' => Country::get(),
            'types' => Type::get(),
            'grapes' => Grape::get(),
            // 'arome_categories' => AromaCategory::get(),
            'select_folder' => $select_folder,
            'user_id' => $user_id,
            'memos_list' => $memos_list,
            'memo_select' => $memo_select,
            'memo' => $memo,
        ]);
    }
    /**
     * メモの作成
     */

    public function create(Request $request)
    {
        $user_id = Auth::id();
        Memo::create([
            'user_id' => $request->user_id,
            'folder_id' => 1,
            'country_id' => $request->country_id,
            'type_id' => $request->type_id,
            'grape_id' => $request->grape_id,
            'aroma_category_id' => 1,
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

        // dd($request);
        return redirect()->route('mymemo.index');
    }

    /**
     * メモの一覧表示
     */

    public function select(Request $request)
    {
        $memo_id = Folder::find($request->id);
        session()->put('memo_select', $memo_id);
        return redirect()->route('mymemo.index');
    }
}
