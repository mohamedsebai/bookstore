<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(){
        return view('front.account.account');
    }

    public function details(){
        return view('front.account.account_details');
    }

    public function profile(){
        return view('front.account.profile');
    }
}
