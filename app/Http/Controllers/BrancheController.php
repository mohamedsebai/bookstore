<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BrancheController extends Controller
{
    public function index(){

        $branches = Branch::get();
        return view('front.branches.branches', compact('branches'));
    }
}
