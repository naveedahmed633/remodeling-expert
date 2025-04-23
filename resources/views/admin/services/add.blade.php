@extends('layouts.admin-layout')
@section('title')
    Add Blog
@endsection
@section('content')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <style>
        .active {
            background-color: #007BFF !important;
            color: white !important;
        }

        .rating {
            width: 400px;
            height: 50px;
            margin: 0 auto;
            padding: 1px 99px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background: #f9f9f9;
        }

        .rating label {
            float: right;
            position: relative;
            width: 40px;
            height: 40px;
            cursor: pointer;
        }

        .rating label:not(:first-of-type) {
            padding-right: 2px;
        }

        .rating label:before {
            content: "\2605";
            font-size: 42px;
            color: #ccc;
            line-height: 1;
        }

        .rating input {
            display: none;
        }

        .rating input:checked~label:before,
        .rating:not(:checked)>label:hover:before,
        .rating:not(:checked)>label:hover~label:before {
            color: #f9df4a;
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-box-shadow mt-5">
                            <div class="card-header">
                                <h3 class="card-title">Add Service</h3>
                                <a href="{{ route('admin.service.index') }}" class="btn btn-primary btn-sm float-right">
                                    Back
                                </a>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                        <!-- Service Title -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Service Title *</label>
                                                <input type="text" class="form-control form__field" name="title"
                                                    placeholder="Service Title" value="{{ old('title') }}">
                                            </div>
                                            <small class="text-danger">
                                                @error('title')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        <!-- Blog Image -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="testimonialImageInput">Blog Image *</label>
                                                <input type="file" class="form-control form__field visually-hidden" name="image"
                                                    id="testimonialImageInput" accept="image/*">
                                                <label for="testimonialImageInput" class="file-input-label form__field form-control">
                                                    <i class="fas fa-camera"></i> Choose file
                                                </label>
                                                <small class='text-danger'>
                                                    @error('image')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>

                                        <!-- Service Description -->
                                        <div class="col-md-12">
                                            <label for="">Service Description *</label>
                                            <textarea name="description" id="summernote" placeholder="Description"
                                                class="form-control form__field">{{ old('description') }}</textarea>
                                            <small class="text-danger">
                                                @error('description')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="mx-auto mt-5">
                                            <div class="form-group">
                                                <input type="submit" class="form-control btn btn-primary btn-sm" value="Submit">
                                            </div>
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

    <!-- Include Summernote CSS/JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200
            });

            // Ensuring Summernote content is saved in the textarea
            $('form').on('submit', function() {
                $('#summernote').val($('#summernote').summernote('code'));
            });
        });
    </script>
@endsection
