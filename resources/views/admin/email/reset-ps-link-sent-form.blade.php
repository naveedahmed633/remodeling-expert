@extends('layouts.front-admin-layout')
@section('title') Reset Password
@endsection
@section('content')

    <div class="container-fluid mt-5">
        <div class="row">

            <div class=" col-md-6 col-sm-9 col-10 m-auto mt-3">
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
                        <h4 class="text-center text-muted mt-2">Admin Reset Password Link</h4>
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
                        <form method="POST" action="{{route('admin.resetlink')}}">
                            @csrf


                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control form__field" name="email" placeholder="Enter Your Email">
                            </div>


                            <div class='text-center'>
                                <button type="submit" class="btn btn-primary">Reset Password Link</button>
                                <a href="{{route('admin.login')}}" class="btn btn-primary">Login</a>

                            </div>

                        </form>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->


@endsection
