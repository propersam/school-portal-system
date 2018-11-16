<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>{{ config('app.name', 'SureEdu School Portal') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{$protocol=(request()->isSecure()?'https':'http')}}://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all"
          rel="stylesheet"
          type="text/css"/>
    <link href="/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="/assets/plugins/clockface/css/clockface.css"/>
    <link rel="stylesheet" href="css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" type="text/css"
          href="/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
    <link rel="stylesheet" type="text/css"
          href="/assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>
    <link href="/assets/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/plugins/morris/morris.css" rel="stylesheet" type="text/css">
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN PAGE STYLES -->
    <link href="/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE STYLES -->
    <!-- BEGIN THEME STYLES -->
    <!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
    <link href="/assets/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/layout4/css/themes/light.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="/assets/admin/layout4/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <div class="active_session_div">
        <p>SESSION: @if ($active_session) {{ $active_session->name }} @else <span
                    style="color: red">NO ACTIVE SESSION</span> @endif</p>
    </div>
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="#">
                <img src="{{asset('assets/images/logo.png')}}" alt="logo" height="80px" width="200px"
                     style="padding: 10px" class="logo-sdefault"/>
            </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE ACTIONS -->
        <!-- DOC: Remove "hide" class to enable the page header actions -->

        @if (Auth::user()->role == 'SuperAdmin')
            <div class="page-actions">
                <div class="btn-group">
                    <button type="button" class="btn red-haze btn-sm dropdown-toggle" data-toggle="dropdown"
                            data-hover="dropdown" data-close-others="true">
                        <span class="hidden-sm hidden-xs">Actions&nbsp;</span><i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="/staff/create">
                                <i class="icon-user"></i> Create Staff </a>
                        </li>
                        <li>
                            <a href="/dashboard/register-student">
                                <i class="icon-user"></i> Register Pupil </a>
                        </li>
                        <li class="divider">
                        </li>
                        <li>
                            <a href="/dashboard/create-session">
                                <i class="icon-share"></i> Create Session </a>
                        </li>
                        <li>
                            <a href="/dashboard/create-class">
                                <i class="icon-layers"></i> Create Class </a>
                        </li>
                        <li>
                            <a href="/dashboard/create-subject">
                                <i class="icon-book-open"></i> Add Subject
                            </a>
                        </li>
                        <li>
                            <a href="/logout">
                                <i class="icon-logout"></i> Log Out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
    @endif
    <!-- END PAGE ACTIONS -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
						<span class="username username-hide-on-mobile">
						{{ Auth::user()->name }} </span>
                            @if (Auth::user()->photo)
                                <img alt="" class="img-circle" src="/uploads/profile_photos/{{ Auth::user()->photo }}"/>
                            @else
                                <img alt="" class="img-circle" src="/assets/admin/layout4/img/avatar9.jpg"/>
                            @endif
                        </a>
                    </li>
                    <!-- 					<li class="dropdown">
                                            <span class="sr-only">Toggle Quick Sidebar</span>
                                            <a href="/logout"><i class="icon-logout"></i>Log Out</a>
                                        </li> -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->


@yield('content')

<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner">
        2018 &copy; SureEdu School Portal
        <a href="https://suretradebsl.com" title="Suretrade Business Solutions Limited" target="_blank">
            Suretrade Business Solutions Limited
        </a>
    </div>
    <div class="scroll-to-top"><i class="icon-arrow-up"></i></div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="/assets/global/plugins/respond.min.js"></script>
<script src="/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="/assets/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="/assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="/assets/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript"
        src="/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>


<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<!-- <script src="/assets/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="/assets/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery.sparkline.min.js" type="text/javascript"></script> -->
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/assets/scripts/metronic.js" type="text/javascript"></script>
<script src="/assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="/assets/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="/assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
<script src="/assets/admin/pages/scripts/index3.js" type="text/javascript"></script>
<script src="/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="/assets/admin/pages/scripts/components-pickers.js"></script>
<script src="/js/angular.js"></script>
<script src="/js/angular-route.js"></script>
<script src="{{$protocol}}://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular-sanitize.min.js"></script>
<script src="/js/FileSaver.min.js"></script>
<script src="/js/json-export-excel.js"></script>
<script src="/js/dataTables/jquery.dataTables.js"></script>
<script src="/js/dataTables/dataTables.bootstrap.js"></script>

<script src="/js/ui-bootstrap-tpls-2.5.0.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="/js/controllers.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables').dataTable({
            "deferRender": true
        });
    });
</script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function () {
        $('.datepicker').datepicker();
        Metronic.init(); // init metronic core componets
        Layout.init(); // init layout
        Demo.init(); // init demo features
        QuickSidebar.init(); // init quick sidebar
        Index.init(); // init index page
        Tasks.initDashboardWidget(); // init tash dashboard widget
        ComponentsPickers.init();
    });
</script>
<!-- END JAVASCRIPTS -->

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/5b5856c0e21878736ba24a2a/default';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->

</body>
<!-- END BODY -->
</html>
