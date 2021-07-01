@extends('admin.master')

@section('title')
Products-Page
@stop


@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumb-->
     @include('admin.partials.breadCrumb',['title' => 'Product Edit'])
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title">Edit Product</div>
                        <a class="btn btn-secondary" href="{{ route('product.index') }}">Back</a>
                    </div>
                    <hr />
                    <form class="row  update_form product_update_form" action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="preloader"></div>
                        <div class="form-group col-md-6 col-xl-4">
                            <label for="" class=" col-form-label">Name</label>
                            @include('admin.pages.product.components.input',[
                                       'name' => 'product_name',
                                        'type' => 'text',
                                        'value' => $product->name,
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
                                'value' =>$product->brand_info->id,
                                'fields' =>[
                                    ['name' => 'name','type'=> 'text' ],
                                    ['name' => 'logo','type'=> 'file' ],
                                ]
                            ])

                        </div>

                        <div class="form-group col-md-6  col-xl-4">
                            <label for="" class=" col-form-label">Main Category</label>

                            <div class="">
                                    @include('admin.pages.product.components.select',[
                                        'name' => 'product_main_category_id',
                                        'attributes' => '',
                                        'class' => 'multiple-select product_main_category',
                                        'collection' => $main_categories,
                                        'value' => $product->main_category()->first() ? $product->main_category()->first()->id : '',
                                        'action' => route('main-category.store'),
                                        'fields' => [
                                            ['name' => 'name','type' => 'text'],
                                            ['name' => 'icon','type' => 'file'],
                                        ]
                                    ])

                            </div>
                        </div>

                        <div class="form-group col-md-6  col-xl-4">
                            <label for="" class=" col-form-label">Category</label>
                                @include('admin.pages.product.components.select',[
                                    'name' => 'category_id',
                                    'attributes' => 'multiple',
                                    'class' => 'multiple-select product_main_category',
                                    'collection' => $categories,
                                    'value' => $product->category,
                                    'action' => '',
                                    'fields' => [
                                        ['name' => 'name','type' => 'text'],
                                        ['name' => 'icon','type' => 'file'],
                                    ]
                                ])
                        </div>
                        <div class="form-group col-md-6  col-xl-4">
                            <label for="" class=" col-form-label">Sub Category</label>
                            @include('admin.pages.product.components.select',[
                                'name' => 'sub_category_id',
                                'attributes' => 'multiple',
                                'class' => 'multiple-select product_main_category',
                                'collection' => $sub_categories,
                                'value' => $product->sub_category,
                                'action' => '',
                                'fields' => [
                                    ['name' => 'name','type' => 'text'],
                                    ['name' => 'icon','type' => 'file'],
                                ]
                            ])
                        </div>
                        <div class="form-group col-md-6  col-xl-4">
                            <label for="" class=" col-form-label">Writer</label>
                            @include('admin.pages.product.components.select',[
                                'name' => 'writer_id',
                                'attributes' => 'multiple',
                                'class' => 'multiple-select',
                                'collection' => $writers,
                                'action' => route('writer.store'),
                                'value' => $product->writer,
                                'fields' => [
                                    ['name' => 'name','type' => 'text'],
                                    ['name' => 'description','type' => 'textarea'],
                                    ['name' => 'image','type' => 'file'],
                                ]
                            ])
                        </div>
                        <div class="form-group col-md-6  col-xl-4">
                            <label for="" class=" col-form-label">Publication</label>
                            @include('admin.pages.product.components.select',[
                                'name' => 'publication_id',
                                'attributes' => 'multiple',
                                'class' => 'multiple-select',
                                'collection' => $publication,
                                'action' => route('publication.store'),
                                'value' => $product->publication,
                                'fields' => [
                                    ['name' => 'name','type' => 'text'],
                                    ['name' => 'description','type' => 'textarea'],
                                    ['name' => 'image','type' => 'file'],
                                ]
                            ])

                        </div>
                        <div class="form-group col-md-6  col-xl-4">
                            <label for="" class="col-form-label">Color</label>
                            @include('admin.pages.product.components.select',[
                                'name' => 'color_id',
                                'attributes' => 'multiple',
                                'class' => 'multiple-select',
                                'collection' => $colors,
                                'action' => route('color.store'),
                                'value' => $product->color,
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
                                'value' => $product->size,
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
                                'value' => $product->unit,
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
                                'value' => $product->vendor,
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
                                        'attr' => "step='0.01'",
                                        'value' => $product->price,
                                    ])
                        </div>
                        <div class="form-group col-md-6 col-xl-4">
                            <label for="" class=" col-form-label">Tax</label>
                            @include('admin.pages.product.components.input',[
                                'name' => 'tax',
                                'type' => 'number',
                                'value' => $product->tax,
                            ])
                        </div>
                        <div class="form-group col-md-6 col-xl-4">
                            <label for="" class=" col-form-label">Discount</label>
                            @include('admin.pages.product.components.input',[
                                'name' => 'discount',
                                'type' => 'text',
                                'value' => $product->discount,
                            ])
                        </div>

                        <div class="form-group col-md-6 col-xl-4">
                            <label for="" class=" col-form-label">Expiration Date</label>
                            @include('admin.pages.product.components.input',[
                                'name' => 'expiration_date',
                                'type' => 'date',
                                'value' => $product->expiration_date,
                            ])
                        </div>
                        <div class="form-group col-md-6 col-xl-4">
                            <label for="" class=" col-form-label">Stock</label>
                            @include('admin.pages.product.components.input',[
                                'name' => 'stock',
                                'type' => 'number',
                                'value' => $product->stock,
                            ])
                        </div>
                        <div class="form-group col-md-6 col-xl-4">
                            <label for="" class=" col-form-label">Alert Quantity</label>
                            @include('admin.pages.product.components.input',[
                                'name' => 'minimum_amount',
                                'type' => 'number',
                                'value' => $product->minimum_amount,
                            ])
                        </div>

                        <div class="col-12"></div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="" class=" col-form-label">Description</label>
                            <div class="">
                                <textarea name="description" id="mytextarea1" class="form-control" cols="30" rows="10">{{ $product->description }}</textarea>
                                <span class="text-danger description"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="" class=" col-form-label">Features</label>
                            <div class="">
                                <textarea name="features" id="mytextarea2" class="form-control" cols="30" rows="10">{!! $product->features !!}</textarea>
                                <span class="text-danger features"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="" class=" col-form-label">Thump Image</label>
                            @include('admin.pages.product.components.input',[
                                        'name' => 'thumb_image',
                                        'type' => 'file',
                                        'attr' => '',
                                        'value' => $product->thumb_image,
                                    ])
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="" class=" col-form-label">Related Image</label>
                                @php
                                $value_ids = [];
                                foreach ($product->image as $key => $item) {
                                    array_push($value_ids,$item->id);
                                }
                            @endphp
                            @include('admin.pages.product.components.input',[
                                'name' => 'related_images',
                                'type' => 'file',
                                'attr' => 'multiple',
                                'value' => json_encode($value_ids),
                            ])
                        </div>
                        <div class="form-group col-md-6  col-xl-6">
                            <label for="" class=" col-form-label">Status</label>
                            <div class="">
                                <select name="status" id="" class="form-control">
                                    @foreach($status as $key => $item)
                                   <option {{ $item->id == $product->status ? 'selected' : '' }} value="{{ $item->serial }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger status"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6  col-xl-6">
                            <label for="" class=" col-form-label">Free Delivery</label>
                            <div class="">
                                <select name="free_delivery"  class="form-control">
                                    <option {{ $product->free_delivery == '0' ? 'selected' : '' }} value="0">Off</option>
                                    <option {{ $product->free_delivery == '1' ? 'selected' : '' }}  value="1">On</option>
                                </select>
                                <span class="text-danger free_delivery"></span>
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label class=" col-form-label"></label>
                            <div class="">
                                <button type="submit" class="btn btn-white px-5"><i class="icon-lock"></i> Update Product</button>
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
