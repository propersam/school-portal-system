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
											<i class="fa fa-gift"></i>Create New Level

										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
											<a href="#portlet-config" data-toggle="modal" class="config">
											</a>
											<a href="javascript:;" class="reload">
											</a>
											<a href="javascript:;" class="remove">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->

										<form action="/dashboard/create-level" method="POST" class="horizontal-form">
											<div class="form-body">
												<h3 class="form-section">Enter Level Details</h3>

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

															<label class="control-label">Level Name</label>
															<input type="text" id="name" class="form-control" placeholder="eg: Kg1, Primary 1" name="levelname">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Level Description</label>
															<textarea rows="8" class="form-control" name="description" placeholder="Short description of Level"></textarea>
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
