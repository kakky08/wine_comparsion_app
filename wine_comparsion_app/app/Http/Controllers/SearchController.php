<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Item;
use App\Models\Type;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function keyword(Request $request)
    {
        $key = $request->key;
        $query = Item::query();

        // TODO 検索条件以外でも取得できている
        if (empty($key)) {
            $query->where('name', 'like', '%' . $key . '%')->get();
        }
        $items = $query->orderBy('created_at', 'desc')->paginate(5);
        $types = Type::get();
        $countries = Country::get();
        return view('search_items_list', compact('items', 'types', 'countries'));
    }

    public function type(Request $request)
    {

        $items = Item::where('type_id', $request->type)->get();

        return view('search_items_list', [
            'items' => $items,
            'type' => Type::where('id', $request->type)->get(),
            'types' => Type::get(),
            'countries' => Country::get(),
        ]);
    }

    public function country(Request $request)
    {

        $items = Item::where('country_id', $request->country)->get();

        return view('search_items_list', [
            'items' => $items,
            'types' => Type::get(),
            'countries' => Country::get(),
        ]);
    }

    public function detail(Request $request)
    {
        $items = Item::where('type_id', $request->type)->where('country_id', $request->country)->get();

        return view('search_items_list', [
            'items' => $items,
            'types' => Type::get(),
            'countries' => Country::get(),
        ]);
    }
    public function by_type($id)
    {
        $items = Item::where('type_id', $id)->get();
        $types = Type::get();
        $countries = Country::get();

        // TODO compact記述に変更
        return view('search_items_list', compact('items', 'types', 'countries'));
    }
}
