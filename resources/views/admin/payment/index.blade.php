@extends('layouts.app')

@section('content')
    <div class="hk-pg-wrapper">
        <!-- Breadcrumb -->
        <nav class="hk-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light bg-transparent">
                <li class="breadcrumb-item"><a href="#">All Payments Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Subscriptions</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <!-- Container -->
        <div class="container">

            <!-- Title -->
            <div class="hk-pg-header">
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Payments Management</h4>
                <div class="d-flex">
                    <a href="{{ route('payment.index') }}"><button class="btn btn-primary btn-sm">View Invoices</button></a>
                </div>
            </div>
            <!-- /Title -->

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
        @endif

        <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <section class="hk-sec-wrapper">
                        <h5 class="hk-sec-title">Current Subscriptions and Payments</h5>
                        <p class="mb-40">All Payments  </p>
                        <div class="row">
                            <div class="col-sm">
                                <div class="table-wrap">
                                    <table id="datable_1" class="table table-hover w-100 display pb-30">
                                        <thead>
                                        <tr>
                                            <th>Trn Ref</th>
                                            <th>Account</th>
                                            <th>Amount</th>
                                            <th>Payment date</th>
                                            <th>Next Payment</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $key => $sub)
                                            <tr>
                                                <td>{{$sub->txn_ref}}</td>
                                                <td>{{$sub->account_number}}</td>
                                                <td>{{$sub->amount}}</td>
                                                <td>{{$sub->subscription_date}}</td>
                                                <td>{{$sub->expire_date}}</td>
                                                <td><label class="badge badge-success">Complete</label></td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {!! $data->render() !!}
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
