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
											Manage Fees
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
								<table class="table table-condensed table-hover">
									<thead>
										<tr>
											<th>
												 Level
											</th>
											<th>
												 Type
											</th>
											<th>
												 Fee (NGN)
											</th>
											<th>
												 Actions
											</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($fees as $i) 
											<tr>
												<td>
										          <p>{{ $i->level['levelname'] }}</p>
												</td>
												<td>
										          <p>{{ $i->type['name'] }}</p>
												</td>
												<td>
                                                    <p>
                                                        <span style="font-weight: bold; text-transform: uppercase;">{{ $i->amount }}</span>
                                                    </p>
												</td>
												<td>
												<a class="btn default" data-toggle="modal" href="#edit{{ $i->id }}">
												Edit </a>
												<a class="btn red" data-toggle="modal" href="#delete{{ $i->id }}">
												Delete </a></td>
												<div class="modal fade" id="edit{{ $i->id }}" tabindex="-1" role="basic" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
																<h4 class="modal-title">Edit Fee</h4>
															</div>
															<form action="/dashboard/update-fee/{{ $i->id }}" method="POST" class="horizontal-form">
															<div class="modal-body">
																<div class="form-body">
																	<div class="row">
																		<div class="col-md-2">
																			{{ csrf_field() }}

																				<label class="control-label">Amount</label>
																		</div>


																		<div class="col-md-4">
																			<div class="form-group">
																				<input type="text" name="amount" class="form-control" value="{{$i->amount}}">

																			</div>
																		</div>

														
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn default" data-dismiss="modal">Close</button>
																<button type="submit" class="btn blue">Save Changes</button>
															</div>
														</div>
															</form>
													</div>
												</div>
											</div>
												<div class="modal fade" id="delete{{ $i->id }}" tabindex="-1" role="basic" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
																<h4 class="modal-title">Delete Fee</h4>
															</div>
															<div class="modal-body">
																<p>Are you sure ?</p>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn default" data-dismiss="modal">Close</button>
																<a href="/dashboard/delete-fee/{{ $i->id }}" class="btn red">Delete</a>
															</div>
														</div>
													</div>
												</div>
											</tr>
										@endforeach

									</tbody>
								</table>
							</div>
							<div class="form-actions right">
								<a class="btn btn-default blue"  data-toggle="modal" href="#add"> <i class="fa fa-plus"></i> Add Fee</a>
							</div>
						</div>
					</div> 	
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->

											<div class="modal fade" id="add" tabindex="-1" role="basic" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
															<h4 class="modal-title">Add Fee</h4>
														</div>
														{{ Form::open(array('url' => '/dashboard/add-fee/', 'method' => 'POST')) }}
														<div class="modal-body">
															<div class="form-body">
																<div class="row">
																	{{ csrf_field() }}

																	<div class="col-md-4">
																		<div class="form-group">
                                                                            <label class="control-label">Fee
                                                                                Type</label>

																			<select name="type_id" class="form-control">
										                                        @foreach ($fee_types as $type)
																					<option value="{{ $type->id }}">{{ $type->name }}</option>
										                                        @endforeach
																			</select>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="form-group">
																			<label class="control-label">Level</label>

																			<select name="level_id" class="form-control">
										                                        @foreach ($levels as $level)
																					<option value="{{ $level->id }}">{{ $level->levelname }}</option>
										                                        @endforeach
																			</select>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="form-group">

																			<label class="control-label">Amount</label>
																			<input type="text" name="amount" class="form-control">

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
												</div>
											</div>

@endsection
