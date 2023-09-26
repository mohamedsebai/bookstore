<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('front.contact.contact');
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'max:50', 'string'],
            'email' => ['required', 'max:50', 'email'],
            'phone' => ['required','int'],
            'subject' => ['required', 'max:250', 'string'],
            'content' => ['required', 'max:500', 'string'],
        ]);

        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'content' => $request->content,
        ]);

        return back()->with('message', 'your message has been sent successfully');
    }
}
