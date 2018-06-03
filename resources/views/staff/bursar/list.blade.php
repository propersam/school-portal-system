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
								Bursars
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
								</tr>
								</thead>
								<tbody>
			                @foreach ($bursars as $bursar)
								<tr>
									<td>
										<img style="height: 80px" width="80px" src="uploads/profile_photos/{{ $bursar->user->photo }}" alt="" />
									</td>
									<td>
										 {{ $bursar->firstname }}
									</td>
									<td>
										  {{ $bursar->lastname }}
									</td>
									
									<td>
										 
									</td>
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
