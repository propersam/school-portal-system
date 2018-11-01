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
							    @csrf

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
	                                            Parent Email address
	                                        </label>
                                                <input type="text" class="form-control" placeholder="Enter Email"
                                                       id="email" name="email">
	                                        </div>
	                                        <div class="col-sm-6">
	                                    	<br>
	                                        <label for="phone">
	                                            Parent number (Whatsapp number preferred) *
	                                        </label>
                                                <input type="text" required class="form-control" placeholder="Enter Contact number"
                                                       id="phone" name="phone">
	                                        </div>
                                    </div>
                                    <div class="child_section">

                                        <div class="col-sm-12 col-xs-12" style="padding: 24px; background-color: #efefef; border-radius: 10px; margin: 15px; margin-bottom: 40px">
                                            <div class="col-sm-2">
                                                <label>Add to Class</label>
                                            </div>
                                            <div class="col-xs-3">
                                                <select name="class_id" class="form-control">
                                                    @foreach ($classes as $clas)
                                                        <option value="{{ $clas->id }}">{{ $clas->classname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                         {{--<div class="col-sm-2">--}}
                                                {{--<label>Add to class</label>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-xs-3">--}}
												{{--{{ Form::select('class_id', $classes, app('request')->input('c'), ['class' => 'form-control'] --}}
												{{--) }}--}}
                                            {{--</div>--}}
                                        </div>
                                        <h4> <b> A. Information of the Child </b> </h4><br><br>

                                        <div class="row">
											<div class="col-sm-4 col-xs-12">
												<label>Surname *</label>
												<input required class="form-control" type="text"
													   placeholder="Surname of Child" id="lastname" name="lastname">
											</div>

	                                        <div class="col-sm-4 col-xs-12">
	                                            <label>First Name*</label>
                                                <input required class="form-control" type="text"
                                                       placeholder="First Name of Child" id="first_name"
                                                       name="first_name">
	                                        </div>
	                                        <div class="col-sm-4 col-xs-12">
	                                            <label>Middle Name *</label>
                                                <input required class="form-control" type="text"
                                                       placeholder="Middle Name of Child" id="middle_name"
                                                       name="middle_name">
	                                        </div>

	                                    </div>
                                        <div class="row">
	                                        <div class="col-sm-3 col-xs-12">
	                                            <div class="col-xs-12">
	                                                <label>Gender *</label>
                                                    <select required name="gender" class="form-control">
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
                                                    <input required type="text" name="dob" class="form-control">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-th"></span>
                                                    </div>
                                                </div>
	    									</div>
	                                        <div class="col-sm-5 col-xs-12">
	                                            <label>Home Telephone Number </label>
                                                <input class="form-control" type="text"
                                                       placeholder="Home Telephone Number" id="home_number"
                                                       name="home_number">
	                                        </div>
										</div>
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="col-sm-2">
                                                <label>Blood Group</label>
                                                <input class="form-control" type="text"
                                                       placeholder="Blood group" id="blood_group" name="blood_group">
                                            </div>

                                            <div class="col-sm-2">
                                                <label>Genotype</label>
                                                <input class="form-control" type="text"
                                                       placeholder="Blood Genotype" id="genotype" name="genotype">
                                            </div>

                                            <div class="col-sm-4">
                                                <label>Nationality </label>
                                                <input class="form-control" type="text"
                                                       placeholder="Nationality" id="nationality" name="nationality">
                                            </div>
                                            <div class="col-sm-4">
                                                <label>State of Origin *</label>
                                                <input required class="form-control" type="text"
                                                       placeholder="State of Origin" id="state" name="state">
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
	                                        {{--<div class="col-sm-8 col-xs-12">--}}
	                                            {{--<label>Residential Address *</label>--}}
                                                {{--<textarea required class="form-control" class="contact-textarea"--}}
                                                          {{--placeholder="Residential Address" id="residential_address"--}}
                                                          {{--name="residential_address"></textarea>--}}
	                                        {{--</div>--}}

                                            <div class="col-sm-3">
                                                <label>Religion </label>
                                                <input class="form-control" type="text"
                                                       placeholder="Religion" id="religion" name="religion">
                                            </div>

                                            <div class="col-sm-3">
                                                <label>Mother tongue </label>
                                                <input class="form-control" type="text"
                                                       placeholder="Child's Mother Tongue" id="mother_tongue" name="mother_tongue">
                                            </div>

                                            <div class="col-sm-6">
                                                <label>Specify Other Languages (if any)</label>
                                                <input class="form-control" type="text"
                                                       placeholder="ex: igbo, yoruba, french" id="other_languages" name="other_languages">
                                            </div>

	                                    </div>

                                        <div class="row">
                                            <div class="col-sm-8 col-xs-12">
                                                <label>Any health challenge? Please specify: </label>
                                                <textarea class="form-control" class="contact-textarea"
                                                          placeholder="You can also describe health challenges here" id="health_challenges"
                                                          name="health_challenges"></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="parent_section">
                                        <h4> <b> B. Information of Parent </b> </h4>
                                        <div class="row">
	                                        <div class="col-sm-6 col-xs-12">
	                                            <label>First Name *</label>
	                                            <input required class="form-control" type="text" placeholder="Enter First Name" id="parent_firstname" name="parent_firstname">
	                                        </div>
	                                        <div class="col-sm-6 col-xs-12">
	                                            <label>Surname *</label>
	                                            <input required class="form-control" type="text" placeholder="Enter Surname" id="parent_lastname" name="parent_lastname">
	                                        </div>
	                                    </div>

                                        <div class="row">
                                            <div class="col-sm-8 col-xs-12">
                                                <label>Residential Address </label>
                                                <textarea class="form-control" class="contact-textarea"
                                                          placeholder="Residential Address" id="residential_address"
                                                          name="residential_address"></textarea>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-sm-5 col-xs-12">
                                                <label>State of origin *</label>
                                                <input required class="form-control" type="text" placeholder="Parent State of Origin" id="origin" name="origin">
                                            </div>

 	                                        <div class="col-sm-7 col-xs-12">
	                                            <label>Occupation </label>
	                                            <input class="form-control" type="text" placeholder="Parent Main Occupation" id="occupation" name="occupation">
	                                        </div>
	                                    </div>

                                        <div class="row">
	                                        <div class="col-sm-3 col-xs-12">
	                                            <label>Emergency Contact Number *</label>
	                                            <input required class="form-control" type="text" placeholder="Enter Emergency Number" id="emergency_home_number" name="emergency_home_number">
	                                        </div>
	                                        <div class="col-sm-5 col-xs-12">
	                                            <label>Name of Person to be contacted *</label>
	                                            <input required class="form-control" type="text" placeholder="Enter the full name here" id="emergency_name" name="emergency_name">
	                                        </div>
                                            <div class="col-sm-4 col-xs-12">
                                                <label>Relationship *</label>
                                                <input required class="form-control" type="text" placeholder="Enter person's relationship to Child" id="relationship" name="relationship">
                                            </div>

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
