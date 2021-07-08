@extends('website.ecommerce.master')


@section('title')
Check-Out
@stop
@section('content')

<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="menu  mtb-15">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="checkout.html">Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
       <section id="checkOut">
        <check-out></check-out>
       </section>
    </div>
</div>

@stop
