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
                    <div class="card-title">Edit Main Category</div>
                    <hr />

                    <form action="{{ route('main-category.update',$main_category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="input-21" value="{{ $main_category->name }}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="input-25" class="col-sm-2 col-form-label">Icon</label>
                            <div class="col-sm-10">
                                <input type="file" name="icon" class="form-control" id="input-25"  />
                                <img src="{{ asset('uploads/'.$main_category->icon) }}" height="50px" alt="no">
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