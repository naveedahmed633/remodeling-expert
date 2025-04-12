@extends('layouts.admin-layout')
@section('title')
    Edit Blog
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
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card card-box-shadow mt-5">

                            <div class="card-header">
                                <h3 class="card-title">Edit Blog</h3>
                                <a href="{{ route('admin.blog.list') }}" class="btn btn-primary btn-sm float-right">
                                    Back
                                </a>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">

                                <form action="{{ route('admin.blog.update', $find_blog->id) }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <!-- Customer Name -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Customer Name:</label>
                                                <input type="text" class="form-control form__field" name="heading"
                                                       placeholder="Enter Customer Name"
                                                       value="{{ $find_blog->heading ?: '' }}">
                                            </div>
                                            <small class="text-danger">
                                                @error('heading')
                                                {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        <!-- Short Description -->
                                        <div class="col-md-6">
                                            <label for="">Short Description</label>
                                            <textarea name="description" rows="4" placeholder="Description"
                                                      class="form-control form__field">{{ $find_blog->description ?? '' }}</textarea>
                                            <small class="text-danger">
                                                @error('description')
                                                {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        <!-- Meta Title -->
                                        <div class="col-md-6 mt-4">
                                            <div class="form-group">
                                                <label for="meta_title">Meta Title *</label>
                                                <input type="text" class="form-control form__field" name="meta_title"
                                                       placeholder="Enter Meta Title"
                                                       value="{{ $find_blog->meta_title ?: old('meta_title') }}">
                                            </div>
                                            <small class="text-danger">
                                                @error('meta_title')
                                                {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        <!-- Meta Description -->
                                        <div class="col-md-6 mt-4">
                                            <label for="meta_description">Meta Description *</label>
                                            <textarea name="meta_description" rows="4" placeholder="Enter Meta Description"
                                                      class="form-control form__field">{{ $find_blog->meta_description ?: old('meta_description') }}</textarea>
                                            <small class="text-danger">
                                                @error('meta_description')
                                                {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        <!-- Blog Image -->
                                        <div class="col-md-12 mt-4">
                                            <div class="form-group">
                                                <label for="testimonialImageInput">Blog Image:</label>
                                                <input type="file" class="form-control form__field visually-hidden"
                                                       name="blog_image" id="testimonialImageInput" accept="image/*">
                                                <label for="testimonialImageInput"
                                                       class="file-input-label form__field form-control">
                                                    <i class="fas fa-camera"></i> Choose file
                                                </label>
                                            </div>
                                            <img id="testimonialImagePreview"
                                                 src="{{ $find_blog->blogImage('blog_image') ?: asset('upload/placeholder.png') }}"
                                                 alt="Profile Preview"
                                                 style="width: 200px; height: 150px; margin-top: 10px;">
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

    <!-- /.content-wrapper -->
@endsection

@section('script')
    <script>
        $('#summernote1').summernote({
            placeholder: 'Hello Admin',
            tabsize: 2,
            height: 100
        });
    </script>
    <script>
        function showImagePreview(input, previewId) {
            const preview = document.getElementById(previewId);

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        const imageInput = document.getElementById('testimonialImageInput');
        imageInput.addEventListener('change', function() {
            showImagePreview(this, 'testimonialImagePreview');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('input[name="star_rated"]').on('click', function() {
                var selectedValue = $(this).val();

                $('.rating .fa-star').removeClass('active-star');

                for (var i = 1; i <= selectedValue; i++) {
                    $('.rating #rating' + i).addClass('active-star');
                }
            });
        });
    </script>
@endsection
