@extends('layouts.admin.app')

@section('content')
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			@if (Auth::user()->role == 'SuperAdmin')
				<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
					<li class="start ">
						<a href="/dashboard">
						<i class="icon-home"></i>
						<span class="title">Dashboard</span>
						</a>
					</li>
					<li class="{{ Request::is('staff*') ? 'active' : '' }}">
						<a href="javascript:;">
							<i class="icon-users"></i>
							<span class="title">Manage Staff</span>
							<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="/staff/create">
								<i class="icon-arrow-right"></i>
								Create Staff</a>
							</li>
							<li>
								<a href="/staff">
								<i class="icon-arrow-right"></i>
								Assistants</a>
							</li>
							<li>
								<a href="/bursar">
								<i class="icon-arrow-right"></i>
								Bursars</a>
							</li>
							<li>
								<a href="/headteacher">
								<i class="icon-arrow-right"></i>
								Head Teacher</a>
							</li>
							<li>
								<a href="/staff">
								<i class="icon-arrow-right"></i>
								Teachers</a>
							</li>
							
						</ul>
						
					</li>
					<li class="{{ Request::is('dashboard/register-student', 'dashboard/applications') ? 'active' : '' }}">
						<a href="javascript:;">
						<i class="icon-graduation"></i>
						<span class="title">Manage Pupils</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="/dashboard/register-student">
								<i class="icon-arrow-right"></i>
								Register Pupil</a>
							</li>
							<li>
								<a href="/dashboard/all-pupils">
								<i class="icon-arrow-right"></i>
								View All</a>
							</li>
							<li>
								<a href="/dashboard/applications">
								<i class="icon-arrow-right"></i>
								Applications</a>
							</li>
						</ul>
						
					</li>
					<li class="{{ Request::is('dashboard/create-session', 'dashboard/create-level', 'dashboard/create-class', 'dashboard/sessions', 'dashboard/levels', 'dashboard/classes') ? 'active' : '' }}">
						<a href="javascript:;">

						<i class="icon-layers"></i>
						<span class="title">Manage Classes</span>

						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>

								<a href="/dashboard/create-session">
								<i class="icon-arrow-right"></i>
								Create Session</a>
							</li>
							<li>
								<a href="/dashboard/create-level">
								<i class="icon-arrow-right"></i>
								Create Level</a>
							</li>
							<li>
								<a href="/dashboard/create-class">
								<i class="icon-arrow-right"></i>
								Create Class</a>
							</li>
							<li>
								<a href="/dashboard/sessions">
								<i class="icon-arrow-right"></i>
								Sessions</a>
							</li>
							<li>
								<a href="/dashboard/levels">
								<i class="icon-arrow-right"></i>
								Levels</a>
							</li>
							<li>
								<a href="/dashboard/classes">
								<i class="icon-arrow-right"></i>
								Classes</a>
							</li>

						</ul>
						
					</li>
					<li class="{{ Request::is('dashboard/create-subject', 'dashboard/subject-registration', 'dashboard/subjects') ? 'active' : '' }}">
						<a href="javascript:;">
						<i class="icon-book-open"></i>
						<span class="title">Manage Subjects</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="/dashboard/create-subject">
								<i class="icon-arrow-right"></i>
								Add Subject</a>
							</li>
							<li>
								<a href="/dashboard/subject-registration">
								<i class="icon-arrow-right"></i>
								Subject Registration</a>
							</li>
							<li>
								<a href="/dashboard/subjects">
								<i class="icon-arrow-right"></i>
								Subjects</a>
							</li>
						</ul>
						
					</li>
					<li>
						<a href="/logout">
						<i class="icon-logout"></i> Log Out
						</a>
					</li>
				</ul>
			@endif
			@if (Auth::user()->role == 'Teacher')
				<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
					<li class="start ">
						<a href="/dashboard">
						<i class="icon-home"></i>
						<span class="title">Dashboard</span>
						</a>
					</li>
					<li class="start ">
						<a href="/dashboard/teacher-view-class">
						<i class="icon-graduation"></i>
						<span class="title">View Class</span>
						</a>
					</li>
					<li class="start ">
						<a href="/dashboard/teacher-view-results">
						<i class="icon-book-open"></i>
						<span class="title">Results</span>
						</a>
					</li>
					<li>
						<a href="/logout">
							<i class="icon-logout"></i> 
							<span class="title">Log Out</span>
						</a>
					</li>
				</ul>
			@endif
			@if (Auth::user()->role == 'parent')
				<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
					<li  class="start {{ Request::is('dashboard') ? 'active' : '' }}">
						<a href="/dashboard">
						<i class="icon-home"></i>
						<span class="title">Dashboard</span>
						</a>
					</li>
					<li  class=" start {{ Request::is('dashboard/children') ? 'active' : '' }}">
						<a href="/dashboard/children">
						<i class="icon-users"></i>
						<span class="title">Children</span>
						</a>
					</li>
					<li  class=" start {{ Request::is('dashboard/parent-new-child') ? 'active' : '' }}">
						<a href="/dashboard/parent-new-child">
						<i class="icon-user"></i>
						<span class="title">Register New Child</span>
						</a>
					</li>
					<li  class=" start {{ Request::is('dashboard/parent-view-results') ? 'active' : '' }}">
						<a href="/dashboard/parent-view-results">
						<i class="icon-book-open"></i>
						<span class="title">Results</span>
						</a>
					</li>
					<li  class=" start {{ Request::is('dashboard/parent-view-records') ? 'active' : '' }}">
						<a href="/dashboard/parent-view-records">
						<i class="icon-book-open"></i>
						<span class="title">Records</span>
						</a>
					</li>
					<li>
						<a href="/logout">
							<i class="icon-logout"></i> 
							<span class="title">Log Out</span>
						</a>
					</li>
				</ul>
			@endif
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	
	@yield('form')

	
</div>
<!-- END CONTAINER -->

@endsection