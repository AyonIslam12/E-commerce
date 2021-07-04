<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        return \view('website.ecommerce.pages.index');
    }
    public function products(){
        return \view('website.ecommerce.pages.products.products');
    }
    public function productDetails(product $product){

        $product['discount_price'] = HelperController::discount_price($product->price, $product->discount, $product->expiration_date);
        $product['image'] = $product->image()->get();
        $product['category'] = $product->category()->get();
        $product['sub_category'] = $product->sub_category()->get();
        $product['main_category'] = $product->main_category()->get();
        $product['color'] = $product->color()->get();
        $product['publication'] = $product->publication()->get();
        $product['size'] = $product->size()->get();
        $product['unit'] = $product->unit()->get();
        $product['vendor'] = $product->vendor()->get();
        $product['writer'] = $product->writer()->get();
        return \view('website.ecommerce.pages.products.product_details',\compact('product'));
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

    public function latest_product_json(Request $request)
    {
        $collection = product::active()
            ->with([
                'category',
                'sub_category',
                'main_category',
                'color', 'image',
                'publication',
                'size', 'unit',
                'vendor',
                'writer',
            ])
            ->orderBy('id', 'DESC')->paginate(12);
        return $collection;
    }

    public function show_product_json(Product $product)
    {
        $product['discount_price'] = HelperController::discount_price($product->price, $product->discount, $product->expiration_date);
        $product['image'] = $product->image()->get();
        $product['category'] = $product->category()->get();
        $product['sub_category'] = $product->sub_category()->get();
        $product['main_category'] = $product->main_category()->get();
        $product['color'] = $product->color()->get();
        $product['publication'] = $product->publication()->get();
        $product['size'] = $product->size()->get();
        $product['unit'] = $product->unit()->get();
        $product['vendor'] = $product->vendor()->get();
        $product['writer'] = $product->writer()->get();

        //echo $product->discount_price;
        return $product;
    }

    public function get_product_related_info_json($product)
    {
        $product = Product::where('id', $product)->select('id', 'price', 'discount', 'expiration_date')->first();
        $product['discount_price'] = HelperController::discount_price($product->price, $product->discount, $product->expiration_date);

        return $product;
    }
    public function search_product_json(Request $request,  $key)
    {
        $collection = product::active()
        ->where('name', $key)
        ->orWhere('code', $key)
        ->orWhere('price', $key)
        ->orWhere('discount', $key)
        ->orWhere('name','LIKE','%'. $key . '%')
        ->with([
            'category',
            'sub_category',
            'main_category',
            'color', 'image',
            'publication',
            'size', 'unit',
            'vendor',
            'writer',
        ])->orderBy('id','DESC')->paginate(8);

        return $collection;

    }

    public function vue()
    {
        return view('vue');
    }
    public function learnVue()
    {
        return view('learn-vue');
    }
}
