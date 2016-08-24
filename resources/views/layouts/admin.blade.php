<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>PSG Tournament Scheduler</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="token" content="{!! csrf_token() !!}">
    {{--Bootstrap--}}
    {!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') !!}
    {{--Fonts--}}
    {!! Html::style('font-awesome/4.6.1/css/font-awesome.min.css') !!}
    <!-- Theme -->
    {!! Html::style('adminlte/dist/css/AdminLTE.min.css') !!}
    {!! Html::style('adminlte/dist/css/skins/_all-skins.min.css') !!}
    {!! Html::style('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}
    {!! Html::style('adminlte/plugins/colorpicker/bootstrap-colorpicker.min.css') !!}
    {!! Html::style('adminlte/plugins/datatables/dataTables.bootstrap.css') !!}
    <!-- Custom -->
    {!! Html::style('css/app.css') !!}
    @stack('css')
    {!! Html::script('//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js') !!}



</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <a href="" class="logo">
            <span class="logo-mini">PSG</span>
            <span class="logo-lg">PSG Tournament Schedule</span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="hidden-xs">{{ \Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="user-header">
                                <p>
                                    {!! \Auth::user()->name !!}
                                </p>
                                {!! Html::image(Auth::user()->img) !!}
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{!! route('admin.show', Auth::user()->id) !!}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <span>
                                    <a href="{!! route('admin.edit', Auth::user()->id) !!}" class="btn btn-default btn-flat">Edit</a>
                                </span>

                                <span>
                                    <a href="{!! route('users.show', Auth::user()->id ) !!}" class="btn btn-default btn-flat">User</a>
                                </span>
                                <div class="pull-right">
                                    <a href="{{ route('auth.logout',  Auth::user()->id ) }}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="">
                    <a href="{!! route('admin.index') !!}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{!! route('admin.events.create', Auth::user()->id) !!}">
                        <i class="fa fa-futbol-o" aria-hidden="true"></i>
                        <span>Create new event &plus;</span>
                    </a>
                </li>
                <li class="">
                    <a href="{!! route('admin.users.index', Auth::user()->id) !!}">
                        <i class="fa fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
            </ul>
        </section>
    </aside>
    <div class="content-wrapper">
        <div class="content-header">
            @section('sidebar')
                <div class="row">
                    <div class="col-lg-4 col-xs-6">
                        <div class="info-box">
                            <a href="{{ route('admin.events.index', Auth::user()->id) }}">
                            <span class="info-box-icon bg-blue"><i class="fa fa-futbol-o" aria-hidden="true"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Events</span>
                                <span class="info-box-number">
					{!! \App\Event::count() !!}
				</span>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                        <div class="info-box">
                            <a href="{!! "route('admin.spectators.index')" !!}">
                            <span class="info-box-icon bg-red"><i class="fa fa-binoculars" aria-hidden="true"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Spectators</span>
                                <span class="info-box-number">
					{!! \App\Spectator::count() !!}
				</span>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                        <div class="info-box">
                            <a href="{!! route('admin.users.index', Auth::user()->id) !!}">
                            <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Users</span>
                                <span class="info-box-number">
					{!! \App\User::count() !!}
				</span>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            @show
        </div>
        <div class="content">
            <div class="box box-primary">
                <div class="box-header" style="background-color: #3c8dbc;">
                    <h1 class="box-title" style="color: #ffffcc;  ">@yield('title')</h1>
                </div>
                <div class="box-body">
                    <div class="row">
                        @include('auth.partials.errors')
                        @include('auth.partials.flash')

                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var base_url = '';
</script>

<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js') !!}
{!! Html::script('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js') !!}
{!! Html::script('app.js') !!}
{!! Html::script('adminlte/plugins/colorpicker/bootstrap-colorpicker.min.js') !!}
{{--{!! Html::script('plugin/adminlte/2.3.0/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}--}}
{!! Html::script('adminlte/dist/js/app.min.js') !!}
{!! Html::script('adminlte/plugins/ckeditor/ckeditor.js') !!}
{{--CHARTS--}}
{!! Html::script('adminlte/plugins/chartjs/Chart.js') !!}
{!! Html::script('adminlte/plugins/datatables/dataTables.bootstrap.js') !!}
{!! Html::script('adminlte/plugins/datatables/jquery.dataTables.min.js') !!}

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
{!! Html::script('//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') !!}
{!! Html::script('//oss.maxcdn.com/respond/1.4.2/respond.min.js') !!}

<![endif]-->
@stack('js')
</body>
</html>
