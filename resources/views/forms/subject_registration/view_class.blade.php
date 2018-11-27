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
											<i class="fa fa-gift"></i> {{ $class->classlevel['levelname'] }} Subjects
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
							<table class="table table-condensed table-hover">
								<thead>
								<tr>
									<th>
										 Name
									</th>
									<th>
										 Description
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
								          <p>{{ $i->subject->description }}</p>
										</td>
										<td>
									<a class="btn red" data-toggle="modal" href="#edit{{ $i->id }}">
									Delete </a></td>
							<div class="modal fade" id="edit{{ $i->id }}" tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Are you sure ?</h4>
										</div>
										<form action="/dashboard/remove-class-subject/{{ $i->id }}" method="POST" class="horizontal-form">
														{{ csrf_field() }}
										<input type="hidden" name="class_id" value="{{ $class->id }}">
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Cancel</button>
											<button type="submit" class="btn red">Yes</button>
										</div>
									</div>
										</form>
								</div>
							</div>
									</tr>
								@endforeach
								</tbody>
								</table>
							</div>
											<div class="form-actions right">
										
												<a class="btn blue" data-toggle="modal" href="#add"> <i class="fa fa-plus"></i> Add</a>

												<!-- <a class="btn btn-default blue" href="/dashboard/create-subject"> <i class="fa fa-plus"></i> Add</a> -->
											</div>
						</div>
								</div>
								
					

							<div class="modal fade" id="add" tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Add Subject to: {{ $class->classlevel['levelname'] }}</h4>
										</div>
										<form action="/dashboard/add-subject-to-class/{{ $class->id }}" method="POST" class="horizontal-form">
										<div class="modal-body">
											<div class="form-body">
												<div class="row">
														{{ csrf_field() }}
												<input type="hidden" name="session_id" value="{{$class->session->id}}">
												<input type="hidden" name="level" value="{{$class->level}}">

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Select Subject</label>

															<select name="subject_id" class="form-control">
						                                        @foreach ($all_subjects as $subject)
																	<option value="{{ $subject->id }}">{{ $subject->name }}</option>
						                                        @endforeach
															</select>
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
						
					
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->


@endsection
