@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="hk-pg-wrapper">
        <!-- Breadcrumb -->
        <nav class="hk-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light bg-transparent">
                <li class="breadcrumb-item"><a href="#">Packages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Internet Packages Available</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <!-- Container -->
        <div class="container">

            <!-- Title -->
            <div class="hk-pg-header">
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="layers"></i></span></span>Internet Packages</h4>
            </div>
            <!-- /Title -->
            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <section class="hk-sec-wrapper">
                        <h5 class="hk-sec-title">Packages</h5>
                        <p class="mb-40">Here you can choose an internet package that suites you</p>
                        <div class="row">
                            <div class="col-sm">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                                        <div class="card card-sm">
                                            <div class="card-header">
                                                Bronze Package
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">Home Internet</h5>
                                                <p class="card-text">
                                                    5Mbs Internet Connection. Best to use in small settings
                                                </p>
                                                <button type="button" class="btn btn-gradient-ashes" data-toggle="modal" data-target="#exampleModalForms">
                                                    Buy Bronze Package
                                                </button>
                                            </div>
                                            <!-- Modal forms-->
                                            <div class="modal fade" id="exampleModalForms" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Pay Here (SAFARICOM)</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('buy_package')}}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="user_id" value="{{Auth::user()->name}}">
                                                                <div class="form-group">
                                                                    <label for="package">Subscipiton package</label>
                                                                    <input type="text" class="form-control" id="package" name="package" value="HOME 5MB PACKAGE" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="amount">Amount(KSH)</label>
                                                                    <input type="email" class="form-control" id="amount" name="amount" value="1" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="phone">Phone Number</label>
                                                                    <small id="phone" class="form-text text-muted">
                                                                        Please enter a valid Safaricom Phone number.
                                                                    </small>
                                                                    <input type="number" class="form-control" id="phone" name="phone" aria-describedby="phone" required
                                                                           maxlength="10">
                                                                </div>
                                                                <button type="submit" class="tst1 btn btn-gradient-ashes btn-block">Pay</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                                        <div class="card card-sm">
                                            <div class="card-header">
                                                Silver Package
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">Fast Internet</h5>
                                                <p class="card-text">
                                                    10Mbs Internet Connection. For Gaming and Streaming HD videos
                                                </p>
                                                <div id="button" class="btn btn-gradient-ashes">Buy Silver Package</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="card card-sm">
                                            <div class="card-header">
                                                Gold Package
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">Extra Fast Internet</h5>
                                                <p class="card-text">
                                                    25Mbs Internet Connection. For Gaming, Office use and Streaming 4K videos.
                                                </p>
                                                <div id="button" class="btn btn-gradient-ashes">Buy Gold Package</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- /Row -->
        </div>
        <!-- /Container -->


        <!-- /Main Content -->
@endsection
