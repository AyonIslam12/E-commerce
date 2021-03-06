<?php

namespace App\Http\Controllers\Product;

use App\Models\Vendor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VendorController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Vendor::where('status',1)->latest()->paginate(10);
        return view('admin.pages.vendor.index',compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required'],
            'email' => ['required'],
            'address' => ['required'],
            'mobile_no' => ['required'],
            'description' => ['required'],
            'image' => ['required'],
        ]);

        $vendor = Vendor::create($request->except('image'));

        if($request->hasFile('image')){
            $vendor->image = Storage::put('vendor',$request->file('image'));
            $vendor->save();
        }

        $vendor->slug = Str::slug($vendor->name);
        $vendor->creator = Auth::user()->id;
        $vendor->save();

        return response()->json([
            'html' => "<option value='".$vendor->id."'>".$vendor->name."</option>",
            'value' => $vendor->id,
        ]);
        // return 'success';
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
        $vendor =Vendor::find($id);
        return view('admin.pages.vendor.edit',compact('vendor'));
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
        $this->validate($request,[
            'name' => ['required'],
            'email' => ['required'],
            'address' => ['required'],
            'mobile_no' => ['required'],
            'description' => ['required'],
        ]);

        $vendor =Vendor::find($id);

        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->address = $request->address;
        $vendor->mobile_no = $request->mobile_no;
        $vendor->description = $request->description;
        if($request->hasFile('image')){
            $vendor->image = Storage::put('vendor',$request->file('image'));
            $vendor->save();
        }
        $vendor->slug = Str::slug($vendor->name);
        $vendor->creator = Auth::user()->id;
        $vendor->save();

        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendor =Vendor::find($id);
        $vendor->delete();
        return 'success';
    }
}
