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
                    <form class="row insert_form" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="preloader"></div>
                        <div class="form-group col-md-6 col-xl-4">
                            <label for="" class=" col-form-label">Name</label>
                            @include('admin.pages.product.components.input',[
                                        'name' => 'product_name',
                                        'type' => 'text'
                                    ])
                        </div>
                        <div class="form-group col-md-6 col-xl-4">
                            <label for="" class=" col-form-label">Brand</label>
                            @include('admin.pages.product.components.select',[
                                'name' => 'brand_id',
                                'attributes' => '',
                                'class' =>   'multiple-select',
                                'collection' => $brands,
                                'action' => route('brand.store'),
                                'fields' =>[
                                    ['name' => 'name','type'=> 'text' ],
                                    ['name' => 'logo','type'=> 'file' ],
                                ]
                            ])

                        </div>

                        <div class="form-group col-md-6  col-xl-4">
                            <label for="" class=" col-form-label">Main Category</label>

                            <div class="">
                                <select name="product_main_category_id" id="main_category" class="form-control">
                                    <option value="">select</option>
                                    @foreach($main_categories as $key => $item)
                                  <option  value="{{ $item->id }}">{{ $item->name }}</option>
                                  @endforeach
                                </select>
                                  <span class="text-danger product_main_category_id"></span>
                            </div>
                        </div>

                        <div class="form-group col-md-6  col-xl-4">
                            <label for="" class=" col-form-label">Category</label>
                            <div class="">

                                <select name="product_category_id" id="category"  class="form-control multiple-select" multiple>
                                  @foreach($categories as $key => $item)
                                  <option  value="{{ $item->id }}">{{ $item->name }}</option>
                                  @endforeach
                                </select>
                                  <span class="text-danger product_category_id"></span>
                            </div>


                        </div>
                        <div class="form-group col-md-6  col-xl-4">
                            <label for="" class=" col-form-label">Sub Category</label>
                            <div class="">
                                <select name="product_sub_category_id[]" id="sub_category" multiple="multiple"  class="form-control multiple-select" >

                                @foreach($sub_categories as $key => $item)
                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                                  @endforeach
                                </select>
                                  <span class="text-danger product_sub_category_id"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6  col-xl-4">
                            <label for="" class=" col-form-label">Writer</label>
                            <div class="">
                                <select name="writer_id" id="" multiple class="form-control multiple-select">
                                    @foreach($writers as $key => $item)
                                  <option  value="{{ $item->id }}">{{ $item->name }}</option>
                                  @endforeach
                                </select>
                                  <span class="text-danger writer_id"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6  col-xl-4">
                            <label for="" class=" col-form-label">Publication</label>
                            <div class="">
                                <select name="publication_id" id="" multiple class="form-control multiple-select">
                                    @foreach($publication as $key => $item)
                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                                  @endforeach
                                </select>
                                  <span class="text-danger publication_id"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6  col-xl-4">
                            <label for="" class="col-form-label">Color</label>
                            @include('admin.pages.product.components.select',[
                                'name' => 'color_id',
                                'attributes' => 'multiple',
                                'class' => 'multiple-select',
                                'collection' => $colors,
                                'action' => route('color.store'),
                                'fields' => [
                                    ['name' => 'name', 'type' => 'text'],
                                ]
                            ])
                        </div>

                        <div class="form-group col-md-6  col-xl-4">
                            <label for="" class=" col-form-label">Size</label>
                            @include('admin.pages.product.components.select',[
                                'name' => 'size_id',
                                'attributes' => 'multiple',
                                'class' =>   'multiple-select',
                                'collection' => $sizes,
                                'action' => route('size.store'),
                                'fields' =>[
                                    ['name' => 'name','type'=> 'text' ],
                                ]
                            ])
                        </div>
                        <div class="form-group col-md-6  col-xl-4">
                            <label for="" class=" col-form-label">Unit</label>
                            @include('admin.pages.product.components.select',[
                                'name' => 'unit_id',
                                'attributes' => 'multiple',
                                'class' =>   'multiple-select',
                                'collection' => $units,
                                'action' => route('unit.store'),
                                'fields' =>[
                                    ['name' => 'name','type'=> 'text' ],
                                ]
                            ])

                        </div>
                        <div class="form-group col-md-6  col-xl-4">
                            <label for="" class=" col-form-label">Vendors</label>
                            @include('admin.pages.product.components.select',[
                                'name' => 'vendor_id',
                                'attributes' => 'multiple',
                                'class' =>   'multiple-select',
                                'collection' => $vendors,
                                'action' => route('vendor.store'),
                                'fields' =>[
                                    ['name' => 'name','type'=> 'text' ],
                                    ['name' => 'email','type'=> 'email' ],
                                    ['name' => 'mobile_no','type'=> 'text' ],
                                    ['name' => 'image','type'=> 'file' ],
                                    ['name' => 'address','type'=> 'textarea' ],
                                    ['name' => 'description','type'=> 'textarea' ],
                                ]
                            ])

                        </div>
                        <div class="form-group col-md-6 col-xl-4">
                            <label for="" class="col-form-label">Price</label>
                            @include('admin.pages.product.components.input',[
                                        'name' => 'price',
                                        'type' => 'number',
                                        'attr' => "step='0.01'"
                                    ])
                        </div>
                        <div class="form-group col-md-6 col-xl-4">
                            <label for="" class=" col-form-label">Tax</label>
                            @include('admin.pages.product.components.input',[
                                'name' => 'tax',
                                'type' => 'number'
                            ])
                        </div>
                        <div class="form-group col-md-6 col-xl-4">
                            <label for="" class=" col-form-label">Discount</label>
                            @include('admin.pages.product.components.input',[
                                'name' => 'discount',
                                'type' => 'text'
                            ])
                        </div>

                        <div class="form-group col-md-6 col-xl-4">
                            <label for="" class=" col-form-label">Expiration Date</label>
                            @include('admin.pages.product.components.input',[
                                'name' => 'expiration_date',
                                'type' => 'date'
                            ])
                        </div>
                        <div class="form-group col-md-6 col-xl-4">
                            <label for="" class=" col-form-label">Stock</label>
                            @include('admin.pages.product.components.input',[
                                'name' => 'stock',
                                'type' => 'number'
                            ])
                        </div>
                        <div class="form-group col-md-6 col-xl-4">
                            <label for="" class=" col-form-label">Alert Quantity</label>
                            @include('admin.pages.product.components.input',[
                                'name' => 'alert_quantity',
                                'type' => 'number'
                            ])
                        </div>

                        <div class="col-12"></div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="" class=" col-form-label">Description</label>
                            <div class="">
                                <textarea name="description" id="mytextarea1" class="form-control" cols="30" rows="10"></textarea>
                                <span class="text-danger description"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="" class=" col-form-label">Features</label>
                            <div class="">
                                <textarea name="features" id="mytextarea2" class="form-control" cols="30" rows="10"></textarea>
                                <span class="text-danger features"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="" class=" col-form-label">Thump Image</label>
                            @include('admin.pages.product.components.input',[
                                        'name' => 'thumb_image',
                                        'type' => 'file',
                                        'attr' => ''
                                    ])
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="" class=" col-form-label">Related Image</label>
                            @include('admin.pages.product.components.input',[
                                'name' => 'related_images',
                                'type' => 'file',
                                'attr' => 'multiple'
                            ])
                        </div>
                        <div class="form-group col-md-6  col-xl-6">
                            <label for="" class=" col-form-label">Status</label>
                            <div class="">
                                <select name="status" id="" class="form-control">
                                    <option value="draft">Draft</option>
                                    <option value="active">Active</option>
                                </select>
                                <span class="text-danger status"></span>
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
@push('ccss')
    <link href="{{ asset('contents/admin/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('contents/admin/assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('contents/admin/assets') }}/plugins/summernote/dist/summernote-bs4.css" />
@endpush
@push('cjs')
<script src="{{ asset('contents/admin/assets/plugins/select2/js/select2.min.js') }}"></script>
{{-- <script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script> --}}
<script src="{{ asset('contents/admin/assets') }}/plugins/summernote/dist/summernote-bs4.min.js"></script>
<script>
    $('.multiple-select').select2({
      /*   theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', */
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });

   /*  tinymce.init({
      selector: '#mytextarea1'
    });
    tinymce.init({
      selector: '#mytextarea2'
    }); */
    $("#mytextarea1").summernote({
    height: 400,
    tabsize: 2,
    });
    $("#mytextarea2").summernote({
    height: 400,
    tabsize: 2,
    });

    $('#main_category').on('change', function(){
        let value = $(this).val();
        $.get("/admin/product/get-all-category-selected-by-main-category/"+value,(res)=>{
           $('#category').html(res);
        })
    });

  $('#category').on('change', function(){
        let value = $(this).val();
        $.get("/admin/product/get-all-sub-cateogory-selected-by-category/"+value,(res)=>{
           $('#sub_category').html(res);
        })
    });

</script>
@endpush


@stop
