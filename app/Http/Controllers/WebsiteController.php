<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        return \view('website.ecommerce.pages.index');
    }
    public function products(){
        return \view('website.ecommerce.pages.products.products');
    }
    public function productDetails(){
        return \view('website.ecommerce.pages.products.product_details');
    }
    public function cart(){
        return \view('website.ecommerce.pages.products.cart');
    }
    public function checkout(){
        return \view('website.ecommerce.pages.products.checkout');
    }
    public function wishlist(){
        return \view('website.ecommerce.pages.products.wishlist');
    }
    public function contact(){
        return \view('website.ecommerce.pages.contact');
    }
}
