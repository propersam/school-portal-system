@extends('dashboard')

@section('form')
    <script>
        var G_C = '{{ $class->id }}';
        var G_S = '{{ $subject->id }}';
    </script>

<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper" ng-app="myApp" ng-controller="SubjectResultsPageCtrl" id="subrespage" >
		<div class="page-content">
			<div class="row">
				<div class="col-md-12">


				<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-file"></i> Results for {{ $subject->subject->name }} | {{ $class->name }}
							</div>

							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab_reversed_1_1" data-toggle="tab">
									Examination </a>
								</li>
								<li>
									<a href="#tab_reversed_1_2" data-toggle="tab">
									Assessments </a>
								</li>
							</ul>
						</div>
						<div class="portlet-body">
							<div class="tab-content">
								<div class="tab-pane fade active in" id="tab_reversed_1_1">
									<div class="table-scrollable">
										<table class="table table-condensed table-hover" ng-if="results.length > 0">
											<thead>
												<tr>
													<th>
														 Position
													</th>
													<th>
														 Name
													</th>
													<th>
														 Score
													</th>
												</tr>
											</thead>
											<tbody>

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

											<tr ng-repeat="i in results" ng-if="i.firstname">
												<td>
										          <p ng-bind="$index + 1"></p>
												</td>
												<td>
										          <p ng-bind="i.student.firstname + ' ' + i.student.lastname"></p>
												</td>
												<td>
										          <p ng-bind="i.score"></p>
												</td>
											</tr>

											</tbody>
										</table>
										<center>
											<p ng-if="results && results.length < 1">No results yet</p>
											<p ng-if="!results">loading...</p>
										</center>
									</div>

									<div class="row">
										<hr>
										<div class="col-md-12">
											<!-- <a class="btn btn-default blue" data-toggle="modal" href="#add_result"> <i class="fa fa-plus"></i> Add Result</a> -->
										<h3 ng-if="uploaded_results && !submitted">Uploaded Results</h3>
										<table class="table" ng-if="uploaded_results && !submitted" style="background-color: #efefef; border-radius: 5px; padding: 20px">
											<thead>
												<tr>
													<th>
														 Name
													</th>
													<th>
														 Score
													</th>
												</tr>
											</thead>
											<tbody>
												<tr ng-repeat="i in uploaded_results" ng-if="i.name">
													<td>
											          <p ng-bind="i.name"></p>
													</td>
													<td>
											          <p ng-bind="i.score"></p>
													</td>
												</tr>

											</tbody>
										</table>
										   	<div ng-if="uploading_csv && !submitted">
											    <input ng-show="!uploaded_results" type="file" file-reader="fileContent" />
											    <!-- <div>[[fileContent]]</div> -->
													<br>
													<br>
												<a class="btn blue" ng-if="!uploaded_results" ng-click="convert(fileContent)">Process Excel Sheet</a>
												<a ng-disabled="submitting_results" class="btn green" ng-if="uploaded_results"  ng-click="addResults()"><span ng-if="!submitting_results">Submit Results</span><span ng-if="submitting_results">Submitting...</span></a>
											</div>

										   	<div ng-if="submitted" class="text-center">
													<br>
													<br>
										   		<i class="icon-check" style="font-size: 4em; color: green"></i>
										   		<h3>Results successfully uploaded</h3>
										   	</div>
													<br>
													<br>

											<div class="btn-group btn-group-circle btn-group-justified">
												<a class="btn blue" data-toggle="modal" href="#add_exam_result">
												Add Exam Result </a>
												<a ng-json-export-excel data="dataList" report-fields="{student_id: 'studentID', name: 'name', score: 'score'}" filename="'{{$class->name}}_{{$subject->subject->name}}_exam'" class="btn yellow" separator = ','>Download Exam Excel</a>

												<a class="btn green" ng-click="toggleUpload()">
												Upload Exam Excel </a>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="tab_reversed_1_2">
									<table class="table table-condensed table-hover" ng-if="assessments_results.length > 0">
										<thead>
											<tr>
												<th>
													 Position
												</th>
												<th>
													 Name
												</th>
												<th>
													 Score
												</th>
											</tr>
										</thead>
										<tbody>											
											<tr ng-repeat="i in assessments_results" ng-if="i.firstname">
												<td>
										          <p ng-bind="$index + 1"></p>
												</td>
												<td>
										          <p ng-bind="i.student.firstname + ' ' + i.student.lastname"></p>
												</td>
												<td>
										          <p ng-bind="i.score"></p>
												</td>
											</tr>
										</tbody>
									</table>

									
									<div class="row">
										<hr>
										<div class="col-md-12">
											<!-- <a class="btn btn-default blue" data-toggle="modal" href="#add_result"> <i class="fa fa-plus"></i> Add Result</a> -->
										<h3 ng-if="uploaded_results2 && !submitted2">Uploaded Results</h3>
										<table class="table" ng-if="uploaded_results2 && !submitted2" style="background-color: #efefef; border-radius: 5px; padding: 20px">
											<thead>
												<tr>
													<th>
														 Name
													</th>
													<th>
														 Score
													</th>
												</tr>
											</thead>
											<tbody>
												<tr ng-repeat="i in uploaded_results2" ng-if="i.name">
													<td>
											          <p ng-bind="i.name"></p>
													</td>
													<td>
											          <p ng-bind="i.score"></p>
													</td>
												</tr>

											</tbody>
										</table>
										<center>
											<p ng-if="assessments_results && assessments_results.length < 1">No results yet</p>
											<p ng-if="!assessments_results">loading...</p>
										</center>
										   	<div ng-if="uploading_csv2 && !submitted2">
											    <input ng-show="!uploaded_results2" type="file" file-reader="fileContent" />
											    <!-- <div>[[fileContent]]</div> -->
													<br>
													<br>
												<a class="btn blue" ng-if="!uploaded_results2" ng-click="convert2(fileContent)">Process Excel Sheet</a>
												<a ng-disabled="submitting_results2" class="btn green" ng-if="uploaded_results2"  ng-click="addResults2()"><span ng-if="!submitting_results2">Submit Results</span><span ng-if="submitting_results2">Submitting...</span></a>
											</div>

										   	<div ng-if="submitted2" class="text-center">
													<br>
													<br>
										   		<i class="icon-check" style="font-size: 4em; color: green"></i>
										   		<h3>Results successfully uploaded</h3>
										   	</div>
													<br>
													<br>

											<div class="btn-group btn-group-circle btn-group-justified">
												<a data-toggle="modal" href="#add_assessment_result" class="btn blue">Add Assessment Result </a>
												<a ng-json-export-excel data="dataList2" report-fields="{student_id: 'studentID', name: 'name', score: 'score'}" filename="'{{$class->name}}_{{$subject->subject->name}}_assessment'" class="btn yellow" separator = ','>Download Assessment Excel</a>
												<a class="btn green" ng-click="toggleUpload2()">
												Upload Assessment Excel </a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
							
					<div class="modal fade" id="add_exam_result" tabindex="-1" role="basic" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
									<h4 class="modal-title">Add Exam Result to <b>{{ $class->name }}</b></h4>
								</div>
								<form action="/dashboard/add-student-exam-result" method="POST" class="horizontal-form">
								<div class="modal-body">
									<div class="form-body">
										<div class="row">
											<div class="col-md-8">
												{{ csrf_field() }}
												<div class="form-group">
													<label class="control-label">Student</label>
													<input type="hidden" name="class_id" value="{{ app('request')->input('c') }}">
													<input type="hidden" name="subject_id" value="{{ app('request')->input('s') }}">
													<select name="student_id" class="form-control">
				                                        @foreach ($students as $student)
															<option value="{{ $student->id }}">{{ $student->firstname }} {{ $student->lastname }}</option>
				                                        @endforeach
													</select>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label class="control-label">Score</label>
													<input type="text"  id="sessionName" class="form-control" placeholder="70" name="score">
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

					<div class="modal fade" id="add_assessment_result" tabindex="-1" role="basic" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
									<h4 class="modal-title">Add Assessment Result to <b>{{ $class->name }}</b></h4>
								</div>
								<form action="/dashboard/add-student-assessment-result" method="POST" class="horizontal-form">
								<div class="modal-body">
									<div class="form-body">
										<div class="row">
											<div class="col-md-8">
												{{ csrf_field() }}
												<div class="form-group">
													<label class="control-label">Student</label>
													<input type="hidden" name="class_id" value="{{ app('request')->input('c') }}">
													<input type="hidden" name="subject_id" value="{{ app('request')->input('s') }}">
													<select name="student_id" class="form-control">
				                                        @foreach ($students2 as $student)
															<option value="{{ $student->id }}">{{ $student->firstname }} {{ $student->lastname }}</option>
				                                        @endforeach
													</select>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label class="control-label">Score</label>
													<input type="text"  id="sessionName" class="form-control" placeholder="24" name="score">
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
