<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use RakutenRws_Client;


class ItemsController extends Controller
{
    public function index()
    {
        $items = Item::get();
        return view('items_list', [
            'items' => $items,
        ]);
    }
}
