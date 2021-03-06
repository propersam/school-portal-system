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
								<span class="caption-subject"> {{ $student->firstname }} {{ $student->lastname }}</span>
							</div>
						</div>
						<div class="portlet-body">
							@foreach ($all_results as $results)
							<div class="panel-group accordion" id="accordion1">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_{{ $results['session']['id'] }}">
										{{ $results['session']['name'] }} </a>
										</h4>
									</div>
									<div id="collapse_{{ $results['session']['id'] }}" class="panel-collapse collapse">
										<div class="panel-body">
											<div class="tabbable-custom tabs-below nav-justified">
												<div class="tab-content">
													<div class="tab-pane active" id="tab_17_1_{{ $results['session']['id'] }}">

														<div class="table-scrollable">
															<table class="table table-hover">
																<thead>
																<tr>
																	<th>
																		Subject
																	</th>
																	<th>
																		Exam Score
																	</th>
																	<th>
																		Assessment Score
																	</th>
																	<th>
																		Total
																	</th>
																</tr>
																</thead>
																<tbody>
																@foreach ($results['results'] as $i) 
										                            @if ($i->term == 1)
																		<tr>
																			<td>
																			  <p>{{ $i->subject['subject']['name'] }}</p>
																			</td>
																			<td>
																			  <p>{{ $i->score }}</p>
																			</td>
																			<td>
																			  <p>{{ $i['assessment']['score'] }}</p>
																			</td>
																			<td>
																			  <p>{{ $i['assessment']['score'] + $i->score }}</p>
																			</td>
											                            @endif
																		</tr>
																@endforeach
																</tbody>
															</table>
														</div>

													</div>
													<div class="tab-pane" id="tab_17_2_{{ $results['session']['id'] }}">

														<div class="table-scrollable">
															<table class="table table-hover">
																<thead>
																<tr>
																	<th>
																		Subject
																	</th>
																	<th>
																		Exam Score
																	</th>
																	<th>
																		Assessment Score
																	</th>
																	<th>
																		Total
																	</th>
																</tr>
																</thead>
																<tbody>
																@foreach ($results['results'] as $i) 
										                            @if ($i->term == 2)
																		<tr>
																			<td>
																			  <p>{{ $i->subject['subject']['name'] }}</p>
																			</td>
																			<td>
																			  <p>{{ $i->score }}</p>
																			</td>
																			<td>
																			  <p>{{ $i['assessment']['score'] }}</p>
																			</td>
																			<td>
																			  <p>{{ $i['assessment']['score'] + $i->score }}</p>
																			</td>
											                            @endif
																		</tr>
																@endforeach
																</tbody>
															</table>
														</div>

													</div>
													<div class="tab-pane" id="tab_17_3_{{ $results['session']['id'] }}">

														<div class="table-scrollable">
															<table class="table table-hover">
																<thead>
																<tr>
																	<th>
																		Subject
																	</th>
																	<th>
																		Exam Score
																	</th>
																	<th>
																		Assessment Score
																	</th>
																	<th>
																		Total
																	</th>
																</tr>
																</thead>
																<tbody>
																@foreach ($results['results'] as $i) 
										                            @if ($i->term == 3)
																		<tr>
																			<td>
																			  <p>{{ $i->subject['subject']['name'] }}</p>
																			</td>
																			<td>
																			  <p>{{ $i->score }}</p>
																			</td>
																			<td>
																			  <p>{{ $i['assessment']['score'] }}</p>
																			</td>
																			<td>
																			  <p>{{ $i['assessment']['score'] + $i->score }}</p>
																			</td>
											                            @endif
																		</tr>
																@endforeach
																</tbody>
															</table>
														</div>

													</div>
												</div>
												<ul class="nav nav-tabs nav-justified">
													<li class="active">
														<a href="#tab_17_1_{{ $results['session']['id'] }}" data-toggle="tab">
														1st Term </a>
													</li>
													<li>
														<a href="#tab_17_2_{{ $results['session']['id'] }}" data-toggle="tab">
														2nd Term </a>
													</li>
													<li>
														<a href="#tab_17_3_{{ $results['session']['id'] }}" data-toggle="tab">
														3rd Term </a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div> 
							@endforeach
						</div>
					</div>
					<!-- END Portlet PORTLET-->
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->


@endsection