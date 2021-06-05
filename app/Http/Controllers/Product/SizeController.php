<?php

namespace App\Http\Controllers\Product;

use App\Models\Size;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $size = Size::where('status',1)->latest()->paginate(10);
        return \view('admin.pages.size.index',\compact('size'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('admin.pages.size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $size = Size::create($request->except('icon'));

        $size->slug = Str::slug($size->name);
        $size->creator =Auth::user()->id;
        $size->save();
        return redirect()->route('size.index')->with('success','data added');
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
        $size = Size::find($id);
        return \view('admin.pages.size.edit',\compact('size'));
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
        $size = Size::find($id);
        $size->name = $request->name;
        $size->slug = Str::slug($size->name);
        $size->creator = Auth::user()->id;
        $size->save();

         return redirect()->route('size.index')->with('success','data updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size = Size::find($id);
        if($size){
            $size->delete();
        }
        return \response('success');
    }
}
