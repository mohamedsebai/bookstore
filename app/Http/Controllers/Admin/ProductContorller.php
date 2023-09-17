<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\FaqAnswer;
use App\Models\FaqQuestion;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductContorller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public  $imgPath = 'admin/assets/images/products/';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(4);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $request->validate([
            'image'   => 'required',
        ]);

        if($request->hasFile('image')){
            $extension =  $request->image->extension(); // get file extension
            $newImageName = rand(0, mt_getrandmax()) . '-' . "-Img" . '.' . $extension;
            $request->image->move(public_path($this->imgPath), $newImageName);
        }

        Product::create([
            'img' =>  $newImageName,
            'title' => $request->title,
            'descreption' => $request->descreption,
            'auther' => $request->auther,
            'price' => $request->price,
            'discount' => $request->discount,
            'quantity' => $request->quantity,
            'product_code' => $request->product_code,
            'pages_num' => $request->pages_num
        ]);


        return back()->with('message', 'data added successfully');
    }

        /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {

        if($request->hasFile('image')){
            $extension =  $request->image->extension(); // get file extension
            $newImageName = rand(0, mt_getrandmax()) . '-' . "-Img" . '.' . $extension;
            $request->image->move(public_path($this->imgPath), $newImageName);
        }

        $product->update([
            'img' =>  $newImageName ?? $product->img,
            'title' => $request->title,
            'descreption' => $request->descreption,
            'auther' => $request->auther,
            'price' => $request->price,
            'discount' => $request->discount,
            'quantity' => $request->quantity,
            'product_code' => $request->product_code,
            'pages_num' => $request->pages_num
        ]);

        return back()->with('message', 'data updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('message', 'data deleted successfully');
    }
}
