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
								<i class="fa fa-mortar-board"></i>Register New Student 

							</div>
						</div>
						<div class="portlet-body form">
							{{ Form::open(array('action' => 'ParentController@store' )) }}
								<div class="row registration_form">

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
                                    <div class="child_section">

                                        <div class="col-sm-12 col-xs-12" style="padding: 24px; background-color: #efefef; border-radius: 10px; margin: 15px; margin-bottom: 40px">
                                            <div class="col-sm-3">
                                                <label>Level Applied to</label>
                                            </div>
                                            <div class="col-xs-3">
												<select name="level" class="form-control">
			                                        @foreach ($levels as $level)
														<option value="{{ $level->id }}">{{ $level->levelname }}</option>
			                                        @endforeach
												</select>
                                            </div>
                                        </div>
                                        <h4><i class="fa fa-user"></i> Child</h4><br><br>

                                        <div class="row">
	                                        <div class="col-sm-4 col-xs-12">
	                                            <label>First Name of Child *</label>
	                                            <input  class="form-control" type="text" placeholder="First Name of Child" id="first_name" name="first_name">
	                                        </div>
	                                        <div class="col-sm-4 col-xs-12">
	                                            <label>Preferred Name of Child *</label>
	                                            <input  class="form-control" type="text" placeholder="Preferred Name of Child" id="pref_name" name="pref_name">
	                                        </div>
	                                        <div class="col-sm-4 col-xs-12">
	                                            <label>Surname of Child *</label>
	                                            <input  class="form-control" type="text" placeholder="Surname of Child" id="lastname" name="lastname">
	                                        </div>
	                                    </div>
                                        <div class="row">
	                                        <div class="col-sm-3 col-xs-12">
	                                            <div class="col-xs-12">
	                                                <label>Gender *</label>
	                                                <select name="gender" class="form-control">
	                                                    <option value="male">Male</option>
	                                                    <option value="female">Female</option>
	                                                </select>
	                                                <!-- <input type="radio" name="gender" value="male"> <span>Male</span>
	                                                <input type="radio" name="gender" value="female"> <span>Female</span> -->
	                                            </div>
	                                        </div>
	    									<div class="col-xs-12 col-sm-4">
	                                            <label>Date of Birth *</label>
                                                <div  data-date-format="yyyy-mm-dd" class="input-group date" data-provide="datepicker" style="">
                                                    <input type="text" name="dob" class="form-control">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-th"></span>
                                                    </div>
                                                </div>
	    									</div>
	                                        <div class="col-sm-5 col-xs-12">
	                                            <label>Home Telephone Number *</label>
	                                            <input class="form-control" type="text" placeholder="Home Telephone Number" id="home_number" name="home_number">
	                                        </div>
										</div>
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="col-sm-4">
                                                <label>Nationality *</label>
                                                <input  class="form-control" type="text" placeholder="Nationality" id="origin" name="origin">
                                            </div>
                                            <div class="col-sm-4">
                                                <label>State of Origin *</label>
                                                <input  class="form-control" type="text" placeholder="State of Origin" id="state" name="state">
                                            </div>
                                            <div class="col-sm-4">
                                                <label>Local Government Area *</label>
                                                <input  class="form-control" type="text" placeholder="Local Government Area" id="lga" name="lga">
                                            </div>
                                        </div>
                                        <div class="row">
	                                    </div>
                                        <div class="row">
	                                        <div class="col-sm-8 col-xs-12">
	                                            <label>Residential Address *</label>
	                                            <textarea class="form-control" class="contact-textarea" placeholder="Residential Address" id="residential_address" name="residential_address"></textarea>
	                                        </div>
	                                    </div>

                                        
                                        <div class="row">
	                                        <div class="col-sm-6 col-xs-12">
	                                            <label>Home Telephone Number *</label>
	                                            <input class="form-control" type="text" placeholder="Home Telephone Number" id="home_number" name="home_number">
	                                        </div>
	                                        <div class="col-sm-6 col-xs-12">
	                                            <label>Email *</label>
	                                            <input class="form-control" value="{{ Auth::user()->email }}" type="text" placeholder="Email" id="email" name="email">
	                                        </div>
	                                    </div>
                                    </div>

									<div class="form-actions right">
										<a class="btn btn-default btn-close" href="/dashboard">Cancel</a>
										
										<button type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>
									</div>
								</div>
                                {{ Form::close() }}
										<!-- END FORM-->
									</div>
							</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->


@endsection
