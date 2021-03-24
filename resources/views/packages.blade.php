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
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                                data-feather="layers"></i></span></span>Internet Packages</h4>
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
                                    @foreach($packages as $key => $package)
                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                                        <div class="card card-sm">
                                            <div class="card-header">
                                                {{$package->category}}
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{$package->name}}</h5>
                                                <p class="card-text">
                                                    {{$package->description}}
                                                </p>
                                                <a href="{{route('checkout',['id'=>$package->package_id])}}" class="btn btn-gradient-ashes">
                                                    Buy {{$package->category}}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
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
