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
								<p>Students Owing School Fees for Current Term</p>
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
									          <p>{{ $i->lastname }}</p>
											</td>
											<td>
									          <p>{{ $i->level }}</p>
											</td>
											<td>
												<a class="btn blue-madison" data-toggle="modal" href="#view{{ $i->id }}">
												Confirm Payment </a>
											</td>
											<div class="modal fade student_modal" id="view{{ $i->id }}" tabindex="-1" role="basic" aria-hidden="true">
<!-- 
													<form action="/dashboard/confirm-fees-as-paid/" method="POST" class="horizontal-form"> -->
													{!! Form::open( array('url' => '/dashboard/confirm-fees-as-paid/', 'method' => 'POST', 'class'=> 'horizontal-form')) !!}
																{{ csrf_field() }}
																<input type="hidden" name="student_id" value="{{ $i->id }}">
																<input type="hidden" name="session_id" value="{{ $active_session->id }}">
																<input type="hidden" name="term_id" value="{{ $active_session->current_term }}">
																<input type="hidden" name="user_id" value="{{ $i->user_id }}">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
															<h4 class="modal-title"> Confirm Payment School Fees as <b>Paid</b> for {{ $i->firstname }} {{ $i->lastname }} ?</h4>
														</div>
														<div class="modal-body">
															<div class="child_section">
																<div class="row">
							                                        <h4>Carrying out this action will confirm this student school fees as paid</h4>

							                                        <b>Please note that the following action is irreversible!</b>
																</div>
						                                    </div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn default" data-dismiss="modal">Cancel</button>

																<button type="submit" class="btn green">Proceed</button>
														</div>
													</div>
													<!-- /.modal-content -->
												</div>
												<!-- /.modal-dialog -->
												<!-- </form> -->
												{!! Form::close() !!}
											</div>
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
							<div class="form-actions right">
								<a class="btn btn-default blue"  data-toggle="modal" href="#add"> <i class="fa fa-plus"></i> Send Reminder</a>
							</div>
						</div>
					</div>
					<!-- END Portlet PORTLET-->
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
						<h4 class="modal-title">Send Reminder</h4>
					</div>
					{{ Form::open(array('url' => '/dashboard/send-fee-reminder/', 'method' => 'POST')) }}
					<div class="modal-body">
						<div class="form-body">
							<div class="row">
								{{ csrf_field() }}

								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Notification Method</label>
										<select name="notification_method" class="form-control">
												<option value="both">Both</option>
												<option value="email">Email</option>
												<option value="sms">SMS</option>
										</select>
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<label class="control-label">Reminder Message</label>
										<textarea rows="5"  name="message" class="form-control">Your ward is currently owing school fees</textarea>
									</div>
								</div>
							</div>



						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn default" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn blue">Send</button>
					</div>
				</div>
					</form>
			</div>
		</div>

@endsection