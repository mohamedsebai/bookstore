<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public  $imgPath = 'admin/assets/images/banners/';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::paginate(4);
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banners.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|int:0,1',
            'image'   => ['required','mimes:jpg,png,jif,jpeg', 'max:5000', 'dimensions:min_width=100,min_height=100']
        ]);

        
        $extension =  $request->image->extension(); // get file extension
        $newImageName = rand(0, mt_getrandmax()) . '-' . "-Img" . '.' . $extension;
        $request->image->move(public_path($this->imgPath), $newImageName);

        Banner::create([
            'status'=> $request->status,
            'img' =>  $newImageName
        ]);

        return back()->with('message', 'data added successfully');
    }

    public function updateStatus(Banner $banner, $status){
        $banner->update([
            'status'  => $status,
        ]);

        return back()->with('message', 'data updated status successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return back()->with('message', 'data deleted successfully');
    }
}
