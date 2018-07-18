@extends('dashboard')

@section('form')

<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
					<!-- BEGIN Portlet PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<p>Paid School Fees for Current Term</p>
							</div>
						</div>
						<div class="portlet-body">

									@if (session('success'))
								        <div class="alert alert-success">
								            {{ session('success') }}
								        </div>
								  	@endif
							<div class="table-scrollable">

										<table class="table table-hover">
											<thead>
											<tr>
												<th>
													First Name
												</th>
												<th>
													Last Name
												</th>
												<th>
													Class
												</th>
												<th>
													Date
												</th>
												<th>
													Method
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
											          <p>{{ $i->lastname }}</p>
													</td>
													<td>
											          <p>{{ $i->class_details['name'] }}</p>
													</td>
													<td>
											          <p>{{ $i->date }}</p>
													</td>
													<td>
											          <p>{{ $i->type }}</p>
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