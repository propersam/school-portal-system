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
											<i class="fa fa-calendar"></i>Create New Session
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="/dashboard/create-session" method="POST" class="horizontal-form">
											<div class="form-body">
												<h3 class="form-section">Enter Session Details</h3>

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
													<div class="col-md-8">
														{{ csrf_field() }}
														<div class="form-group">
															<label class="control-label">Session Name</label>
															<input type="text" id="sessionName" class="form-control" placeholder="eg: 2017/2018" name="name">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Make Current Session</label>
															<div class="radio-list">
																<label class="radio-inline">
																<input type="radio" name="is_active" id="optionsRadios1" value="0" checked> No </label>
																<label class="radio-inline">
																<input type="radio" name="is_active" id="optionsRadios2" value="1"> Yes </label>
															</div>
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
