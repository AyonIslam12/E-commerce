@extends('admin.master')

@section('title')
User-View
@stop


@section('content')

<style>
    .card .table td, .card .table.th{
        white-space: break-spaces;
    }
</style>
<div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumb-->
     @include('admin.partials.breadCrumb',['title' => 'View'])
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
		  <div class="card">
              <div class="card-body">
                  <table class="table table-bordered table-hover table-striped">
                      <tr>
                          <td style="width: 30%">First Name</td>
                          <td>:</td>
                          <td>{{ $user->first_name }}</td>
                      </tr>
                      <tr>
                          <td style="width: 30%">Last Name</td>
                          <td>:</td>
                          <td>{{ $user->last_name }}</td>
                      </tr>
                      <tr>
                          <td style="width: 30%">Username</td>
                          <td>:</td>
                          <td>{{ $user->username }}</td>
                      </tr>
                      <tr>
                          <td style="width: 30%">Photo</td>
                          <td>:</td>
                          <td><img class="img-fluid rounded-circle" width="60px" src="{{ asset('uploads/user/'.$user->photo) }}" alt=""></td>
                      </tr>
                      <tr>
                          <td style="width: 30%">Phone Number</td>
                          <td>:</td>
                          <td>{{ $user->phone }}</td>
                      </tr>
                      <tr>
                          <td style="width: 30%">Email Address</td>
                          <td>:</td>
                          <td>{{ $user->email }}</td>
                      </tr>
                      <tr>
                          <td style="width: 30%"> Address</td>
                          <td>:</td>
                          <td>{{ $user->address }}</td>
                      </tr>
                      <tr>
                          <td style="width: 30%">Role Name</td>
                          <td>:</td>
                          <td>{{ $user->userRole ? $user->userRole->name : $user->role_id }}</td>
                      </tr>
                      <tr>
                          <td style="width: 30%">Creator Name</td>
                          <td>:</td>
                          <td>{{ $user->creator }}</td>
                      </tr>
                      <tr>
                          <td style="width: 30%">Created At</td>
                          <td>:</td>
                          <td>{{ $user->created_at->format('d M Y h:i:s a') }}</td>
                      </tr>
                      <tr>
                        <td style="width: 30%"> Status</td>
                        <td>:</td>
                        <td>{{ $user->status }}</td>
                    </tr>

                  </table>

              </div>
              <div class="card-footer">
                <a href="{{ route('admin_user_index') }}" class="btn btn-secondary waves-effect waves-light m-1">
                   <span>Back</span>
                </a>

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
