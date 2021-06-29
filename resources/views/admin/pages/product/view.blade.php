@extends('admin.master')

@section('title')
Blank-Page
@stop


@section('content')

<style>
    .card .table td, .card .table.th{
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
                 <div class="my-2"><img width="160px" height="160px" class="ima-thumbnail " src="/{{$product->thumb_image  }}" alt=""></div>
                   <h2 class="price"><small class="currency">$</small>199</h2>
                   <ul class="list-group list-group-flush">
                  <li class="list-group-item"><b>Brand: </b>{{ Str::ucfirst($product->brand_info?$product->brand_info->name:'') }}</li>
                  <li class="list-group-item"><b>Code: </b>{{ Str::ucfirst($product->code) }}</li>
                  <li class="list-group-item"><b>Tax: </b>${{ Str::ucfirst($product->tax)}}</li>
                  <li class="list-group-item"><b>Sku: </b>{{ Str::ucfirst($product->sku)}}</li>
                  <li class="list-group-item"><b>Stock: </b>{{ Str::ucfirst($product->stock)}}</li>
                  <li class="list-group-item"><b>Price: </b>${{ Str::ucfirst($product->price)}}</li>
                  <li class="list-group-item"><b>Discount: </b>{{ Str::ucfirst($product->discount)}}% <span class="text-dark">(${{  Helper::discount_price($product->price,$product->discount) }})</span></li>
                  <li class="list-group-item"><b>Expiration Date: </b>{{date("Y-M-d",strtotime($product->expiration_date))}}</li>
                  <li class="list-group-item"><b>Minimum Amount: </b>${{ Str::ucfirst($product->minimum_amount)}}</li>
                  <li class="list-group-item"><b>Free Delivery: </b>@if($product->free_delivery == 1)
                    On
                    @else
                    Off

                  @endif</li>
                  <li class="list-group-item"><b>Total View: </b>${{ Str::ucfirst($product->total_view)}}</li>
                  <li class="list-group-item"><b>Product Description: </b>
                    <p class="text-dark">{!! Str::ucfirst($product->description)!!}</p>
                 </li>
                  <li class="list-group-item"><b>Product Features: </b>
                    <p class="text-dark">{!! $product->features!!}</p>
                 </li>
                 <li class="list-group-item"><b>Slug: </b>{{ Str::ucfirst($product->slug)}}</li>
                 <li class="list-group-item"><b>Free Delivery: </b>@if($product->status == 1)
                    Active
                    @else
                    Off

                  @endif</li>

                </ul>
                  <a href="{{ route('product.index') }}" class="btn btn-primary my-3 btn-round">Back</a>
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
