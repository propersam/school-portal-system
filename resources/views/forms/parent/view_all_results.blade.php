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
								<span class="caption-subject"> Your Children Results</span>
							</div>
							<div class="actions">
								<a href="javascript:;" class="btn btn-circle btn-default btn-icon-only fullscreen"></a>
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
													          <p>{{ $i->firstname }}</p>
															</td>
															<td>
													          <p>{{ $i->preferredname }}</p>
															</td>
															<td>
													          <p>{{ $i->lastname }}</p>
															</td>
															<td>								          
													          <p>{{ $i->dob }}</p>
															</td>
															<td>

					                                        	@if($i->class_id)
														<a class="btn blue" href="/dashboard/child-results/{{ $i->id }}">
														View Results</a>
						                                        @else
							                                       <p>Not admitted yet</p> 
							                                    @endif</td>
											
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