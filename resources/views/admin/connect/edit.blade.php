@extends('layouts.app')

@section('content')
    <div class="hk-pg-wrapper">
        <!-- Breadcrumb -->
        <nav class="hk-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light bg-transparent">
                <li class="breadcrumb-item"><a href="#">Connection Request Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Requests</li>
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
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                                data-feather="align-left"></i></span></span>Request Connection </h4>
                <a href="{{ route('request_con.index') }}">
                    <button class="btn btn-primary btn-sm">Back</button>
                </a>
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
                        <h5 class="hk-sec-title">Edit Request Package</h5>
                        <p class="mb-25"> Assign User Router Ip </p>
                        <div class="row">
                            <div class="col-sm">
                                {!! Form::model($con, ['method' => 'PATCH','route' => ['request_con.update', $con->id]]) !!}
                                @csrf
                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="Status">Router IP</label>
                                            <select id="Status" name="router_ip"
                                                    class="form-control custom-select d-block w-100">
                                                @foreach ($ips as $ip)
                                                    <option value="{{$ip->router_ip}}">{{$ip->router_ip}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="user">User</label>
                                            <input class="form-control" id="user" readonly name="username"
                                                   value="{{$con->username}}" type="text">
                                        </div>
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
