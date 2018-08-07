@extends('dashboard')

@section('form')

    <<<<<<< HEAD
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">

            <div class="row">
                <div class="col-md-12">

                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Create New Fee

                            </div>
                            <div class="tools">
                                <a href="javascript:" class="collapse">
                                </a>
                                <a href="#portlet-config" data-toggle="modal" class="config">
                                </a>
                                <a href="javascript:" class="reload">
                                </a>
                                <a href="javascript:" class="remove">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->

                            <form action="/dashboard/add-fee/" method="POST" class="horizontal-form">
                                <div class="form-body">
                                    <!-- <h3 class="form-section">Enter Level Details</h3> -->

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
                                    <div class="form-body">
                                        <div class="row">
                                            {{ csrf_field() }}

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Level</label>

                                                    <select name="type_id" class="form-control">
                                                        @foreach ($fee_types as $type)
                                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Level</label>

                                                    <select name="level_id" class="form-control">
                                                        @foreach ($levels as $level)
                                                            <option value="{{ $level->id }}">{{ $level->levelname }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <label class="control-label">Amount</label>
                                                    <input type="text" name="amount" class="form-control">

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="form-actions right">
                                    <a class="btn btn-default btn-close" href="/dashboard">Cancel</a>

                                    <button type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>


                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
    =======
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">

            <div class="row">
                <div class="col-md-12">

                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Create New Fee

                            </div>
                            <div class="tools">
                                <a href="javascript:" class="collapse">
                                </a>
                                <a href="#portlet-config" data-toggle="modal" class="config">
                                </a>
                                <a href="javascript:" class="reload">
                                </a>
                                <a href="javascript:" class="remove">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->

                            <form action="/dashboard/add-fee/" method="POST" class="horizontal-form">
                                <div class="form-body">
                                    <!-- <h3 class="form-section">Enter Level Details</h3> -->

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
                                    <div class="form-body">
                                        <div class="row">
                                            {{ csrf_field() }}

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    @if ($fee_types)
                                                        <label class="control-label">Fee Type</label>

                                                        <select name="type_id" class="form-control">
                                                            @foreach ($fee_types as $type)
                                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    @else
                                                        <p>no fee type set</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Level</label>

                                                    <select name="level_id" class="form-control">
                                                        @foreach ($levels as $level)
                                                            <option value="{{ $level->id }}">{{ $level->levelname }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <label class="control-label">Amount</label>
                                                    <input type="text" name="amount" class="form-control">

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="form-actions right">
                                    <a class="btn btn-default btn-close" href="/dashboard">Cancel</a>

                                    <button type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>


                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
    >>>>>>> ea644b64c8ca3b9d48d09329db7d356daebc6c7c


@endsection
