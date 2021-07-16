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
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span>Edit Bandwidth</h4>
                <a href="{{ route('bandwidth.index') }}"><button class="btn btn-primary btn-sm">Back</button></a>
            </div>
            <!-- /Title -->

            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <section class="hk-sec-wrapper">
                        <h5 class="hk-sec-title">Edit Bandwidth</h5>
                        <p class="mb-25">  Edit Bandwidth and assign dates</p>
                        <div class="row">
                            <div class="col-sm">

                                {!! Form::model($bandwidth, ['method' => 'PATCH','route' => ['bandwidth.update', $bandwidth->id ]]) !!}
                                    @csrf

                                <div class="form-group">
                                    <label for="Name">Name</label>
                                    {!! Form::text('name', null, array('placeholder' => 'eg Dedicated ','class' => 'form-control')) !!}
                                </div>

                                <div class="form-group">
                                    <label for="Category">Allocate Speed</label>

                                    {!! Form::text('speeds', null, array('placeholder' => 'eg 20mbs','class' => 'form-control')) !!}
                                </div>

                                <div class="form-group">
                                    <label for="Amount">Date Form</label>

                                    {!! Form::date('date_from', null, array('placeholder' => 'From','class' => 'form-control')) !!}
                                </div>

                                <div class="form-group">
                                    <label for="Description">Date To</label>

                                    {!! Form::date('date_to', null, array('placeholder' => 'To','class' => 'form-control')) !!}
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
