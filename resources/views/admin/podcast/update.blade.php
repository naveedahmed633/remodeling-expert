@extends('layouts.admin-layout')
@section('video_link')
    Edit Podcast
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
                                <h3 class="card-title">Edit Podcast</h3>
                                <a href="{{ route('admin.podcast.list') }}" class="btn btn-primary btn-sm float-right mr-5 ">

                                    Back

                                </a>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">

                                <form action="{{ route('admin.podcast.update', $find_podcast->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Title *</label>
                                                <input type="tex" class="form-control form__field" name="title"
                                                    value="{{ $find_podcast->title ?: '' }}">
                                            </div>

                                            <small class="text-danger">
                                                @error('title')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Video link *</label>
                                                <input type="url" class="form-control form__field" name="video_link"
                                                    value="{{ $find_podcast->video_link ?: '' }}">
                                            </div>
                                            <small class="text-danger">
                                                @error('video_link')
                                                    {{ $message }}
                                                @enderror
                                            </small>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Audio link *</label>
                                                <input type="url" class="form-control form__field" name="audio_link"
                                                    value="{{ $find_podcast->audio_link ?: '' }}">
                                            </div>
                                            <small class="text-danger">
                                                @error('audio_link')
                                                    {{ $message }}
                                                @enderror
                                            </small>

                                        </div>

                                        <div class="col-md-12 mt-4">
                                            <div class="form-group">
                                                <label for="testimonialImageInput">Podcast Image:</label>
                                                <input type="file" class="form-control form__field visually-hidden"
                                                    name="podcast_image" id="testimonialImageInput"accept="image/*">
                                                <label for="testimonialImageInput"
                                                    class="file-input-label form__field form-control">
                                                    <i class="fas fa-camera"></i> Choose file
                                                </label>

                                            </div>

                                            <img id="testimonialImagePreview"
                                                src="{{ $find_podcast->podcastImage('podcast_image') ?: asset('upload/placeholder.png') }}"
                                                alt="Profile Preview"
                                                style="width: 200px; height: 150px; margin-top: 10px;">

                                        </div>
                                        <div class="mx-auto mt-5">
                                            <div class="form-group">
                                                <input type="submit" class="form-control btn btn-primary btn-sm "
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
