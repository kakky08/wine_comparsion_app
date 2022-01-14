<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Memo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{


    /**
     * メモ一覧画面の表示
     */
    public function index()
    {
        $user_id = Auth::id();
        $folders = Folder::where('user_id', $user_id)->orderBy('updated_at', 'desc')->get();
        $select_folder = session()->get('select_folder');
        // $memos_list = Memo::where('user_id', $user_id)->where('folder_id', $select_folder['id'])->get();
        return view('memos_list', [
            'folders' => $folders,
            'select_folder' => $select_folder,
            'user_id' => $user_id,
            // 'memos_list' => $memos_list,
        ]);
    }

    /**
     * フォルダの作成
     */

    public function create_folder(Request $request)
    {
        $data = $request->all();
        Folder::create([
            'user_id' => $data['user_id'],
            'name' => $data['folder'],
            'status' => 1,
        ]);

        return redirect()->route('mymemo.index');
    }

    /* public function folder_delete(Request $request)
    {
        Folder::find($request->user_id)->delete();
        session()->remove('select_folder');
        return redirect()->route('mymemo.index');
    } */

    /**
     * フォルダの削除
     */

    public function folder_delete($id)
    {
        $user_id = Auth::id();
        Folder::where('user_id', $user_id)->where('id', $id)->first()->delete();
        session()->remove('select_folder');
        return redirect()->route('mymemo.index');
    }

    /**
     * フォルダの選択
     */


    public function folder_select(Request $request)
    {
        $folder_id = Folder::find($request->id);
        session()->put('select_folder', $folder_id);
        return redirect()->route('mymemo.index');
    }

    /**
     * メモの新規作成画面の表示
     */

    /* public function memo_createView()
    {
        $user_id = Auth::id();
        $folders = Folder::where('user_id', $user_id)->orderBy('updated_at', 'desc')->get();
        return view('show_memo_createView', [
            'folders' => $folders,
            'select_folder' => session()->get('select_folder'),
            'user_id' => $user_id,
        ]);
    } */
    /**
     * メモの作成
     */

    public function memo_create(Request $request, $id)
    {
        $data = $request->all();

        Memo::create([
            'user_id' => $data['user_id'],
            'folder_id' => $id,
            'memo_name' => $data['folder']
        ]);

        return redirect()->route('mymemo.index');
    }

    /**
     * メモの編集
     */

    /**
     * メモの選択
     */

    /**
     * メモの削除
     */
}
