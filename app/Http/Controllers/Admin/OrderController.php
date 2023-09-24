<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::paginate(4);
        return view('admin.orders.index', compact('orders'));
    }

    public function create(){
        $users = User::get();
        $products = Product::get();
        return view('admin.orders.add', compact('products', 'users'));
    }

    public function store(Request $request){

        $request->validate([
            'price' => 'required|integer',
            'discount' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        $total = ($request->price - $request->discount) * $request->quantity;

        Order::create([
            'price' =>  $request->price,
            'discount' => $request->discount,
            'quantity' => $request->quantity,
            'total'    => $total,
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'status'  => '0'
        ]);
        return back()->with('message', 'data deleted successfully');
    }

    public function edit(Order $order){
        $users = User::get();
        $products = Product::get();
        return view('admin.orders.edit', compact('order', 'products', 'users'));
    }


    public function update(Request $request , Order $order){
        $request->validate([
            'price' => 'required|integer',
            'discount' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        $total = ($request->price - $request->discount) * $request->quantity;

        $order->update([
            'price' =>  $request->price,
            'discount' => $request->discount,
            'quantity' => $request->quantity,
            'total'    => $total,
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'status'  => '0'
        ]);
        return back()->with('message', 'data deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return back()->with('message', 'data deleted successfully');
    }
}
