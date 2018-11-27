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
								<span class="caption-subject"> Teacher: {{ $teacher->firstname }} {{ $teacher->lastname }}</span>
								@if ($class)
									<span class="caption-helper"> | {{ $class->classname }} Students</span>
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
													Middle Name
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
											          <p>{{ is_object($i) ? $i->firstname : '' }}</p>
													</td>
													<td>
											          <p>{{ is_object($i) ? $i->middle_name : '' }}</p>
													</td>
													<td>
											          <p>{{ is_object($i) ? $i->lastname : '' }}</p>
													</td>
													<td>								          
											          <p>{{ is_object($i) ? $i->dob : '' }}</p>
													</td>
													<td>
												<a class="btn default" data-toggle="modal" href="#view{{ $i->id }}">
												View </a></td>
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