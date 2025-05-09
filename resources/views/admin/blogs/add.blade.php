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

        .rating input:checked ~ label:before,
        .rating:not(:checked) > label:hover:before,
        .rating:not(:checked) > label:hover ~ label:before {
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
                                <h3 class="card-title">Add Blogs</h3>
                                <a href="{{ route('admin.blogs.index') }}" class="btn btn-primary btn-sm float-right">
                                    Back
                                </a>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="row">
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Blog Title *</label>
                                                <input type="text" class="form-control form__field" name="title"
                                                    placeholder="Blog Title" value="{{ old('title') }}">
                                                <small class="text-danger">
                                                    @error('title')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>

                                        <!-- Blog Image -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="testimonialImageInput">Blog Image *</label>
                                                <input type="file" class="form-control form__field visually-hidden"
                                                    name="image" id="testimonialImageInput" accept="image/*" required>
                                                <label for="testimonialImageInput"
                                                    class="file-input-label form__field form-control">
                                                    <i class="fas fa-camera"></i> Choose file
                                                </label>
                                                <small class='text-danger'>
                                                    @error('image')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>

                                        <!-- Short Description -->
                                        <div class="col-md-12">
                                            <label for="">Blog Description *</label>
                                            <textarea name="description" id="summernote" placeholder="description" class="form-control form__field">{!! old('description') !!}</textarea>
                                            <small class="text-danger">
                                                @error('description')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="mx-auto mt-5">
                                            <div class="form-group">
                                                <input type="submit" class="form-control btn btn-primary btn-sm"
                                                    value="Submit">
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

    <!-- include summernote css/js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
             $('#summernote').summernote({
        height: 200,  // Set the height of the editor
        allowedTags: ['p', 'a', 'b', 'i', 'strong', 'em', 'ul', 'ol', 'li', 'br', 'img', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],  // Specify allowed tags
        callbacks: {
            onPaste: function (e) {
                let bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('text/html');
                e.preventDefault();
                let cleaned = $('<div>').append(bufferText).text(); // removes all tags
                document.execCommand('insertText', false, cleaned);
            }
        }
    });

            $('form').on('submit', function() {
                $('#summernote').val($('#summernote').summernote('code'));
            });
        });
    </script>
@endsection
