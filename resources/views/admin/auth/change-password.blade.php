@extends('layouts.admin-layout')
@section('title') Admin Change Password
@endsection
@section('content')
    <style>
        .active {
            background-color: #007BFF !important;
            color: white !important;
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-12">

                        <div class="card card-box-shadow mt-5">

                            <div class="card-header">
                                <h3 class="card-title">Admin Change Password</h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{route('admin.update-password')}}" method="POST"
                                      enctype="multipart/form-data"> @csrf

                                    <div class='col-md-8 offset-md-4 col-sm-9 offset-sm-3'>

                                        <div class="col-md-8 col-sm-9">

                                            <label for="Name">Email:</label>
                                            <input type="email" class="form-control" name="email"
                                                   value="{{Auth::user()->email }}" readonly style="min-height: 50px;padding: 14px;border-radius: 20px;"></div>

                                        <div class="col-md-8 col-sm-9 mt-3">

                                            <label for="Name">New Password</label>
                                            <input type="password" class="form-control form__field" name="new_password"
                                                   placeholder="Enter New Password">
                                            <span
                                                class='text-danger'>@error ('new_password'){{$message}} @enderror</span>
                                        </div>

                                        <div class="col-md-8 col-sm-9 mt-3">

                                            <label for="Name">Confirm Password</label>
                                            <input type="password" class="form-control form__field" name="confirm_password"
                                                   placeholder="Enter Confirm Password">
                                            <span
                                                class='text-danger'>@error ('confirm_password') {{$message}} @enderror</span>

                                        </div>


                                        <div class="col-md-8 col-sm-9 ">
                                            <div class="form-group">
                                                <input type="submit" class="form-control btn btn-primary btn-sm "
                                                       value="Update Password" style="margin-top:36px;"></div>
                                        </div>


                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
