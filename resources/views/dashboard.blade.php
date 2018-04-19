@extends('layouts.admin.app')

@section('content')
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li class="start active ">
					<a href="/dashboard">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="javascript:;">
						<i class="icon-basket"></i>
						<span class="title">Manage Staff</span>
						<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="/staff/create">
							<i class="icon-home"></i>
							Create Staff</a>
						</li>
						<li>
							<a href="/staff">
							<i class="icon-basket"></i>
							Staff List</a>
						</li>
						<!-- <li>
							<a href="ecommerce_orders_view.html">
							<i class="icon-tag"></i>
							Order View</a>
						</li>
						<li>
							<a href="ecommerce_products.html">
							<i class="icon-handbag"></i>
							Products</a>
						</li>
						<li>
							<a href="ecommerce_products_edit.html">
							<i class="icon-pencil"></i>
							Product Edit</a>
						</li> -->
					</ul>
					
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-rocket"></i>
					<span class="title">Manage Pupils</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="#">
							<i class="icon-home"></i>
							Register Pupil</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-basket"></i>
							Pupils</a>
						</li>
						<!-- <li>
							<a href="ecommerce_orders_view.html">
							<i class="icon-tag"></i>
							Order View</a>
						</li>
						<li>
							<a href="ecommerce_products.html">
							<i class="icon-handbag"></i>
							Products</a>
						</li>
						<li>
							<a href="ecommerce_products_edit.html">
							<i class="icon-pencil"></i>
							Product Edit</a>
						</li> -->
					</ul>
					
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-diamond"></i>
					<span class="title">Manage Classes</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="#">
							<i class="icon-home"></i>
							Create Level</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-basket"></i>
							Create Class</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-tag"></i>
							Levels</a>
						</li>
						<li>
							<a href="ecommerce_products.html">
							<i class="icon-handbag"></i>
							Classes</a>
						</li>
						<!-- <li>
							<a href="ecommerce_products_edit.html">
							<i class="icon-pencil"></i>
							Product Edit</a>
						</li> --> 
					</ul>
					
				</li>
				<!-- <li>
					<a href="javascript:;">
					<i class="icon-puzzle"></i>
					<span class="title">UI Components</span>
					
					</a>
					
				</li> -->
				<!-- BEGIN ANGULARJS LINK -->
				<!-- <li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="AngularJS version demo">
					<a href="angularjs" target="_blank">
					<i class="icon-paper-plane"></i>
					<span class="title">
					AngularJS Version </span>
					</a>
				</li> -->
				<!-- END ANGULARJS LINK -->
				<!-- <li>
					<a href="javascript:;">
					<i class="icon-settings"></i>
					<span class="title">Form Stuff</span>
					
					</a>
					
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-briefcase"></i>
					<span class="title">Data Tables</span>
					
					</a>
					
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-wallet"></i>
					<span class="title">Portlets</span>
					
					</a>
					
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-bar-chart"></i>
					<span class="title">Charts</span>
					
					</a>
					
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-docs"></i>
					<span class="title">Pages</span>
					
					</a>
					
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-present"></i>
					<span class="title">Extra</span>
					
					</a>
					
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-folder"></i>
					<span class="title">Multi Level Menu</span>
					
					</a>
					
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-user"></i>
					<span class="title">Login Options</span>
					
					</a>
					
				</li>

				<li class="last ">
					<a href="javascript:;">
					<i class="icon-pointer"></i>
					<span class="title">Maps</span>
					
					</a>
					
				</li> -->
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	
	@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
  	@endif
	@yield('form')

	
</div>
<!-- END CONTAINER -->

@endsection