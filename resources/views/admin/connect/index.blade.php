@extends('layouts.app')

@section('content')
    <div class="hk-pg-wrapper">
        <!-- Breadcrumb -->
        <nav class="hk-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light bg-transparent">
                <li class="breadcrumb-item"><a href="#">Requests Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Requests</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <!-- Container -->
        <div class="container">

            <!-- Title -->
            <div class="hk-pg-header">
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span> New Customer Request Management</h4>
                <div class="d-flex">
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
                        <h5 class="hk-sec-title">View Requests</h5>
                        <p class="mb-40">All Requests </p>
                        <div class="row">
                            <div class="col-sm">
                                <div class="table-wrap">
                                    <table id="datable_1" class="table table-hover w-100 display pb-30">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Phone</th>
                                            <th>Package</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th width="280px">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $key => $con)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $con->username }}</td>
                                            <td>{{ $con->phone }}</td>
                                            <td>{{ $con->package }}</td>
                                            <td>{{ $con->amount }}Ksh</td>
                                            <td>

                                                @if($con->status == "Pending Connection")
                                                    <label class="badge badge-info">Pending Connection</label>
                                                @endif
                                                @if($con->status == "Rejected")
                                                    <label class="badge badge-danger">Rejected</label>
                                                @endif
                                                @if($con->status == "Connected")
                                                    <label class="badge badge-success">Connected</label>
                                                @endif

                                            </td>
                                            <td>
                                                {{--<a class="btn btn-sm btn-info" href="{{ route('package.show',$package->id) }}">Show</a>--}}
                                                @if($con->status == "Pending Connection")
                                                    <a class="btn btn-sm btn-success" href="{{ route('request_con.edit',$con->id) }}">Connect</a>
                                                    {!! Form::open(['method' => 'DELETE','route' => ['request_con.destroy', $con->id],'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Reject', ['class' => 'btn btn-sm btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                @endif
                                                @if($con->status == "Activated" ||$con->status == "Rejected" )
                                                <a class="btn btn-sm btn-info" href="{{ route('request_con.show',$con->id) }}">Show</a>
                                                    @endif
                                            </td>
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
