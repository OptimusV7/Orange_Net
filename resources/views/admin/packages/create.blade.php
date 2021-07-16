@extends('layouts.app')

@section('content')
    <div class="hk-pg-wrapper">
        <!-- Breadcrumb -->
        <nav class="hk-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light bg-transparent">
                <li class="breadcrumb-item"><a href="#">Packages Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Packages</li>
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
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span>Create Package</h4>
            </div>
            <!-- /Title -->

            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <section class="hk-sec-wrapper">
                        <h5 class="hk-sec-title">Create Package </h5>
                        <p class="mb-25"> Assign Package as active or deactivated</p>
                        <div class="row">
                            <div class="col-sm">
                                <form method="POST" action="{{route('package.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="Name">Name</label>
                                        <input class="form-control" id="Name" name="name" placeholder="eg Bronze" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="Category">Category</label>
                                        <input class="form-control" id="Category" name="category" placeholder="eg Starter Pack " type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="Amount">Amount</label>
                                        <input class="form-control" id="Amount" name="amount" placeholder="Ksh" type="number">
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
                                        <input class="form-control" id="Description" name="description" placeholder="eg 5Mbs Dedicated" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="code">Code Ref</label>
                                        <input class="form-control" id="code" name="code" placeholder="B5MB" type="text">
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
