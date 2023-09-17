<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faq = Faq::paginate(10);
        return view('admin.faq.index', compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faq.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => ['required', 'max:100', 'string'],
            'answer' => ['required', 'max:100', 'string']
        ]);

        Faq::create([
            'question'=> $request->question,
            'answer'=> $request->answer
        ]);

        return back()->with('message', 'data added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        return view('admin.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => ['required', 'max:100', 'string'],
            'answer' => ['required', 'max:100', 'string']
        ]);

        $faq->update([
            'question'=> $request->question ,
            'answer'=> $request->answer
        ]);

        return back()->with('message', 'data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return back()->with('message', 'data deleted successfully');
    }
}
