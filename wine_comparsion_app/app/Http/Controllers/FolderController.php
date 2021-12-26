<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{

    public function index()
    {
        $folders = Folder::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get();

        return view('memos_list', [
            'folders' => $folders,
            // 'select_memo' => session()->get('select_memo')
        ]);
    }

    public function add(Request $request)
    {
        Folder::create([
            'user_id' => Auth::id(),
            'folder_name' => $request->folder_name,
        ]);

        return redirect()->route('folder.index');
    }
}
