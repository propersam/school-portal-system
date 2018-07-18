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
                                            <i class="fa fa-mortar-board"></i>All Students
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
										<div class="">
											<div class="">
												<p>
                                                    <table class="table table-condensed table-hover" id="dataTables">
													<thead>
													<tr>
                                                        <th>
                                                        </th>
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
													@foreach ($students as $i) 
														<tr>
															<td>

                                                                <a data-toggle="modal" href="#edit{{ $i->id }}">
                                                                    @if($i->passport_photo)
                                                                        <img class="img-circle"
                                                                             style="height: 40px; width: 40px"
                                                                             src="/uploads/passport_photos/{{ $i->passport_photo }}"
                                                                             alt=""/>
                                                                    @else
                                                                        <img class="img-circle"
                                                                             style="height: 40px; width: 40px"
                                                                             src="/assets/images/student_icon.png"> <br>

                                                                        <i>not uploaded</i>
                                                                    @endif
                                                                </a>
                                                            </td>
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
                                                                <a class="btn default" data-toggle="modal"
                                                                   href="#view{{ $i->id }}">
                                                                    View </a>
                                                                <a class="btn btn-sm default" data-toggle="modal"
                                                                   href="#edit{{ $i->id }}">
                                                                    Upload Photo</a>
                                                            </td>
                                                <div class="modal fade" id="view{{ $i->id }}" tabindex="-1" role="basic"
                                                     aria-hidden="true">
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
															</div>
														</div>

                                                <div class="modal fade class_modal" id="edit{{ $i->id }}" tabindex="-1"
                                                     role="basic" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        {!! Form::open(array('route' => 'image.student_passport_upload.post','files'=>true)) !!}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-hidden="true"></button>
                                                                <h4 class="modal-title">Passport Photo</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <center>

                                                                            @if($i->passport_photo)
                                                                                <img class="img-circle"
                                                                                     style="height: 200px; width: 200px"
                                                                                     src="/uploads/passport_photos/{{ $i->passport_photo }}"
                                                                                     alt=""/>
                                                                            @else
                                                                                <img class="img-circle"
                                                                                     style="height: 200px; width: 200px"
                                                                                     src="/assets/images/student_icon.png">
                                                                                <br>
                                                                                <i>non uploaded yet</i>
                                                                            @endif

                                                                            <div class="row">
                                                                                <br>
                                                                                <br>
                                                                                <div class="col-md-6 col-md-offset-3">
                                                                                    {!! Form::file('image', array('class' => 'btn btn-circle blue-hoki btn-sm')) !!}
                                                                                    <i>max size: 1mb</i>
                                                                                </div>

                                                                            </div>


                                                                        </center>
                                                                    </div>
                                                                    <input type="hidden" name="student_id"
                                                                           value="{{ $i->id }}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn default"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                                <button type="submit" class="btn blue"><i
                                                                            class="fa fa-cloud-upload"></i> Upload
                                                                </button>
                                                            </div>
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>

															</td>
														</tr>
													@endforeach
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
