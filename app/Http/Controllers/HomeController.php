<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::where('status', 1)->get();
        $banners = Banner::where('status', 1)->get();
        $products = Product::select("*")
        ->offset(0)
        ->limit(10)
        ->get();
        return view('front.home.index', compact('sliders', 'products', 'banners'));
    }
}
