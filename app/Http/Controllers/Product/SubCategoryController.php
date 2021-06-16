<?php

namespace App\Http\Controllers\Product;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_category = SubCategory::with('main_category','category_info')->where('status',1)->latest()->paginate(10);
        return \view('admin.pages.sub-category.index',\compact('sub_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $main_category = MainCategory::where('status',1)->latest()->get();
        $category = Category::where('status',1)->latest()->get();
        return \view('admin.pages.sub-category.create',\compact('category','main_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'main_category_id' => 'required|string',
            'category_id' => 'required|string',
            'icon' => 'required',
        ]);
        $sub_category = SubCategory::create($request->except('icon'));
       if($request->has('icon')){
        $sub_category->icon = Storage::put('sub-category', $request->file('icon'));
        $sub_category->save();
        }
        $sub_category->main_category_id =$request->main_category_id;
        $sub_category->category_id =$request->category_id;
        $sub_category->slug = Str::slug($sub_category->name);
        $sub_category->creator =Auth::user()->id;
        $sub_category->save();
        return \response('success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $main_category = MainCategory::where('status',1)->latest()->get();
        $category = Category::where('status',1)->latest()->get();
        $sub_category = SubCategory::find($id);
        return \view('admin.pages.sub-category.edit',\compact('sub_category','category','main_category'));
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
        $request->validate([
            'name' => 'required|string',
        ]);
        $sub_category = SubCategory::find($id);

        $sub_category->name = $request->name;
        if($request->has('icon')){
            $sub_category->icon = Storage::put('sub-category', $request->file('icon'));
            $sub_category->save();
            }
        $sub_category->main_category_id = $request->main_category_id;
        $sub_category->category_id = $request->category_id;
        $sub_category->slug = Str::slug($sub_category->name);
        $sub_category->creator =Auth::user()->id;
        $sub_category->save();
        return \response('success');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $sub_category = SubCategory::find($id);
       if($sub_category){
           $sub_category->delete();
       }
       return \response('success');
    }
}
