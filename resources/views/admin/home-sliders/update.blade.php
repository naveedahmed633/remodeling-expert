@extends('layouts.admin-layout')
@section('title')
    Edit About Home Header Slider
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card card-box-shadow mt-5">

                            <div class="card-header">
                                <h3 class="card-title">Edit Home Header Slider</h3>
                                <a href="{{ route('admin.slider.list') }}" class="btn btn-primary btn-sm float-right mr-5 ">
                                    Back
                                </a>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">

                                <form action="{{ route('admin.slider.update', $find_slider->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="slug" value="header-slider">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Slider Title *</label>
                                                <input type="text" class="form-control form__field" name="title"
                                                    placeholder="Enter Heading" value="{{ $find_slider->title ?: '' }}">
                                            </div>
                                            <small class="text-danger">
                                                @error('title')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Slider Button Text *</label>
                                                <input type="text" class="form-control form__field" name="btn_text"
                                                    placeholder="Enter Heading" value="{{ $find_slider->btn_text ?: '' }}">
                                            </div>
                                            <small class="text-danger">
                                                @error('btn_text')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Slider Description *</label>
                                                <input type="text" class="form-control form__field" name="description"
                                                    placeholder="Enter Heading"
                                                    value="{{ $find_slider->description ?: '' }}">
                                            </div>
                                            <small class="text-danger">
                                                @error('description')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="topBannerImageInput">Slider Image</label><br>
                                                <input type="file" class="form-control form__field visually-hidden"
                                                    name="slider_image" id="topBannerImageInput" accept="image/*">
                                                <label for="topBannerImageInput"
                                                    class="file-input-label form__field form-control">
                                                    <i class="fas fa-camera"></i> Choose file
                                                </label>
                                                <img id="topBannerImagePreview"
                                                    src="{{ $find_slider->sliderImage('slider_image') }}"
                                                    alt="Profile Preview"
                                                    style="width: 300px; height: 200px; margin-top: 10px;">
                                            </div>
                                        </div>
                                        <div class="mx-auto mt-5">

                                            <input type="submit" class="form-control ml-3 btn btn-primary btn-sm"
                                                value="Submit">

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

        const topBannerImageInput = document.getElementById('topBannerImageInput');
        topBannerImageInput.addEventListener('change', function() {
            showImagePreview(this, 'topBannerImagePreview');

        });
    </script>
@endsection
