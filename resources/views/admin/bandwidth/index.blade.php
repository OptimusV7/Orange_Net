@extends('layouts.app')

@section('content')
    <div class="hk-pg-wrapper">
        <!-- Breadcrumb -->
        <nav class="hk-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light bg-transparent">
                <li class="breadcrumb-item"><a href="#">Bandwidth Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Bandwidth</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <!-- Container -->
        <div class="container">

            <!-- Title -->
            <div class="hk-pg-header">
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Bandwidth Management</h4>
                <div class="d-flex">
                    <a href="{{ route('bandwidth.create') }}"><button class="btn btn-primary btn-sm">Add New Bandwidth</button></a>
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
                        <h5 class="hk-sec-title">Current Bandwidths</h5>
                        <p class="mb-40">All bandwidths configured  </p>
                        <div class="row">
                            <div class="col-sm">
                                <div class="table-wrap">
                                    <table id="datable_1" class="table table-hover w-100 display pb-30">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Speeds</th>
                                            <th>Date From</th>
                                            <th>Date To</th>
                                            <th width="280px">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $key => $sub)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $sub->name }}</td>
                                                <td>{{ $sub->speeds }}</td>
                                                <td>{{ $sub->date_from }}</td>
                                                <td>{{ $sub->date_to  }}</td>
                                                <td>
                                                    {{--<a class="btn btn-sm btn-info" href="{{ route('sites.show',$sub->id) }}">Show</a>--}}
                                                    <a class="btn btn-sm btn-primary" href="{{ route('bandwidth.edit',$sub->id) }}">Edit</a>
                                                    {!! Form::open(['method' => 'DELETE','route' => ['bandwidth.destroy', $sub->id],'style'=>'display:inline']) !!}
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
