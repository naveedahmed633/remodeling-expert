@extends('layouts.admin-layout')
@section('title')
    Edit service
@endsection
@section('content')
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

        .rating label.active-star::before {
            color: #f9df4a;
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

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card card-box-shadow mt-5">
                            <div class="card-header">
                                <h3 class="card-title">Edit service</h3>
                                <a href="{{ route('admin.form.services.index') }}" class="btn btn-primary btn-sm float-right">
                                    Back
                                </a>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('admin.form.services.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                        <!-- Title -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Name">Service Title *</label>
                                                <input type="text" class="form-control form__field" name="name"
                                                    placeholder="service Name" value="{{ old('name', $category->name ?? '') }}">
                                                <small class="text-danger">
                                                    @error('name') {{ $message }} @enderror
                                                </small>
                                            </div>
                                        </div>

                                        <!-- Submit -->
                                        <div class="mx-auto mt-5">
                                            <div class="form-group">
                                                <input type="submit" class="form-control btn btn-primary btn-sm" value="Update">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 200
            });

            // Ensure description HTML gets submitted
            $('form').on('submit', function () {
                $('#summernote').val($('#summernote').summernote('code'));
            });
        });
    </script>
@endsection
