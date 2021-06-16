<?php

namespace App\Http\Controllers\Product;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::with('main_category')->where('status',1)->latest()->paginate(10);
       return \view('admin.pages.category.index',\compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $main_category = MainCategory::where('status',1)->latest()->get();
        return \view('admin.pages.category.create',\compact('main_category'));
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
           'icon' => 'required',

       ]);
       $category = Category::create($request->except('icon'));
       if($request->has('icon')){
        $category->icon = Storage::put('category', $request->file('icon'));
        $category->save();
        }
        $category->slug = Str::slug($category->name);
        $category->creator =Auth::user()->id;
        $category->save();
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
        $category = Category::find($id);
        return \view('admin.pages.category.edit',\compact('category','main_category'));
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
            'main_category_id' => 'required|string',
        ]);
        $category =Category::find($id);
        if($request->has('icon')){
            $category->icon = Storage::put('category', $request->file('icon'));
            $category->save();
            }
        $category->name = $request->name;
        $category->main_category_id = $request->main_category_id;
        $category->slug = Str::slug($category->name);
        $category->creator =Auth::user()->id;
        $category->save();
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
        $category =Category::find($id);
        if($category){
            $category->delete();
        }
        return \response('success');
    }
}
