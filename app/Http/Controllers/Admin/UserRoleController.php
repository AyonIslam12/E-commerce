<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserRole;
use Carbon\Carbon;
use Exception;

class UserRoleController extends Controller
{
   public function index(){
       $userRoles = UserRole::orderBy('id','ASC')->get();
       return \view('admin.pages.userRole.index',\compact('userRoles'));
   }
   public function update(Request $request){


        $userRole = UserRole::find($request->id);

        $userRole->update([
            'name' => $request->name,
            'serial' => $request->serial,
            'creator' => \auth()->user()->id,
            'updated_at' => Carbon::now()->toDayDateTimeString(),

        ]);


       return \redirect()->back()->with('success','Role update successful');


   }
}
