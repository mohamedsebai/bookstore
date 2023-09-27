<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function store(Request $request, $id)
    {

        $product = Product::where('id', $id)->first();

        $total = ($product->price - $product->discount) * $product->quantity;
        Order::create([
            'price' =>  $product->price,
            'discount' => $product->discount,
            'quantity' => $request->quantity,
            'total'    => $total,
            'user_id' => Auth::user()->id,
            'product_id' => $id,
            'status'  => '0'
        ]);

        return back()->with('message', 'order has added to your cart');
    }

    public function addToFav(Request $request, $id)
    {

        $product = Product::where('id', $id)->first();
        Favourite::create([
            'user_id' => Auth::user()->id,
            'product_id' => $id,
        ]);

        return back()->with('message', 'product has added to favourts');
    }


}
