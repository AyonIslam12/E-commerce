@extends('admin.master')

@section('title')
Brand-edit
@stop


@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumb-->
     @include('admin.partials.breadCrumb',['title' => 'Edit'])
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Edit Status</div>
                    <hr />

                    <form action="{{ route('status.update',$status->id) }}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="input-21" value="{{ $status->name }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Serial</label>
                            <div class="col-sm-10">
                                <input type="text" name="serial" class="form-control" id="input-21" value="{{ $status->serial }}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-white px-5"><i class="icon-lock"></i> Add</button>
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
