@extends('layouts.admin-layout')
@section('title', 'Contact User')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Contact User Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Contact User Form</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content-header -->


        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <div class="card card-primary">

                            <div class="card-body">
                                <div class="tab-content text-center">
                                    <div class="row">
                                        <!-- left column -->
                                        <div class="col-md-12">
                                            <form class="category-form" method="post"
                                                  action="{{route('admin.contact.update',$get_contact->id)}}"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-body">
                                                    <a href="{{route('admin.contact.single')}}">
                                                        <button type="button"
                                                                class="btn btn-primary btn-sm float-right mb-5">
                                                            Back
                                                        </button>
                                                    </a>
                                                    <div class="tab-content text-center">

                                                        <div role="tabpanel" id="product">
                                                            <h2>Contact User</h2>
                                                            <br>

                                                            <div class="col-md-4 mx-auto">
                                                                <label for="">Email</label>
                                                                <input type="email" name="email" placeholder="Email"
                                                                       class="form-control"
                                                                       value="{{$get_contact->email}}" readonly>

                                                            </div>
                                                            <br>

                                                            <div class="col-md-4 mx-auto">
                                                                <label for="">Registration</label>
                                                                <input type="text" name="register_link"
                                                                       placeholder="Register link" class="form-control"
                                                                       value="https://service.demowebsitelinks.com/the-club-house/public/register"
                                                                       readonly>

                                                            </div>
                                                            <br>

                                                            <input type="submit" value="Send To Email" id="submit_btn"
                                                                   class="btn btn-primary">
                                                        </div>


                                                    </div>

                                                </div>
                                        </div>

                                        </form>

                                        <!-- /.card -->
                                    </div>
                                </div>


                            </div>

                        </div>


                        <!-- /.card -->
                    </div>
                </div>

            </div>
        </section>

    </div>
@endsection



