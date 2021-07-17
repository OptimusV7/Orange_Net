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

        <!-- Container -->
        <div class="container">

            <!-- Title -->
            <div class="hk-pg-header">
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Router Management</h4>
                <div class="d-flex">
                    <a href="{{ route('router_user.create') }}"><button class="btn btn-primary btn-sm mr-15">Assign User To Router</button></a>
                    <a href="{{ route('router.create') }}"><button class="btn btn-primary btn-sm">Add New Network Router</button></a>
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
                        <h5 class="hk-sec-title">Current Routers</h5>
                        <p class="mb-40">All Routers configured  </p>
                        <div class="row">
                            <div class="col-sm">
                                <div class="table-wrap">
                                    <table id="datable_1" class="table table-hover w-100 display pb-30">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Router IP</th>
                                            <th>Location</th>
                                            <th>Bandwidth</th>
                                            <th>MAC Address</th>
                                            <th>Status</th>
                                            <th width="280px">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $key => $sub)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $sub->router_ip }}</td>
                                                <td>{{ $sub->location }}</td>
                                                <td>{{ $sub->bandwidth }}</td>
                                                <td>{{ $sub->mac_address  }}</td>
                                                <td>
                                                    @if($sub->status == "Deactivated")
                                                        <label class="badge badge-soft-danger">Deactivated</label>
                                                    @endif
                                                    @if($sub->status == "Active")
                                                        <label class="badge badge-success">Active</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{--<a class="btn btn-sm btn-info" href="{{ route('sites.show',$sub->id) }}">Show</a>--}}
                                                    <a class="btn btn-sm btn-primary" href="{{ route('router.edit',$sub->id) }}">Edit</a>
                                                    {!! Form::open(['method' => 'DELETE','route' => ['router.destroy', $sub->id],'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                                    {!! Form::close() !!}
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
