@extends('layouts.admin-layout')
@section('title')
    Update Step Form
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
            @foreach(['hero_image_1', 'hero_image_2', 'hero_image_3', 'sports_image', 'getInTouch_image', 'benefits_image_1', 'benefits_image_2', 'benefits_image_png', 'member_image_1', 'member_image_2', 'member_image_3', 'card_image'] as $media)
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
                                                <input type="file" class="form-control form__field" name="banner_image" id="banner_image">
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
                                                <input type="text" class="form-control form__field" name="banner_section_heading"
                                                       placeholder="Enter Banner Section Heading"
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

            <!-- Transforming -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-box-shadow mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Transforming Homes Section</h3>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                        <input type="hidden" name="admin_id">
            
                                        <!-- Heading Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="transforming_homes_heading">Section Heading</label>
                                                <input type="text" class="form-control form__field" name="transforming_homes_heading"
                                                       placeholder="Enter Section Heading"
                                                       value="{{ old('transforming_homes_heading', $content['transforming_homes_heading'] ?? '') }}">
                                                <small class="text-danger">
                                                    @error('transforming_homes_heading')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>
            
                                        <!-- Image Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="transforming_homes_image">Section Image</label>
                                                <input type="file" class="form-control form__field" name="transforming_homes_image" id="transforming_homes_image">
                                                @if ($page->hasMedia('transforming_homes_image'))
                                                    <label for="existing_transforming_homes_image"></label>
                                                    @foreach ($page->getMedia('transforming_homes_image') as $media)
                                                        <img src="{{ $media->getUrl() ?? '' }}" alt="Existing Image"
                                                             style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
            
                                        <!-- Description Fields -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="transforming_homes_desc_1">Description 1</label>
                                                <textarea name="transforming_homes_desc_1" class="form-control form__field"
                                                          placeholder="Enter Description 1">{{ old('transforming_homes_desc_1', $content['transforming_homes_desc_1'] ?? '') }}</textarea>
                                                <small class="text-danger">
                                                    @error('transforming_homes_desc_1')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>
            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="transforming_homes_desc_2">Description 2</label>
                                                <textarea name="transforming_homes_desc_2" class="form-control form__field"
                                                          placeholder="Enter Description 2">{{ old('transforming_homes_desc_2', $content['transforming_homes_desc_2'] ?? '') }}</textarea>
                                                <small class="text-danger">
                                                    @error('transforming_homes_desc_2')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>
            
                                        <!-- Button Text and URL -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="transforming_homes_button_text">Button Text</label>
                                                <input type="text" class="form-control form__field" name="transforming_homes_button_text"
                                                       placeholder="Enter Button Text"
                                                       value="{{ old('transforming_homes_button_text', $content['transforming_homes_button_text'] ?? '') }}">
                                                <small class="text-danger">
                                                    @error('transforming_homes_button_text')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>
            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="transforming_homes_button_url">Button URL</label>
                                                <input type="url" class="form-control form__field" name="transforming_homes_button_url"
                                                       placeholder="Enter Button URL"
                                                       value="{{ old('transforming_homes_button_url', $content['transforming_homes_button_url'] ?? '') }}">
                                                <small class="text-danger">
                                                    @error('transforming_homes_button_url')
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

            <!-- Trusted Expert -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-box-shadow mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Trusted Experts Section</h3>
                                </div>
            
                                <div class="card-body">
                                    <div class="row">
                                        <!-- White Box Section -->
                                        <div class="col-md-12 mb-4">
                                            <div class="form-group">
                                                <label for="trusted_small_heading">Small Heading (White Box)</label>
                                                <input type="text" class="form-control" name="trusted_small_heading"
                                                       placeholder="Enter Small Heading"
                                                       value="{{ old('trusted_small_heading', $content['trusted_small_heading'] ?? '') }}">
                                            </div>
            
                                            <div class="form-group">
                                                <label for="trusted_main_heading">Main Heading (White Box)</label>
                                                <input type="text" class="form-control" name="trusted_main_heading"
                                                       placeholder="Enter Main Heading"
                                                       value="{{ old('trusted_main_heading', $content['trusted_main_heading'] ?? '') }}">
                                            </div>
            
                                            <div class="form-group">
                                                <label for="trusted_description">Description (White Box)</label>
                                                <textarea name="trusted_description" class="form-control" rows="3"
                                                          placeholder="Enter Description">{{ old('trusted_description', $content['trusted_description'] ?? '') }}</textarea>
                                            </div>
                                        </div>
            
                                        <!-- Dark Box Section -->
                                        <div class="col-md-12 bg-dark text-white p-3 rounded">
                                            <div class="form-group">
                                                <label for="dark_box_heading">Heading (Dark Box)</label>
                                                <input type="text" class="form-control" name="dark_box_heading"
                                                       placeholder="Enter Dark Box Heading"
                                                       value="{{ old('dark_box_heading', $content['dark_box_heading'] ?? '') }}">
                                            </div>
            
                                            <div class="form-group">
                                                <label for="dark_box_description">Description (Dark Box)</label>
                                                <textarea name="dark_box_description" class="form-control" rows="2"
                                                          placeholder="Enter Dark Box Description">{{ old('dark_box_description', $content['dark_box_description'] ?? '') }}</textarea>
                                            </div>
            
                                            <div class="form-group">
                                                <label for="dark_box_number">Number (e.g. Experience, Projects)</label>
                                                <input type="number" class="form-control" name="dark_box_number"
                                                       placeholder="Enter Number"
                                                       value="{{ old('dark_box_number', $content['dark_box_number'] ?? '') }}">
                                            </div>
                                        </div>
            
                                        <!-- Section Image -->
                                        <div class="col-md-12 mt-4">
                                            <div class="form-group">
                                                <label for="trusted_section_image">Section Image</label>
                                                <input type="file" class="form-control" name="trusted_section_image" id="trusted_section_image">
                                                @if ($page->hasMedia('trusted_section_image'))
                                                    @foreach ($page->getMedia('trusted_section_image') as $media)
                                                        <img src="{{ $media->getUrl() }}" alt="Section Image"
                                                             style="max-width: 200px; margin-top: 10px;">
                                                    @endforeach
                                                @endif
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
