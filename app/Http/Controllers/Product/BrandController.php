<?php

namespace App\Http\Controllers\Product;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::where('status',1)->latest()->paginate(10);
        return \view('admin.pages.brand.index',\compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('admin.pages.brand.create');
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
            'logo' => 'required',
        ]);
        $brand = Brand::create($request->except('logo'));
        if($request->has('logo')){
            $brand->logo = Storage::put('brands', $request->file('logo'));
            $brand->save();
        }
        $brand->slug = Str::slug($brand->name);
        $brand->creator =Auth::user()->id;
        $brand->save();
        //return \response('success');
        //return redirect()->route('brand.index')->with('success','brand added');
        return response()->json([
            'html' => "<option value='".$brand->id."'>".$brand->name."</option>",
            'value' => $brand->id,
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
        $brand = Brand::find($id);
        return \view('admin.pages.brand.edit',\compact('brand'));
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

        $brand = Brand::find($id);
        $brand->name = $request->name;
        if($request->has('logo')){
            $brand->logo = Storage::put('brands', $request->file('logo'));
            $brand->save();
        }
        $brand->slug = Str::slug($brand->name);
        $brand->creator =Auth::user()->id;
        $brand->save();
       // return redirect()->route('brand.index')->with('success','brand updated');
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
       $brand = Brand::find($id);

       if($brand){
        $brand->delete();
       }
       return \response('success');
    }
}
