<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\FavoriteTaste;
use App\Models\Item;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RakutenRws_Client;

use function PHPSTORM_META\type;

class ItemsController extends Controller
{
    public function index()
    {
        $items = Item::get();
        $user_id = Auth::id();


        $type_id = User::where('id', $user_id)->select('type_id')->first();
        $country = User::where('id', $user_id)->select('country_id')->first();
        $favorite = User::where('id', $user_id)->select('favorite_taste_id')->first();
        /* if ($type_id === NULL) {
            $type_id = false;
        }
        if ($contry_taste === NULL) {
            $country_taste = false;
        }
        if ($favorite_taste === NUll) {
            $favorite_taste = false; */
        // $favorite_taste = rand(1, FavoriteTaste::count());
        // }

        /* $recommendations = Item::when(isset($type_id), function ($query, $type_id) {
            $query->where('type_id', $type_id);
        })->when(isset($country_taste), function ($query, $country_taste) {
            $query->where('country_taste', $country_taste);
        })->when(isset($favorite_taste), function ($query, $favorite_taste) {
            $query->where('taste_category', $favorite_taste);
        })->take(4);
 */
        /* $type_id = $type->type_id;
        $recommendations = Item::when(isset($type), function ($query, $type) {
            return $query->where('type_id', $type_id);
        })->take(4); */

        /**
         * ログインユーザー情報からおすすめワインを検索
         */
        $recommendations = Item::when(isset($type_id), function ($query) use ($type_id) {
            $query->where('type_id', $type_id->type_id);
        })->when(isset($country->country_taste), function ($query) use ($country) {
            $query->where('country_taste', $country->country_taste);
        })->when(isset($favorite->favorite_taste), function ($query) use ($favorite) {
            $query->where('taste_category', $favorite->favorite_taste);
        })->inRandomOrder()->take(4)->get();


        return view('items_list', [
            'items' => $items,
            'recommendations' => $recommendations,
            'types' => Type::get(),
            'countries' => Country::get(),
        ]);
    }
}
