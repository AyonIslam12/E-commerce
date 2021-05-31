@extends('admin.master')

@section('title')
User-Update
@stop


@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumb-->
     @include('admin.partials.breadCrumb',['title' => 'User Update'])
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">User Update</div>

                    <hr />
                    <form action="{{ route('admin_user_update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                        {{-- <input type="hidden" name="id" value="{{ $user->id }}" id=""> --}}
                        <div class="form-group row">
                            <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                            <div class="col-sm-10">
                                 @error('first_name') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                                <input type="text" value="{{ $user->first_name }}" class="form-control  @error('first_name') is-invalid @enderror" name="first_name" id="first_name" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                            <div class="col-sm-10">
                                 @error('last_name') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                                <input type="text" value="{{ $user->last_name }}" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                 @error('username') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                                <input type="text"value="{{ $user->username }}"  class="form-control @error('username') is-invalid @enderror" name="username" id="username" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user-role" class="col-sm-2 col-form-label">User Role</label>
                            <div class="col-sm-10">
                                 @error('username') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                                <select name="role_id" id="user-role" class="form-control">
                                   {{--  @foreach (App\Models\UserRole::get() as $item ) --}}

                                    @foreach ($userRole as $item )
                                    <option {{ $user->role_id == $item->serial ? 'selected' : '' }} value="{{ $item->serial }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Contact Number</label>
                            <div class="col-sm-10">
                                 @error('phone') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                                <input type="text" value="{{ $user->phone }}" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                @error('address') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address"  rows="3" >{{ $user->address }} </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                 @error('email') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                                <input type="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" name="email" id="email"  />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="old_password" class="col-sm-2 col-form-label">Old Password</label>
                            <div class="col-sm-10">
                                <input type="password"  class="form-control" name="old_password" id="old_password" placeholder="old password"/>

                                @if (Session::has('old_password'))
                                <div class="text-warning">{{ Session::get('old_password') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label"> Password</label>
                            <div class="col-sm-10">
                                @error('password') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                                <input type="password"  class="form-control  @error('password') is-invalid @enderror" name="password" id="password" placeholder="password" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input-25" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                @error('password_confirmation') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                                <input type="password" name="password_confirmation" class="form-control" id="input-25" placeholder="Confirm Password" />

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Upload Photo</label>
                            <div class="col-sm-10">
                               <img src="{{ asset('uploads/user/'.$user->photo) }}" width="50px" class="img-fluid rounded-circle mb-3" alt="no">
                                <input type="file" class="form-control" name="photo" id="image"/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-white px-5"><i class="icon-lock"></i> Update User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
      </div>
<!--start overlay-->
	  <div class="overlay"></div>
	<!--end overlay-->
    </div>
    <!-- End container-fluid-->

   </div>
@stop
