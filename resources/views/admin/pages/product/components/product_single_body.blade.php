<div class="col admin_product_body">
    <div class="card">
        <img src="/{{$product->thumb_image}}" class="card-img-top" alt="product image {{$product->thumb_image}}" />
        <div class="">
            <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-{{ $product->discount }}%</span></div>
        </div>
        <div class="card-body">
            <h6 class="card-title cursor-pointer">{{$product->name}}</h6>
            <div class="clearfix d-flex justify-content-between">
                <p class="mb-0 "><strong>134</strong> Sales</p>
                <p class="mb-0  fw-bold">
                    <span class="me-2 text-decoration-line-through"><del class="text-danger">${{ $product->price }}</del></span>
                    <span class="text-white">${{ Helper::discount_price($product->price,$product->discount) }}</span></p>
            </div>
            <div class="d-flex align-items-center mt-3 fs-6">
                <div class="cursor-pointer">
                    <i class="fa fa-star text-white"></i>
                    <i class="fa fa-star text-white"></i>
                    <i class="fa fa-star text-white"></i>
                    <i class="fa fa-star text-light-4"></i>
                    <i class="fa fa-star text-light-4"></i>
                </div>
                <p class="mb-0 ms-auto"> 4.2(182)</p>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-center">
            <a class="btn btn-outline-info btn-sm mr-1" href="{{ route('product.show',$product->id) }}">View</a>
            <a class="btn btn-outline-success btn-sm mr-1" href="">Edit</a>
            <a class="btn btn-outline-danger btn-sm delete_btn" href="{{ route('product.destroy',$product->id) }}" data-parent=".admin_product_body">Delete</a>
        </div>
    </div>
</div>
