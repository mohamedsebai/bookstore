<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrancheController extends Controller
{
    public function index(){
        return view('front.branches.branches');
    }
}
