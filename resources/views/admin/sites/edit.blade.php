@extends('layouts.app')

@section('content')
    <div class="hk-pg-wrapper">
        <!-- Breadcrumb -->
        <nav class="hk-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light bg-transparent">
                <li class="breadcrumb-item"><a href="#">Site Activation</a></li>
                <li class="breadcrumb-item active" aria-current="page">Activate Site</li>
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
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span>Edit Site</h4>
                <a href="{{ route('sites.index') }}"><button class="btn btn-primary btn-sm">Back</button></a>
            </div>
            <!-- /Title -->

            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <section class="hk-sec-wrapper">
                        <h5 class="hk-sec-title">Edit Site</h5>
                        <p class="mb-25"> Provide Accurate Location and Building Name</p>
                        <div class="row">
                            <div class="col-sm">

                                    {!! Form::model($site, ['method' => 'PATCH','route' => ['sites.update', $site->id]]) !!}
                                    @csrf
                                    <div class="form-group">
                                        <label for="building_name">Building Name</label>
                                        {!! Form::text('building_name', null, array('placeholder' => 'building_name','class' => 'form-control')) !!}
                                    </div>

                                    <div class="form-group">
                                        <label for="location">Location of Building</label>
                                        {!! Form::text('location', null, array('placeholder' => 'location','class' => 'form-control')) !!}
                                    </div>

                                    <div class="form-group">
                                        <label for="units">Number of Units</label>
                                        {!! Form::number('units', null,  array('placeholder' => 'units','class' => 'form-control')) !!}
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
