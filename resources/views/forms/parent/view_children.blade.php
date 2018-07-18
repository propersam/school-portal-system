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
								<span class="caption-subject"> Your Children</span>
							</div>
							<div class="actions">
									<a href="/dashboard/parent-new-child" class="btn btn-circle green ">
									<i class="fa fa-plus"></i> Register New Child</a>
                                <a href="javascript:" class="btn btn-circle btn-default btn-icon-only fullscreen"></a>
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
							<div class="table-scrollable">
												<table class="table table-hover">
													<thead>
													<tr>
														<th>
														</th>
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
															Class
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
							                                        <img class="img-circle" style="height: 40px; width: 40px" src="/uploads/passport_photos/{{ $i->passport_photo }}" alt="" />
							                                        @else
							                                        	<img class="img-circle" style="height: 40px; width: 40px" src="/assets/images/student_icon.png"> <br>

							                                        	<i>not uploaded</i>
							                                        @endif
							                                    </a>
															</td>
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
					                                        	@if($i->class_id)
						                                        	<p>{{ $i['class_details']['name'] }}</p>
						                                        @else
							                                       <p>Not admitted yet</p> 
							                                    @endif
															</td>
															<td>

					                                        	@if($i->class_id)
																	<a class="btn blue" href="/dashboard/child-results/{{ $i->id }}">
																	View Results</a>
																	<a class="btn btn-sm yellow" data-toggle="modal" href="#view{{ $i->id }}">
																	View Class</a>
						                                        @else
							                                       <p>Not admitted yet</p> 
							                                    @endif
																<a class="btn btn-sm green" href="/school-fees/{{ $i->id }}">
																	School Fees</a>
																<a class="btn btn-sm default" data-toggle="modal" href="#edit{{ $i->id }}">
																	Upload Photo</a>

															</td>
																<div class="modal fade class_modal" id="view{{ $i->id }}" tabindex="-1" role="basic" aria-hidden="true">
																	<div class="modal-dialog">
																		<div class="modal-content">
																			<div class="modal-header">
																				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
																				<h4 class="modal-title">{{ $i['class_details']['name'] }}</h4>
																			</div>
																			<div class="modal-body">
																				<div class="child_section">
																					<div class="row">
												                                        <center>
													                                        <h4><u>Teacher</u></h4>

													                                        <img class="img-circle" style="height: 200px; width: 200px" src="/uploads/profile_photos/{{ $i['class_details']['teacher']['user']['photo'] }}" alt="" />


													                                        <p class="name">{{$i['class_details']['teacher']['firstname']}} {{$i['class_details']['teacher']['lastname']}}</p>
													                                    </center>
																					</div>
											                                        <div class="row">
												                                        <div class="col-sm-4 col-xs-12">
												                                        	<label>Class</label>
												                                        	<p>
												                                        	@if($i->class_id)

												                                        	{{ $i['class_details']['name'] }}

													                                        @else
													                                       <p>Not admitted yet</p> 

														                                    @endif
												                                        	</p>
												                                        </div>
												                                        <div class="col-sm-2 col-xs-12">
												                                        	<label>Level</label>
												                                        	<p>{{ $i['class_details']['classlevel']['levelname'] }}</p>
												                                        </div>
												                                        <div class="col-sm-6 col-xs-12">
												                                        	<label>Teacher's Email</label>
												                                        	<p>{{$i['class_details']['teacher']['user']['email']}}</p>
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

																<div class="modal fade class_modal" id="edit{{ $i->id }}" tabindex="-1" role="basic" aria-hidden="true">
																	<div class="modal-dialog">
																        {!! Form::open(array('route' => 'image.student_passport_upload.post','files'=>true)) !!}
																				<div class="modal-content">
																					<div class="modal-header">
																						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
																						<h4 class="modal-title">Passport Photo</h4>
																					</div>
																					<div class="modal-body">
																							<div class="form-body">
																								<div class="row">
															                                        <center>

																                                        @if($i->passport_photo)
																                                        <img class="img-circle" style="height: 200px; width: 200px" src="/uploads/passport_photos/{{ $i->passport_photo }}" alt="" />
																                                        @else
																                                        	<img class="img-circle" style="height: 200px; width: 200px" src="/assets/images/student_icon.png">
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
																							<input type="hidden" name="student_id" value="{{ $i->id }}">
																							</div>
																					</div>
																					<div class="modal-footer">
																						<button type="button" class="btn default" data-dismiss="modal">Close</button>
																						<button type="submit" class="btn blue"><i class="fa fa-cloud-upload"></i> Upload</button>
																					</div>
																				</div>
																        {!! Form::close() !!}
																	</div>
																</div>
															</td>
											
															</td>
														</tr>
													@endforeach
													</tbody>
													</table>
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