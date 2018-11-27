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
                                            <i class="fa fa-mortar-board"></i>All Enrolled Students
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
															Date Enrolled
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
													          <p>{{ $i->class_details['classname'] }}</p>
															</td>
															<td>								          
													          <p>{{ $i->updated_at }}</p>
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
                                                                                <h4> <b> A. Information of the Child </b> </h4>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-4 col-xs-12">
                                                                                    <label>First Name</label>
                                                                                    <p>{{ $i->firstname }}</p>
                                                                                </div>
                                                                                <div class="col-sm-4 col-xs-12">
                                                                                    <label>Middle Name</label>
                                                                                    <p>{{ $i->middle_name }}</p>
                                                                                </div>
                                                                                <div class="col-sm-4 col-xs-12">
                                                                                    <label>Surname</label>
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
                                                                                    <p>{{ $i->nationality }}</p>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                {{--<div class="col-sm-4 col-xs-12">--}}
                                                                                {{--<label>Email Address</label>--}}
                                                                                {{--<p>{{ $i->email }}</p>--}}
                                                                                {{--</div>--}}
                                                                                <div class="col-sm-4 col-xs-12">
                                                                                    <label>Blood Group</label>
                                                                                    <p>{{ $i->blood_group }}</p>
                                                                                </div>
                                                                                <div class="col-sm-4 col-xs-12">
                                                                                    <label>Blood Genotype</label>
                                                                                    <p>{{ $i->genotype }}</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-4 col-xs-12">
                                                                                    <label>State Of Origin</label>
                                                                                    <p>{{ $i->origin }}</p>
                                                                                </div>
                                                                                <div class="col-sm-4 col-xs-12">
                                                                                    <label>Mother Tongue</label>
                                                                                    <p>{{ $i->mother_tongue }}</p>
                                                                                </div>
                                                                                <div class="col-sm-4 col-xs-12">
                                                                                    <label>Applied Level</label>
                                                                                    <p>{{ $i->level }}</p>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-sm-2"></div>

                                                                                <div class="col-sm-4 col-xs-12">
                                                                                    <label>Other Languages</label>
                                                                                    <p>{{ $i->other_languages }}</p>
                                                                                </div>
                                                                                <div class="col-sm-4 col-xs-12">
                                                                                    <label>Health Challenges</label>
                                                                                    <p>{{ $i->health_challenges }}</p>
                                                                                </div>

                                                                                <div class="col-sm-2"></div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="parent_section">
                                                                            <div class="row">
                                                                                <h4> <b> B. Information of Parent </b> </h4>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-4 col-xs-12">
                                                                                    <label>First Name</label>
                                                                                    <p>{{ $i->returnParent()['firstname'] }}</p>
                                                                                </div>
                                                                                <div class="col-sm-4 col-xs-12">
                                                                                    <label>Last Name</label>
                                                                                    <p>{{ $i->returnParent()['lastname'] }}</p>
                                                                                </div>
                                                                                <div class="col-sm-4 col-xs-12">
                                                                                    <label>Occupation</label>
                                                                                    <p>{{ $i->returnParent()['occupation'] }}</p>
                                                                                </div>

                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-4 col-xs-12">
                                                                                    <label>Email</label>
                                                                                    <p>{{ $i->returnParent()['email'] }}</p>
                                                                                </div>

                                                                                <div class="col-sm-3 col-xs-12">
                                                                                    <label>State Of Origin</label>
                                                                                    <p>{{ $i->returnParent()['origin'] }}</p>
                                                                                </div>
                                                                                <div class="col-sm-3 col-xs-12">
                                                                                    <label>Phone Number</label>
                                                                                    <p>{{ $i->returnParent()['phone'] }}</p>
                                                                                </div>

                                                                            </div>
                                                                            <div class="row">

                                                                                <div class="col-sm-2">
                                                                                </div>

                                                                                <div class="col-sm-8 col-xs-12">
                                                                                    <label>Residential Address</label>
                                                                                    <p>{{ $i->returnParent()['workaddress'] }}</p>
                                                                                </div>

                                                                                <div class="col-sm-2"></div>
                                                                            </div>

                                                                        </div>
																	</div>
																	{{--<div class="modal-footer">--}}
																		{{--<button type="button" class="btn default" data-dismiss="modal">Close</button>--}}
																		{{--<form action="/dashboard/reject-student-application/{{ $i->id }}" method="POST" style="display: inline-block;float: right;">--}}
																		{{--{{ csrf_field() }}--}}
																		{{--<button type="submit" class="btn red">Reject Application</button>--}}
																	{{--</form>--}}
																	{{--<form action="/dashboard/accept-student/{{ $i->id }}" method="POST" style="display: inline-block;float: right;">--}}
																		{{--{{ csrf_field() }}--}}
																		{{--<button type="submit" class="btn green">Accept Application</button>--}}
																	{{--</form>--}}
																	{{--</div>--}}
																</div>
															</div>
														</div>

                                                <div class="modal fade class_modal" id="edit{{ $i->id }}" tabindex="-1"
                                                     role="basic" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        {!! Form::open(array('route' => 'image.student_passport_upload.post','files'=>true)) !!}
                                                        {{ csrf_field() }}
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
                                                                                <i>no photo uploaded yet</i>
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
