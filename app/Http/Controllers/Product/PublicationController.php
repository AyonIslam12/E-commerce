<?php

namespace App\Http\Controllers\Product;

use App\Models\Publication;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publication = Publication::where('status',1)->latest()->paginate(10);
        return \view('admin.pages.publication.index',\compact('publication'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('admin.pages.publication.create');
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
        $publication = Publication::create($request->except('image'));
        if($request->has('image')){
            $publication->image = Storage::put('publication', $request->file('image'));
            $publication->save();
        }
        $publication->slug = Str::slug($publication->name);
        $publication->creator =Auth::user()->id;
        $publication->save();
        //return redirect()->route('main-category.index')->with('success','main category added');
        //return \response('success');
        return response()->json([
            'html' => "<option value='".$publication->id."'>".$publication->name."</option>",
            'value' => $publication->id,
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
        $publication = Publication::find($id);
        return \view('admin.pages.publication.edit',\compact('publication'));
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
        $publication = Publication::find($id);
        $publication->name = $request->name;
        $publication->description = $request->description;
        if($request->has('image')){
            $publication->image = Storage::put('publication', $request->file('image'));
            $publication->save();
        }
        $publication->slug = Str::slug($publication->name);
        $publication->creator =Auth::user()->id;
        $publication->save();
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
        $publication = Publication::find($id);
        if( $publication){
         $publication ->delete();
        }
        return \response('success');
    }
}
