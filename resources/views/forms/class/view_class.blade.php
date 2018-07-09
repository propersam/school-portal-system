@extends('dashboard')

@section('form')

<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
					<!-- BEGIN Portlet PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption font-green-sharp">
								<i class="icon-user font-green-sharp"></i>
								<span class="caption-subject"> {{ $teacher->firstname }} {{ $teacher->lastname }}</span>
								@if ($class)
									<span class="caption-helper"> | {{ $class->name }} Students</span>
								@else
									<span class="caption-helper"> | Yet to be assigned to a class</span>
								@endif
							</div>
								@if ($class)
									<div class="actions">
										<a href="/dashboard/all-results/{{ $class->id }}" class="btn btn-circle blue ">
										<i class="fa fa-file-o"></i> Manage Results</a>
										@if (Auth::user()->role == 'SuperAdmin')
											<a href="/dashboard/register-student?l={{ $class->level }}&c={{ $class->id }}" class="btn btn-circle red-sunglo ">
											<i class="fa fa-plus"></i> Add Student</a>
										@endif
										<a href="/dashboard/register-student?l={{ $class->level }}&c={{ $class->id }}" class="btn btn-circle blue-sunglo ">
										<i class="fa fa-plus"></i> Results </a>
										<a href="/dashboard/register-student?l={{ $class->level }}&c={{ $class->id }}" class="btn btn-circle red-sunglo ">
										<i class="fa fa-plus"></i> Add Student</a>
                                        <a href="javascript:"
                                           class="btn btn-circle btn-default btn-icon-only fullscreen"></a>
									</div>
								@endif
						</div>
						<div class="portlet-body">
							<div class="table-scrollable">
									@if ($class)

										<table class="table table-hover">
											<thead>
											<tr>
												<th>
													First Name
												</th>
												<th>
													Preferred Name
												</th>
												<th>
													Last Name
												</th>
												<th>
													Date of Birth
												</th>
												<th>
													 Actions
												</th>
											</tr>
											</thead>
											<tbody>
											@foreach ($students as $i) 
												<tr>
													<td>
											          <p>{{ $i->firstname }}</p>
													</td>
													<td>
											          <p>{{ $i->preferredname }}</p>
													</td>
													<td>
											          <p>{{ $i->lastname }}</p>
													</td>
													<td>								          
											          <p>{{ $i->dob }}</p>
													</td>
													<td>
												<a class="btn default" data-toggle="modal" href="#view{{ $i->id }}">
												View </a></td>
											<div class="modal fade student_modal" id="view{{ $i->id }}" tabindex="-1" role="basic" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
															<h4 class="modal-title">{{ $i->firstname }}</h4>
														</div>
														<div class="modal-body">
															<div class="child_section">
																<div class="row">
							                                        <h4><i class="fa fa-user"></i> Child</h4>
																</div>
						                                        <div class="row">
							                                        <div class="col-sm-4 col-xs-12">
							                                        	<label>First Name</label>
							                                        	<p>{{ $i->firstname }}</p>
							                                        </div>
							                                        <div class="col-sm-4 col-xs-12">
							                                        	<label>Preferred Name</label>
							                                        	<p>{{ $i->firstname }}</p>
							                                        </div>
							                                        <div class="col-sm-4 col-xs-12">
							                                        	<label>Last Name</label>
							                                        	<p>{{ $i->lastname }}</p>
							                                        </div>
						                                        </div>
						                                        <div class="row">
							                                        <div class="col-sm-4 col-xs-12">
							                                        	<label>Gender</label>
							                                        	<p>{{ $i->gender }}</p>
							                                        </div>
							                                        <div class="col-sm-4 col-xs-12">
							                                        	<label>Date of Birth</label>
							                                        	<p>{{ $i->dob }}</p>
							                                        </div>
							                                        <div class="col-sm-4 col-xs-12">
							                                        	<label>Nationality</label>
							                                        	<p>{{ $i->origin }}</p>
							                                        </div>
						                                        </div>
						                                        <div class="row">
							                                        <div class="col-sm-4 col-xs-12">
							                                        	<label>Email Address</label>
							                                        	<p>{{ $i->email }}</p>
							                                        </div>
							                                        <div class="col-sm-4 col-xs-12">
							                                        	<label>Current School</label>
							                                        	<p>{{ $i->current_school }}</p>
							                                        </div>
							                                        <div class="col-sm-4 col-xs-12">
							                                        	<label>Residential Address</label>
							                                        	<p>{{ $i->address }}</p>
							                                        </div>
						                                        </div>
						                                        <div class="row">
							                                        <div class="col-sm-4 col-xs-12">
							                                        	<label>Position In family</label>
							                                        	<p>{{ $i->position_in_family }}</p>
							                                        </div>
							                                        <div class="col-sm-4 col-xs-12">
							                                        	<label>Phone Number</label>
							                                        	<p>{{ $i->phonenumber }}</p>
							                                        </div>
							                                        <div class="col-sm-4 col-xs-12">
							                                        	<label>Applied Class</label>
							                                        	<p>{{ $i->level }}</p>
							                                        </div>
						                                        </div>
						                                    </div>
															<div class="child_section">
																<div class="row">
							                                        <h4><i class="fa fa-user"></i> Mother</h4>
																</div>
						                                        <div class="row">
							                                        <div class="col-sm-4 col-xs-12">
							                                        	<label>First Name</label>
							                                        	<p>{{ $i->returnMother()->firstname }}</p>
							                                        </div>
							                                        <div class="col-sm-4 col-xs-12">
							                                        	<label>Last Name</label>
							                                        	<p>{{ $i->returnMother()->lastname }}</p>
							                                        </div>
							                                        <div class="col-sm-4 col-xs-12">
							                                        	<label>Marital Status</label>
							                                        	<p>{{ $i->returnMother()->maritalstatus }}</p>
							                                        </div>
						                                        </div>
						                                        <div class="row">
							                                        <div class="col-sm-3 col-xs-12">
							                                        	<label>Occupation</label>
							                                        	<p>{{ $i->returnMother()->occupation }}</p>
							                                        </div>
							                                        <div class="col-sm-3 col-xs-12">
							                                        	<label>Company Name</label>
							                                        	<p>{{ $i->returnMother()->companyname }}</p>
							                                        </div>
							                                        <div class="col-sm-3 col-xs-12">
							                                        	<label>Company Number</label>
							                                        	<p>{{ $i->returnMother()->phone }}</p>
							                                        </div>
							                                        <div class="col-sm-3 col-xs-12">
							                                        	<label>Work Address</label>
							                                        	<p>{{ $i->returnMother()->workaddress }}</p>
							                                        </div>
						                                        </div>
						                                        <div class="row">
							                                        <div class="col-sm-4 col-xs-12">
							                                        	<label>Email</label>
							                                        	<p>{{ $i->returnMother()->email }}</p>
							                                        </div>
							                                        <div class="col-sm-4 col-xs-12">
							                                        </div>
							                                        <div class="col-sm-4 col-xs-12">
							                                        	<label>School Attended</label>
							                                        	<p>{{ $i->returnMother()->attended_school }}</p>
							                                        </div>
						                                        </div>

															</div>
															<div class="child_section">
																<div class="row">
							                                        <h4><i class="fa fa-user"></i> Father</h4>
																</div>
						                                        <div class="row">
							                                        <div class="col-sm-4 col-xs-12">
							                                        	<label>First Name</label>
							                                        	<p>{{ $i->returnFather()->firstname }}</p>
							                                        </div>
							                                        <div class="col-sm-4 col-xs-12">
							                                        	<label>Last Name</label>
							                                        	<p>{{ $i->returnFather()->lastname }}</p>
							                                        </div>
							                                        <div class="col-sm-4 col-xs-12">
							                                        	<label>Marital Status</label>
							                                        	<p>{{ $i->returnFather()->maritalstatus }}</p>
							                                        </div>
						                                        </div>
						                                        <div class="row">
							                                        <div class="col-sm-3 col-xs-12">
							                                        	<label>Occupation</label>
							                                        	<p>{{ $i->returnFather()->occupation }}</p>
							                                        </div>
							                                        <div class="col-sm-3 col-xs-12">
							                                        	<label>Company Name</label>
							                                        	<p>{{ $i->returnFather()->companyname }}</p>
							                                        </div>
							                                        <div class="col-sm-3 col-xs-12">
							                                        	<label>Company Number</label>
							                                        	<p>{{ $i->returnFather()->phone }}</p>
							                                        </div>
							                                        <div class="col-sm-3 col-xs-12">
							                                        	<label>Work Address</label>
							                                        	<p>{{ $i->returnFather()->workaddress }}</p>
							                                        </div>
						                                        </div>
						                                        <div class="row">
							                                        <div class="col-sm-4 col-xs-12">
							                                        	<label>Email</label>
							                                        	<p>{{ $i->returnFather()->email }}</p>
							                                        </div>
							                                        <div class="col-sm-4 col-xs-12">
							                                        </div>
							                                        <div class="col-sm-4 col-xs-12">
							                                        	<label>School Attended</label>
							                                        	<p>{{ $i->returnFather()->attended_school }}</p>
							                                        </div>
						                                        </div>

															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn default" data-dismiss="modal">Close</button>
														</div>
													</div>
													<!-- /.modal-content -->
												</div>
												<!-- /.modal-dialog -->
											</div>

													</td>
												</tr>
											@endforeach
											</tbody>
											</table>
									@else
										<h3>You are yet to be assigned to a class, please contact the admin.</h3>
									@endif


							</div>
						</div>
					</div>
					<!-- END Portlet PORTLET-->
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->


@endsection