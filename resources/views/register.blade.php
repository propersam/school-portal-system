@extends('layout.app')

@section('content')
    <!-- breadcumb-area start -->
    <div class="breadcumb-area bg-img-1 black-opacity">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Register Today</h2>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>/</li>
                            <li>Register</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcumb-area end -->


    <!-- contact-area start -->
    <div class="contact-area ptb-120">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="contact-wrap">
                        <h3>Registration Form</h3>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="cf-msg"></div>
                        {{ Form::open(array('action' => 'RegisterController@store' )) }}
                        <div class="row registration_form">
                            <div class="child_section">
                                <h4><i class="fa fa-user"></i> Email</h4>
                                <div class="col-sm-12 col-xs-12">
                                    <label>Email address to be used for the account *</label>
                                    <input required type="text" placeholder="Email" id="email" name="email">
                                </div>
                            </div>
                            <div class="child_section">
                                <h4><i class="fa fa-user"></i> Child</h4>
                                <div class="col-sm-12 col-xs-12">
                                    <label>Surname of Child *</label>
                                    <input required type="text" placeholder="Surname of Child" id="lastname"
                                           name="lastname">
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <label>First Name of Child *</label>
                                    <input required type="text" placeholder="First Name of Child"
                                           id="first_name" name="first_name">
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <label>Other Name of Child *</label>
                                    <input required type="text" placeholder="Other Name of Child" id="pref_name"
                                           name="pref_name">
                                </div>
                                <div class="col-sm-12 col-xs-12" style="margin-bottom: 50px">
                                    <div class="col-xs-3   col-xs-offset-1">
                                        <label>Gender *</label>
                                        <select required name="gender" class="form-control">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-4   col-xs-offset-1 ">
                                        <label>Date of Birth *</label>
                                        <!-- <input type="date" placeholder="date of birth" id="dob" name="dob"> -->
                                        <div data-date-format="yyyy-mm-dd" class="input-group date"
                                             data-provide="datepicker" style="">
                                            <input required type="text" name="dob" class="form-control">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="col-sm-4">
                                        <label>Nationality *</label>
                                        <input required type="text" placeholder="Nationality" id="origin" name="origin">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>State of Origin *</label>
                                        <input required type="text" placeholder="State of Origin" id="state"
                                               name="state">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Local Government Area *</label>
                                        <input required type="text" placeholder="Local Government Area" id="lga"
                                               name="lga">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-xs-12">
                                    <label>Residential Address *</label>
                                    <textarea required class="contact-textarea"
                                              placeholder="Residential Address" id="residential_address"
                                              name="residential_address"></textarea>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <label>Home Telephone Number *</label>
                                    <input required type="text" placeholder="Home Telephone Number"
                                           id="home_number" name="home_number">
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="col-sm-12 col-xs-12">
                                        <label>Level applied to</label>
                                    </div>
                                    <div class="col-xs-3">
                                        <select name="level" class="form-control">
                                            @foreach ($levels as $level)
                                                <option value="{{ $level->id }}">{{ $level->levelname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="father_section">
                                <h4><i class="fa fa-male"></i> Father</h4>
                                <div class="col-sm-12 col-xs-12">
                                    <label>First Name of Father</label>
                                    <input type="text" placeholder="First Name of Father" id="first_name"
                                           name="father_first_name">
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <label>Surname of Father</label>
                                    <input type="text" placeholder="Surname of Father" id="father_surname"
                                           name="father_surname">
                                </div>

                                <div class="col-sm-12 col-xs-12">
                                    <label>Company Name</label>
                                    <input type="text" placeholder="Coy Name" id="father_company_name"
                                           name="father_company_name">
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <label>Office Address</label>
                                    <input type="text" placeholder="Office Address" id="father_work_address"
                                           name="father_work_address">
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <label>Office Telephone Number</label>
                                    <input type="text" placeholder="Office Telephone Number" id="father_work_phone"
                                           name="father_work_phone">
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <label>Email</label>
                                    <input type="text" placeholder="Email" id="father_email" name="father_email">
                                </div>

                            </div>
                            <div class="mother_section">
                                <h4><i class="fa fa-female"></i> Mother</h4>
                                <div class="col-sm-12 col-xs-12">
                                    <label>First Name of Mother</label>
                                    <input type="text" placeholder="First Name of Mother" id="mother_first_name"
                                           name="mother_first_name">
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <label>Surname of Mother</label>
                                    <input type="text" placeholder="Surname of Mother" id="mother_surname"
                                           name="mother_surname">
                                </div>

                                <div class="col-sm-12 col-xs-12">
                                    <label>Company Name</label>
                                    <input type="text" placeholder="Coy Name" id="mother_company_name"
                                           name="mother_company_name">
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <label>Coy Address</label>
                                    <input type="text" placeholder="Coy Address" id="mother_work_address"
                                           name="mother_work_address">
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <label>Coy Telephone Number</label>
                                    <input type="text" placeholder="Coy Telephone Number" id="mother_work_phone"
                                           name="mother_work_phone">
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <label>Email</label>
                                    <input type="text" placeholder="Email" id="mother_email" name="mother_email">
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <button id="submit" class="cont-submit btn-contact" name="submit">Submit</button>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact-area end -->
@endsection