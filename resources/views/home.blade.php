<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ ($page_title)?get_setting('appname').': '.strip_tags($page_title):"Admin Area" }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name='generator' content='CRUDBooster {{ \crocodicstudio\crudbooster\commands\CrudboosterVersionCommand::$version }}'/>
    <meta name='robots' content='noindex,nofollow'/>
    <link rel="shortcut icon"
          href="{{ CRUDBooster::getSetting('favicon')?asset(CRUDBooster::getSetting('favicon')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.4.1 -->
    <link href="{{ asset("vendor/crudbooster/assets/adminlte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css"/>
    <!-- Font Awesome Icons -->
    <link href="{{asset("vendor/crudbooster/assets/adminlte/font-awesome/css")}}/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    <link href="{{asset("vendor/crudbooster/ionic/css/ionicons.min.css")}}" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="{{ asset("vendor/crudbooster/assets/adminlte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("vendor/crudbooster/assets/adminlte/dist/css/skins/_all-skins.min.css")}}" rel="stylesheet" type="text/css"/>

    <!-- support rtl-->
    @if (in_array(App::getLocale(), ['ar', 'fa']))
        <link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">
        <link href="{{ asset("vendor/crudbooster/assets/rtl.css")}}" rel="stylesheet" type="text/css"/>
    @endif

    <link rel='stylesheet' href='{{asset("vendor/crudbooster/assets/css/main.css") }}'/>

    <!-- load css -->
    <style type="text/css">
        @if($style_css)
            {!! $style_css !!}
        @endif
    </style>
    @if($load_css)
        @foreach($load_css as $css)
            <link href="{{$css}}" rel="stylesheet" type="text/css"/>
        @endforeach
    @endif

    <style type="text/css">
        .dropdown-menu-action {
            left: -130%;
        }

        .btn-group-action .btn-action {
            cursor: default
        }

        #box-header-module {
            box-shadow: 10px 10px 10px #dddddd;
        }

        .sub-module-tab li {
            background: #F9F9F9;
            cursor: pointer;
        }

        .sub-module-tab li.active {
            background: #ffffff;
            box-shadow: 0px -5px 10px #cccccc
        }

        .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
            border: none;
        }

        .nav-tabs > li > a {
            border: none;
        }

        .breadcrumb {
            margin: 0 0 0 0;
            padding: 0 0 0 0;
        }

        .form-group > label:first-child {
            display: block
        }

        #table_dashboard.table-bordered, #table_dashboard.table-bordered thead tr th, #table_dashboard.table-bordered tbody tr td {
            border: 1px solid #bbbbbb !important;
        }
    </style>

    @stack('head')
</head>
<body class="@php echo (Session::get('theme_color'))?:'skin-blue'; echo ' '; echo config('crudbooster.ADMIN_LAYOUT'); @endphp {{($sidebar_mode)?:''}}">
<div id='app' class="wrapper">

    <!-- Header -->
@include('crudbooster::header')

<!-- Sidebar -->
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-{{ cbLang('left') }} image">
                <img src="{{ CRUDBooster::myPhoto() }}" class="img-circle" alt="{{ cbLang('user_image') }}"/>
            </div>
            <div class="pull-{{ cbLang('left') }} info">
                <p>{{ CRUDBooster::myName() }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ cbLang('online') }}</a>
            </div>
        </div>


        <div class='main-menu'>

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">{{cbLang("menu_navigation")}}</li>
                <!-- Optionally, you can add icons to the links -->

                <?php $dashboard = CRUDBooster::sidebarDashboard();?>
                    <li data-id='{{$dashboard->id}}' class="{{ (Request::is(config('crudbooster.ADMIN_PATH'))) ? 'active' : '' }}"><a
                                href='{{CRUDBooster::adminPath()}}' class='{{($dashboard->color)?"text-".$dashboard->color:""}}'><i class='fa fa-dashboard'></i>
                            <span>{{cbLang("text_dashboard")}}</span> </a></li>
                            <li data-id='{{$dashboard->id}}' class="{{ (Request::is(config('crudbooster.ADMIN_PATH'))) ? 'active' : '' }}"><a
                                href='{{CRUDBooster::adminPath()}}' class='{{($dashboard->color)?"text-".$dashboard->color:""}}'><i class='fa fa-dashboard'></i>
                            <span>{{cbLang("text_dashboard")}}</span> </a></li>
                @if($dashboard)
                <li data-id='{{$dashboard->id}}' class="{{ (Request::is(config('crudbooster.ADMIN_PATH'))) ? 'active' : '' }}"><a
                            href='{{CRUDBooster::adminPath()}}' class='{{($dashboard->color)?"text-".$dashboard->color:""}}'><i class='fa fa-dashboard'></i>
                        <span>{{cbLang("text_dashboard")}}</span> </a></li>
            @endif
                @foreach(CRUDBooster::sidebarMenu() as $menu)
                    <li data-id='{{$menu->id}}' class='{{(!empty($menu->children))?"treeview":""}} {{ (Request::is($menu->url_path."*"))?"active":""}}'>
                        <a href='{{ ($menu->is_broken)?"javascript:alert('".cbLang('controller_route_404')."')":$menu->url }}'
                           class='{{($menu->color)?"text-".$menu->color:""}}'>
                            <i class='{{$menu->icon}} {{($menu->color)?"text-".$menu->color:""}}'></i> <span>{{$menu->name}}</span>
                            @if(!empty($menu->children))<i class="fa fa-angle-{{ cbLang("right") }} pull-{{ cbLang("right") }}"></i>@endif
                        </a>
                        @if(!empty($menu->children))
                            <ul class="treeview-menu">
                                @foreach($menu->children as $child)
                                    <li data-id='{{$child->id}}' class='{{(Request::is($child->url_path .= !Str::endsWith(Request::decodedPath(), $child->url_path) ? "/*" : ""))?"active":""}}'>
                                        <a href='{{ ($child->is_broken)?"javascript:alert('".cbLang('controller_route_404')."')":$child->url}}'
                                           class='{{($child->color)?"text-".$child->color:""}}'>
                                            <i class='{{$child->icon}}'></i> <span>{{$child->name}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach



                @if(CRUDBooster::isSuperadmin())
                    <li class="header">{{ cbLang('SUPERADMIN') }}</li>
                    <li class='treeview'>
                        <a href='#'><i class='fa fa-key'></i> <span>{{ cbLang('Privileges_Roles') }}</span> <i
                                    class="fa fa-angle-{{ cbLang("right") }} pull-{{ cbLang("right") }}"></i></a>
                        <ul class='treeview-menu'>
                            <li class="{{ (Request::is(config('crudbooster.ADMIN_PATH').'/privileges/add*')) ? 'active' : '' }}"><a
                                        href='{{Route("PrivilegesControllerGetAdd")}}'>{{ $current_path }}<i class='fa fa-plus'></i>
                                    <span>{{ cbLang('Add_New_Privilege') }}</span></a></li>
                            <li class="{{ (Request::is(config('crudbooster.ADMIN_PATH').'/privileges')) ? 'active' : '' }}"><a
                                        href='{{Route("PrivilegesControllerGetIndex")}}'><i class='fa fa-bars'></i>
                                    <span>{{ cbLang('List_Privilege') }}</span></a></li>
                        </ul>
                    </li>

                    <li class='treeview'>
                        <a href='#'><i class='fa fa-users'></i> <span>{{ cbLang('Users_Management') }}</span> <i
                                    class="fa fa-angle-{{ cbLang("right") }} pull-{{ cbLang("right") }}"></i></a>
                        <ul class='treeview-menu'>
                            <li class="{{ (Request::is(config('crudbooster.ADMIN_PATH').'/users/add*')) ? 'active' : '' }}"><a
                                        href='{{Route("AdminCmsUsersControllerGetAdd")}}'><i class='fa fa-plus'></i>
                                    <span>{{ cbLang('add_user') }}</span></a></li>
                            <li class="{{ (Request::is(config('crudbooster.ADMIN_PATH').'/users')) ? 'active' : '' }}"><a
                                        href='{{Route("AdminCmsUsersControllerGetIndex")}}'><i class='fa fa-bars'></i>
                                    <span>{{ cbLang('List_users') }}</span></a></li>
                        </ul>
                    </li>

                    <li class="{{ (Request::is(config('crudbooster.ADMIN_PATH').'/menu_management*')) ? 'active' : '' }}"><a
                                href='{{Route("MenusControllerGetIndex")}}'><i class='fa fa-bars'></i>
                            <span>{{ cbLang('Menu_Management') }}</span></a></li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-wrench'></i> <span>{{ cbLang('settings') }}</span> <i
                                    class="fa fa-angle-{{ cbLang("right") }} pull-{{ cbLang("right") }}"></i></a>
                        <ul class="treeview-menu">
                            <li class="{{ (Request::is(config('crudbooster.ADMIN_PATH').'/settings/add*')) ? 'active' : '' }}"><a
                                        href='{{route("SettingsControllerGetAdd")}}'><i class='fa fa-plus'></i>
                                    <span>{{ cbLang('Add_New_Setting') }}</span></a></li>
                            <?php
                            $groupSetting = DB::table('cms_settings')->groupby('group_setting')->pluck('group_setting');
                            foreach($groupSetting as $gs):
                            ?>
                            <li class="<?=($gs == Request::get('group')) ? 'active' : ''?>"><a
                                        href='{{route("SettingsControllerGetShow")}}?group={{urlencode($gs)}}&m=0'><i class='fa fa-wrench'></i>
                                    <span>{{$gs}}</span></a></li>
                            <?php endforeach;?>
                        </ul>
                    </li>
                    <li class='treeview'>
                        <a href='#'><i class='fa fa-th'></i> <span>{{ cbLang('Module_Generator') }}</span> <i
                                    class="fa fa-angle-{{ cbLang("right") }} pull-{{ cbLang("right") }}"></i></a>
                        <ul class='treeview-menu'>
                            <li class="{{ (Request::is(config('crudbooster.ADMIN_PATH').'/module_generator/step1')) ? 'active' : '' }}"><a
                                        href='{{Route("ModulsControllerGetStep1")}}'><i class='fa fa-plus'></i>
                                    <span>{{ cbLang('Add_New_Module') }}</span></a></li>
                            <li class="{{ (Request::is(config('crudbooster.ADMIN_PATH').'/module_generator')) ? 'active' : '' }}"><a
                                        href='{{Route("ModulsControllerGetIndex")}}'><i class='fa fa-bars'></i>
                                    <span>{{ cbLang('List_Module') }}</span></a></li>
                        </ul>
                    </li>

                    <li class='treeview'>
                        <a href='#'><i class='fa fa-dashboard'></i> <span>{{ cbLang('Statistic_Builder') }}</span> <i
                                    class="fa fa-angle-{{ cbLang("right") }} pull-{{ cbLang("right") }}"></i></a>
                        <ul class='treeview-menu'>
                            <li class="{{ (Request::is(config('crudbooster.ADMIN_PATH').'/statistic_builder/add')) ? 'active' : '' }}"><a
                                        href='{{Route("StatisticBuilderControllerGetAdd")}}'><i class='fa fa-plus'></i>
                                    <span>{{ cbLang('Add_New_Statistic') }}</span></a></li>
                            <li class="{{ (Request::is(config('crudbooster.ADMIN_PATH').'/statistic_builder')) ? 'active' : '' }}"><a
                                        href='{{Route("StatisticBuilderControllerGetIndex")}}'><i class='fa fa-bars'></i>
                                    <span>{{ cbLang('List_Statistic') }}</span></a></li>
                        </ul>
                    </li>

                    <li class='treeview'>
                        <a href='#'><i class='fa fa-fire'></i> <span>{{ cbLang('API_Generator') }}</span> <i
                                    class="fa fa-angle-{{ cbLang("right") }} pull-{{ cbLang("right") }}"></i></a>
                        <ul class='treeview-menu'>
                            <li class="{{ (Request::is(config('crudbooster.ADMIN_PATH').'/api_generator/generator*')) ? 'active' : '' }}"><a
                                        href='{{Route("ApiCustomControllerGetGenerator")}}'><i class='fa fa-plus'></i>
                                    <span>{{ cbLang('Add_New_API') }}</span></a></li>
                            <li class="{{ (Request::is(config('crudbooster.ADMIN_PATH').'/api_generator')) ? 'active' : '' }}"><a
                                        href='{{Route("ApiCustomControllerGetIndex")}}'><i class='fa fa-bars'></i>
                                    <span>{{ cbLang('list_API') }}</span></a></li>
                            <li class="{{ (Request::is(config('crudbooster.ADMIN_PATH').'/api_generator/screet-key*')) ? 'active' : '' }}"><a
                                        href='{{Route("ApiCustomControllerGetScreetKey")}}'><i class='fa fa-bars'></i>
                                    <span>{{ cbLang('Generate_Screet_Key') }}</span></a></li>
                        </ul>
                    </li>

                    <li class='treeview'>
                        <a href='#'><i class='fa fa-envelope-o'></i> <span>{{ cbLang('Email_Templates') }}</span> <i
                                    class="fa fa-angle-{{ cbLang("right") }} pull-{{ cbLang("right") }}"></i></a>
                        <ul class='treeview-menu'>
                            <li class="{{ (Request::is(config('crudbooster.ADMIN_PATH').'/email_templates/add*')) ? 'active' : '' }}"><a
                                        href='{{Route("EmailTemplatesControllerGetAdd")}}'><i class='fa fa-plus'></i>
                                    <span>{{ cbLang('Add_New_Email') }}</span></a></li>
                            <li class="{{ (Request::is(config('crudbooster.ADMIN_PATH').'/email_templates')) ? 'active' : '' }}"><a
                                        href='{{Route("EmailTemplatesControllerGetIndex")}}'><i class='fa fa-bars'></i>
                                    <span>{{ cbLang('List_Email_Template') }}</span></a></li>
                        </ul>
                    </li>

                    <li class="{{ (Request::is(config('crudbooster.ADMIN_PATH').'/logs*')) ? 'active' : '' }}"><a href='{{Route("LogsControllerGetIndex")}}'><i
                                    class='fa fa-flag'></i> <span>{{ cbLang('Log_User_Access') }}</span></a></li>
                @endif

            </ul><!-- /.sidebar-menu -->

        </div>

    </section>
    <!-- /.sidebar -->
</aside>

<div class="content-wrapper" style="min-height: 652px;">

        <section class="content-header">
                                        <h1>
                    <!--Now you can define $page_icon alongside $page_tite for custom forms to follow CRUDBooster theme style -->
                    <i class="fa fa-qrcode"></i> Device &nbsp;&nbsp;

                    <!--START BUTTON -->

                                                                        <a href="http://127.0.0.1/admin/device?" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>

                                                    <a href="http://127.0.0.1/admin/device/add?return_url=http%3A%2F%2F127.0.0.1%2Fadmin%2Fdevice&amp;parent_id=&amp;parent_field=" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Data
                            </a>




                <!--ADD ACTIon-->
                                    <!-- END BUTTON -->
                </h1>


                <ol class="breadcrumb">
                    <li><a href="http://127.0.0.1/admin"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Device</li>
                </ol>
                    </section>


        <!-- Main content -->
        <section id="content_section" class="content">






        <!-- Your Page Content Here -->






    <div class="box">
        <div class="box-header">
                            <div class="pull-left">
                    <div class="selected-action" style="display:inline-block;position:relative;">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-check-square-o"></i> Bulk Actions
                            <span class="fa fa-caret-down"></span></button>
                        <ul class="dropdown-menu">
                                                            <li><a href="javascript:void(0)" data-name="delete" title="Delete Selected"><i class="fa fa-trash"></i> Delete Selected</a></li>


                        </ul><!--end-dropdown-menu-->
                    </div><!--end-selected-action-->
                </div><!--end-pull-left-->
                        <div class="box-tools pull-right" style="position: relative;margin-top: -5px;margin-right: -10px">

                                    <a style="margin-top:-23px" href="javascript:void(0)" id="btn_advanced_filter" data-url-parameter="" title="Advanced Sort &amp; Filter" class="btn btn-sm btn-default ">
                        <i class="fa fa-filter"></i> Sort &amp; Filter
                    </a>

                <form method="get" style="display:inline-block;width: 260px;" action="http://127.0.0.1/admin/device">
                    <div class="input-group">
                        <input type="text" name="q" value="" class="form-control input-sm pull-right" placeholder="Search">

                        <div class="input-group-btn">
                                                        <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>


                <form method="get" id="form-limit-paging" style="display:inline-block" action="http://127.0.0.1/admin/device">

                    <div class="input-group">
                        <select onchange="$('#form-limit-paging').submit()" name="limit" style="width: 56px;" class="form-control input-sm">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option selected="" value="20">20</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                        </select>
                    </div>
                </form>

            </div>

            <br style="clear:both">

        </div>
        <div class="box-body table-responsive no-padding">
            <form id="form-table" method="post" action="http://127.0.0.1/admin/device/action-selected">
    <input type="hidden" name="button_name" value="">
    <input type="hidden" name="_token" value="2clXjsFPqLBzaglm3gflkEsEgdqe9bcg8QlxVmwj">
    <table id="table_dashboard" class="table table-hover table-striped table-bordered">
        <thead>
        <tr class="active">
                        <th width="3%"><input type="checkbox" id="checkall"></th>
                                    <th width="auto"><a href="http://127.0.0.1/admin/device?filter_column%5Bcms_users.name%5D%5Bsorting%5D=asc" title="Click to sort ascending">Users &nbsp; <i class="fa fa-sort"></i></a></th><th width="auto"><a href="http://127.0.0.1/admin/device?filter_column%5Bdevice.number%5D%5Bsorting%5D=asc" title="Click to sort ascending">Number &nbsp; <i class="fa fa-sort"></i></a></th><th width="auto"><a href="http://127.0.0.1/admin/device?filter_column%5Bdevice.name%5D%5Bsorting%5D=asc" title="Click to sort ascending">SessionId &nbsp; <i class="fa fa-sort"></i></a></th><th width="auto"><a href="http://127.0.0.1/admin/device?filter_column%5Bdevice.description%5D%5Bsorting%5D=asc" title="Click to sort ascending">Description &nbsp; <i class="fa fa-sort"></i></a></th><th width="auto"><a href="http://127.0.0.1/admin/device?filter_column%5Bdevice.status%5D%5Bsorting%5D=asc" title="Click to sort ascending">Status &nbsp; <i class="fa fa-sort"></i></a></th>
                                                <th width="auto" style="text-align:right">Action</th>
                                    </tr>
        </thead>
        <tbody>


                            <tr>

                                            <td><input type="checkbox" class="checkbox" name="checkbox[]" value="7"></td>
                                            <td></td>
                                            <td>+1 (402) 223-8488</td>
                                            <td>Conner and Barron Traders</td>
                                            <td></td>
                                            <td><span class="badge bg-red">Disconnected</span></td>
                                            <td><div class="button_action" style="text-align:right"><a class="btn btn-xs btn-success" title="Scan" onclick="" href="http://127.0.0.1/admin/device/scan/7" target="_self"><i class="fa fa-qrcode"></i> Scan</a>&nbsp;

            <a class="btn btn-xs btn-primary btn-detail" title="Detail Data" href="http://127.0.0.1/admin/device/detail/7?return_url=http%3A%2F%2F127.0.0.1%2Fadmin%2Fdevice"><i class="fa fa-eye"></i></a>

            <a class="btn btn-xs btn-success btn-edit" title="Edit Data" href="http://127.0.0.1/admin/device/edit/7?return_url=http%3A%2F%2F127.0.0.1%2Fadmin%2Fdevice&amp;parent_id=&amp;parent_field="><i class="fa fa-pencil"></i></a>

                    <a class="btn btn-xs btn-warning btn-delete" title="Delete" href="javascript:;" onclick="swal({
				title: &quot;Are you sure ?&quot;,
				text: &quot;You will not be able to recover this record data!&quot;,
				type: &quot;warning&quot;,
				showCancelButton: true,
				confirmButtonColor: &quot;#ff0000&quot;,
				confirmButtonText: &quot;Yes!&quot;,
				cancelButtonText: &quot;No&quot;,
				closeOnConfirm: false },
				function(){  location.href=&quot;http://127.0.0.1/admin/device/delete/7&quot; });"><i class="fa fa-trash"></i></a>

</div></td>
                                    </tr>

                            <tr>

                                            <td><input type="checkbox" class="checkbox" name="checkbox[]" value="6"></td>
                                            <td></td>
                                            <td>+1 (855) 108-5954</td>
                                            <td>Dickson Joseph Plc</td>
                                            <td></td>
                                            <td><span class="badge bg-red">Disconnected</span></td>
                                            <td><div class="button_action" style="text-align:right"><a class="btn btn-xs btn-success" title="Scan" onclick="" href="http://127.0.0.1/admin/device/scan/6" target="_self"><i class="fa fa-qrcode"></i> Scan</a>&nbsp;

            <a class="btn btn-xs btn-primary btn-detail" title="Detail Data" href="http://127.0.0.1/admin/device/detail/6?return_url=http%3A%2F%2F127.0.0.1%2Fadmin%2Fdevice"><i class="fa fa-eye"></i></a>

            <a class="btn btn-xs btn-success btn-edit" title="Edit Data" href="http://127.0.0.1/admin/device/edit/6?return_url=http%3A%2F%2F127.0.0.1%2Fadmin%2Fdevice&amp;parent_id=&amp;parent_field="><i class="fa fa-pencil"></i></a>

                    <a class="btn btn-xs btn-warning btn-delete" title="Delete" href="javascript:;" onclick="swal({
				title: &quot;Are you sure ?&quot;,
				text: &quot;You will not be able to recover this record data!&quot;,
				type: &quot;warning&quot;,
				showCancelButton: true,
				confirmButtonColor: &quot;#ff0000&quot;,
				confirmButtonText: &quot;Yes!&quot;,
				cancelButtonText: &quot;No&quot;,
				closeOnConfirm: false },
				function(){  location.href=&quot;http://127.0.0.1/admin/device/delete/6&quot; });"><i class="fa fa-trash"></i></a>

</div></td>
                                    </tr>

                            <tr>

                                            <td><input type="checkbox" class="checkbox" name="checkbox[]" value="5"></td>
                                            <td></td>
                                            <td>+1 (826) 357-4326</td>
                                            <td>Dickson Joseph Plc39</td>
                                            <td></td>
                                            <td><span class="badge bg-red">Disconnected</span></td>
                                            <td><div class="button_action" style="text-align:right"><a class="btn btn-xs btn-success" title="Scan" onclick="" href="http://127.0.0.1/admin/device/scan/5" target="_self"><i class="fa fa-qrcode"></i> Scan</a>&nbsp;

            <a class="btn btn-xs btn-primary btn-detail" title="Detail Data" href="http://127.0.0.1/admin/device/detail/5?return_url=http%3A%2F%2F127.0.0.1%2Fadmin%2Fdevice"><i class="fa fa-eye"></i></a>

            <a class="btn btn-xs btn-success btn-edit" title="Edit Data" href="http://127.0.0.1/admin/device/edit/5?return_url=http%3A%2F%2F127.0.0.1%2Fadmin%2Fdevice&amp;parent_id=&amp;parent_field="><i class="fa fa-pencil"></i></a>

                    <a class="btn btn-xs btn-warning btn-delete" title="Delete" href="javascript:;" onclick="swal({
				title: &quot;Are you sure ?&quot;,
				text: &quot;You will not be able to recover this record data!&quot;,
				type: &quot;warning&quot;,
				showCancelButton: true,
				confirmButtonColor: &quot;#ff0000&quot;,
				confirmButtonText: &quot;Yes!&quot;,
				cancelButtonText: &quot;No&quot;,
				closeOnConfirm: false },
				function(){  location.href=&quot;http://127.0.0.1/admin/device/delete/5&quot; });"><i class="fa fa-trash"></i></a>

</div></td>
                                    </tr>

                            <tr>

                                            <td><input type="checkbox" class="checkbox" name="checkbox[]" value="4"></td>
                                            <td>Super Admin</td>
                                            <td>056896483</td>
                                            <td>MUSTFA9330587530125132901487636477595656753783309431</td>
                                            <td>التعليم الاكتروني</td>
                                            <td><span class="badge bg-red">Disconnected</span></td>
                                            <td><div class="button_action" style="text-align:right"><a class="btn btn-xs btn-success" title="Scan" onclick="" href="http://127.0.0.1/admin/device/scan/4" target="_self"><i class="fa fa-qrcode"></i> Scan</a>&nbsp;

            <a class="btn btn-xs btn-primary btn-detail" title="Detail Data" href="http://127.0.0.1/admin/device/detail/4?return_url=http%3A%2F%2F127.0.0.1%2Fadmin%2Fdevice"><i class="fa fa-eye"></i></a>

            <a class="btn btn-xs btn-success btn-edit" title="Edit Data" href="http://127.0.0.1/admin/device/edit/4?return_url=http%3A%2F%2F127.0.0.1%2Fadmin%2Fdevice&amp;parent_id=&amp;parent_field="><i class="fa fa-pencil"></i></a>

                    <a class="btn btn-xs btn-warning btn-delete" title="Delete" href="javascript:;" onclick="swal({
				title: &quot;Are you sure ?&quot;,
				text: &quot;You will not be able to recover this record data!&quot;,
				type: &quot;warning&quot;,
				showCancelButton: true,
				confirmButtonColor: &quot;#ff0000&quot;,
				confirmButtonText: &quot;Yes!&quot;,
				cancelButtonText: &quot;No&quot;,
				closeOnConfirm: false },
				function(){  location.href=&quot;http://127.0.0.1/admin/device/delete/4&quot; });"><i class="fa fa-trash"></i></a>

</div></td>
                                    </tr>

                            <tr>

                                            <td><input type="checkbox" class="checkbox" name="checkbox[]" value="3"></td>
                                            <td>Super Admin</td>
                                            <td>966560896483</td>
                                            <td>MUSTFA516916651662</td>
                                            <td>10</td>
                                            <td><span class="badge bg-red">Disconnected</span></td>
                                            <td><div class="button_action" style="text-align:right"><a class="btn btn-xs btn-success" title="Scan" onclick="" href="http://127.0.0.1/admin/device/scan/3" target="_self"><i class="fa fa-qrcode"></i> Scan</a>&nbsp;

            <a class="btn btn-xs btn-primary btn-detail" title="Detail Data" href="http://127.0.0.1/admin/device/detail/3?return_url=http%3A%2F%2F127.0.0.1%2Fadmin%2Fdevice"><i class="fa fa-eye"></i></a>

            <a class="btn btn-xs btn-success btn-edit" title="Edit Data" href="http://127.0.0.1/admin/device/edit/3?return_url=http%3A%2F%2F127.0.0.1%2Fadmin%2Fdevice&amp;parent_id=&amp;parent_field="><i class="fa fa-pencil"></i></a>

                    <a class="btn btn-xs btn-warning btn-delete" title="Delete" href="javascript:;" onclick="swal({
				title: &quot;Are you sure ?&quot;,
				text: &quot;You will not be able to recover this record data!&quot;,
				type: &quot;warning&quot;,
				showCancelButton: true,
				confirmButtonColor: &quot;#ff0000&quot;,
				confirmButtonText: &quot;Yes!&quot;,
				cancelButtonText: &quot;No&quot;,
				closeOnConfirm: false },
				function(){  location.href=&quot;http://127.0.0.1/admin/device/delete/3&quot; });"><i class="fa fa-trash"></i></a>

</div></td>
                                    </tr>
                        </tbody>


        <tfoot>
        <tr>
                        <th>&nbsp;</th>


            <th width="auto">Users</th><th width="auto">Number</th><th width="auto">SessionId</th><th width="auto">Description</th><th width="auto">Status</th>
                                                <th> -</th>
                                    </tr>
        </tfoot>
    </table>

</form><!--END FORM TABLE-->

<div class="col-md-8"></div>
<div class="col-md-4"><span class="pull-right">Total rows
        : 1 to 5 of 5</span></div>

            </div>
    </div>


        </section><!-- /.content -->
    </div>


@include('crudbooster::admin_template_plugins')

<!-- load js -->
@if($load_js)
    @foreach($load_js as $js)
        <script src="{{$js}}"></script>
    @endforeach
@endif
<script type="text/javascript">
    var site_url = "{{url('/')}}";
    @if($script_js)
        {!! $script_js !!}
    @endif
</script>

@stack('bottom')

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
</body>
</html>
