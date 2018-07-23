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
											<i class="fa fa-gift"></i> Levels
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
								@foreach ($levels as $i) 
									<tr>
										<td>
								          <p>{{ $i->levelname }}</p>
										</td>
										<td>
								          <p>{{ $i->description }}</p>
										</td>
										<td>
									<a class="btn default" data-toggle="modal" href="#edit{{ $i->id }}">
                                        Edit </a>

                                            <a class="btn red" data-toggle="modal" href="#delete{{ $i->id }}">
                                                Delete </a>
                                        </td>
                                        <div class="modal fade" id="edit{{ $i->id }}" tabindex="-1" role="basic"
                                             aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true"></button>
                                                        <h4 class="modal-title">Edit {{ $i->levelname }}</h4>
                                                    </div>
                                                    <form action="/dashboard/update-level/{{ $i->id }}" method="POST"
                                                          class="horizontal-form">
                                                        <div class="modal-body">
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-md-5">
                                                                        {{ csrf_field() }}
                                                                        <div class="form-group">
                                                                            <label class="control-label">Name</label>
                                                                            <input type="text"
                                                                                   value="{{ $i->levelname }}"
                                                                                   id="sessionName" class="form-control"
                                                                                   placeholder="eg: Kg1"
                                                                                   name="levelname">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-7">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Description</label>
                                                                            <textarea rows="8" class="form-control"
                                                                                      name="description"
                                                                                      placeholder="Short description of Subject">{{ $i->description }}</textarea>

                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn default"
                                                                    data-dismiss="modal">Close
                                                            </button>
                                                            <button type="submit" class="btn blue">Save changes</button>
                                                        </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="delete{{ $i->id }}" tabindex="-1" role="basic"
                                             aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true"></button>
                                                        <h4 class="modal-title">Delete</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure ?</p>
                                                        <div class="note note-warning">
                                                            <p>Please note that this action is <b>irreversible</b></p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn default" data-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <a href="/dashboard/delete-level/{{ $i->id }}" class="btn red">Delete</a>
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
												<a class="btn btn-default blue" href="/dashboard/create-level"> <i class="fa fa-plus"></i> Add</a>
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
