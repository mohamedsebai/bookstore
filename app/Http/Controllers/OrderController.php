<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return view('front.orders.orders');
    }

    public function details(){ // need an id but no for try code only
        return view('front.orders.order-details');
    }

    public function recieved(){
        return view('front.orders.order-recieved');
    }

    public function track(){
        return view('front.orders.track-order');
    }
}
