@extends('admin.master')

@section('title')
Publication-edit
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
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title">Update Publication</div>
                        <a class="btn btn-secondary" href="{{ route('publication.index') }}">Back</a>
                    </div>
                    <hr />

                    <form class="update_form" action="{{ route('publication.update',$publication->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="preloader"></div>
                        @method('PUT')
                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <span class="text-danger name"></span>
                                <input type="text" name="name" class="form-control" id="input-21" value="{{ $publication->name }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <span class="text-danger description "></span>
                               <textarea name="description" id="mytextarea2"  class="form-control">{!! $publication->description !!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="input-25" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="image" class="form-control" id="input-25"  />
                                <img src="{{ asset('uploads/'.$publication->image) }}" height="50px" alt="no">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-white px-5"><i class="icon-lock"></i> Update</button>
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
    $("#mytextarea2").summernote({
    height: 200,
    tabsize: 2,
    });
</script>
@endpush
@stop
