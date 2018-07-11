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
					
						
						
							
							
								<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i>Academic Sections
							</div>
							<div class="tools">
                                <a href="javascript:" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
                                <a href="javascript:" class="reload">
								</a>
                                <a href="javascript:" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-scrollable">
								<table class="table table-hover">
								<thead>
								<tr>
									<th>
										 #
									</th>
									<th>
										 Academic Section
									</th>
									<th>
										 Start Date
									</th>
									<th>
										 End Date
									</th>
									<th>
										 Status
									</th>
								</tr>
								</thead>
								<tbody>
									@foreach($sections as $section)
										<tr>
										<td>
											 {{ $section->id }}
										</td>
										<td>
											 {{ $section->name }}
										</td>
										<td>
											 {{ $section->start-year }}
										</td>
										<td>
											 {{ $section->end-year }}
										</td>
										<td>
											<span class="label label-sm label-success">
											Approved </span>
										</td>
									</tr
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
