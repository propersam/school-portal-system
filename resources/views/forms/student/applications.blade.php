@extends('dashboard')

@section('form')

<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
				<div class="col-md-12">
						
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-mortar-board"></i>Applications
										</div>
									</div>
									<div class="portlet-body">
		                            @if ($errors->any())
		                                <div class="alert alert-danger">
		                                    <ul>
		                                        @foreach ($errors->all() as $error)
		                                            <li>{{ $error }}</li>
		                                        @endforeach
		                                    </ul>
		                                </div>
		                            @endif

									@if (session('success'))
								        <div class="alert alert-success">
								            {{ session('success') }}
								        </div>
								  	@endif
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#tab_1_1" data-toggle="tab">
												Pending Applications </a>
											</li>
											<li>
												<a href="#tab_1_2" data-toggle="tab">
												Accepted Applications </a>
											</li>
											<li>
												<a href="#tab_1_3" data-toggle="tab">
												Rejected Applications </a>
											</li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade active in" id="tab_1_1">
												<p>
												<table class="table table-condensed table-hover">
													<thead>
													<tr>
														<th>
															 Name
														</th>
														<th>
															Class
														</th>
														<th>
															Application Date 
														</th>
														<th>
															 Actions
														</th>
													</tr>
													</thead>
													<tbody>
												@if ($pending_applications)
													@foreach ($pending_applications as $i) 
														<tr>
															<td>
													          <p>{{ $i->firstname }} {{ $i->lastname }}</p>
															</td>
															<td>
													          <p>{{ $i->classlevel['levelname'] }}</p>
															</td>
															<td>								          
													          <p>{{ $i->created_at }}</p>
															</td>
															<td>
														<a class="btn default" data-toggle="modal" href="#edit{{ $i->id }}">
														View </a></td>
													<div class="modal fade" id="edit{{ $i->id }}" tabindex="-1" role="basic" aria-hidden="true">
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
									                                        	<p>{{ $i->returnMother()['firstname'] }}</p>
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
																	<form action="/dashboard/reject-student-application/{{ $i->id }}" method="POST" style="display: inline-block;float: right;">
																	{{ csrf_field() }}
																	<button type="submit" class="btn red">Reject Application</button>
																</form>
																<form action="/dashboard/accept-student/{{ $i->id }}" method="POST" style="display: inline-block;float: right;">
																	{{ csrf_field() }}
																	<button type="submit" class="btn green">Accept Application</button>
																</form>
																</div>
															</div>
															<!-- /.modal-content -->
														</div>
														<!-- /.modal-dialog -->
													</div>

															</td>
														</tr>
													@endforeach

											  	@endif
													</tbody>
													</table>
												</p>
											</div>
											<div class="tab-pane fade" id="tab_1_2">
												<p>
												<table class="table table-condensed table-hover">
													<thead>
													<tr>
														<th>
															 Name
														</th>
														<th>
															Class
														</th>
														<th>
															Application Date 
														</th>
														<th>
															 Actions
														</th>
													</tr>
													</thead>
													<tbody>
												@if ($accepted_applications)
													@foreach ($accepted_applications as $i) 
														<tr>
															<td>
													          <p>{{ $i->firstname }} {{ $i->lastname }}</p>
															</td>
															<td>
													          <p>{{ $i->classlevel['levelname'] }}</p>
															</td>
															<td>								          
													          <p>{{ $i->created_at }}</p>
															</td>
															<td>
																<a class="btn default" data-toggle="modal" href="#view{{ $i->id }}">
																View </a></td>
																<div class="modal fade" id="view{{ $i->id }}" tabindex="-1" role="basic" aria-hidden="true">
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
																			<form action="/dashboard/admit-student/{{ $i->id }}" method="POST" style="display: inline-block;float: left;">
																				{{ csrf_field() }}
																				<div class="form-group">
																					<label class="control-label">Admit to class</label>
																					{{ Form::select('class_id', $classes, ['class' => 'form-control'] 
																					) }}
																				</div>
																				<button type="submit" class="btn green">Admit</button>
																			</form>
																				<form action="/dashboard/reject-student-admission/{{ $i->id }}" method="POST" style="display: inline-block;float: right;">
																				<button type="submit" class="btn red">Reject</button>
																			</form>
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
											  	@endif
													</tbody>
													</table>
												</p>
											</div>
											<div class="tab-pane fade" id="tab_1_3">
												<p>
												<table class="table table-condensed table-hover">
													<thead>
													<tr>
														<th>
															 Name
														</th>
														<th>
															Class
														</th>
														<th>
															Application Date 
														</th>
														<th>
															 Actions
														</th>
													</tr>
													</thead>
													<tbody>
												@if ($rejected_applications)
													@foreach ($rejected_applications as $i) 
														<tr>
															<td>
													          <p>{{ $i->firstname }} {{ $i->lastname }}</p>
															</td>
															<td>
													          <p>{{ $i->level }}</p>
															</td>
															<td>								          
													          <p>{{ $i->created_at }}</p>
															</td>
															<td>
														<a class="btn default" data-toggle="modal" href="#edit{{ $i->id }}">
														Edit </a></td>
													<div class="modal fade" id="edit{{ $i->id }}" tabindex="-1" role="basic" aria-hidden="true">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
																	<h4 class="modal-title">Edit Session: {{ $i->firstname }}</h4>
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
																	<form action="/dashboard/reject-student-application/{{ $i->id }}" method="POST" style="display: inline-block;float: right;">
																	<button type="submit" class="btn red">Reject Application</button>
																</form>
																<form action="/dashboard/accept-student/{{ $i->id }}" method="POST" style="display: inline-block;float: right;">
																	{{ csrf_field() }}
																	<button type="submit" class="btn green">Accept Application</button>
																</form>
																</div>
															</div>
															<!-- /.modal-content -->
														</div>
														<!-- /.modal-dialog -->
													</div>

															</td>
														</tr>
													@endforeach
											  	@endif
													</tbody>
													</table>
												</p>
											</div>
										</div>
									</div>
								</div>
								
							
						
					
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->


@endsection
