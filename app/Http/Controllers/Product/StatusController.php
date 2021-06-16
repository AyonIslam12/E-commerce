<?php

namespace App\Http\Controllers\Product;

use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = Status::where('status',1)->latest()->paginate(10);
        return \view('admin.pages.status.index',\compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('admin.pages.status.create');
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
            'serial' => 'required|string',
        ]);
        $status = Status::create($request->except('icon'));
        $status->serial = $request->serial;
        $status->slug = Str::slug($status->name);
        $status->creator =Auth::user()->id;
        $status->save();
        //return redirect()->route('status.index')->with('success','data added');
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
        $status = Status::find($id);
        return \view('admin.pages.status.edit',\compact('status'));
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
            'serial' => 'required|string',
        ]);

        $status = Status::find($id);
        $status->name = $request->name;
        $status->serial = $request->serial;
        $status->slug = Str::slug($status->name);
        $status->creator = Auth::user()->id;
        $status->save();
        return \response('success');
         //return redirect()->route('status.index')->with('success','data updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = Status::find($id);
        if($status){
            $status->delete();
        }
        return \response('success');
    }
}
