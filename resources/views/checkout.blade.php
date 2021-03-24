@extends('layouts.app')

@section('content')

    <div class="hk-pg-wrapper">
        <!-- Breadcrumb -->
        <nav class="hk-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light bg-transparent">
                <li class="breadcrumb-item"><a href="#">Checkout</a></li>
                <li class="breadcrumb-item active" aria-current="page">Payment Form</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <!-- Container -->
        <div class="container">
            <!-- Title -->
            <div class="hk-pg-header">
                <h4 class="hk-pg-title"><span class="pg-title-icon">
                        <span class="feather-icon"><i data-feather="align-left"></i></span></span>Checkout Package</h4>
            </div>
            <!-- /Title -->

            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <section class="hk-sec-wrapper">
                        <h5 class="hk-sec-title">Pay Here</h5>
                        <p class="mb-25"> Fill out the Form with accurate date and an *Active Safaricom Number*</p>
                        <div class="row">
{{--                            @if (count($errors) > 0)--}}
{{--                                <div class = "alert alert-danger">--}}
{{--                                    <ul>--}}
{{--                                        @foreach ($errors->all() as $error)--}}
{{--                                            <li>{{ $error }}</li>--}}
{{--                                        @endforeach--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            @endif--}}
                            <div class="col-sm">
                                <form action="{{route('buy_package')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{Auth::user()->name}}">
                                    <input type="hidden" name="amount" value="{{$package->amount}}">
                                    <div class="form-group">
                                        <label for="amount" style="font-weight: bolder;"><b>Amount <mark>{{$package->amount}}KSH</mark></b></label>

                                    </div>
                                    <div class="form-group">
                                        <label for="package">Subscipiton package</label>
                                        <input type="text" class="form-control" id="package" name="package" value="{{$package->name}}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <small id="phone" class="form-text text-muted">
                                            Please enter a valid Safaricom Phone number.
                                        </small>
                                        <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"  required>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <hr>
                                    <button type="submit" class="tst1 btn btn-gradient-ashes btn-block">Pay</button>
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
