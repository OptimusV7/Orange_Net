@extends('layouts.app')

@section('content')
    <div class="hk-pg-wrapper">
        <!-- Breadcrumb -->
        <nav class="hk-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light bg-transparent">
                <li class="breadcrumb-item"><a href="#">Router Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Routers</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Container -->
        <div class="container">
            <!-- Title -->
            <div class="hk-pg-header">
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span>Create Router</h4>
            </div>
            <!-- /Title -->

            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <section class="hk-sec-wrapper">
                        <h5 class="hk-sec-title">Router </h5>
                        <p class="mb-25"> Create Router </p>
                        <div class="row">
                            <div class="col-sm">
                                <form method="POST" action="{{route('router.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="Name">Router IP</label>
                                        <input class="form-control" id="Name" name="router_ip" placeholder="eg 190.00.00.00" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="Name">Device MAC Address</label>
                                        <input class="form-control" id="Name" name="mac_address" placeholder="eg 00:0a:95:9d:68:16" type="text">
                                    </div>

                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="Status">Bandwidth</label>
                                            <select id="Status" name="bandwidth" class="form-control custom-select d-block w-100" >
                                                @foreach ($band as $key => $bandwidth)
                                                    <option value="{{$bandwidth->speeds}}">{{$bandwidth->speeds}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="Status">Site Location</label>
                                            <select id="Status" name="location" class="form-control custom-select d-block w-100" >
                                                @foreach ($location as $key => $site)
                                                    <option value="{{$site->building_name}}">{{$site->building_name}}, {{$site->location}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="Status">Status</label>
                                            <select id="Status" name="status" class="form-control custom-select d-block w-100" >
                                                <option value="Active" selected="selected">Active</option>
                                                <option value="Deactivate">Deactivate</option>
                                            </select>
                                        </div>
                                    </div>


                                    <hr>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </form>
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
