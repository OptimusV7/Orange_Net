@extends('layouts.app')

@section('content')
    <div class="hk-pg-wrapper">
        <!-- Breadcrumb -->
        <nav class="hk-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light bg-transparent">
                <li class="breadcrumb-item"><a href="#">Request Management</a></li>
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
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span>Request Connection </h4>
                <a href="{{ route('request_con.index') }}"><button class="btn btn-primary btn-sm">Back</button></a>
            </div>
            <!-- /Title -->

            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <section class="hk-sec-wrapper">
                        <h5 class="hk-sec-title">Edit Request Package</h5>
                        <p class="mb-25"> Assign User Router Ip </p>
                        <div class="row">
                            <div class="col-sm">

                                {!! Form::model($package, ['method' => 'PATCH','route' => ['package.update', $package->id ]]) !!}
                                    @csrf

                                <div class="form-group">
                                    <label for="Name">Name</label>
                                    {!! Form::text('name', null, array('placeholder' => 'eg Bronze ','class' => 'form-control')) !!}
                                </div>

                                <div class="form-group">
                                    <label for="Category">Category</label>
                                    {!! Form::text('category', null, array('placeholder' => 'eg Starter Pack','class' => 'form-control')) !!}
                                </div>

                                <div class="form-group">
                                    <label for="Amount">Amount</label>
                                    {!! Form::number('amount', null, array('placeholder' => 'Ksh','class' => 'form-control')) !!}
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
                                    <label for="Description">Description</label>
                                    {!! Form::text('description', null, array('placeholder' => 'eg 5Mbs Dedicated','class' => 'form-control')) !!}
                                </div>

                                <div class="form-group">
                                    <label for="code">Code Ref</label>
                                    {!! Form::text('code', null, array('placeholder' => 'eg B5MB','class' => 'form-control')) !!}
                                </div>


                                <div class="form-group">
                                    <label for="Status">Status</label>
                                    <select id="Status" name="status" class="form-control custom-select d-block w-100" >
                                        <option value="Active" selected="selected">Active</option>
                                        <option value="Deactivate">Deactivate</option>
                                    </select>

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
