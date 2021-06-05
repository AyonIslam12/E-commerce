@extends('admin.master')

@section('title')
Products-Page
@stop


@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumb-->
     @include('admin.partials.breadCrumb',['title' => 'Product Create'])
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Product Add</div>
                    <hr />
                    <form class="row">
                        @csrf
                        <div class="form-group col-md-6 col-xl-4">
                            <label for="input-21" class=" col-form-label">Name</label>
                            <div class="">
                                <input type="text" class="form-control" id="input-21" placeholder=" Name" />
                                @error('name')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-xl-4">
                            <label for="input-21" class=" col-form-label">Brand</label>
                            <div class="">
                                <select name="brand" id="" class="form-control">
                                    <option value="">Select Brand</option>
                                </select>
                                @error('name')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6  col-xl-4">
                            <label for="input-21" class=" col-form-label">Main Category</label>
                            <div class="">
                                <select name="brand" id="" class="form-control">
                                    <option value="">Select Main Category</option>
                                </select>
                                @error('name')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6  col-xl-4">
                            <label for="input-21" class=" col-form-label"> Category</label>
                            <div class="">
                                <select name="brand" id="" class="form-control">
                                    <option value="">Select Category</option>
                                </select>
                                @error('name')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6  col-xl-4">
                            <label for="input-21" class=" col-form-label">Sub Category</label>
                            <div class="">
                                <select name="brand" id="" class="form-control">
                                    <option value="">Select Sub Category</option>
                                </select>
                                @error('name')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6  col-xl-4">
                            <label for="input-21" class=" col-form-label">Color</label>
                            <div class="">
                                <select name="brand" id="" class="form-control">
                                    <option value="">Select Color</option>
                                </select>
                                @error('name')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6  col-xl-4">
                            <label for="input-21" class=" col-form-label">Size</label>
                            <div class="">
                                <select name="brand" id="" class="form-control">
                                    <option value="">Select Size</option>
                                </select>
                                @error('name')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6  col-xl-4">
                            <label for="input-21" class=" col-form-label">Unit</label>
                            <div class="">
                                <select name="brand" id="" class="form-control">
                                    <option value="">Select Unit</option>
                                </select>
                                @error('name')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-xl-4">
                            <label for="input-21" class=" col-form-label">Price</label>
                            <div class="">
                                <input type="text" class="form-control" id="input-21" placeholder=" price" />
                                @error('price')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-xl-4">
                            <label for="input-21" class=" col-form-label">Discount</label>
                            <div class="">
                                <input type="text" class="form-control" id="input-21" placeholder=" discount" />
                                @error('discount')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-xl-4">
                            <label for="input-21" class=" col-form-label">Expiration Date</label>
                            <div class="">
                                <input type="text" class="form-control" id="input-21" placeholder=" expiration date" />
                                @error('discount')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-xl-4">
                            <label for="input-21" class=" col-form-label">Stock</label>
                            <div class="">
                                <input type="number" class="form-control" id="input-21" placeholder=" stock" />
                                @error('discount')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-xl-4">
                            <label for="input-21" class=" col-form-label">Alert Quantity</label>
                            <div class="">
                                <input type="number" class="form-control" id="input-21" placeholder=" Alert Quantity" />
                                @error('discount')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12"></div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="input-21" class=" col-form-label">Description</label>
                            <div class="">
                                <textarea name="" id="" class="form-control" cols="30" rows="10"></textarea>
                                @error('discount')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="input-21" class=" col-form-label">Features</label>
                            <div class="">
                                <textarea name="" id="" class="form-control" cols="30" rows="10"></textarea>
                                @error('discount')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="input-21" class=" col-form-label">Thump Image</label>
                            <div class="">
                                <input type="file" class="form-control" id="input-21"  />
                                @error('discount')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="input-21" class=" col-form-label">Related Image</label>
                            <div class="">
                                <input type="file" multiple name="related_image[]" class="form-control" id="input-21"  />
                                @error('discount')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6  col-xl-6">
                            <label for="input-21" class=" col-form-label">Status</label>
                            <div class="">
                                <select name="brand" id="" class="form-control">
                                    <option value="">Active</option>
                                </select>
                                @error('name')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label class=" col-form-label"></label>
                            <div class="">
                                <button type="submit" class="btn btn-white px-5"><i class="icon-lock"></i> Add Product</button>
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
