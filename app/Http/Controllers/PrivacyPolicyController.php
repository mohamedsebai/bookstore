<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function index(){
        return view('front.privacy-policy.privacy-policy');
    }
}
