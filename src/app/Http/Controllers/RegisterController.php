<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\RegisterRequest;


class RegisterController extends Controller
{
    public function create(){
        $seasons = Season::all();
        return view('register', compact('seasons'));
    }

    public function store(RegisterRequest $request){
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image->store('images', 'public'),
            'description' => $request->description,
        ]);

        $product->seasons()->attach($request->seasons);

        return redirect('/products');
    }

}