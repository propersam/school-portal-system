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
								Teacher(s)
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
										 Class
									</th>
								</tr>
								</thead>
								<tbody>
			                @foreach ($teachers as $teacher)
								<tr>
									<td>
										<img style="height: 80px" width="80px" src="uploads/profile_photos/{{ $teacher->user->photo }}" alt="" />
									</td>
									<td>
										 {{ $teacher->firstname }}
									</td>
									<td>
										  {{ $teacher->lastname }}
									</td>
									<td>
										 {{ $teacher->classes['name'] }}
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
