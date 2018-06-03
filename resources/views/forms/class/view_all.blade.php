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
											<i class="fa fa-users"></i> Classes
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
								<table class="table table-condensed table-hover">
								<thead>
								<tr>
									<th>
										 Name
									</th>
									<th>
										 Level
									</th>
									<th>
										 Session
									</th>
									<th>
										 Teacher
									</th>
									<th>
										 Actions
									</th>
								</tr>
								</thead>
								<tbody>
								@foreach ($classes as $i) 
									<tr>
										<td>
								          <p>{{ $i->name }}</p>
										</td>
										<td>
								          <p>{{ $i->classlevel['levelname'] }}</p>
										</td>
										<td>
								          <p>{{ $i->session->name }}</p>
										</td>
										<td>
								          <p>{{ $i->teacher->firstname }} {{ $i->teacher->lastname }}</p>
										</td>
										<td>
											<a class="btn primary" data-toggle="modal" href="#edit{{ $i->id }}">Edit </a>
											<a class="btn blue" data-toggle="modal" href="/dashboard/view-class/{{ $i->id }}">View Students </a>
										</td>
							<div class="modal fade" id="edit{{ $i->id }}" tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Edit Class: {{ $i->name }}</h4>
										</div>
										<form action="/dashboard/update-class/{{ $i->id }}" method="POST" class="horizontal-form">
										<div class="modal-body">
											<div class="form-body">
												<div class="row">
													<div class="col-md-6">
														{{ csrf_field() }}
														<div class="form-group">
															<label class="control-label">Class Name</label>
															<input type="text" value="{{ $i->name }}" id="sessionName" class="form-control" placeholder="eg: 2017/2018" name="name">
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Session</label>
															{{ Form::select('session_id', $sessions, $i->session_id, ['class' => 'form-control'] 
															) }}
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Level</label>
															{{ Form::select('level', $levels, $i->level, ['class' => 'form-control'] 
															) }}
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Teacher</label>
															{{ Form::select('teacher_id', $teachers, $i->teacher_id, ['class' => 'form-control'] 
															) }}
														</div>
													</div>
												</div>


									
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn blue">Save changes</button>
										</div>
									</div>
										</form>
								</div>
							</div>
									</tr>
								@endforeach
								</tbody>
								</table>
							</div>
											<div class="form-actions right">
												<a class="btn btn-default blue" href="/dashboard/create-class"> <i class="fa fa-plus"></i> Add</a>
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