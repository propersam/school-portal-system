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
	    										<input  class="form-control" type="date" placeholder="date of birth" id="dob" name="dob">
	    									</div>
	                                        <div class="col-sm-5 col-xs-12">
	                                            <label>Country of Origin *</label>
	                                            <input  class="form-control" type="text" placeholder="Country of Origin" id="origin" name="origin">
	                                        </div>
										</div>
                                        <div class="row">
	                                        <div class="col-sm-4 col-xs-12">
		                                        <div class="col-xs-12">
	                                                <label>Has Sibling Attended Eco Pillars ? *</label>
	                                                <select name="siblings_attended" class="form-control">
	                                                    <option value="yes">Yes</option>
	                                                    <option value="no">No</option>
	                                                </select>
	                                            </div>
	                                        </div>

	                                        <div class="col-sm-4 col-xs-12">
	                                            <label>Year(s) which sibling(s) attended</label>
	                                            <input  class="form-control" type="text" placeholder="Year(s) which sibling(s) attended" id="siblings_attended_years" name="siblings_attended_years">
	                                        </div>
	                                        <div class="col-sm-4	 col-xs-12">
	                                            <div class="col-sm-12 col-xs-12">
	                                                <label>Position of child in family</label>
	                                            </div>
	                                            <div class="col-xs-12">
	                                                <select name="child_position" class="form-control">
	                                                    <option value="1st">1st</option>
	                                                    <option value="2nd">2nd</option>
	                                                    <option value="3rd">3rd</option>
	                                                    <option value="4th">4th</option>
	                                                    <option value="5th">5th</option>
	                                                    <option value="6th">6th</option>
	                                                    <option value="7th">7th</option>
	                                                </select>
	                                            </div>
	                                        </div>
	                                    </div>
                                        <div class="row">
	                                        <div class="col-sm-12 col-xs-12">
	                                            <label>Other children in family</label>
	                                            <div class="col-sm-12 col-xs-12">
	                                                <div class="col-sm-5 col-xs-6">
	                                                    <input  class="form-control" type="text" placeholder="Full Name"  name="child1_name">
	                                                </div>
	                                                <div class="col-sm-2 col-xs-6">
	                                                    <input  class="form-control" type="text" placeholder="Age"  name="child1_age">
	                                                </div>
	                                                <div class="col-sm-5 col-xs-6">
	                                                    <input  class="form-control" type="text" placeholder="School"  name="child1_school">
	                                                </div>
	                                            </div>
	                                            <div class="col-sm-12 col-xs-12">
	                                                <div class="col-sm-5 col-xs-6">
	                                                    <input  class="form-control" type="text" placeholder="Full Name"  name="child2_name">
	                                                </div>
	                                                <div class="col-sm-2 col-xs-6">
	                                                    <input  class="form-control" type="text" placeholder="Age"  name="child2_age">
	                                                </div>
	                                                <div class="col-sm-5 col-xs-6">
	                                                    <input  class="form-control" type="text" placeholder="School"  name="child2_school">
	                                                </div>
	                                            </div>
	                                            <div class="col-sm-12 col-xs-12">
	                                                <div class="col-sm-5 col-xs-6">
	                                                    <input  class="form-control" type="text" placeholder="Full Name"  name="child3_name">
	                                                </div>
	                                                <div class="col-sm-2 col-xs-6">
	                                                    <input class="form-control" type="text" placeholder="Age"  name="child3_age">
	                                                </div>
	                                                <div class="col-sm-5 col-xs-6">
	                                                    <input class="form-control" type="text" placeholder="School"  name="child3_school">
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
                                        <div class="row">
	                                        <div class="col-sm-6 col-xs-12">
	                                            <label>Current Playgroup/School</label>
	                                            <input class="form-control" type="text" placeholder="Current Playgroup/School" id="current_school" name="current_school">
	                                        </div>
	                                        <div class="col-sm-6 col-xs-12">
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