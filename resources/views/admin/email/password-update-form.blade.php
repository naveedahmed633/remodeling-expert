@extends('layouts.front-admin-layout')
@section('title') Update Password
@endsection
@section('content')


    <div class="container mt-5">
        <div class="row  d-flex justify-content-center">
            <div class="col-lg-6 col-md-9 col-sm-10 col-10">
                <div class="text-center mt-5">
                    <div class="login-img">
                        <img
                            src="{{ isset($setting) ? $setting->settingImage('header_logo') : asset('upload/No-Image.png') }}"

                            width="250">
                    </div>
                    <div class="login-logo">
                        <a href=""><h2 class="text-muted">{{$setting->site_title ?? ''}}</h2></a>

                    </div>
                </div>
                <div class="card card-box-shadow">
                    <div class="card-body">
                        <h5 class="text-center text-muted">Admin Update Password</h5>

                        @if(Session::get('success'))
                            <div style="margin:auto; max-width:450px;">
                                <div class="alert alert-success alert-dismissible  fade show text-center">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{Session::get('success')}}
                                </div>
                            </div>
                        @endif

                        @if(session::get('error'))
                            <div style="margin:auto; max-width:450px;">
                                <div class="alert alert-danger alert-dismissible  fade show text-center">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{session::get('error')}}
                                </div>
                            </div>
                        @endif

                        <form method="POST" action="{{route('admin.reset-update-password')}}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="col-lg-12 mb-3">
                                <lable> Email</lable>
                                <input type="email" name="email" class="form-control form__field mt-2 mb-1"
                                       value="{{ $email ?? old('email') }}"readonly>
                                @error('email')
                                <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>


                            <div class="col-lg-12 mb-3">
                                <lable>Password</lable>
                                <input type="password" name="password" class="form-control form__field mt-2 mb-1" placeholder="Enter Your Password">
                                @error('password')
                                <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-3">
                                <lable> Conform Password</lable>
                                <input type="password" name="confirm_password" class="form-control form__field mt-2 mb-1" placeholder="Enter Your Conform Password">
                                @error('confirm_password')
                                <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>

                            <div class='text-center'>
                                <button type="submit" class="btn btn-primary ">Update Password</button>

                                <a href="{{route('admin.login')}}" class="btn btn-primary">Login</a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
