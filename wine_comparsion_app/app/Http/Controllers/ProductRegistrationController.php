<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Grape;
use App\Models\Item;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductRegistrationController extends Controller
{
    public function show()
    {
        $types = Type::get();
        $countries = Country::get();
        $grapes = Grape::get();

        return view('product_registration', [
            'types' => $types,
            'countries' => $countries,
            'grapes' => $grapes,
        ]);
    }

    public function item_add(Request $request)
    {
        $data = $request->all();

        // dd($data);
        $types = Type::where('id', $data['type'])->first();
        $countries = Country::where('id', $data['country'])->first();
        $grapes = Grape::where('id', $data['grape'])->first();

        Item::create([
            'name' => $data['name'],
            'content' => $data['content'],
            'types_id' => $data['type'],
            'countries_id' => $data['country'],
            'grapes_id' => $data['grape'],
            'country_taste' => 'A',
            'grape_taste' => 'B',
            'taste_category' => 'AB',
        ]);

        return redirect()->route('product.registration');
    }

    public function category_edit()
    {
        return view('category_edit');
    }





    public function type_add(Request $request)
    {
        $data = $request->all();
        Type::create([
            'type' => $data['type'],
        ]);

        return redirect()->route('category.edit');
    }

    public function country_add(Request $request)
    {
        $data = $request->all();
        Country::create([
            'country' => $data['country'],
        ]);

        return redirect()->route('category.edit');
    }

    public function grape_add(Request $request)
    {
        $data = $request->all();
        Grape::create([
            'grape' => $data['grape'],
            'value' => $data['value'],
        ]);

        return redirect()->route('category.edit');
    }

    public function category_delete()
    {
        $types = Type::get();
        $countries = Country::get();
        $grapes = Grape::get();

        return view('category_delete', [
            'types' => $types,
            'countries' => $countries,
            'grapes' => $grapes,
        ]);
    }

    public function type_delete(Request $request)
    {
        Type::find($request->type)->delete();

        return redirect()->route('category.delete');
    }

    public function country_delete(Request $request)
    {
        Country::find($request->country)->delete();
        return redirect()->route('category.delete');
    }

    public function grape_delete(Request $request)
    {
        Grape::find($request->grape)->delete();
        return redirect()->route('category.delete');
    }
}
