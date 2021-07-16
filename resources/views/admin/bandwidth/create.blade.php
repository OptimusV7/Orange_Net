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
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span>Create Bandwidth</h4>
            </div>
            <!-- /Title -->

            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <section class="hk-sec-wrapper">
                        <h5 class="hk-sec-title">Bandwidth </h5>
                        <p class="mb-25"> Create Bandwidth and assign dates</p>
                        <div class="row">
                            <div class="col-sm">
                                <form method="POST" action="{{route('bandwidth.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="Name">Name</label>
                                        <input class="form-control" id="Name" name="name" placeholder="eg Dedicated" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="Category">Allocated Speed</label>
                                        <input class="form-control" id="Category" name="speed" placeholder="eg 20mbs " type="number">
                                    </div>

                                    <div class="form-group">
                                        <label for="Amount">Date Form</label>
                                        <input class="form-control" id="Amount" name="date_from" placeholder="From" type="date">
                                    </div>

                                    <div class="form-group">
                                        <label for="Description">Date To</label>
                                        <input class="form-control" id="Description" name="date_to" placeholder="To" type="date">
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
