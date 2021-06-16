@extends('admin.master')

@section('title')
sub-Category-edit
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
                        <div class="card-title">Update Sub Category</div>
                        <a class="btn btn-secondary" href="{{ route('sub-category.index') }}">Back</a>
                    </div>
                    <hr />

                    <form class="update_form" action="{{ route('sub-category.update',$sub_category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="preloader"></div>
                        @method('PUT')
                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Select Main Category</label>
                            <div class="col-sm-10">
                                <span class="text-danger main_category_id "></span>
                             <select name="main_category_id" class="form-control" id="">
                                @foreach ($main_category as $item)
                                <option {{ $sub_category->main_category->id == $item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                             </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Select Category</label>
                            <div class="col-sm-10">
                                <span class="text-danger category_id "></span>
                             <select name="category_id" class="form-control" id="">
                                @foreach ($category as $item)
                                <option {{ $sub_category->category_info->id == $item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                             </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <span class="text-danger name"></span>
                                <input type="text" name="name" class="form-control" id="input-21" value="{{ $sub_category->name }}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="input-25" class="col-sm-2 col-form-label">Icon</label>
                            <div class="col-sm-10">
                                <input type="file" name="icon" class="form-control" id="input-25"  />
                                <img src="{{ asset('uploads/'.$sub_category->icon) }}" height="50px" alt="no">
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
@stop
