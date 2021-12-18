<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * 初期表示
     * @return \Illuminate\Controllers\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        return view('mypage');
    }

    /**
     * プロフィールの更新
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request)
    {
        $profile = User::find($request->id);
        $profile->name = $request->edit_name;
        $profile->email = $request->edit_email;

        return redirect()->route('mypage.index');
    }
}
