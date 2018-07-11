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
							{{ Form::open(array('action' => 'PupilController@store' )) }}
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
                                        <h4><i class="fa fa-user"></i> Primary Contact</h4>
	                                        <div class="col-sm-6">
	                                    	<br>
	                                        <label for="email">
	                                            Email address *
	                                        </label>
	                                            <input type="text"  class="form-control" placeholder="Email" id="email" name="email">
	                                        </div>
	                                        <div class="col-sm-6">
	                                    	<br>
	                                        <label for="phone">
	                                            Phone number *
	                                        </label>
	                                            <input type="text"  class="form-control" placeholder="Phone" id="phone" name="phone">
	                                        </div>
                                    </div>
                                    <div class="child_section">

                                        <div class="col-sm-12 col-xs-12" style="padding: 24px; background-color: #efefef; border-radius: 10px; margin: 15px; margin-bottom: 40px">
                                            <div class="col-sm-2">
                                                <label>Level</label>
                                            </div>
                                            <div class="col-xs-3">
												<select name="level" class="form-control">
			                                        @foreach ($levels as $level)
														<option value="{{ $level->id }}">{{ $level->levelname }}</option>
			                                        @endforeach
												</select>
                                            </div>
                                         <div class="col-sm-2">
                                                <label>Add to class</label>
                                            </div>
                                            <div class="col-xs-3">
												{{ Form::select('class_id', $classes, app('request')->input('c'), ['class' => 'form-control'] 
												) }}
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

										<!-- 
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
	                                    </div> -->
                                        <div class="row">
	                                    </div>
                                        <div class="row">
	                                        <div class="col-sm-8 col-xs-12">
	                                            <label>Residential Address *</label>
	                                            <textarea class="form-control" class="contact-textarea" placeholder="Residential Address" id="residential_address" name="residential_address"></textarea>
	                                        </div>
	                                    </div>
                                    </div>
                                    <div class="father_section">
                                        <h4><i class="fa fa-male"></i> Father</h4>
                                        <div class="row">
	                                        <div class="col-sm-6 col-xs-12">
	                                            <label>First Name of Father</label>
	                                            <input class="form-control" type="text" placeholder="First Name of Father" id="first_name" name="father_first_name">
	                                        </div>
	                                        <div class="col-sm-6 col-xs-12">
	                                            <label>Surname of Father</label>
	                                            <input class="form-control" type="text" placeholder="Surname of Father" id="father_surname" name="father_surname">
	                                        </div>
	                                    </div>
                                        <div class="row">
	                                        <div class="col-sm-6 col-xs-12">
	                                            <div class="col-sm-6 col-xs-12">
	                                                <label>Marital Status of Father</label>
	                                            </div>
	                                            <div class="col-xs-12">
	                                                <select name="father_marital_status" class="form-control">
	                                                    <option value="married">Married</option>
	                                                    <option value="divorced">Divorced</option>
	                                                    <option value="widowed">Widowed</option>
	                                                    <option value="separated">Separated</option>
	                                                    <option value="unmarried">Unmarried</option>
	                                                </select>
	                                            </div>
	                                        </div>
<!-- 	                                        <div class="col-sm-6 col-xs-12">
	                                            <label>Occupation of Father</label>
	                                            <input class="form-control" type="text" placeholder="Occupation of Father" id="father_occupation" name="father_occupation">
	                                        </div> -->
	                                    </div>
                                        <div class="row">
	                                        <div class="col-sm-6 col-xs-12">
	                                            <label>Coy Name</label>
	                                            <input class="form-control" type="text" placeholder="Company Name" id="father_company_name" name="father_company_name">
	                                        </div>
	                                        <div class="col-sm-6 col-xs-12">
	                                            <label>Coy Address</label>
	                                            <input class="form-control" type="text" placeholder="Work Address" id="father_work_address" name="father_work_address">
	                                        </div>
	                                    </div>
                                        <div class="row">
	                                        <div class="col-sm-4 col-xs-12">
	                                            <label>Coy Telephone Number</label>
	                                            <input class="form-control" type="text" placeholder="Work Telephone Number" id="father_work_phone" name="father_work_phone">
	                                        </div>
	                                        <div class="col-sm-4 col-xs-12">
	                                            <label>Email</label>
	                                            <input class="form-control" type="text" placeholder="Email" id="father_email" name="father_email">
	                                        </div>

<!-- 	                                        <div class="col-sm-4 col-xs-12">
	                                            <div class="col-xs-12">
	                                                <label>Did you Attended Eco Pillars ?</label>
	                                                <select name="father_attend" class="form-control">
	                                                    <option value="yes">Yes</option>
	                                                    <option value="no">No</option>
	                                                </select>
	                                            </div>
	                                        </div> -->
	                                    </div>
                                    </div>
                                    <div class="mother_section">
                                        <h4><i class="fa fa-female"></i> Mother</h4>
                                        <div class="row">
	                                        <div class="col-sm-6 col-xs-12">
	                                            <label>First Name of Mother</label>
	                                            <input class="form-control"  type="text" placeholder="First Name of Mother" id="mother_first_name" name="mother_first_name">
	                                        </div>
	                                        <div class="col-sm-6 col-xs-12">
	                                            <label>Surname of Mother</label>
	                                            <input class="form-control"  type="text" placeholder="Surname of Mother" id="mother_surname" name="mother_surname">
	                                        </div>
	                                    </div>
<!--                                         <div class="row">
	                                        <div class="col-sm-6 col-xs-12">
	                                            <div class="col-sm-12 col-xs-12">
	                                                <label>Marital Status of Mother</label>
	                                            </div>
	                                            <div class="col-xs-12">
	                                                <select name="mother_marital_status" class="form-control">
	                                                    <option value="married">Married</option>
	                                                    <option value="divorced">Divorced</option>
	                                                    <option value="widowed">Widowed</option>
	                                                    <option value="separated">Separated</option>
	                                                    <option value="unmarried">Unmarried</option>
	                                                </select>
	                                            </div>
	                                            </div>
	                                        <div class="col-sm-6 col-xs-12">
	                                            <label>Occupation of Mother</label>
	                                            <input class="form-control"  type="text" placeholder="Occupation of Mother" id="mother_occupation" name="mother_occupation">
	                                        </div>
	                                    </div> -->
                                        <div class="row">
	                                        <div class="col-sm-6 col-xs-12">
	                                            <label>Coy Name</label>
	                                            <input  class="form-control" type="text" placeholder="Company Name" id="mother_company_name" name="mother_company_name">
	                                        </div>
	                                        <div class="col-sm-6 col-xs-12">
	                                            <label>Coy Address</label>
	                                            <input class="form-control" type="text" placeholder="Work Address" id="mother_work_address" name="mother_work_address">
	                                        </div>
	                                    </div>
                                        <div class="row">
	                                        <div class="col-sm-3 col-xs-12">
	                                            <label>Coy Telephone Number</label>
	                                            <input class="form-control" type="text" placeholder="Work Telephone Number" id="mother_work_phone" name="mother_work_phone">
	                                        </div>
	                                        <div class="col-sm-3 col-xs-12">
	                                            <label>Email</label>
	                                            <input class="form-control" type="text" placeholder="Email" id="mother_email" name="mother_email">
	                                        </div>

<!-- 	                                        <div class="col-sm-3 col-xs-12">
	                                            <div class="col-sm-12 col-xs-12">
	                                                <label>Did you Attended Eco Pillars ?</label>
	                                            </div>
	                                            <div class="col-xs-12">
	                                                <select name="mother_attend" class="form-control">
	                                                    <option value="yes">Yes</option>
	                                                    <option value="no">No</option>
	                                                </select>
	                                            </div>
	                                        </div> -->
	                                    </div>
                                    </div>
<!--                                     <div class="contacts_section">
                                        <h4><i class="fa fa-phone"></i> Additional Contact Persons</h4>
                                        <div class="row">
	                                        <div class="col-sm-6 col-xs-12">
	                                            <label>Emergency Contact Name (1)</label>
	                                            <input class="form-control" type="text" placeholder="Emergency Contact Name" id="emergency_contact_name_1" name="emergency_contact_name_1">
	                                        </div>
	                                        <div class="col-sm-6 col-xs-12">
	                                            <label>Telephone Numbers</label>
	                                            <input class="form-control" type="text" placeholder="Home" id="emergency_contact1_number_home" name="emergency_contact1_number_home">
	                                            <input class="form-control" type="text" placeholder="Work" id="emergency_contact1_number_work" name="emergency_contact1_number_work">
	                                            <input class="form-control" type="text" placeholder="Cell" id="emergency_contact1_number_cell" name="emergency_contact1_number_cell">
	                                        </div>
	                                    </div>
                                        <div class="row">
	                                        <div class="col-sm-6 col-xs-12">
	                                            <label>Emergency Contact Name (2)</label>
	                                            <input type="text" class="form-control"  placeholder="Emergency Contact Name" id="emergency_contact_name_2" name="emergency_contact_name_2">
	                                        </div>
	                                        <div class="col-sm-6 col-xs-12">
	                                            <label>Telephone Numbers</label>
	                                            <input class="form-control" type="text" placeholder="Home" id="emergency_contact2_number_home" name="emergency_contact2_number_home">
	                                            <input class="form-control" type="text" placeholder="Work" id="emergency_contact2_number_work" name="emergency_contact2_number_work">
	                                            <input class="form-control" type="text" placeholder="Cell" id="emergency_contact2_number_cell" name="emergency_contact2_number_cell">
	                                        </div>
	                                    </div>
                                    </div> -->
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
