@extends('layouts.admin-layout')
@section('title')
    Add Podcast
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

                                <h3 class="card-title">Add Podcasts</h3>
                                <a href="{{ route('admin.podcast.list') }}" class="btn btn-primary btn-sm float-right">
                                    Back

                                </a>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('admin.podcast.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Name">Title *</label>
                                                <input type="text" class="form-control form__field" name="title"
                                                    value="{{ old('title' ?? '') }}">
                                            </div>

                                            <small class="text-danger">
                                                @error('title')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Name">Video link *</label>
                                                <input type="text" class="form-control form__field" name="video_link"
                                                    placeholder="Enter Customer Name " value="{{ old('video_link' ?? '') }}">
                                            </div>

                                            <small class="text-danger">
                                                @error('video_link')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Name">Audio link *</label>
                                                <input type="text" class="form-control form__field" name="audio_link"
                                                    placeholder="Enter Customer Name " value="{{ old('audio_link' ?? '') }}">
                                            </div>

                                            <small class="text-danger">
                                                @error('audio_link')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                      


                                        <div class="col-md-12 mt-4">
                                            <div class="form-group">
                                                <label for="testimonialImageInput">Podcast Image *</label>
                                                <input type="file" class="form-control form__field visually-hidden"
                                                    name="podcast_image" id="testimonialImageInput"accept="image/*">
                                                <label for="testimonialImageInput"
                                                    class="file-input-label form__field form-control">
                                                    <i class="fas fa-camera"></i> Choose file
                                                </label>

                                                <small class='text-danger'>
                                                    @error('podcast_image')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>

                                            <img id="testimonialImagePreview" src="{{ asset('upload/No-Image.png') }}"
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
@endsection
