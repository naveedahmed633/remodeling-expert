@extends('layouts.admin-layout')
@section('title')
    Update Get In Touch
@endsection
@section('content')
    <style>
        .active {
            background-color: #007BFF !important;
            color: white !important;
        }
    </style>
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <form action="{{ route('admin.pages.update', $slug) }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="media_collections[]" value="get_in_touch_banner_img">
            @csrf
            <!-- Weight List Main Heading Content Section -->
            <input type="hidden" name="slug" value="{{ $slug }}">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-box-shadow mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Update Get In Touch Content</h3>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                        <input type="hidden" name="admin_id">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">Get In Touch Bg-Image</label>
                                                <input type="file" class="form-control form__field"
                                                    name="get_in_touch_banner_img" id="cta_image">
                                                @if ($page->hasMedia('get_in_touch_banner_img'))
                                                    <label for="existing_background_banner_image"></label>
                                                    @foreach ($page->getMedia('get_in_touch_banner_img') as $media)
                                                        <img src="{{ $media->getUrl() }}"
                                                            alt="Existing Banner Image"
                                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <!-- First Input Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="main_heading">Main Heading</label>
                                                <input type="text" class="form-control form__field"
                                                    value="{{ $content['main_heading'] ?? '' }}" name="main_heading"
                                                    placeholder="Enter text to highlight in red">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-box-shadow mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Update Form Content</h3>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Hidden Admin ID (if needed for tracking) -->
                                        <input type="hidden" name="admin_id" value="{{ $content['admin_id'] ?? '' }}">

                                        <!-- Form Heading Input -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_heading">Form Heading</label>
                                                <input type="text" class="form-control form__field" name="form_heading"
                                                    value="{{ $content['form_heading'] ?? '' }}"
                                                    placeholder="Enter Form Heading">
                                            </div>
                                        </div>
                                        <!-- Form Discription Input -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_discription">Form Discription</label>
                                                <input type="text" class="form-control form__field" name="form_discription"
                                                    value="{{ $content['form_discription'] ?? '' }}"
                                                    placeholder="Enter Form Discription">
                                            </div>
                                        </div>
                                        <!-- Form Heading Input -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_btn_text">Form Button</label>
                                                <input type="text" class="form-control form__field" name="form_btn_text"
                                                    value="{{ $content['form_btn_text'] ?? '' }}"
                                                    placeholder="Enter Form Button Text">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Submit Button -->
            <div class="text-center mt-3">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-sm w-25" value="Update Content">
                </div>
            </div>
        </form>
    </div>
@endsection
