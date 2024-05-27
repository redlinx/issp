@extends('layouts/blankLayout')

@section('title', 'Login Basic - Pages')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="{{ url('/') }}" class="app-brand-link gap-2">
                                <span class="app-brand-text demo text-body fw-bold">
                                    <img height="100" src="https://ces.southernleytestateu.edu.ph/images/logo/logo.png"
                                        alt="">
                                </span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Welcome to ICT Information System </h4>
                        <p class="mb-4">Please sign-in to your account and start the adventure</p>

                        <div id="error"></div>
                        <div class="mt-2 text-center">
                            {{-- <div id="g_id_onload"
                                data-client_id="286792801028-kpng0qg6o2cbfr1jnhakb4tbqlpuokog.apps.googleusercontent.com"
                                data-callback="onSignIn">
                            </div> --}}

                            <form id="frmlogin">
                                <div id="error">
                                    <p class="text-center text-white bg-danger" id="perror"></p>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control text-center"
                                            placeholder="Enter Email" id="email">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" id="password"
                                            class="form-control text-center" placeholder="Enter Password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <button class="btn btn-primary" type="submit">Log in</button>
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                            </form>
                            {{-- <div class="g_id_signin form-control" data-type="standard"></div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('page-script')
    <script src="https://accounts.google.com/gsi/client" async defer></script>
@endsection
