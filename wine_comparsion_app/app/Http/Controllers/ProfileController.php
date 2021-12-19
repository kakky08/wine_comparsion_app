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
        $auth = Auth::user();
        return view('mypage', ['auth' => $auth]);
    }

    public function edit()
    {
        $auth = Auth::user();
        return view('edit_profile', ['auth' => $auth]);
    }

    /**
     * プロフィールの更新
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request)
    {
        $auth = Auth::id();
        $profile = User::find($auth);
        $profile->name = $request->edit_name;
        $profile->email = $request->edit_email;
        $profile->update();
        return redirect()->route('mypage.index');
    }
}
