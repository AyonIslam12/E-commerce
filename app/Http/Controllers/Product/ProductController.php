<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\MainCategory;
use App\Models\Publication;
use App\Models\Size;
use App\Models\Status;
use App\Models\SubCategory;
use App\Models\Unit;
use App\Models\Vendor;
use App\Models\Writter;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::where('status', 1)->get();
        $colors = Color::where('status', 1)->get();
        $sizes = Size::where('status', 1)->get();
        $units = Unit::where('status', 1)->get();
        $writers = Writter::where('status', 1)->get();
        $publication = Publication::where('status', 1)->get();
        $vendors = Vendor::where('status', 1)->get();
        $status = Status::where('status', 1)->get();

        $main_categories = MainCategory::where('status', 1)->get();
        $latest_maincategory_id = MainCategory::where('status', 1)->first()->id;

        $categories = Category::where('status', 1)->where('main_category_id', $latest_maincategory_id)->latest()->get();
        $latest_category_id = Category::where('status', 1)->where('main_category_id', $latest_maincategory_id)->first()->id;

        $sub_categories = SubCategory::where('status', 1)
            ->where('main_category_id', $latest_maincategory_id)
            ->where('category_id', $latest_category_id)
            ->latest()->get();

        return view('admin.pages.product.create', compact(
            'brands',
            'colors',
            'sizes',
            'units',
            'main_categories',
            'categories',
            'sub_categories',
            'writers',
            'publication',
            'vendors',
        ));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
            'product_name' => ['required'],
            'brand_id' => ['required'],
            'product_main_category_id' => ['required'],
            'product_category_id' => ['required'],
            'product_sub_category_id' => ['required'],
            'color_id' => ['required'],
            'size_id' => ['required'],
            'unit_id' => ['required'],
            'vendor_id' => ['required'],
            'price' => ['required'],
            'discount' => ['required'],
            'expiration_date' => ['required'],
            'stock' => ['required'],
            'alert_quantity' => ['required'],
            'description' => ['required'],
            'features' => ['required'],
            'thumb_image' => ['required'],
            'related_images' => ['required'],
            'status' => ['required'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return \view('admin.pages.product.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
