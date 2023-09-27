<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function index(){
        $products = Product::where('id', Auth::user()->id)->get();
        return view('front.favourites.favourites', compact('products'));
    }
}
