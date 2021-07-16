@extends('layouts.app')

@section('content')
    <div class="hk-pg-wrapper">
        <!-- Breadcrumb -->
        <nav class="hk-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light bg-transparent">
                <li class="breadcrumb-item"><a href="#">Site Activation Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Site</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <!-- Container -->
        <div class="container">

            <!-- Title -->
            <div class="hk-pg-header">
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Users Management</h4>
                <div class="d-flex">
                    <a href="#" class="text-secondary mr-15"><span class="feather-icon"><i data-feather="printer"></i></span></a>
                    <a href="#" class="text-secondary mr-15"><span class="feather-icon"><i data-feather="download"></i></span></a>
                    <a href="{{ route('sites.create') }}"><button class="btn btn-primary btn-sm">Add New Site</button></a>
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
                        <h5 class="hk-sec-title">Current Sites</h5>
                        <p class="mb-40">All Sites </p>
                        <div class="row">
                            <div class="col-sm">
                                <div class="table-wrap">
                                    <table id="datable_1" class="table table-hover w-100 display pb-30">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Building Name</th>
                                            <th>Location</th>
                                            <th>Units</th>
                                            <th width="280px">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $key => $site)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $site->building_name }}</td>
                                                <td>{{ $site->location }}</td>
                                                <td>
                                                    {{ $site->units }}
                                                </td>
                                                <td>
{{--                                                    <a class="btn btn-sm btn-info" href="{{ route('sites.show',$site->id) }}">Show</a>--}}
                                                    <a class="btn btn-sm btn-primary" href="{{ route('sites.edit',$site->id) }}">Edit</a>
                                                    {!! Form::open(['method' => 'DELETE','route' => ['sites.destroy', $site->id],'style'=>'display:inline']) !!}
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
