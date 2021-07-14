@extends('layouts.app')

@section('content')
    <div class="hk-pg-wrapper">
        <!-- Breadcrumb -->
        <nav class="hk-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light bg-transparent">
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Management</li>
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
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span>Create User</h4>
            </div>
            <!-- /Title -->

            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <section class="hk-sec-wrapper">
                        <h5 class="hk-sec-title">Create User With Roles</h5>
                        <p class="mb-25"> Assign Role to New user</p>
                        <div class="row">
                            <div class="col-sm">
                                <form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">@</span>
                                            </div>
                                            <input class="form-control" id="username" name="name" placeholder="Username" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control" id="email" name="email" placeholder="you@example.com" type="email">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Password</label>
                                        <input class="form-control" id="password" name="password" placeholder="Password" type="password">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Confirm Password</label>
                                        <input class="form-control" id="password" name="confirm-password" placeholder="Confirm Password" type="password">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Role</label>
                                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','custom-select','d-block','w-100','multiple')) !!}
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
