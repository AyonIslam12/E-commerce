@extends('admin.master')

@section('title')
Sub-Categories
@stop


@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumb-->
     @include('admin.partials.breadCrumb',['title' => 'Sub-Categories'])
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title">Sub Category</h5>
                    <a href="{{ route('sub-category.create') }}" class="btn btn-warning waves-effect waves-light m-1">
                        <i class="fa fa-plus"></i><span>Add New</span>
                    </a>

                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Main Category</th>
                                    <th scope="col">Products</th>
                                    <th class="text-center" scope="col">Action</th>


                                </tr>

                            </thead>
                            <tbody>

                             @foreach ($sub_category as $key =>$item )
                             <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{$item->category_info ? $item->category_info->name : ''}}</td>
                                <td>{{$item->main_category ? $item->main_category->name : ''}}</td>
                                <td></td>
                                <td>
                                    <div class="text-center">
                                        <a href="" class="btn btn-info waves-effect waves-light m-1">
                                            <i class="fa fa-eye"></i><span>View</span>
                                        </a>
                                        <a href="{{ route('sub-category.edit',$item->id) }}" class="btn btn-success waves-effect waves-light m-1">
                                            <i class="fa fa-edit"></i><span>Edit</span>
                                        </a>
                                        <a type="button" href="{{ route('sub-category.destroy',$item->id) }}"

                                         class="delete_btn btn btn-danger waves-effect waves-light m-1">
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
                <div class="card-footer">
                    {{ $sub_category->links() }}

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
