@extends('admin.master')

@section('title')
Blank-Page
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
                <div class="card-body">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title">All User</h5>
                    </div>
                    <div class="table-responsive ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"> Name</th>
                                    <th scope="col">Serial</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($userRoles as  $key => $userRole )
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{{ $userRole->name }}</td>
                                    <td>{{ $userRole->serial }}</td>
                                    <td>{{ $userRole->created_at->format('d M Y h:i:s a') }}</td>

                                    <td>
                                        <div>
                                            <a type="button"
                                            class="btn role_update_btn btn-success waves-effect waves-light m-1"
                                            data-toggle="modal" data-target="#updateModal"

                                            data-url = "{{ route('admin_user_role_update') }}"
                                            data-id = "{{ $userRole->id }}"
                                            data-name = "{{ $userRole->name }}"
                                            data-serial = "{{ $userRole->serial }}"

                                            href="">
                                                <i class="fa fa-edit"></i><span>Edit</span>
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

   <!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('admin_user_role_update') }}" class="update_role_form" method="POST">
                  @csrf


                  <input type="hidden" name="id" value="">
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="name" id="name" value="">
                  </div>
                  <div class="form-group">
                      <label for="serial">Serial</label>
                      <input type="number" class="form-control" name="serial" id="serial" value="">
                  </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        </div>
    </div>
</div>

@push('cjs')

<script>
    $('.role_update_btn').on('click',function(){
       let url = $(this).data('url');
       let name = $(this).data('name');
       let serial = $(this).data('serial');
       let id = $(this).data('id');
       console.log(url, name, serial, id);

       $('.update_role_form').attr('url',url);
       $('.update_role_form input[name=name]').val(name);
       $('.update_role_form input[name=serial]').val(serial);
       $('.update_role_form input[name=id]').val(id);


    });
</script>

@endpush
@stop
