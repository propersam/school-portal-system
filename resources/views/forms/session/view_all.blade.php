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
											<i class="fa fa-calendar"></i> Sessions
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
									@if (session('warning'))
								        <div class="alert alert-danger">
								            {{ session('warning') }}
								        </div>
								  	@endif
							<div class="table-scrollable">
							<table class="table table-condensed table-hover">
								<thead>
								<tr>
									<th>
										 Name
									</th>
									<th>
										 Current Term
									</th>
									<th>
										 Current Session
									</th>
									<th>
										 Actions
									</th>
								</tr>
								</thead>
								<tbody>
								@foreach ($sessions as $i) 
									<tr>
										<td>
								          <p>{{ $i->name }}</p>
										</td>
										<td>
								          <p>{{ $i->current_term }}</p>
										</td>
										<td>
								          @if($i->is_active == 1)         
									          <p>Yes</p>
											@else
									          <p>No</p>
											@endif
										</td>
										<td>
									<a class="btn default" data-toggle="modal" href="#edit{{ $i->id }}">
									Edit </a></td>
							<div class="modal fade" id="edit{{ $i->id }}" tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Edit Session: {{ $i->name }}</h4>
										</div>
										<form action="/dashboard/update-session/{{ $i->id }}" method="POST" class="horizontal-form">
										<div class="modal-body">
											<div class="form-body">
												<div class="row">
													<div class="col-md-5">
														{{ csrf_field() }}
														<div class="form-group">
															<label class="control-label">Session Name</label>
															<input type="text" value=" {{ $i->name }}" id="sessionName" class="form-control" placeholder="eg: 2017/2018" name="name">
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Make Current Session</label>
											          @if($i->is_active == 0)         
															{{ Form::select('is_active', [
															   '0' => 'No',
															   '1' => 'Yes',
															   ], $i->is_active, ['class' => 'form-control'] 
															) }}
														@else
															<p style="font-weight: bold; color: green">Active Session</p>
														@endif

														</div>
													</div>

													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Current Term</label>
															{{ Form::select('current_term', [
															   '1' => '1st Term',
															   '2' => '2nd Term',
															   '3' => '3rd Term',
															   ], $i->current_term, ['class' => 'form-control'] 
															) }}
														</div>
													</div>
                                                </div>
                                            </div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn blue">Save changes</button>
										</div>
									</div>
										</form>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
									</tr>
								@endforeach
								</tbody>
								</table>
							</div>
                                        <div class="form-actions right">
                                            <a class="btn btn-default blue" href="/dashboard/create-session"> <i
                                                        class="fa fa-plus"></i> Add</a>
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
