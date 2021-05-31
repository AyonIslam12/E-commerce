<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Usercontroller extends Controller
{
   public function index(){
       $users = User::active()->with('userRole')->get();
       return \view('admin.pages.user.index', \compact('users'));
   }
   public function create(){
       $userRole = UserRole::orderBy('serial', 'DESC')->get();
       return \view('admin.pages.user.create' ,\compact('userRole'));
   }

   public function store(Request $request){
       $request->validate([
        'first_name' => ['required', 'string','min:4', 'max:100'],
        'last_name' => ['required', 'string','min:4', 'max:100'],
        'username' => ['required', 'string', 'min:4','max:100', ],
        'phone' => ['required', 'string', 'max:100', 'unique:users'],
        'address' => ['required', 'string'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
       ]);
       try{
        $user = new User();
        $filename = " ";
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            if($photo->isValid()){
                $filename = date('Ymdhms').'.'.$photo->getClientOriginalExtension();
                $photo->storeAs('user',$filename);
            }
        }

        User::create([
         'role_id' => $request->role_id,
         'first_name' => $request->first_name,
         'last_name' => $request->last_name,
         'username' => $request->username,
         'photo' => $filename,
         'phone' => $request->phone,
         'address' => $request->address,
         'email' => $request->email,
         'password' => Hash::make($request->email),
         'created_at' => Carbon::now()->toDateTimeLocalString(),
         'creator' => Auth::user()->id,
         'slug' => $user->id.uniqid(10) ,
        ]);
        session()->flash('type','success');
        session()->flash('message','User Inserted Successfully');

       }catch(Exception $e){
        session()->flash('type','danger');
        session()->flash('message',$e->getMessage());
        return \redirect()->route('admin_user_index');

       }
       return \redirect()->route('admin_user_index');


   }


   public function show($id){
       $user = User::find($id);

       return \view('admin.pages.user.view',\compact('user'));
   }

   public function edit($id){
    $userRole = UserRole::orderBy('serial', 'DESC')->get();
    $user = User::find($id);
    return \view('admin.pages.user.edit',\compact('userRole','user'));

   }

   public function update(Request $request,$id){

    $this->validate($request,[
        'first_name' => ['required', 'string','min:4', 'max:100'],
        'last_name' => ['required', 'string','min:4', 'max:100'],
        'username' => ['required' ],
        'phone' => ['required'],
        'address' => ['required', 'string'],
        'email' => ['required'],


    ]);

        $user = User::find($id);
    if($user->email != $request->email){
        $this->validate($request,[
            'email' => ['required','unique:users'],
        ]);
        $user->email = $request->email;
    }

    if($user->username != $request->username){
        $this->validate($request,[
            'username' => ['required','unique:users'],
        ]);
        $user->username = $request->username;
    }

    if( !is_null($request->old_password) && !is_null($request->password) && !is_null($request->password_confirmation)){
        $this->validate($request,[
            'password' => ['string', 'min:8', 'confirmed'],
            'old_password' => ['required']
        ]);


        if(Hash::check($request->old_password, $user->password)){
            $user->password = Hash::make($request->password);
        }else{
            return redirect()->back()->with('old_password','old password wrong');
            /* if($request->ajax()){
                $validator = Validator::make([], []);
                return $validator->getMessageBag()->add('old_password', 'old password wrong');
            } */
           /*  return redirect()->back()->withErrors('old_password','old password wrong'); */
        }
    }

     if($request->hasFile('photo')){
        $file = $request->file('photo');
        if($file->isValid()){
            $filename = date('Ymdhms').'.'.$file->getClientOriginalExtension();
            $file->storeAs('user',$filename);
        }
        if (file_exists(public_path('uploads/user/'.$user->photo)))
        {
            unlink(public_path('uploads/user/'.$user->photo));
        }
    }else{
        $filename = $user->photo;
    }


    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->role_id = $request->role_id;
    $user->photo = $filename;
    $user->updated_at = Carbon::now()->toDateTimeString();
    $user->creator = Auth::user()->id;
    $user->save();
    return redirect()->route('admin_user_index')->with('success','data updated');




   }

   public function delete(Request $request){

    $user = User::find($request->id);
        $user->status = 0;
        $user->creator = Auth::user()->id;
        $user->save();

        return redirect()->back()->with('success','data deactivated');
   }


}
