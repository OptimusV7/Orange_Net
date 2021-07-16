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
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span>Edit Router</h4>
                <a href="{{ route('bandwidth.index') }}"><button class="btn btn-primary btn-sm">Back</button></a>
            </div>
            <!-- /Title -->

            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <section class="hk-sec-wrapper">
                        <h5 class="hk-sec-title">Edit Router</h5>
                        <p class="mb-25">  Edit Router and assign bandwidth and location</p>
                        <div class="row">
                            <div class="col-sm">

                                {!! Form::model($router, ['method' => 'PATCH','route' => ['router.update', $router->id ]]) !!}
                                    @csrf

                                <div class="form-group">
                                    <label for="Name">Router IP</label>
                                    {!! Form::text('router_ip', null, array('placeholder' => 'eg 190.00.00.00 ','class' => 'form-control')) !!}
                                </div>


                                <div class="form-group">
                                    <label for="Name">MAC Address</label>
                                    {!! Form::text('mac_address', null, array('placeholder' => 'eg 00:0a:95:9d:68:16 ','class' => 'form-control')) !!}
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
                                {!! Form::close() !!}

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
