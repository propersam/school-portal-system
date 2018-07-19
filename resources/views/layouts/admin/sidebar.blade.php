@extends('layouts.admin.app')

@section('content')
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="start active ">
                    <a href="index.html">
                        <i class="icon-home"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:">
                        <i class="icon-basket"></i>
                        <span class="title">Manage Staff</span>

                    </a>

                </li>
                <li>
                    <a href="javascript:">
                        <i class="icon-rocket"></i>
                        <span class="title">Manage Pupils</span>

                    </a>

                </li>
                <li>
                    <a href="javascript:">
                        <i class="icon-diamond"></i>
                        <span class="title">Manage Exams</span>

                    </a>

                </li>
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
    <!-- END SIDEBAR -->
@endsection