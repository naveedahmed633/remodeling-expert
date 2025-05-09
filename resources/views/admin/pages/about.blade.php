@extends('layouts.admin-layout')
@section('title')
    Update About
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
            @foreach(['banner_image', 'transforming_homes_image', 'before_after', 'after_image', 'estimate_image_1', 'estimate_image_2', 'estimate_image_3', 'estimate_image_4', 'trusted_section_image'] as $media)
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

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="transforming_homes_desc_3">Description 3</label>
                                                <textarea name="transforming_homes_desc_3" class="form-control form__field"
                                                          placeholder="Enter Description 3">{{ old('transforming_homes_desc_3', $content['transforming_homes_desc_3'] ?? '') }}</textarea>
                                                <small class="text-danger">
                                                    @error('transforming_homes_desc_3')
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

            <!-- Estimate Your Dream Home -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-box-shadow mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Estimate Your Dream Home</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <!-- Section Heading -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="estimate_section_heading">Section Heading</label>
                                                <input type="text" class="form-control"
                                                    name="estimate_section_heading" placeholder="Enter Section Heading"
                                                    value="{{ old('estimate_section_heading', $content['estimate_section_heading'] ?? '') }}">
                                            </div>
                                        </div>

                                        <!-- Section Description -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="estimate_section_description">Section Description</label>
                                                <textarea name="estimate_section_description" class="form-control" placeholder="Enter Section Description">{{ old('estimate_section_description', $content['estimate_section_description'] ?? '') }}</textarea>
                                            </div>
                                        </div>

                                        @for ($i = 1; $i <= 4; $i++)
                                            <!-- Image {{ $i }} Upload -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="estimate_image_{{ $i }}">Image
                                                        {{ $i }}</label>
                                                    <input type="file" class="form-control"
                                                        name="estimate_image_{{ $i }}"
                                                        id="estimate_image_{{ $i }}">
                                                    @if ($page->hasMedia('estimate_image_' . $i))
                                                        @foreach ($page->getMedia('estimate_image_' . $i) as $media)
                                                            <img src="{{ $media->getUrl() }}"
                                                                alt="Image {{ $i }}"
                                                                style="max-width: 200px; margin-top: 10px;">
                                                        @endforeach
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="estimate_image_heading_{{ $i }}">Image
                                                        {{ $i }} Heading</label>
                                                    <input type="text" class="form-control"
                                                        name="estimate_image_heading_{{ $i }}"
                                                        placeholder="Enter Heading for Image {{ $i }}"
                                                        value="{{ old('estimate_image_heading_' . $i, $content['estimate_image_heading_' . $i] ?? '') }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="estimate_image_desc_{{ $i }}">Image
                                                        {{ $i }} Description</label>
                                                    <textarea name="estimate_image_desc_{{ $i }}" class="form-control"
                                                        placeholder="Enter Description for Image {{ $i }}">{{ old('estimate_image_desc_' . $i, $content['estimate_image_desc_' . $i] ?? '') }}</textarea>
                                                </div>
                                            </div>
                                        @endfor

                                        <!-- Button Text -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="estimate_button_text">Button Text</label>
                                                <input type="text" class="form-control" name="estimate_button_text"
                                                    placeholder="Enter Button Text"
                                                    value="{{ old('estimate_button_text', $content['estimate_button_text'] ?? '') }}">
                                            </div>
                                        </div>

                                        <!-- Button URL -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="estimate_button_url">Button URL</label>
                                                <input type="url" class="form-control" name="estimate_button_url"
                                                    placeholder="Enter Button URL"
                                                    value="{{ old('estimate_button_url', $content['estimate_button_url'] ?? '') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Before & After -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-box-shadow mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Before and After</h3>
                                </div>
            
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Section Heading -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="before_after_heading">Section Heading</label>
                                                <input type="text" class="form-control" name="before_after_heading"
                                                       placeholder="Enter Section Heading"
                                                       value="{{ old('before_after_heading', $content['before_after_heading'] ?? '') }}">
                                            </div>
                                        </div>
            
                                        <!-- Before Image -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="before_image">Before Image</label>
                                                <input type="file" class="form-control" name="before_image" id="before_image">
                                                @if ($page->hasMedia('before_image'))
                                                    @foreach ($page->getMedia('before_image') as $media)
                                                        <img src="{{ $media->getUrl() }}" alt="Before Image"
                                                             style="max-width: 200px; margin-top: 10px;">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
            
                                        <!-- After Image -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="after_image">After Image</label>
                                                <input type="file" class="form-control" name="after_image" id="after_image">
                                                @if ($page->hasMedia('after_image'))
                                                    @foreach ($page->getMedia('after_image') as $media)
                                                        <img src="{{ $media->getUrl() }}" alt="After Image"
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
                                                <input type="text" class="form-control" name="dark_box_number"
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
