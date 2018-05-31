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
											<i class="fa fa-users"></i>Create New Class

										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->

										<form action="/dashboard/create-class" method="POST" class="horizontal-form">
											<div class="form-body">
												<h3 class="form-section">Enter Class Details</h3>

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

												<div class="row">
													<div class="col-md-6">
														{{ csrf_field() }}
														<div class="form-group">

															<label class="control-label">Name</label>
															<input type="text" name="name" class="form-control">

														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">

															<label class="control-label">Session</label>

															<select name="session_id" class="form-control">
						                                        @foreach ($sessions as $session)
																	<option value="{{ $session->id }}">{{ $session->name }}</option>
						                                        @endforeach
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Teacher</label>

															<select name="teacher_id" class="form-control">
						                                        @foreach ($teachers as $teacher)
																	<option value="{{ $teacher->id }}">{{ $teacher->firstname }} {{ $teacher->lastname }}</option>
						                                        @endforeach
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Level</label>

															<select name="level" class="form-control">
						                                        @foreach ($levels as $level)
																	<option value="{{ $level->id }}">{{ $level->levelname }}</option>
						                                        @endforeach
															</select>
														</div>
													</div>


												</div>



											</div>
											<div class="form-actions right">
												<a class="btn btn-default btn-close" href="/dashboard">Cancel</a>
												
												<button type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
								
							
						
					
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->


@endsection
