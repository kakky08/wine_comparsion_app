<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{

    public function index()
    {
        $folders = Folder::all();

        return view('memos_list', [
            'folders' => $folders,
            'select_folder' => session()->get('select_folder'),
            // 'select_memo' => session()->get('select_memo'),
        ]);
    }

    public function add(Request $request)
    {
        Folder::create([
            'user_id' => Auth::id(),
            'folder_name' => $request->folder_name,
        ]);

        return redirect()->route('mymemo.index');
    }

    public function select(Request $request)
    {
        $folder = Folder::find($request->id);
        session()->put('select_memo', $folder);
        return redirect()->route('mymemo.index');
    }

    public function delete(Request $request)
    {
        Folder::find($request->edit_id)->delete();
        session()->remove('select_folder');
        return redirect()->route('mymemo.index');
    }
}
