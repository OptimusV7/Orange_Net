@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="hk-pg-wrapper">
        <!-- Container -->
        <div class="container mt-xl-50 mt-sm-30 mt-15">
            <!-- Title -->
            <div class="hk-pg-header align-items-top">
                <div>
                    <h2 class="hk-pg-title font-weight-600 mb-10">Admin Analytics Dashboard</h2>
                    <p>Here you can manage Users, Payments, Subscribers and Internet Bandwidth.</p>
                </div>
            </div>
            <!-- /Title -->

            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="hk-row">
                        <div class="col-lg-7">

                            <div class="hk-row">
                                <div class="col-sm-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Site Visits</span>
                                                </div>
                                                <div>
                                                    <span class="badge badge-success  badge-sm">Online Users : {{$usersOnline}}</span>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="d-block display-5 text-dark mb-5">{{$users}}</span>
                                                <small class="d-block">500 Target Users</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Registered Users</span>
                                                </div>
                                                <div>
                                                    <span class="badge badge-success badge-sm">+10%</span>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="d-block display-5 text-dark mb-5">{{$count}}</span>
                                                <small class="d-block">300 Targeted</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Tickets</span>
                                                </div>
                                                <div>
                                                    <span class="badge badge-primary  badge-sm">-1.5%</span>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="d-block display-5 text-dark mb-5">2</span>
                                                <small class="d-block">10 Regular</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Earnings</span>
                                                </div>
                                                <div>
                                                    <span class="badge badge-warning  badge-sm">+60%</span>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="d-block display-5 text-dark mb-5">{{$sum}}KSH</span>
                                                <small class="d-block">100K Targeted</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-refresh">
                                <div class="refresh-container">
                                    <div class="loader-pendulums"></div>
                                </div>
                                <div class="card-header card-header-action">
                                    <h6>user statistics</h6>
                                    <div class="d-flex align-items-center card-action-wrap">
                                        <a href="#" class="inline-block refresh mr-15">
                                            <i class="ion ion-md-radio-button-off"></i>
                                        </a>
                                        <div class="inline-block dropdown">
                                            <a class="dropdown-toggle no-caret" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="ion ion-md-more"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="hk-legend-wrap mb-20">
                                        <div class="hk-legend">
                                            <span class="d-10 bg-purple rounded-circle d-inline-block"></span><span>Desktop</span>
                                        </div>
                                        <div class="hk-legend">
                                            <span class="d-10 bg-grey-light-2 rounded-circle d-inline-block"></span><span>Mobile</span>
                                        </div>
                                    </div>
                                    <div id="e_chart_4" style="height:300px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="card">
                                <div class="card-header card-header-action">
                                    <h6>Visit by Traffic Types</h6>
                                    <div class="d-flex align-items-center card-action-wrap">
                                        <div class="inline-block dropdown">
                                            <a class="dropdown-toggle no-caret" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="ion ion-ios-more"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="e_chart_3" style="height:250px;"></div>
                                    <div class="hk-legend-wrap mt-20">
                                        <div class="hk-legend">
                                            <span class="d-10 bg-purple rounded-circle d-inline-block"></span><span>18-24</span>
                                        </div>
                                        <div class="hk-legend">
                                            <span class="d-10 bg-grey-light-1 rounded-circle d-inline-block"></span><span>25-34</span>
                                        </div>
                                        <div class="hk-legend">
                                            <span class="d-10 bg-grey-light-2  rounded-circle d-inline-block"></span><span>35-44</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="hk-legend-wrap mb-10">
                                        <div class="hk-legend">
                                            <span class="d-10 bg-purple rounded-circle d-inline-block"></span><span>Today</span>
                                        </div>
                                        <div class="hk-legend">
                                            <span class="d-10 bg-grey-light-1  rounded-circle d-inline-block"></span><span>Yesterday</span>
                                        </div>
                                    </div>
                                    <div id="e_chart_1" class="echart" style="height:200px;"></div>
                                    <div class="row mt-20">
                                        <div class="col-4">
                                            <span class="d-block text-capitalize mb-5">Previous</span>
                                            <span class="d-block font-weight-600 font-13">79.82</span>
                                        </div>
                                        <div class="col-4">
                                            <span class="d-block text-capitalize mb-5">% Change</span>
                                            <span class="d-block font-weight-600 font-13">+14.29</span>
                                        </div>
                                        <div class="col-4">
                                            <span class="d-block text-capitalize mb-5">Trend</span>
                                            <span class="block">
													<i class="zmdi zmdi-trending-down text-danger font-20"></i>
												</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->

        </div>
        <!-- /Container -->


    </div>
@endsection
