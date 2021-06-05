@extends('admin.master')

@section('title')
Blank-Page
@stop


@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumb-->
     @include('admin.partials.breadCrumb',['title' => 'Create'])
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Add Main Category</div>
                    <hr />
                    <form action="{{ route('main-category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="input-21" placeholder="Enter Your Name" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="input-25" class="col-sm-2 col-form-label">Icon</label>
                            <div class="col-sm-10">
                                <input type="file" name="icon" class="form-control" id="input-25"  />
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
