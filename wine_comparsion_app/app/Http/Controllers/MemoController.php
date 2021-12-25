<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MemoController extends Controller
{


    /**
     * 初期表示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        $memos = Memo::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get();

        return view('memos_list', [
            'memos' => $memos,
            'select_memo' => session()->get('select_memo')
        ]);
    }

    public function create()
    {
        return view('create_memo');
    }

    /**
     * メモの追加
     * @return \Illuminate\Http\RedirectResponse
     */

    public function add(Request $request)
    {
        Memo::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'number' => $request->number,
            'kind' => $request->kind,
            'content' => $request->content,
        ]);

        return redirect()->route('memo.index');
    }

    /**
     * メモの選択
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function select(Request $request)
    {
        $memo = Memo::find($request->id);
        session()->put('select_memo', $memo);
        return redirect()->route('memo.index');
    }

    /**
     * メモの編集
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function edit($id)
    {

        $memo = Memo::findOrFail($id);
        return view('edit_memo')->with('memo', $memo);
    }

    /**
     * メモの更新
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request, $id)
    {
        $memo = Memo::findOrFail($id);
        $memo->title = $request->title;
        $memo->kind = $request->kind;
        $memo->save();

        // メモ一覧画面へリダイレクトする
        return redirect()->route('memo.index');
    }

    /**
     * メモの削除
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function delete(Request $request, $id)
    {
        Memo::find($id);
        session()->remove('select_memo');

        return redirect()->route('memo.imdex');
    }
}
