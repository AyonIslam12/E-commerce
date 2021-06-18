<?php

namespace App\Http\Controllers\Product;

use App\Models\Writter;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $writer = Writter::where('status',1)->latest()->paginate(10);
        return \view('admin.pages.writer.index',\compact('writer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('admin.pages.writer.create');
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
            'description' => 'required',
            'image' => 'required',
        ]);
        $writer = Writter::create($request->except('image'));
        if($request->has('image')){
            $writer->image = Storage::put('writer', $request->file('image'));
            $writer->save();
        }
        $writer->slug = Str::slug($writer->name);
        $writer->creator =Auth::user()->id;
        $writer->save();
        //return redirect()->route('main-category.index')->with('success','main category added');
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
        $writer = Writter::find($id);
        return \view('admin.pages.writer.edit',\compact('writer'));
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
            'description' => 'required|string',

        ]);
        $writer = Writter::find($id);
        $writer->name = $request->name;
        $writer->description = $request->description;
        if($request->has('image')){
            $writer->image = Storage::put('writer', $request->file('image'));
            $writer->save();
        }
        $writer->slug = Str::slug($writer->name);
        $writer->creator =Auth::user()->id;
        $writer->save();
        //return redirect()->route('main-category.index')->with('success','data updated');
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
        $writer = Writter::find($id);
        if( $writer){
         $writer ->delete();
        }
        return \response('success');
    }
}
