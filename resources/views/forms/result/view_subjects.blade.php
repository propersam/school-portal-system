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
											<i class="fa fa-gift"></i> Subjects
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
							@if ($class)
								<table class="table table-condensed table-hover">
									<thead>
									<tr>
										<th>
											 Name
										</th>
										<th>
											 Actions
										</th>
									</tr>
									</thead>
									<tbody>
									@foreach ($subjects as $i) 
										<tr>
											<td>
									          <p>{{ $i->subject->name }}</p>
											</td>
											<td>
										<a class="btn yellow" href="/dashboard/view-subject-results?s={{ $i->id }}&c={{ $class->id }}">
										View Results </a></td>
										</tr>
									@endforeach
									</tbody>
									</table>
								</div>
							@else
								<h3>You are yet to be assigned to a class, please contact the admin.</h3>
							@endif
						</div>
					</div>
						
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->


@endsection
