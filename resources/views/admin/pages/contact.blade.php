@extends('layouts.admin-layout')
@section('title')
    Update Contact
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
            @csrf
            <!-- Hidden media collection inputs -->
            @foreach(['banner_image', 'get_started_today_image'] as $media)
                <input type="hidden" name="media_collections[]" value="{{ $media }}">
            @endforeach

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

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-box-shadow mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Contact Details Section</h3>
                                </div>
            
                                <div class="card-body">
                                    <div class="row">
            
                                        <!-- Address Section -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="address_heading">Address Heading</label>
                                                <input type="text" class="form-control" name="address_heading"
                                                       placeholder="Enter Address Heading"
                                                       value="{{ old('address_heading', $content['address_heading'] ?? '') }}">
                                            </div>
            
                                            <div class="form-group">
                                                <label for="address_description_1">Address Description Line 1</label>
                                                <input type="text" class="form-control" name="address_description_1"
                                                       placeholder="Enter Address Description Line 1"
                                                       value="{{ old('address_description_1', $content['address_description_1'] ?? '') }}">
                                            </div>
            
                                            <div class="form-group">
                                                <label for="address_description_2">Address Description Line 2</label>
                                                <input type="text" class="form-control" name="address_description_2"
                                                       placeholder="Enter Address Description Line 2"
                                                       value="{{ old('address_description_2', $content['address_description_2'] ?? '') }}">
                                            </div>
                                        </div>
            
                                        <!-- Office Hours Section -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="office_hours_heading">Office Hours Heading</label>
                                                <input type="text" class="form-control" name="office_hours_heading"
                                                       placeholder="Enter Office Hours Heading"
                                                       value="{{ old('office_hours_heading', $content['office_hours_heading'] ?? '') }}">
                                            </div>
            
                                            <div class="form-group">
                                                <label for="office_hours_description_1">Office Hours Description Line 1</label>
                                                <input type="text" class="form-control" name="office_hours_description_1"
                                                       placeholder="Enter Office Hours Description Line 1"
                                                       value="{{ old('office_hours_description_1', $content['office_hours_description_1'] ?? '') }}">
                                            </div>
            
                                            <div class="form-group">
                                                <label for="office_hours_description_2">Office Hours Description Line 2</label>
                                                <input type="text" class="form-control" name="office_hours_description_2"
                                                       placeholder="Enter Office Hours Description Line 2"
                                                       value="{{ old('office_hours_description_2', $content['office_hours_description_2'] ?? '') }}">
                                            </div>
                                        </div>
            
                                        <!-- Phone Number Section -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="phone_number_heading">Phone Number Heading</label>
                                                <input type="text" class="form-control" name="phone_number_heading"
                                                       placeholder="Enter Phone Number Heading"
                                                       value="{{ old('phone_number_heading', $content['phone_number_heading'] ?? '') }}">
                                            </div>
            
                                            <div class="form-group">
                                                <label for="phone_number_description_1">Phone Number Description Line 1</label>
                                                <input type="text" class="form-control" name="phone_number_description_1"
                                                       placeholder="Enter Phone Number Description Line 1"
                                                       value="{{ old('phone_number_description_1', $content['phone_number_description_1'] ?? '') }}">
                                            </div>
            
                                            <div class="form-group">
                                                <label for="phone_number_description_2">Phone Number Description Line 2</label>
                                                <input type="text" class="form-control" name="phone_number_description_2"
                                                       placeholder="Enter Phone Number Description Line 2"
                                                       value="{{ old('phone_number_description_2', $content['phone_number_description_2'] ?? '') }}">
                                            </div>
                                        </div>
            
                                    </div>
                                </div> <!-- /.card-body -->
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
                                    <h3 class="card-title">Get in Touch Section</h3>
                                </div>
            
                                <div class="card-body">
                                    <div class="row">
            
                                        <!-- Heading Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="get_in_touch_heading">Heading</label>
                                                <input type="text" class="form-control" name="get_in_touch_heading"
                                                       placeholder="Enter Heading"
                                                       value="{{ old('get_in_touch_heading', $content['get_in_touch_heading'] ?? '') }}">
                                            </div>
                                        </div>
            
                                        <!-- Description Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="get_in_touch_description">Description</label>
                                                <textarea name="get_in_touch_description" class="form-control"
                                                          placeholder="Enter Description">{{ old('get_in_touch_description', $content['get_in_touch_description'] ?? '') }}</textarea>
                                            </div>
                                        </div>
            
                                        <!-- Button Text Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="get_in_touch_button_text">Button Text</label>
                                                <input type="text" class="form-control" name="get_in_touch_button_text"
                                                       placeholder="Enter Button Text"
                                                       value="{{ old('get_in_touch_button_text', $content['get_in_touch_button_text'] ?? '') }}">
                                            </div>
                                        </div>
            
                                    </div>
                                </div> <!-- /.card-body -->
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
