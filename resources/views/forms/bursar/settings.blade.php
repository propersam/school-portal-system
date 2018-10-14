@extends('dashboard')

@section('form')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper" id="subrespage">
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


                        </center>

                        {{ Form::open(array('action' => 'BursarController@updateSetting' )) }}
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-body">
                                    <input type="hidden" name="settings_id"
                                           value="{{ $settings['paystack_key_setting']['id'] }}">

                                    <div class="form-group form-md-line-input">
                                        <input type="text" class="form-control" id="form_control_1"
                                               placeholder="Enter Paystack Key"
                                               value="{{ $settings['paystack_key_setting']['value'] }}"
                                               name="paystack_key">
                                        <label for="form_control_1">Paystack Key Setting</label>
                                    </div>

                                    <div class="form-actions noborder">
                                        <button type="submit" class="btn blue">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>


                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->


@endsection
