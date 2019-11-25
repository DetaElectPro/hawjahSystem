@extends('admin.layouts.admin')

@section('content')
    <!-- page content -->
    <!-- top tiles -->

    <div class="row tile_count" role="main">
        <div class="">
            <div class="row top_tiles">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 tile_stats_count">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                        <div class="count">{{ $counts['users'] }}</div>
                        <h3>Doctors</h3>
                        <p>Lorem ipsum psdea itgum rixt.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 tile_stats_count">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                        <div class="count">{{ $counts['users'] }}</div>
                        <h3>Medical</h3>
                        <p>Lorem ipsum psdea itgum rixt.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 tile_stats_count">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                        <div class="count">{{ $counts['request'] }}</div>
                        <h3>All Complete Requests</h3>
                        <p>Lorem ipsum psdea itgum rixt.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 tile_stats_count">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-comments-o"></i></div>
                        <div class="count">{{  $counts['requestActive'] - $counts['request'] }}
                            <span class="count">/</span>
                            <span class="count red">{{ $counts['request'] }}</span>
                        </div>
                        <h3>Active/Complete Request</h3>
                        <p>Lorem ipsum psdea itgum rixt.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 tile_stats_count">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                        <div class="count">{{$counts['services']}}</div>
                        <h3>Emergency Servers</h3>
                        <p>Lorem ipsum psdea itgum rixt.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 tile_stats_count">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-check-square-o"></i></div>
                        <div class="count">{{  $counts['pharmacy'] }}</div>
                        <h3>Pharmacy Request</h3>
                        <p>Lorem ipsum psdea itgum rixt.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- /top tiles -->

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Transaction Summary
                            <small>Weekly progress</small>
                        </h2>
                        <div class="filter">
                            <div id="reportrange" class="pull-right"
                                 style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-9 col-sm-12 ">
                            <div class="demo-container" style="height:280px">
                                <div id="chart_plot_02" class="demo-placeholder"></div>
                            </div>

                            <div class="tiles">
                                <div class="col-md-4 tile">
                                    <span>Total Sessions</span>
                                    <h2>231,809</h2>
                                    <span class="sparkline11 graph" style="height: 160px;">
<canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
</span>
                                </div>
                                <div class="col-md-4 tile">
                                    <span>Total Revenue</span>
                                    <h2>$231,809</h2>
                                    <span class="sparkline22 graph" style="height: 160px;">
<canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
</span>
                                </div>
                                <div class="col-md-4 tile">
                                    <span>Total Sessions</span>
                                    <h2>231,809</h2>
                                    <span class="sparkline11 graph" style="height: 160px;">
<canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
</span>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-3 col-sm-12 ">
                            <div>
                                <div class="x_title">
                                    <h2>Top Profiles</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                               role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <ul class="list-unstyled top_profiles scroll-view">
                                    <li class="media event">
                                        <a class="pull-left border-aero profile_thumb">
                                            <i class="fa fa-user aero"></i>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#">Ms. Mary Jane</a>
                                            <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                            <p>
                                                <small>12 Sales Today</small>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="media event">
                                        <a class="pull-left border-green profile_thumb">
                                            <i class="fa fa-user green"></i>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#">Ms. Mary Jane</a>
                                            <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                            <p>
                                                <small>12 Sales Today</small>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="media event">
                                        <a class="pull-left border-blue profile_thumb">
                                            <i class="fa fa-user blue"></i>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#">Ms. Mary Jane</a>
                                            <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                            <p>
                                                <small>12 Sales Today</small>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="media event">
                                        <a class="pull-left border-aero profile_thumb">
                                            <i class="fa fa-user aero"></i>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#">Ms. Mary Jane</a>
                                            <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                            <p>
                                                <small>12 Sales Today</small>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="media event">
                                        <a class="pull-left border-green profile_thumb">
                                            <i class="fa fa-user green"></i>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#">Ms. Mary Jane</a>
                                            <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                            <p>
                                                <small>12 Sales Today</small>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Weekly Summary
                            <small>Activity shares</small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row"
                             style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
                            <div class="col-md-7" style="overflow:hidden;">
<span class="sparkline_one" style="height: 160px; padding: 10px 25px;">
<canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
</span>
                                <h4 style="margin:18px">Weekly sales progress</h4>
                            </div>
                            <div class="col-md-5">
                                <div class="row" style="text-align: center;">
                                    <div class="col-md-4">
                                        <canvas class="canvasDoughnut" height="110" width="110"
                                                style="margin: 5px 10px 10px 0"></canvas>
                                        <h4 style="margin:0">Bounce Rates</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <canvas class="canvasDoughnut" height="110" width="110"
                                                style="margin: 5px 10px 10px 0"></canvas>
                                        <h4 style="margin:0">New Traffic</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <canvas class="canvasDoughnut" height="110" width="110"
                                                style="margin: 5px 10px 10px 0"></canvas>
                                        <h4 style="margin:0">Device Share</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    yoy
    {{--    <div class="row">--}}
    {{--        <div class="col-md-12 col-sm-12 col-xs-12">--}}
    {{--            <div id="log_activity" class="dashboard_graph">--}}

    {{--                <div class="row x_title">--}}
    {{--                    <div class="col-md-6">--}}
    {{--                        <h3>{{ __('views.admin.dashboard.sub_title_0') }}</h3>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-md-6">--}}
    {{--                        <div class="date_piker pull-right"--}}
    {{--                             style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">--}}
    {{--                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>--}}
    {{--                            <span class="date_piker_label">--}}
    {{--                                {{ \Carbon\Carbon::now()->addDays(-6)->format('F j, Y') }} - {{ \Carbon\Carbon::now()->format('F j, Y') }}--}}
    {{--                            </span>--}}
    {{--                            <b class="caret"></b>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <div class="col-md-9 col-sm-9 col-xs-12">--}}
    {{--                    <div class="chart demo-placeholder" style="width: 100%; height:460px;"></div>--}}
    {{--                </div>--}}


    {{--                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">--}}
    {{--                    <div class="x_title">--}}
    {{--                        <h2>{{ __('views.admin.dashboard.sub_title_1') }}</h2>--}}
    {{--                        <div class="clearfix"></div>--}}
    {{--                    </div>--}}

    {{--                    <div class="col-md-12 col-sm-12 col-xs-6">--}}
    {{--                        <div>--}}
    {{--                            <p>{{ __('views.admin.dashboard.log_level_0') }}</p>--}}
    {{--                            <div class="">--}}
    {{--                                <div class="progress progress_sm" style="width: 76%;">--}}
    {{--                                    <div class="progress-bar log-emergency" role="progressbar"--}}
    {{--                                         data-transitiongoal="0"></div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div>--}}
    {{--                            <p>{{ __('views.admin.dashboard.log_level_1') }}</p>--}}
    {{--                            <div class="">--}}
    {{--                                <div class="progress progress_sm" style="width: 76%;">--}}
    {{--                                    <div class="progress-bar log-alert" role="progressbar"--}}
    {{--                                         data-transitiongoal="0"></div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div>--}}
    {{--                            <p>{{ __('views.admin.dashboard.log_level_2') }}</p>--}}
    {{--                            <div class="">--}}
    {{--                                <div class="progress progress_sm" style="width: 76%;">--}}
    {{--                                    <div class="progress-bar log-critical" role="progressbar"--}}
    {{--                                         data-transitiongoal="0"></div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div>--}}
    {{--                            <p>{{ __('views.admin.dashboard.log_level_3') }}</p>--}}
    {{--                            <div class="">--}}
    {{--                                <div class="progress progress_sm" style="width: 76%;">--}}
    {{--                                    <div class="asdasdasd"></div>--}}
    {{--                                    <div class="progress-bar log-error" role="progressbar"--}}
    {{--                                         data-transitiongoal="0"></div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div>--}}
    {{--                            <p>{{ __('views.admin.dashboard.log_level_4') }}</p>--}}
    {{--                            <div class="">--}}
    {{--                                <div class="progress progress_sm" style="width: 76%;">--}}
    {{--                                    <div class="progress-bar log-warning" role="progressbar"--}}
    {{--                                         data-transitiongoal="0"></div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div>--}}
    {{--                            <p>{{ __('views.admin.dashboard.log_level_5') }}</p>--}}
    {{--                            <div class="">--}}
    {{--                                <div class="progress progress_sm" style="width: 76%;">--}}
    {{--                                    <div class="progress-bar log-notice" role="progressbar"--}}
    {{--                                         data-transitiongoal="0"></div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div>--}}
    {{--                            <p>{{ __('views.admin.dashboard.log_level_6') }}</p>--}}
    {{--                            <div class="">--}}
    {{--                                <div class="progress progress_sm" style="width: 76%;">--}}
    {{--                                    <div class="progress-bar log-info" role="progressbar" data-transitiongoal="0"></div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div>--}}
    {{--                            <p>{{ __('views.admin.dashboard.log_level_7') }}</p>--}}
    {{--                            <div class="">--}}
    {{--                                <div class="progress progress_sm" style="width: 76%;">--}}
    {{--                                    <div class="progress-bar log-debug" role="progressbar"--}}
    {{--                                         data-transitiongoal="0"></div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <div class="clearfix"></div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--    </div>--}}
    {{--    <br/>--}}

    {{--    <div class="row">--}}
    {{--        <div class="col-md-4 col-sm-4 col-xs-12">--}}
    {{--            <div id="registration_usage" class="x_panel tile fixed_height_320 overflow_hidden">--}}
    {{--                <div class="x_title">--}}
    {{--                    <h2>{{  __('views.admin.dashboard.sub_title_2') }}</h2>--}}
    {{--                    <ul class="nav navbar-right panel_toolbox">--}}
    {{--                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
    {{--                        </li>--}}
    {{--                        <li class="dropdown">--}}
    {{--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"--}}
    {{--                               aria-expanded="false">--}}
    {{--                                <i class="fa fa-wrench"></i>--}}
    {{--                            </a>--}}
    {{--                        </li>--}}
    {{--                        <li><a class="close-link"><i class="fa fa-close"></i></a>--}}
    {{--                        </li>--}}
    {{--                    </ul>--}}
    {{--                    <div class="clearfix"></div>--}}
    {{--                </div>--}}
    {{--                <div class="x_content">--}}
    {{--                    <table class="" style="width:100%">--}}
    {{--                        <tr>--}}
    {{--                            <th></th>--}}
    {{--                            <th>--}}
    {{--                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">--}}
    {{--                                    <p class="">{{  __('views.admin.dashboard.sub_title_3') }}</p>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">--}}
    {{--                                    <p class="">{{  __('views.admin.dashboard.sub_title_4') }}</p>--}}
    {{--                                </div>--}}
    {{--                            </th>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>--}}
    {{--                                <canvas class="canvasChart" height="140" width="140" style="margin: 15px 10px 10px 0">--}}
    {{--                                </canvas>--}}
    {{--                            </td>--}}
    {{--                            <td>--}}
    {{--                                <table class="tile_info">--}}
    {{--                                    <tr>--}}
    {{--                                        <td>--}}
    {{--                                            <p><i class="fa fa-square aero"></i>--}}
    {{--                                                <span class="tile_label">--}}
    {{--                                                     {{ __('views.admin.dashboard.source_0') }}--}}
    {{--                                                </span>--}}
    {{--                                            </p>--}}
    {{--                                        </td>--}}
    {{--                                        <td id="registration_usage_from"></td>--}}
    {{--                                    </tr>--}}
    {{--                                    <tr>--}}
    {{--                                        <td>--}}
    {{--                                            <p><i class="fa fa-square red"></i>--}}
    {{--                                                <span class="tile_label">--}}
    {{--                                                    {{ __('views.admin.dashboard.source_1') }}--}}
    {{--                                                </span>--}}
    {{--                                            </p>--}}
    {{--                                        </td>--}}
    {{--                                        <td id="registration_usage_google"></td>--}}
    {{--                                    </tr>--}}
    {{--                                    <tr>--}}
    {{--                                        <td>--}}
    {{--                                            <p><i class="fa fa-square blue"></i>--}}
    {{--                                                <span class="tile_label">--}}
    {{--                                                    {{ __('views.admin.dashboard.source_2') }}--}}
    {{--                                                </span>--}}
    {{--                                            </p>--}}
    {{--                                        </td>--}}
    {{--                                        <td id="registration_usage_facebook"></td>--}}
    {{--                                    </tr>--}}
    {{--                                    <tr>--}}
    {{--                                        <td>--}}
    {{--                                            <p><i class="fa fa-square grren"></i>--}}
    {{--                                                <span class="tile_label">--}}
    {{--                                                     {{ __('views.admin.dashboard.source_3') }}--}}
    {{--                                                </span>--}}
    {{--                                            </p>--}}
    {{--                                        </td>--}}
    {{--                                        <td id="registration_usage_twitter"></td>--}}
    {{--                                    </tr>--}}
    {{--                                </table>--}}
    {{--                            </td>--}}
    {{--                        </tr>--}}
    {{--                    </table>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection
