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
                                <i class="fa fa-mortar-board"></i> Applications
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
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab">
                                        Pending Applications </a>
                                </li>
                                <li>
                                    <a href="#tab_1_2" data-toggle="tab">
                                        Accepted Applications </a>
                                </li>
                                <li>
                                    <a href="#tab_1_3" data-toggle="tab">
                                        Rejected Applications </a>
                                </li>
                            </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="tab_1_1">
                                        <p>
                                            <table class="table table-condensed table-hover">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th>
                                                        Level
                                                    </th>
                                                    <th>
                                                        Application Date
                                                    </th>
                                                    <th>
                                                        Actions
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if ($pending_applications)
                                                    @foreach ($pending_applications as $i)
                                                      
                                                    
                                                    <tr>
                                                            <td>
                                        <p>{{ is_object($i) ? $i->firstname : "nil"}} 
                                            {{ is_object($i) ? $i->lastname : "nil" }}</p>
                                        </td>
                                        <td>
                                            <p>{{ is_object($i) ? $i ->level : "nil" }}</p>
                                        </td>
                                        <td>
                                            <p>{{ is_object($i) ? $i->created_at : "nil" }}</p>
                                        </td>
                                        <td>
                                            <a class="btn default" data-toggle="modal" href="#edit{{ $i->id }}">
                                                View </a></td>
                                        <div class="modal fade" id="edit{{ $i->id }}" tabindex="-1" role="basic"
                                             aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true"></button>
                                                        <h4 class="modal-title">{{ $i->firstname }}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="child_section">
                                                            <div class="row">
                                                                <h4> <b> A. Information of the Child </b> </h4>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>First Name</label>
                                                                    <p>{{ is_object($i) ? $i->firstname : "nil" }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Middle Name</label>
                                                                    <p>{{ is_object($i) ? $i->middle_name : "nil" }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Surname</label>
                                                                    <p>{{ is_object($i) ? $i->lastname : "nil"}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Gender</label>
                                                                    <p>{{ is_object($i) ? $i->gender : "nil"}}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Date of Birth</label>
                                                                    <p>{{ is_object($i) ? $i->dob : "nil" }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Nationality</label>
                                                                    <p>{{ is_object($i) ? $i->nationality : "nil" }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                {{--<div class="col-sm-4 col-xs-12">--}}
                                                                    {{--<label>Email Address</label>--}}
                                                                    {{--<p>{{ is_object($i) ? $i->email : "nil"}}</p>--}}
                                                                {{--</div>--}}
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Blood Group</label>
                                                                    <p>{{ is_object($i) ? $i->blood_group : "nil" }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Blood Genotype</label>
                                                                    <p>{{ is_object($i) ? $i->genotype : "nil" }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>State Of Origin</label>
                                                                    <p>{{ is_object($i) ? $i->origin : "nil" }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Mother Tongue</label>
                                                                    <p>{{ is_object($i) ? $i->mother_tongue : "nil"}}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Applied Level</label>
                                                                    <p>{{ is_object($i) ? $i->level : "nil" }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-sm-2"></div>

                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Other Languages</label>
                                                                    <p>{{ is_object($i) ? $i->other_languages : "nil"}}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Health Challenges</label>
                                                                    <p>{{ is_object($i) ? $i->health_challenges : "nil"}}</p>
                                                                </div>

                                                                <div class="col-sm-2"></div>
                                                            </div>
                                                        </div>

                                                        <div class="parent_section">
                                                            <div class="row">
                                                                <h4> <b> B. Information of Parent </b> </h4>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>First Name</label>
                                                                    <p>{{ is_object($i) ? $i->returnParent()['firstname'] : "nil"}}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Last Name</label>
                                                                    <p>{{ is_object($i) ? $i->returnParent()['lastname'] : "nil" }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Occupation</label>
                                                                    <p>{{ is_object($i) ? $i->returnParent()['occupation'] : "nil" }}</p>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Email</label>
                                                                    <p>{{ is_object($i) ? $i->returnParent()['email'] : "nil" }}</p>
                                                                </div>

                                                                <div class="col-sm-3 col-xs-12">
                                                                    <label>State Of Origin</label>
                                                                    <p>{{ is_object($i) ? $i->returnParent()['origin'] : "nil" }}</p>
                                                                </div>
                                                                <div class="col-sm-3 col-xs-12">
                                                                    <label>Phone Number</label>
                                                                    <p>{{ is_object($i) ? $i->returnParent()['phone'] : "nil"}}</p>
                                                                </div>

                                                            </div>
                                                            <div class="row">

                                                                <div class="col-sm-2">
                                                                </div>

                                                                <div class="col-sm-8 col-xs-12">
                                                                    <label>Residential Address</label>
                                                                    <p>{{ is_object($i) ? $i->returnParent()['workaddress'] : "nil"}}</p>
                                                                </div>

                                                                <div class="col-sm-2"></div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn default" data-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <form action="/dashboard/reject-student-application/{{ $i->id }}"
                                                              method="POST" style="display: inline-block;float: right;">
                                                            @csrf
                                                            <button type="submit" class="btn red">Reject Application
                                                            </button>
                                                        </form>
                                                        <form action="/dashboard/accept-student/{{ $i->id }}" method="POST"
                                                              style="display: inline-block;float: right;">
                                                            @csrf
                                                            <button type="submit" class="btn green">Accept Application
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                        </td>
                                        </tr>
                                        @endforeach

                                        @endif
                                        </tbody>
                                        </table>
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="tab_1_2">
                                        <p>
                                            <table class="table table-condensed table-hover">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th>Level
                                                    </th>
                                                    <th>
                                                        Date Accepted
                                                    </th>
                                                    <th>
                                                        Actions
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if ($accepted_applications)
                                                    @foreach ($accepted_applications as $i)
                                                        <tr>
                                                            <td>
                                        <p>{{ is_object($i) ? $i->firstname : "nil" }}
                                             {{ is_object($i) ? $i->lastname : "nil" }}</p>
                                        </td>
                                        <td>
                                            <p>{{ is_object($i) ? $i->level : "nil" }}</p>
                                        </td>
                                        <td>
                                            <p>{{ is_object($i) ? $i->updated_at : "nil" }}</p>
                                        </td>
                                        <td>
                                            <a class="btn default" data-toggle="modal" href="#view{{ $i->id }}">
                                                View </a></td>
                                        <div class="modal fade" id="view{{ $i->id }}" tabindex="-1" role="basic"
                                             aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true"></button>
                                                        <h4 class="modal-title">{{ is_object($i) ? $i->firstname : "nil"}}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="child_section">
                                                            <div class="row">
                                                                <h4> <b> A. Information of the Child </b> </h4>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>First Name</label>
                                                                    <p>{{ is_object($i) ? $i->firstname : "nil" }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Middle Name</label>
                                                                    <p>{{ is_object($i) ? $i->middle_name : "nil" }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Surname</label>
                                                                    <p>{{ is_object($i) ? $i->lastname : "nil"}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Gender</label>
                                                                    <p>{{ is_object($i) ? $i->gender : "nil" }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Date of Birth</label>
                                                                    <p>{{ is_object($i) ? $i->dob : "nil" }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Nationality</label>
                                                                    <p>{{ is_object($i) ? $i->nationality : "nil" }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                {{--<div class="col-sm-4 col-xs-12">--}}
                                                                {{--<label>Email Address</label>--}}
                                                                {{--<p>{{ is_object($i) ? $i->email : "nil" }}</p>--}}
                                                                {{--</div>--}}
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Blood Group</label>
                                                                    <p>{{ is_object($i) ? $i->blood_group : "nil" }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Blood Genotype</label>
                                                                    <p>{{ is_object($i) ? $i->genotype : "nil" }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>State Of Origin</label>
                                                                    <p>{{ is_object($i) ? $i->origin : "nil" }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Mother Tongue</label>
                                                                    <p>{{ is_object($i) ? $i->mother_tongue : "nil" }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Applied Level</label>
                                                                    <p>{{ is_object($i) ? $i->level : "nil" }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-sm-2"></div>

                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Other Languages</label>
                                                                    <p>{{ is_object($i) ? $i->other_languages : "nil" }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Health Challenges</label>
                                                                    <p>{{ is_object($i) ? $i->health_challenges : "nil" }}</p>
                                                                </div>

                                                                <div class="col-sm-2"></div>
                                                            </div>
                                                        </div>

                                                        <div class="parent_section">
                                                            <div class="row">
                                                                <h4> <b> B. Information of Parent </b> </h4>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>First Name</label>
                                                                    <p>{{ is_object($i) ? $i->returnParent()['firstname'] : "nil"}}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Last Name</label>
                                                                    <p>{{ is_object($i) ? $i->returnParent()['lastname'] : "nil" }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Occupation</label>
                                                                    <p>{{ is_object($i) ? $i->returnParent()['occupation'] : "nil"}}</p>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Email</label>
                                                                    <p>{{ is_object($i) ? $i->returnParent()['email'] : "nil" }}</p>
                                                                </div>

                                                                <div class="col-sm-3 col-xs-12">
                                                                    <label>State Of Origin</label>
                                                                    <p>{{ is_object($i) ? $i->returnParent()['origin'] : "nil" }}</p>
                                                                </div>
                                                                <div class="col-sm-3 col-xs-12">
                                                                    <label>Phone Number</label>
                                                                    <p>{{ is_object($i) ? $i->returnParent()['phone'] : "nil" }}</p>
                                                                </div>

                                                            </div>
                                                            <div class="row">

                                                                <div class="col-sm-2">
                                                                </div>

                                                                <div class="col-sm-8 col-xs-12">
                                                                    <label>Residential Address</label>
                                                                    <p>{{ is_object($i) ? $i->returnParent()['workaddress'] : "nil" }}</p>
                                                                </div>

                                                                <div class="col-sm-2"></div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="/dashboard/admit-student/{{ $i->id }}" method="POST"
                                                              style="display: inline-block;float: left;">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <label class="control-label">Admit to class</label>
                                                                <input type="hidden" value="{{ $iid = $classes->where('id',$i->class_id)->first()}}"> </input>
                                                               {{--{{ $val = $classes[['id'=> $i->class_id]] }}--}}


                                                                <select name="class_id" class="form-control">
                                                                        <option selected value="{{ $iid->id }}">
                                                                            {{ $iid->classname }} </option>

                                                                @foreach ($classes as $c)
                                                                         <option value="{{ $c->id }}">{{ $c->classname }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="btn green">Admit</button>
                                                        </form>
                                                        <form action="/dashboard/reject-student-admission/{{ is_object($i) ? $i->id : 'nil' }}"
                                                              method="POST" style="display: inline-block;float: right;">
                                                            {{csrf_field()}}
                                                            <button type="submit" class="btn red">Reject</button>
                                                        </form>
                                                        <button type="button" class="btn default" data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                        </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        </tbody>
                                        </table>
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="tab_1_3">
                                        <p>
                                            <table class="table table-condensed table-hover">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th>Level
                                                    </th>
                                                    <th>
                                                        Date Rejected
                                                    </th>
                                                    <th>
                                                        Actions
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if ($rejected_applications)
                                                    @foreach ($rejected_applications as $i)
                                                        <tr>
                                                            <td>
                                        <p>{{ $i->firstname }} {{ $i->lastname }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $i->level }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $i->updated_at }}</p>
                                        </td>
                                        <td>
                                            <a class="btn default" data-toggle="modal" href="#edit{{ $i->id }}">
                                                Edit </a></td>
                                        <div class="modal fade" id="edit{{ $i->id }}" tabindex="-1" role="basic"
                                             aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true"></button>
                                                        <h4 class="modal-title">Edit Session: {{ $i->firstname }}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="child_section">
                                                            <div class="row">
                                                                <h4> <b> A. Information of the Child </b> </h4>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>First Name</label>
                                                                    <p>{{ $i->firstname }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Middle Name</label>
                                                                    <p>{{ $i->middle_name }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Surname</label>
                                                                    <p>{{ $i->lastname }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Gender</label>
                                                                    <p>{{ $i->gender }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Date of Birth</label>
                                                                    <p>{{ $i->dob }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Nationality</label>
                                                                    <p>{{ $i->nationality }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                {{--<div class="col-sm-4 col-xs-12">--}}
                                                                {{--<label>Email Address</label>--}}
                                                                {{--<p>{{ $i->email }}</p>--}}
                                                                {{--</div>--}}
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Blood Group</label>
                                                                    <p>{{ $i->blood_group }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Blood Genotype</label>
                                                                    <p>{{ $i->genotype }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>State Of Origin</label>
                                                                    <p>{{ $i->origin }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Mother Tongue</label>
                                                                    <p>{{ $i->mother_tongue }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Applied Level</label>
                                                                    <p>{{ $i->level }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-sm-2"></div>

                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Other Languages</label>
                                                                    <p>{{ $i->other_languages }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Health Challenges</label>
                                                                    <p>{{ $i->health_challenges }}</p>
                                                                </div>

                                                                <div class="col-sm-2"></div>
                                                            </div>
                                                        </div>

                                                        <div class="parent_section">
                                                            <div class="row">
                                                                <h4> <b> B. Information of Parent </b> </h4>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>First Name</label>
                                                                    <p>{{ $i->returnParent()['firstname'] }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Last Name</label>
                                                                    <p>{{ $i->returnParent()['lastname'] }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Occupation</label>
                                                                    <p>{{ $i->returnParent()['occupation'] }}</p>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>Email</label>
                                                                    <p>{{ $i->returnParent()['email'] }}</p>
                                                                </div>

                                                                <div class="col-sm-3 col-xs-12">
                                                                    <label>State Of Origin</label>
                                                                    <p>{{ $i->returnParent()['origin'] }}</p>
                                                                </div>
                                                                <div class="col-sm-3 col-xs-12">
                                                                    <label>Phone Number</label>
                                                                    <p>{{ $i->returnParent()['phone'] }}</p>
                                                                </div>

                                                            </div>
                                                            <div class="row">

                                                                <div class="col-sm-2">
                                                                </div>

                                                                <div class="col-sm-8 col-xs-12">
                                                                    <label>Residential Address</label>
                                                                    <p>{{ $i->returnParent()['workaddress'] }}</p>
                                                                </div>

                                                                <div class="col-sm-2"></div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn default" data-dismiss="modal">
                                                            Close
                                                        </button>
                                                        {{--<form action="/dashboard/reject-student-application/{{ $i->id }}"--}}
                                                              {{--method="POST" style="display: inline-block;float: right;">--}}
                                                            {{--{{csrf_field()}}--}}
                                                            {{--<button type="submit" class="btn red">--}}
                                                                {{--Reject Application--}}
                                                            {{--</button>--}}
                                                        {{--</form>--}}
                                                        <form action="/dashboard/accept-student/{{ $i->id }}" method="POST"
                                                              style="display: inline-block;float: right;">
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn green">
                                                                Reconsider Application
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                        </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        </tbody>
                                        </table>
                                        </p>
                                    </div>
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
