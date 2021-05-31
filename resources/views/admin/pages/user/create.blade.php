@extends('admin.master')

@section('title')
User-Create
@stop


@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumb-->
     @include('admin.partials.breadCrumb',['title' => 'User Add'])
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">User Create</div>

                    <hr />
                    <form action="{{ route('admin_user_store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                            <div class="col-sm-10">
                                 @error('first_name') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                                <input type="text" value="{{ old('first_name') }}" class="form-control  @error('first_name') is-invalid @enderror" name="first_name" id="first_name" placeholder="Enter Your First Name" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                            <div class="col-sm-10">
                                 @error('last_name') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                                <input type="text" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" placeholder="Enter Your Last Name" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                 @error('username') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                                <input type="text"value="{{ old('username') }}"  class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Enter Your Username" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user-role" class="col-sm-2 col-form-label">User Role</label>
                            <div class="col-sm-10">

                                <select name="role_id" id="user-role" class="form-control">
                                   {{--  @foreach (App\Models\UserRole::get() as $item ) --}}

                                    @foreach ($userRole as $item )
                                    <option value="{{ $item->serial }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Contact Number</label>
                            <div class="col-sm-10">
                                 @error('phone') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                                <input type="text" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Enter Your Phone Number" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                @error('address') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address"  rows="3"  placeholder="Enter Your Address">{{ old('address') }} </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                 @error('email') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                                <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter Your Email Address" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                 @error('password') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter Password" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="confirm-password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password_confirmation" id="confirm-password" placeholder="Re-enter Password" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="photo" class="col-sm-2 col-form-label">Upload Photo</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="photo" id="photo"/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-white px-5"><i class="icon-lock"></i> Add User</button>
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
