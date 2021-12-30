<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{

    private $folder_id;
    public function index()
    {
        $folders = Folder::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get();
        return view('memos_list', [
            'folders' => $folders,
            'select_folder' => session()->get('select_folder')
        ]);
    }

    public function create_folder(Request $request)
    {
        $data = $request->all();
        $exist_folder = Folder::where('folder_name', $data['folder'])->where('user_id', $data['user_id'])->first();
        if (empty($exist_folder['id'])) {
            $folder_id = Folder::insertGetId(['folder_name' => $data['folder'], 'user_id' => $data['user_id']]);
        } else {
            $folder_id = $exist_folder['id'];
        }
    }

    public function add()
    {
        Folder::create([
            'user_id' => Auth::id(),
            'folder_name' => 'name',
        ]);

        return redirect()->route('mymemo.index');
    }

    public function select(Request $request)
    {
        $this->folder_id = Folder::find($request->id);
        session()->put('select_folder', $this->folder_id);
        return redirect()->route('mymemo.index');
    }

    public function folder_delete(Request $request)
    {
        Folder::find($request->id)->delete();
        session()->remove('select_folder');

        return redirect()->route('mymemo.index');
    }
}
