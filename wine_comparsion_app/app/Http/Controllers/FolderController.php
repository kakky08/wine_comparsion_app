<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Memo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{

    private $folder_id;
    public function index()
    {
        $user_id = Auth::id();
        $folders = Folder::where('user_id', $user_id)->orderBy('updated_at', 'desc')->get();
        return view('memos_list', [
            'folders' => $folders,
            'select_folder' => session()->get('select_folder'),
            'user_id' => $user_id,
        ]);
    }

    public function create_folder(Request $request)
    {
        $data = $request->all();
        // $exist_folder = Folder::where('folder_name', $data['folder'])->where('user_id', $data['user_id'])->first();
        /* if (empty($exist_folder['id'])) {
            $folder_id = Folder::insertGetId(['folder_name' => $data['folder'], 'user_id' => $data['user_id']]);
        } else {
            $folder_id = $exist_folder['id'];
        } */
        // dd($data);
        Folder::create([
            'user_id' => $data['user_id'],
            'folder_name' => $data['folder']
        ]);

        return redirect()->route('mymemo.index');
    }

    /* public function folder_delete(Request $request)
    {
        Folder::find($request->user_id)->delete();
        session()->remove('select_folder');
        return redirect()->route('mymemo.index');
    } */

    public function folder_delete($id)
    {
        $user_id = Auth::id();
        Folder::where('user_id', $user_id)->where('id', $id)->first()->delete();
        session()->remove('select_memo');
        return redirect()->route('mymemo.index');
    }

    public function select(Request $request)
    {
        $folder_id = Folder::find($request->id);
        session()->put('select_folder', $folder_id);
        return redirect()->route('mymemo.index');
    }

    /* public function folder_delete(Request $request)
    {
        Folder::find($request->id)->delete();
        session()->remove('select_folder');

        return redirect()->route('mymemo.index');
    } */

    public function create_memo(Request $request, $id)
    {
        $data = $request->all();

        Memo::create([
            'user_id' => $data['user_id'],
            'folder_id' => $id,
            'memo_name' => $data['folder']
        ]);

        return redirect()->route('mymemo.index');
    }
}
