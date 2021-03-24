@extends('layouts.app')

@section('content')
    <div class="hk-pg-wrapper">
        <!-- Container -->
        <div class="container mt-xl-50 mt-sm-30 mt-15">
            <!-- Title -->
            <div class="hk-pg-header align-items-top">
                <div>
                    <h2 class="hk-pg-title font-weight-600 mb-10">Customer Dashboard</h2>
                    <p>Questions about subscribing to internet Packages? <a href="#">Learn more.</a></p>
                </div>
            </div>
            <!-- /Title -->
            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="hk-row">
                        <div class="col-lg-12">

                            <div class="hk-row">
                                <div class="col-sm-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Current Subscription</span>
                                                </div>
                                                <div>
                                                    <span class="badge badge-success  badge-md">Active</span>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="d-block display-5 text-dark mb-5">Bronze Internet</span>
                                                <small class="d-block">5Mbs Dedicated</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Payments</span>
                                                </div>
                                                <div>
                                                    <span class="badge badge-info   badge-md">History</span>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="d-block display-5 text-dark mb-5">Payments Upto date</span>
                                                <small class="d-block">Current Subscription 1200Ksh</small>
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
                                                    <span class="badge badge-primary  badge-md">Resolved</span>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="d-block display-5 text-dark mb-5">10 Tickets</span>
                                                <small class="d-block">All tickets resolved</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Bandwidth</span>
                                                </div>
                                                <div>
                                                    <span class="badge badge-info  badge-md">Upstream</span>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="d-block display-5 text-dark mb-5">25000Mbs Remaining</span>
                                                <small class="d-block">Allocated Bandwidth</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Container -->


        <!-- Footer -->
        <div class="hk-footer-wrap container">
            <footer class="footer">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <p>Built by<a href="#" class="text-dark" target="_blank">{{env('APP_NAME')}}</a> © 2021</p>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <p class="d-inline-block">Follow us</p>
                        <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-facebook"></i></span></a>
                        <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-twitter"></i></span></a>
                        <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-google-plus"></i></span></a>
                    </div>
                </div>
            </footer>
        </div>
        <!-- /Footer -->
    </div>
@endsection
