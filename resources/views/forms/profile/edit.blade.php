@extends('dashboard')

@section('form')

<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper" id="subrespage" >
		<div class="page-content">
			<div class="row">
				<div class="col-md-12">
					<div class="portlet light profile-sidebar-portlet">
						<center>

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

							<!-- SIDEBAR USERPIC -->
							<div class="profile-userpic">


							@if (Auth::user()->photo)
								<img alt="" class="img-responsive"  src="/uploads/profile_photos/{{ Auth::user()->photo }}"/>
							@else
								<img alt="" class="img-responsive" src="/assets/admin/layout4/img/avatar9.jpg"/>
							@endif
								<!-- <img src="../../assets/admin/pages/media/profile/profile_user.jpg" alt=""> -->
							</div>

					        {!! Form::open(array('route' => 'image.dp_upload.post','files'=>true)) !!}

<!-- 									<div class="profile-userbuttons">
										<button type="button" class="btn btn-circle green-haze btn-sm">Follow</button>
										<button type="button" class="btn btn-circle btn-danger btn-sm">Message</button>
									</div> -->

					                <div class="row">
					                	<br>
					                	<br>
						                <div class="col-md-3 col-md-offset-3">
						                    {!! Form::file('image', array('class' => 'btn btn-circle blue-hoki btn-sm')) !!}
						                </div>

						                <div class="col-md-3">
						                    <button type="submit" class="btn btn-success btn-sm">Upload</button>
						                </div>
						            </div>

					        {!! Form::close() !!}
						</center>

                                {{ Form::open(array('action' => 'TeacherController@updateProfile' )) }}
				                <div class="row">
				                <div class="col-md-6 col-md-offset-3">
									<div class="form-body">
										<div class="form-group form-md-line-input has-error">
											<input type="text" class="form-control" readonly="" value="{{ Auth::user()->email }}" id="form_control_1">
											<label for="form_control_1">Email</label>
										</div>
										<div class="form-group form-md-line-input">
											<input type="text" class="form-control" id="form_control_1" placeholder="Enter your first name" value="{{ $profile->firstname }}" name="firstname">
											<label for="form_control_1">First Name</label>
										</div>
										<div class="form-group form-md-line-input">
											<input type="text" class="form-control" id="form_control_1" placeholder="Enter your last name" value="{{ $profile->lastname }}" name="lastname">
											<label for="form_control_1">Last Name</label>
										</div>
										<div class="form-group form-md-line-input has-info">
											<select class="form-control" name="gender" id="form_control_1" value="{{ $profile->Gender }}">
												<option value="male">Male</option>
												<option value="female">Female</option>
											</select>
											<label for="form_control_1">Gender</label>
										</div>
										<div class="form-group form-md-line-input">
											<input type="text" class="form-control" id="form_control_1" placeholder="Enter Phone Number" value="{{ $profile->phonenumber }}" name="phonenumber">
											<label for="form_control_1">Phone Number</label>
										</div>
										<div class="form-group form-md-line-input">
											<textarea class="form-control" rows="3" placeholder="Description" name="description">{{ $profile->description }}</textarea>
											<label for="form_control_1">Description</label>
										</div>
										<div class="form-group form-md-line-input">
											<textarea class="form-control" rows="3" placeholder="Qualifications" name="qualifications">{{ $profile->qualifications }}</textarea>
											<label for="form_control_1">Qualifications</label>
										</div>
										
									<div class="form-actions noborder">
										<button type="submit" class="btn blue">Submit</button>
									</div>
										</div>
									</div>
								</div>
					        {!! Form::close() !!}
					</div>

				<!-- <div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-file"></i> Results
							</div>

						</div>
						<div class="portlet-body">
    


					        @if ($message = Session::get('success'))

					            <div class="alert alert-success alert-block">

					                <button type="button" class="close" data-dismiss="alert">×</button>

					                    <strong>{{ $message }}</strong>

					            </div>

					        @endif



					        @if (count($errors) > 0)

					            <div class="alert alert-danger">

					                <strong>Whoops!</strong> There were some problems with your input.

					                <ul>

					                    @foreach ($errors->all() as $error)

					                        <li>{{ $error }}</li>

					                    @endforeach

					                </ul>

					            </div>

					        @endif



					        {!! Form::open(array('route' => 'image.upload.post','files'=>true)) !!}

					            <div class="row">
					                <h4 class="form-title">Upload your passport photo to continue</h4>

					                <div class="col-md-8">

					                    {!! Form::file('image', array('class' => 'form-control')) !!}

					                </div>

					                <div class="col-md-4">

					                    <button type="submit" class="btn btn-success">Upload</button>

					                </div>
					                <div class="col-md-12 alert alert-info" style="margin-top: 20px">

					                    <p>select a photo and click on the "Upload" button, please note that that max photo size allowed is <b>1mb</b></p>
					                </div>
					            </div>

					        {!! Form::close() !!}
						</div>
					</div> -->
						
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->


@endsection
