@extends('admin.master')

@section('title')
Blank-Page
@stop

@section('content')
<style>
    .card .table td,
    .card .table.th {
        white-space: break-spaces;
    }
</style>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        @include('admin.partials.breadCrumb',['title' => 'View'])
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-8 offset-2">
                <div class="pricing-table">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="price-title">{{ $product->name }}</div>
                            <div class="my-2"><img width="160px" height="160px" class="ima-thumbnail" src="/{{$product->thumb_image  }}" alt="" /></div>
                            {{--
                            <h2 class="price"><small class="currency">$</small>199</h2>
                            --}}
                            <ul class="list-group list-group-flush text-justify">
                                <li class="list-group-item"><b>Brand: </b><span class="text-dark">{{ Str::ucfirst($product->brand_info?$product->brand_info->name:'') }}</span></li>
                                <li class="list-group-item"><b>Code: </b><span class="text-dark">{{ Str::ucfirst($product->code) }}</span></li>
                                <li class="list-group-item"><b>Main Category: </b>
                                    @foreach($product->main_category as  $item)
                                    <span class="text-dark">{{ $item->name }}</span>

                                    @endforeach
                                </li>
                                <li class="list-group-item"><b>Category: </b>
                                    @foreach($product->category as  $item)
                                    <span  class="text-dark">{{ $item->name }},</span>

                                    @endforeach
                                </li>
                                <li class="list-group-item"><b>Sub Category: </b>
                                    @foreach($product->sub_category as  $item)
                                    <span  class="text-dark">{{ $item->name }},</span>

                                    @endforeach
                                </li>
                                <li class="list-group-item"><b>Tax: </b><span class="text-dark">${{ Str::ucfirst($product->tax)}}</span></li>
                                <li class="list-group-item"><b>Sku: </b><span class="text-dark">{{ Str::ucfirst($product->sku)}}</span></li>
                                <li class="list-group-item"><b>Stock: </b><span class="text-dark">{{ Str::ucfirst($product->stock)}}</span></li>
                                <li class="list-group-item"><b>Price: </b><span class="text-dark">${{ Str::ucfirst($product->price)}}</span></li>
                                <li class="list-group-item"><b>Discount: </b><span class="text-dark">{{ Str::ucfirst($product->discount)}}%</span> <span class="text-warning">(${{ Helper::discount_price($product->price,$product->discount) }})</span></li>
                                <li class="list-group-item"><b>Expiration Date: </b><span class="text-dark">{{date("Y-M-d",strtotime($product->expiration_date))}}</span></li>
                                <li class="list-group-item"><b>Minimum Amount: </b><span class="text-dark">${{ Str::ucfirst($product->minimum_amount)}}</span></li>
                                <li class="list-group-item"><b>Free Delivery: </b>@if($product->free_delivery == 1) <span class="text-dark">On</span> @else <span class="text-danger">Off</span> @endif</li>
                                <li class="list-group-item"><b>Total View: </b><span class="text-dark">${{ Str::ucfirst($product->total_view)}}</span></li>

                                @if(count($product->writer) > 0)
                                <li class="list-group-item"><b>Writer:</b>
                                    @foreach($product->writer as  $item)
                                    <span class="text-dark">{{ Str::ucfirst($item->name)}},</span>

                                    @endforeach
                                </li>
                                @endif
                                @if(count($product->publication) > 0)
                                <li class="list-group-item"><b>Publication:</b>
                                    @foreach($product->publication as  $item)
                                    <span class="text-dark">{{ Str::ucfirst($item->name)}},</span>

                                    @endforeach
                                </li>
                                @endif

                                <li class="list-group-item"><b>Product Color:</b>
                                    @foreach($product->color as  $item)
                                    <span class="text-dark">{{ Str::ucfirst($item->name)}},</span>

                                    @endforeach
                                </li>
                                <li class="list-group-item"><b>Product Size:</b>
                                    @foreach($product->size as  $item)
                                    <span class="text-dark">{{ Str::ucfirst($item->name)}},</span>

                                    @endforeach
                                </li>
                                <li class="list-group-item"><b>Product Units:</b>
                                    @foreach($product->unit as  $item)
                                    <span class="text-dark">{{ Str::ucfirst($item->name)}},</span>

                                    @endforeach
                                </li>
                                <li class="list-group-item"><b>Product Vendors:</b>
                                    @foreach($product->vendor as  $item)
                                    <span class="text-dark">{{ Str::ucfirst($item->name)}},</span>

                                    @endforeach
                                </li>
                                <li class="list-group-item"><b>Product Related Images:</b>
                                    <div class="d-flex">
                                    @foreach($product->image as  $item)
                                    <img class="px-2" width="100px" src="/{{ $item->name }}" alt="">
                                    @endforeach
                                </div>
                                </li>

                                <li class="list-group-item">
                                    <b>Product Description: </b>
                                    <p class="text-dark">{!! Str::ucfirst($product->description)!!}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>Product Features: </b>
                                    <span class="text-dark">{!! $product->features!!}</span>
                                </li>
                                <li class="list-group-item"><b>Slug: </b><span class="text-dark">{{ Str::ucfirst($product->slug)}}</span></li>
                                <li class="list-group-item"><b>Creator:</b>
                                    <span class="text-dark">{{ Str::ucfirst($product->creator_info ? $product->creator_info->username:'')}}</span>
                                </li>
                                <li class="list-group-item"><b>Created At: </b><span class="text-dark">{{ $product->created_at->format('d F Y h:i:s a') }}</span></li>
                                <li class="list-group-item"><b>Updated At: </b><span class="text-dark">{{ $product->updated_at->format('d F Y h:i:s a') }}</span></li>
                                <li class="list-group-item"><b>Product Status: </b>@if($product->status == 1) <span class="text-dark">Active</span> @else <span class="text-danger">Other</span> @endif</li>
                            </ul>
                            <a href="{{ route('product.index') }}" class="btn btn-secondary my-3 btn-lg">Back</a>
                        </div>
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
