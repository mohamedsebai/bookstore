<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Faq;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class SingleProductController extends Controller
{
    public function index($id){

        $product = Product::where('id', $id)->first();
        $categories = Category::get();
        $tags = Tag::get();
        $faqs = Faq::get();
        $products = Product::select("*")
        ->offset(0)
        ->limit(10)
        ->get();
        return view('front.single-product.single-product', compact('product', 'categories', 'tags', 'faqs', 'products'));
    }
}
