<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        return view('cart.index');
    }
    public function contact() {
        return view('cart.contact');
    }
    public function shopcategory() {
        return view('cart.category_cart');
    }
    public function productdetails() {
        return view('cart.product_details');
    }
    public function confirmation() {
        return view('cart.confirmation');
    }
    public function shopingcart() {
        return view('cart.shopingcart');
    }
}
