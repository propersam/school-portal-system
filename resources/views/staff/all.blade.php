@extends('dashboard')

@section('form')

<style type="text/css">
	.row{
		margin-bottom: 10px;
		padding-left: 30px;
	}
</style>
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
				<div class="col-md-12">
					
						
						
							
							
				<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								All Staffs
							</div>
						</div>
						<div class="portlet-body">
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
										 Last Name
									</th>
									<th>
										 Designation
									</th>
									<th>
										 Actions
									</th>
								</tr>
								</thead>
								<tbody>
			                @foreach ($staffs as $i)
								<tr>
									<td>
										<img style="height: 80px" width="80px" src="uploads/profile_photos/{{ $i->user->photo }}" alt="" />
									</td>
									<td>
										 {{ $i->firstname }}
									</td>
									<td>
										  {{ $i->lastname }}
									</td>
									
									<td>
										  {{ $i->role }}
									</td>
									
									<td>
										<a class="btn blue" data-toggle="modal" href="#view{{ $loop->iteration }}">
											View Staff</a>

										<a class="btn yellow" data-toggle="modal" href="#edit{{ $loop->iteration }}">
											Edit Staff</a>

										<a class="btn red" data-toggle="modal" href="#delete{{ $loop->iteration }}">
											Delete </a>
									</td>
											<div class="modal fade class_modal" id="view{{ $loop->iteration }}" tabindex="-1" role="basic" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
															<h4 class="modal-title">View Staff</h4>
														</div>
														<div class="modal-body">
															<div class="childd_section">
																<div class="row">
							                                        <center>
								                                        <h4>{{ $i->firstname }} {{ $i->lastname }}</h4>

								                                        @if($i->class_id)
																			<img style="height: 80px" width="80px" src="uploads/profile_photos/{{ $i->user->photo }}" alt="" />
																		@else
																			<img alt="" style="height: 80px" width="80px"  class="img-circle" src="/assets/admin/layout4/img/avatar9.jpg"/>
																			<br>
																			<i>no photo yet</i>

																		@endif


								                                        <p class="name">{{ $i->role }}</p>
								                                    </center>
																</div>
						                                        <div class="row">
						                                        	<label>Name</label>
							                                        <p>{{ $i->firstname }} {{ $i->lastname }}</p>
						                                        </div>
						                                        <div class="row">
						                                        	<label>Email</label>
							                                        <p>{{ $i->user->email }}</p>
						                                        </div>
						                                        <div class="row">
						                                        	<label>Phone Number</label>
							                                        <p>{{ $i->phonenumber }}</p>
						                                        </div>
						                                        <div class="row">
						                                        	<label>Employment Date</label>
							                                        <p>{{ $i->employmentdate }}</p>
						                                        </div>
						                                        <div class="row">
						                                        	<label>Gender</label>
							                                        <p>{{ $i->gender }}</p>
						                                        </div>
						                                        <div class="row">
						                                        	<label>Date Added</label>
							                                        <p>{{ $i->employmentdate }}</p>
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

											<div class="modal fade class_modal" id="edit{{ $loop->iteration }}" tabindex="-1" role="basic" aria-hidden="true">
												<div class="modal-dialog">
													<form action="/dashboard/update-staff/{{ $i->id }}" method="POST" class="horizontal-form">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
															<h4 class="modal-title">Edit Staff</h4>
														</div>
														<div class="modal-body">
																<div class="form-body">
																	<div class="row">
																		<div class="col-md-6">
																			{{ csrf_field() }}

																			<input type="hidden" name="staff_role" value="{{ $i->user->role }}">
																			<div class="form-group">
																				<label class="control-label">Firstname</label>
																				<input type="text" id="firstName" class="form-control" placeholder="Enter Staff's Firstname" name="firstname" value="{{ $i->firstname }}">
																				<!-- <span class="help-block">
																				This is inline help </span> -->
																			</div>
																		</div>
																		<!--/span-->
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="control-label">LastName</label>
																				<input type="text" id="lastName" class="form-control" placeholder="Enter Staff's LastName" name="lastname" value="{{ $i->lastname }}">
																				<!-- <span class="help-block">
																				This is inline help </span> -->
																			</div>
																		</div>
																		<!--/span-->

																	</div>
																	<!--/row-->
																	<div class="row">
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="control-label">Phone Number</label>
																				<input type="text" id="phonenumber" class="form-control" placeholder="Enter Teacher's Phone Number" name="phonenumber" value="{{ $i->phonenumber }}">
																			</div>
																		</div>
																		<!--/span-->
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="control-label">Employment Date</label>
																				<input class="form-control" data-provide="datepicker" name="employmentdate" value="{{ $i->employmentdate }}">
																				
																			</div>
																		</div>
																		<!--/span-->
																	</div>
																	<!--/row-->
																	<div class="row">
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="control-label">Email Address</label>
																				<input type="text" id="email-address" class="form-control" placeholder="Enter Teacher's Email Address" name="email" value="{{ $i->user->email }}">
																			</div>
																		</div>
																		<!--/span-->
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="control-label">Gender</label>
																				
																				{{ Form::select('gender', [
																				   'Male' => 'Male',
																				   'Female' => 'Female',
																				   ], $i->gender, ['class' => 'select2_category form-control'] 
																				) }}

																			</div>
																		</div>
																		<!--/span-->
																	</div>

																	<!--/row-->
																	<!-- <div class="row">
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="control-label">Role {{ $i->user->role }}</label>
																				
																				{{ Form::select('role', [
																				   'Bursar' => 'Bursar',
																				   'HeadTeacher' => 'HeadTeacher',
																				   'Teacher' => 'Teacher',
																				   'Assistant' => 'Assistant',
																				   ], $i->user->role, ['class' => 'select2_category form-control'] 
																				) }}
																			</div>
																		</div>
																	</div> -->
																
																</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn default" data-dismiss="modal">Close</button>
															<button type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>
														</div>
													</div>
													</form>
													<!-- /.modal-content -->
												</div>
												<!-- /.modal-dialog -->
											</div>



											<div class="modal fade" id="delete{{ $loop->iteration }}" tabindex="-1" role="basic" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
															<h4 class="modal-title">Delete Staff</h4>
														</div>
														<div class="modal-body">
															<p>Are you sure ?</p>
														<div class="note note-warning">
															<p>Please note that this action is <b>irreversible</b></p>
														</div>														</div>
														<div class="modal-footer">
															<button type="button" class="btn default" data-dismiss="modal">Close</button>
															<a href="/dashboard/delete-staff/{{ $i->user_id }}" class="btn red">Delete</a>
														</div>
													</div>
												</div>
											</div>
								</tr>
			                @endforeach
								</tbody>
								</table>
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
