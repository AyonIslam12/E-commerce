<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8"/>
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content="Ecommerce Dashboard"/>
  <meta name="author" content="my-ecom.com"/>
  <title>Admin Panel</title>
  <!-- loader-->
  {{-- <link href="{{ asset('contents/admin/assets/css/pace.min.css') }}" rel="stylesheet"/>
  <script src="{{ asset('contents/admin/assets/js/pace.min.js') }}"></script> --}}
  {{-- <!--favicon-->
  <link rel="icon" href="{{ asset('contents/admin/assets/images/favicon.ico') }}" type="image/x-icon"> --}}
  <!-- simplebar CSS-->
  <link href="{{ asset('contents/admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('contents/admin/assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{ asset('contents/admin/assets/css/animate.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{ asset('contents/admin/assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Metismenu CSS-->
  <link href="{{ asset('contents/admin/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="{{ asset('contents/admin/assets/css/app-style.css') }}" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="{{ asset('contents/admin/assets/js/jquery.min.js') }}"></script>

<script>
      $.ajaxSetup({
                cache:false,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });
            $( document ).ajaxSuccess((e,res)=>console.log((res.responseJSON && res.responseJSON) || res));
            $( document ).ajaxError(function( event, res ) {
                console.log(res.responseJSON.errors || res);
            });
            function toaster(icon, message){
                Toast.fire({
                    icon: icon,
                    title: message,
                })
            }
</script>

</head>

<body class="bg-theme bg-theme1">
    @include('admin.partials.flash')

<!-- Start wrapper-->
 <div id="wrapper">

 <!--Start sidebar-wrapper-->
 @include('admin.partials.sidebar')
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
@include('admin.partials.topbar')
<!--End topbar header-->

<div class="clearfix"></div>


<!--Start content-wrapper-->

    @yield('content')

<!--End content-wrapper-->
   <!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

	<!--Start footer-->
	@include('admin.partials.footer')
	<!--End footer-->

   <!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>

      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>

      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
        <li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>

     </div>
   </div>
  <!--end color switcher-->

  </div><!--End wrapper-->


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Delete Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action=""  name="modal_delete_form" method="POST">
            @csrf
        <div class="modal-body">
            <input type="hidden" name="id">
            <h5>Are you want to delete.!</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  <!-- Modal -->




{{-- Logout Part --}}
 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

<!-- Bootstrap core JavaScript-->

 <script src="{{ asset('contents/admin/custom.js') }}"></script>
 <script src="{{ asset('contents/admin/assets/js/popper.min.js') }}"></script>
 <script src="{{ asset('contents/admin/assets/js/bootstrap.min.js') }}"></script>

 <!-- simplebar js -->
 <script src="{{ asset('contents/admin/assets/plugins/simplebar/js/simplebar.js') }}"></script>
 <!-- Metismenu js -->
 <script src="{{ asset('contents/admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>

 <!-- Custom scripts -->
 <script src="{{ asset('contents/admin/assets/js/app-script.js') }}"></script>

 @stack('cjs')
</body>


</html>
