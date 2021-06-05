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
        <div class="col-lg-12">
		  <div class="card">
              <div class="card-body">
                  <table class="table table-bordered table-hover table-striped">
                      <tr>
                          <td style="width: 40%">Title</td>
                          <td>:</td>
                          <td class="text-justify">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                              Quas ex quidem illo magnam nihil corrupti quisquam soluta totam voluptatum quod.</td>
                      </tr>

                  </table>

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
