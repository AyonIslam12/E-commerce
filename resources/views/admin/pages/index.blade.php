@extends('admin.master')

@section('title')
Admin-Pannel
@stop


@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumb-->
     @include('admin.partials.breadCrumb',['title' => 'Dashboard'])
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
		  <div style="height:600px"> <!--Please remove the height before using this page-->
		      <h1>Blank</h1>
          <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>
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
