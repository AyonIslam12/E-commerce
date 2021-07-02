@extends('website.ecommerce.master')

@section('content')
<div class="row" style="margin: 100px 0px;">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-2">
                                <h3 class="text-uppercase">Pos</h3>
                            </div>
                            <div class="col-md-4">
                                <input type="text"
                                        placeholder="search by name, code, price, discount rate"
                                        class="form-control">
                            </div>
                            <div class="col-md-6">
                                    <span slot="prev-nav">&lt; Previous</span>
                                    <span slot="next-nav">Next &gt;</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-4 mb-4" v-for="product in products" :key="product.id">
                                <single-product-body
                                :product="product"
                                :add_product_to_pos_list="add_product_to_pos_list"
                                >
                            </single-product-body>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>product</th>
                                            <th class="text-center">qty</th>
                                            <th class="text-right">price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>
                                                <div class="d-flex">
                                                    <img  style="height: 40px;padding-right: 5px;" alt="">
                                                  Test
                                                </div>
                                            </th>
                                            <td style="width: 145px;">
                                                <div class="qty text-center">
                                                    <input  style="width: 50px"  min="1" type="number">
                                                    <i  class="fa fa-recycle btn-sm btn-warning"></i>
                                                    <i  class="fa fa-trash btn-sm btn-danger"></i>
                                                </div>
                                            </td>
                                            <td style="width: 80px;" class="text-right"><h6>$12</h6></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2" class="text-right">Total</th>
                                            <th class="text-right"><h6>$ 100</h6></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div
@endsection
