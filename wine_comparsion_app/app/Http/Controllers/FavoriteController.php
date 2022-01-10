<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function add(Request $request)
    {
        Favorite::create([
            'user_id' => Auth::id(),
            'item_id' => $request->favorite,
        ]);
        return redirect()->route('item.detail.information', ['id' => $request->favorite]);
    }

    public function delete(Request $request)
    {
        $user_id = Auth::id();
        Favorite::where('user_id', $user_id)->where('item_id', $request->favorite)->delete();
        return redirect()->route('item.detail.information', ['id' => $request->favorite]);
    }
}
