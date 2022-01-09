<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Item;
use App\Models\Type;
use Illuminate\Http\Request;

class SearchController extends Controller
{
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
}
