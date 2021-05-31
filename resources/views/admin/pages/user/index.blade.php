 @extends('admin.master')

@section('title')
All-User
@stop


@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumb-->
     @include('admin.partials.breadCrumb',['title' => 'User Management'])
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-12">
                  @if(session('message'))
                  <div class="alert alert-{{ session('type') }}">
                       <p class="text-center font-weight-bolder text-dark">{{ session('message') }}</p>
                  </div>
                @endif

                </div>

            </div>
            <div class="card">

                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title">All User</h5>
                        <a href="{{ route('admin_user_create') }}" class="btn btn-warning waves-effect waves-light m-1">
                            <i class="fa fa-plus"></i><span>Add New</span>
                        </a>

                    </div>
                    <div class="card-body">

                    <div class="table-responsive table table-bordered table-hover table-striped">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role Name</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user )
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>  <img src="{{ asset('uploads/user/'.$user->photo) }}" width="50px" class="img-fluid rounded-circle mb-3" alt="no"></td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{$user->userRole ? $user->userRole->name : $user->role_id }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('admin_user_show',$user->id) }}" class="btn btn-info waves-effect waves-light m-1">
                                                <i class="fa fa-eye"></i><span>View</span>
                                            </a>
                                            <a href="{{ route('admin_user_edit',$user->id) }}" class="btn btn-success waves-effect waves-light m-1">
                                                <i class="fa fa-edit"></i><span>Edit</span>
                                            </a>
                                           {{--  <a type="button" href=""
                                             data-toggle="modal"
                                             data-target= "#deleteModal"
                                             onclick="return (modal_delete_form.action='{{  route('admin_user_delete') }}',modal_delete_form.id.value='{{ $user->id }}')"
                                             class="btn btn-danger waves-effect waves-light m-1">
                                                <i class="fa fa-trash-o"></i><span>Delete</span>
                                            </a>  --}}

                                            <a type="button" href="#"

                                             onclick="return (confirm('hey, are sure to delete') && $.post('{{ route('admin_user_delete',['id'=>$user->id])}}',(res)=>{console.log(res,$(this).parents('tr').remove())}))"
                                             class="btn btn-danger waves-effect waves-light m-1">
                                                <i class="fa fa-trash-o"></i><span>Delete</span>
                                            </a>

                                        </div>
                                    </td>

                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
