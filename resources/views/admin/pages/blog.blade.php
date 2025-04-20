@extends('layouts.admin-layout')
@section('title')
    Update Blog
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
            <!-- Hidden media collection inputs -->
            @foreach (['banner_image', 'get_started_today_image'] as $media)
                <input type="hidden" name="media_collections[]" value="{{ $media }}">
            @endforeach
            @csrf

            <input type="hidden" name="slug" value="{{ $slug }}">

            <!-- Banner Section -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-box-shadow mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Update Banner Section</h3>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                        <input type="hidden" name="admin_id">

                                        <!-- Banner Image Input -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="banner_image">Banner Image</label>
                                                <input type="file" class="form-control form__field" name="banner_image"
                                                    id="banner_image">
                                                @if ($page->hasMedia('banner_image'))
                                                    <label for="existing_banner_image"></label>
                                                    @foreach ($page->getMedia('banner_image') as $media)
                                                        <img src="{{ $media->getUrl() ?? '' }}" alt="Existing Banner Image"
                                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Banner Section Heading -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="banner_section_heading">Banner Section Heading</label>
                                                <input type="text" class="form-control form__field"
                                                    name="banner_section_heading" placeholder="Enter Banner Section Heading"
                                                    value="{{ old('banner_section_heading', $content['banner_section_heading'] ?? '') }}">
                                                <small class="text-danger">
                                                    @error('banner_section_heading')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
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

            <!-- Get Started Today -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-box-shadow mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Get Started Today Section</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row">

                                        <!-- Heading -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="get_started_heading">Heading</label>
                                                <input type="text" class="form-control" name="get_started_heading"
                                                    placeholder="Enter Heading"
                                                    value="{{ old('get_started_heading', $content['get_started_heading'] ?? '') }}">
                                            </div>
                                        </div>

                                        <!-- Image Upload Field -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="get_started_today_image">Image</label>
                                                <input type="file" class="form-control" name="get_started_today_image"
                                                    id="get_started_today_image">

                                                @if ($page->hasMedia('get_started_today_image'))
                                                    @foreach ($page->getMedia('get_started_today_image') as $media)
                                                        <img src="{{ $media->getUrl() ?? '' }}"
                                                            alt="Get Started Today Image"
                                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Description -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="get_started_description">Description</label>
                                                <textarea name="get_started_description" class="form-control" rows="3" placeholder="Enter Description">{{ old('get_started_description', $content['get_started_description'] ?? '') }}</textarea>
                                            </div>
                                        </div>

                                        <!-- Button Text -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="get_started_button_text">Button Text</label>
                                                <input type="text" class="form-control" name="get_started_button_text"
                                                    placeholder="Enter Button Text"
                                                    value="{{ old('get_started_button_text', $content['get_started_button_text'] ?? '') }}">
                                            </div>
                                        </div>

                                        <!-- Button URL -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="get_started_button_url">Button URL</label>
                                                <input type="url" class="form-control" name="get_started_button_url"
                                                    placeholder="Enter Button URL"
                                                    value="{{ old('get_started_button_url', $content['get_started_button_url'] ?? '') }}">
                                            </div>
                                        </div>

                                    </div>
                                </div> <!-- /.card-body -->
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
