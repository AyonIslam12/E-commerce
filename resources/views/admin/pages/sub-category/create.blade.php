@extends('admin.master')

@section('title')
sub-Category-Page
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
                        <div class="card-title">Add Sub-Category</div>
                        <a class="btn btn-secondary" href="{{ route('sub-category.index') }}">Back</a>
                    </div>
                    <hr />
                    <form class="insert_form" action="{{ route('sub-category.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="preloader"></div>
                        @csrf
                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Select Main Category</label>
                            <div class="col-sm-10">
                            <span class="text-danger main_category_id "></span>
                             <select id="main_category" name="main_category_id" class="form-control" id="">
                                 <option value="">select</option>
                                 @foreach ($main_category as $item)
                                 <option  value="{{ $item->id }}">{{ $item->name }}</option>
                                 @endforeach

                             </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Select Category</label>
                            <div class="col-sm-10">
                            <span class="text-danger category_id "></span>
                             <select id="category" name="category_id" class="form-control" id="">
                                 <option value="">select</option>
                                {{--  @foreach ($category as $item)
                                 <option value="{{ $item->id }}">{{ $item->name }}</option>
                                 @endforeach --}}

                             </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <span class="text-danger name "></span>
                                <input type="text" name="name" class="form-control" id="input-21" placeholder="Enter Your Name" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="input-25" class="col-sm-2 col-form-label">Icon</label>
                            <div class="col-sm-10">
                                <span class="text-danger icon "></span>
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
@push('cjs')
<script>
    $('#main_category').on('change', function(){
        let value = $(this).val();
        $.get("/admin/product/get-all-category-selected-by-main-category/"+value,(res)=>{
           $('#category').html(res);
        })
    });
</script>
@endpush

@stop
