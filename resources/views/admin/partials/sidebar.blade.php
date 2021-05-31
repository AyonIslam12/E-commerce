<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">

    <div class="brand-logo">
	  <img src="{{ asset('contents/admin/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
	  <h5 class="logo-text"> Admin Panel</h5>
	  <div class="close-btn"><i class="zmdi zmdi-close"></i></div>
   </div>

     <ul class="metismenu" id="menu">
		<li>
		  <a class="has-arrow" href="javascript:void();">
			<div class="parent-icon"><i class="zmdi zmdi-view-dashboard"></i></div>
			<div class="menu-title">Dashboard</div>
		  </a>
		  <ul class="">
			<li><a href="#"><i class="zmdi zmdi-dot-circle-alt"></i> eCommerce v1</a></li>

		  </ul>
		</li>
		@if(auth()->user()->role_id == 1)
        <li>
            <a class="has-arrow" href="javascript:void();">
              <div class="parent-icon"><i class="zmdi zmdi-view-dashboard"></i></div>
              <div class="menu-title">User Management</div>
            </a>
            <ul class="#">
              <li>
                  <a href="{{ route('admin_user_index') }}">
                      <i class="zmdi zmdi-dot-circle-alt"></i> All Users
                  </a>
              </li>
              <li>
                  <a href="{{ route('admin_user_role_index') }}">
                      <i class="zmdi zmdi-dot-circle-alt"></i> All Role
                  </a>
              </li>

            </ul>
          </li>
        @endif
		<li>
		  <a class="has-arrow" href="javascript:void();">
			<div class="parent-icon"><i class="zmdi zmdi-view-dashboard"></i></div>
			<div class="menu-title">Blank Page</div>
		  </a>
		  <ul class="#">
			<li><a href="{{ route('admin_blade_index') }}"><i class="zmdi zmdi-dot-circle-alt"></i> index</a></li>
			<li><a href="{{ route('admin_blade_create') }}"><i class="zmdi zmdi-dot-circle-alt"></i> create</a></li>
			<li><a href="{{ route('admin_blade_view') }}"><i class="zmdi zmdi-dot-circle-alt"></i> view</a></li>

		  </ul>
		</li>


    <li class="menu-label">Extra</li>
        <li>
            <a href="/" target="_blank">
            <div class="parent-icon">
                    <i class='zmdi zmdi-coffee'></i>
            </div>
            <div class="menu-title">Website
            </div>
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); confirm('are you sure!!') && document.getElementById('logout-form').submit();">
            <div class="parent-icon">
                    <i class='fa fa-sign-out '></i>
            </div>
            <div class="menu-title">Logout
            </div>
            </a>
        </li>



       {{--  <li class="menu-label">Label</li>
		<li>
            <a href="javascript:void();">
            <div class="parent-icon">
                    <i class='zmdi zmdi-coffee'></i>
            </div>
            <div class="menu-title">Important
            </div>
            </a>
        </li> --}}

	   </ul>

   </div>
