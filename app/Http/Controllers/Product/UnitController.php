<?php

namespace App\Http\Controllers\Product;

use App\Models\Unit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = Unit::where('status',1)->latest()->paginate(10);
        return \view('admin.pages.unit.index',\compact('unit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('admin.pages.unit.create');
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
        ]);
        $unit = Unit::create($request->except('icon'));

        $unit->slug = Str::slug($unit->name);
        $unit->creator =Auth::user()->id;
        $unit->save();
        //return redirect()->route('unit.index')->with('success','data added');
        //return \response('success');
        return response()->json([
            'html' => "<option value='".$unit->id."'>".$unit->name."</option>",
            'value' => $unit->id,
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
        $unit = Unit::find($id);
        return \view('admin.pages.unit.edit',\compact('unit'));
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

        $unit = Unit::find($id);
        $unit->name = $request->name;
        $unit->slug = Str::slug($unit->name);
        $unit->creator = Auth::user()->id;
        $unit->save();
        //return \response('success');
        //return redirect()->route('unit.index')->with('success','data updated');
        return response()->json([
            'html' => "<option value='".$unit->id."'>".$unit->name."</option>",
            'value' => $unit->id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit = Unit::find($id);
        if($unit){
            $unit->delete();
        }
        return \response('success');
    }
}
