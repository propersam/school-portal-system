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
							<div class="table-scrollable">
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
																	<a class="btn yellow" data-toggle="modal" href="#view{{ $i->id }}">
																	View Class</a>
						                                        @else
							                                       <p>Not admitted yet</p> 
							                                    @endif
																<a class="btn green" href="/school-fees/{{ $i->id }}">
																	School Fees</a>

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