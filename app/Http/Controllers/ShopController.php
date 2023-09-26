<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){

        $products = Product::paginate(1);
        return view('front.shop.shop', compact('products'));
    }
}
