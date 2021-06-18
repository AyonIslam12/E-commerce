@extends('admin.master')

@section('title')
Writer-Page
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

                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title">Add Writer</div>
                        <a class="btn btn-secondary" href="{{ route('writer.index') }}">Back</a>
                    </div>
                    <hr />
                    <form class="insert_form" action="{{ route('writer.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="preloader"></div>
                        @csrf
                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <span class="text-danger name "></span>
                                <input type="text" name="name" class="form-control" id="input-21" placeholder="Enter Your Name" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <span class="text-danger description "></span>
                               <textarea name="description" id="mytextarea1"  class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="input-25" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <span class="text-danger image "></span>
                                <input type="file" name="image" class="form-control" id="input-25"  />
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

 @push('ccss')
    <link rel="stylesheet" href="{{ asset('contents/admin/assets') }}/plugins/summernote/dist/summernote-bs4.css" />
@endpush

@push('cjs')
<script src="{{ asset('contents/admin/assets') }}/plugins/summernote/dist/summernote-bs4.min.js"></script>
<script>
    $("#mytextarea1").summernote({
    height: 200,
    tabsize: 2,
    });
</script>


@endpush
@stop
