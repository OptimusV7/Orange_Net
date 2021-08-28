@extends('layouts.app')

@section('content')
    <div class="hk-pg-wrapper">
        <!-- Breadcrumb -->
        <nav class="hk-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light bg-transparent">
                <li class="breadcrumb-item"><a href="#">Subscribers</a></li>
                <li class="breadcrumb-item active" aria-current="page">All Subscribers</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <!-- Container -->
        <div class="container">

            <!-- Title -->
            <div class="hk-pg-header">
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Customers Summary</h4>
            </div>
            <!-- /Title -->

            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <section class="hk-sec-wrapper">
                        <h5 class="hk-sec-title">All Subscribers</h5>
                        <p class="mb-40">Subscribers/Customers </p>
                        <div class="row">
                            <div class="col-sm">
                                <div class="table-wrap">
                                    <table id="datable_1" class="table table-hover w-100 display pb-30">
                                        <thead>
                                        <tr>
                                            <th>Trn Ref</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Package</th>
                                            <th>Amount</th>
                                            <th>Start date</th>
                                            <th>Expire date</th>
                                            <th>Router Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $key => $sub)
                                            <tr>
                                                <td>{{$sub->txn_ref}}</td>
                                                <td>{{$sub->user_id}}</td>
                                                <td>{{$sub->msisdn}}</td>
                                                <td>{{$sub->package_name}}</td>
                                                <td>{{$sub->amount}}</td>
                                                <td>{{$sub->subscription_date}}</td>
                                                <td>{{$sub->expire_date}}</td>
                                                <td>
                                                    @if($sub->subscription_status == "Payed")
                                                        <label class="badge badge-success">{{$sub->router_ip}}-{{ $sub->subscription_status }}</label>
                                                    @endif
                                                    @if($sub->subscription_status == "Active")
                                                        <label class="badge badge-success">{{$sub->router_ip}}-{{ $sub->subscription_status }}</label>
                                                    @endif
                                                    @if($sub->subscription_status == "Deactivated")
                                                        <label class="badge badge-danger">{{$sub->router_ip}}-{{ $sub->subscription_status }}</label>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- /Row -->

        </div>
        <!-- /Container -->

    </div>
@endsection
