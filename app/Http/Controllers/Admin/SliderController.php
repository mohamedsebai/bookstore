<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public  $imgPath = 'admin/assets/images/sliders/';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::paginate(4);
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.add');
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

        Slider::create([
            'status'=> $request->status,
            'img' =>  $newImageName
        ]);

        return back()->with('message', 'data added successfully');
    }

    public function updateStatus(Slider $slider, $status){
        $slider->update([
            'status'  => $status,
        ]);

        return back()->with('message', 'data updated status successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return back()->with('message', 'data deleted successfully');
    }
}
