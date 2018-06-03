@extends('dashboard')

@section('form')

<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					
				</div>
				
			</div> -->
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<!-- <div class="page-title">
					<h1>Form Layouts <small>form layouts</small></h1>
				</div> -->
				<!-- END PAGE TITLE -->
				
			</div>
			<!-- END PAGE HEAD -->
			<!-- BEGIN PAGE BREADCRUMB -->
			<!-- <ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="index.html">Home</a>
					<i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="#">Form Stuff</a>
					<i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="#">Form Layouts</a>
				</li>
			</ul> -->
			<!-- END PAGE BREADCRUMB -->
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					
						
						
							
							
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift"></i>Create New Academic Section
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
										<form action="/section" method="POST" class="horizontal-form">
											<div class="form-body">
												<h3 class="form-section">Enter Section Details</h3>
												<div class="row">
													@if ($errors->any())
													    <div class="alert alert-danger">
													        <ul>
													            @foreach ($errors->all() as $error)
													                <li>{{ $error }}</li>
													            @endforeach
													        </ul>
													    </div>
													@endif
													<div class="col-md-6">
														{{ csrf_field() }}
														<div class="form-group">
															<label class="control-label">Academic Section</label>
															<input type="text" id="Name" class="form-control" placeholder="<?php echo date("Y") . "/"  . date('Y', strtotime('+1 year')); ?> Academic Section" name="name">
															<!-- <span class="help-block">
															This is inline help </span> -->
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Start Date</label>
															<input class="form-control" data-provide="datepicker" name="start-year">
															<!-- <span class="help-block">
																Select date </span> -->
															
														</div>
													</div>
													<!--/span-->

												</div>
												<!--/row-->
												<div class="row">
													
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">End Date</label>
															<input class="form-control" data-provide="datepicker" name="end-year">
															<!-- <span class="help-block">
																Select date </span> -->
															
														</div>
													</div>
													<!--/span-->
												</div>
												
											
											</div>
											<div class="form-actions right">
												<a class="btn btn-default btn-close" href="/section">Cancel</a>
												
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
