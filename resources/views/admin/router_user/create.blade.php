@extends('layouts.app')

@section('content')
    <div class="hk-pg-wrapper">
        <!-- Breadcrumb -->
        <nav class="hk-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light bg-transparent">
                <li class="breadcrumb-item"><a href="#">User Router Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Router</li>
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
        @if ($message = Session::get('success'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif

        <!-- Container -->
        <div class="container">
            <!-- Title -->
            <div class="hk-pg-header">
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span>Create User Router</h4>
            </div>
            <!-- /Title -->

            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <section class="hk-sec-wrapper">
                        <h5 class="hk-sec-title">User Router </h5>
                        <p class="mb-25"> Create User Router and assign Router</p>
                        <div class="row">
                            <div class="col-sm">
                                <form method="POST" action="{{route('router_user.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="Status">Router IP</label>
                                                <select id="Status" name="router_ip" class="form-control custom-select d-block w-100" >
                                                    @foreach ($location as $key => $site)
                                                        <option value="{{$site->router_ip}}">{{$site->router_ip}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="Status">User</label>
                                                <select id="Status" name="user_id" class="form-control custom-select d-block w-100" >
                                                    @foreach ($user as $key => $customer)
                                                        <option value="{{$customer->user_id}}">{{$customer->user_id}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="Amount">Date Form</label>
                                        <input class="form-control" id="Amount" name="start_date" placeholder="From" type="date">
                                    </div>

                                    <div class="form-group">
                                        <label for="Description">Date To</label>
                                        <input class="form-control" id="Description" name="expire_date" placeholder="To" type="date">
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
