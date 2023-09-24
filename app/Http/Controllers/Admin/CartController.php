<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::paginate(4);
        return view('admin.carts.index', compact('carts'));
    }


    public function show(Cart $cart){
        return view('admin.carts.show', compact('cart'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return back()->with('message', 'data deleted successfully');
    }
}
