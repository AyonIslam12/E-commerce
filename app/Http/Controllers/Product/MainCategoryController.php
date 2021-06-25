<?php

namespace App\Http\Controllers\Product;

use Illuminate\Support\Str;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MainCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main_category = MainCategory::where('status',1)->latest()->paginate(10);
        return \view('admin.pages.main_category.index', \compact('main_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('admin.pages.main_category.create');
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
            'icon' => 'required',
        ]);
        $main_category = MainCategory::create($request->except('icon'));
        if($request->has('icon')){
            $main_category->icon = Storage::put('maincategory', $request->file('icon'));
            $main_category->save();
        }
        $main_category->slug = Str::slug($main_category->name);
        $main_category->creator =Auth::user()->id;
        $main_category->save();
        //return redirect()->route('main-category.index')->with('success','main category added');
        //return \response('success');
        return response()->json([
            'html' => "<option value='".$main_category->id."'>".$main_category->name."</option>",
            'value' => $main_category->id,
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
        $main_category = MainCategory::find($id);
        return \view('admin.pages.main_category.edit',\compact('main_category'));
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
        $main_category = MainCategory::find($id);
        $main_category->name = $request->name;
        if($request->has('icon')){
            $main_category->icon = Storage::put('maincategory', $request->file('icon'));
            $main_category->save();
        }
        $main_category->slug = Str::slug($main_category->name);
        $main_category->creator =Auth::user()->id;
        $main_category->save();
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
       $main_category = MainCategory::find($id);
       if( $main_category){
        $main_category ->delete();
       }
       return \response('success');
    }

    public function get_main_category_json()
    {
        $collection = MainCategory::where('status',1)->latest()->get();
        $options = '';
        foreach ($collection as $key => $value) {
            $options .= "<option ".($key==0?' selected':'')." value='".$value->id."'>".$value->name."</option>";
        }
        return $options;
    }
}
