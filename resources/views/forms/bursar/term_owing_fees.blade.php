@extends('dashboard')

@section('form')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <p>Students Owing School Fees for Current Term</p>
                        </div>
                    </div>
                    <div class="portlet-body">

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-scrollable">

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        First Name
                                    </th>
                                    <th>
                                        Last Name
                                    </th>
                                    <th>
                                        Class
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($students as $i)
                                    <tr>
                                        <td>
                                            <p>{{ $i->firstname }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $i->lastname }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $i->class_details['name'] }}</p>
                                        </td>
                                        <td>
                                            <a class="btn blue-madison" data-toggle="modal" href="#view{{ $i->id }}">
                                                Confirm Payment </a>
                                        </td>
                                        <div class="modal fade student_modal" id="view{{ $i->id }}" tabindex="-1"
                                             role="basic" aria-hidden="true">

                                            <form action="/dashboard/confirm-fees-as-paid/" method="POST"
                                                  class="horizontal-form">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="student_id" value="{{ $i->id }}">
                                                <input type="hidden" name="session_id"
                                                       value="{{ $active_session->id }}">
                                                <input type="hidden" name="term_id"
                                                       value="{{ $active_session->current_term }}">
                                                <input type="hidden" name="user_id" value="{{ $i->user_id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true"></button>
                                                            <h4 class="modal-title"> Confirm Payment School Fees as <b>Paid</b>
                                                                for {{ $i->firstname }} {{ $i->lastname }} ?</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="child_section">
                                                                <div class="row">
                                                                    <h4>Carrying out this action will confirm this
                                                                        student school fees as paid</h4>

                                                                    <b>Please note that the following action is
                                                                        irreversible!</b>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn default"
                                                                    data-dismiss="modal">Cancel
                                                            </button>

                                                            <button type="submit" class="btn green">Proceed</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </form>
                                        </div>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
                <!-- END Portlet PORTLET-->
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->


@endsection