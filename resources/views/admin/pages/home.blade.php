@extends('layouts.admin-layout')
@section('title')
    Update Home
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
            <input type="hidden" name="media_collections[]" value="hero_image_1">
            <input type="hidden" name="media_collections[]" value="hero_image_2">
            <input type="hidden" name="media_collections[]" value="hero_image_3">
            <input type="hidden" name="media_collections[]" value="sports_image">
            <input type="hidden" name="media_collections[]" value="getInTouch_image">
            <input type="hidden" name="media_collections[]" value="benefits_image_1">
            <input type="hidden" name="media_collections[]" value="benefits_image_2">
            <input type="hidden" name="media_collections[]" value="benefits_image_png">
            <input type="hidden" name="media_collections[]" value="member_image_1">
            <input type="hidden" name="media_collections[]" value="member_image_2">
            <input type="hidden" name="media_collections[]" value="member_image_3">
            <input type="hidden" name="media_collections[]" value="card_image">
            @csrf
            <input type="hidden" name="slug" value="{{ $slug }}">

            <!-- Weight List Main Heading Content Section -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-box-shadow mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Update Weight List Main Heading Content</h3>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                        <input type="hidden" name="admin_id">

                                        <!-- First Input Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="main_heading_red">Main Heading (Highlighted in Red)</label>
                                                <input type="text" class="form-control form__field"
                                                    value="{{ $content['main_heading_red'] ?? '' }}" name="main_heading_red"
                                                    placeholder="Enter text to highlight in red">
                                            </div>
                                        </div>

                                        <!-- Second Input Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="main_heading_rest">Main Heading (Remaining Text)</label>
                                                <input type="text" class="form-control form__field form__field"
                                                    value="{{ $content['main_heading_rest'] ?? '' }}"
                                                    name="main_heading_rest" placeholder="Enter the remaining heading text"
                                                    id="main_heading_rest">
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

            <!-- Get In Touch Main Heading Content Section -->
            <section class=" content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-box-shadow mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Update "Get In Touch" Content
                                    </h3>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Hidden Admin ID (if needed for tracking) -->
                                        <input type="hidden" name="admin_id" value="{{ $content['admin_id'] ?? '' }}">

                                        <!-- Get In Touch BG-Image -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">Get In Touch BG-Image</label>
                                                <input type="file" class="form-control form__field"
                                                    name="getInTouch_image" id="cta_image">
                                                @if ($page->hasMedia('getInTouch_image'))
                                                    <label for="existing_background_banner_image"></label>
                                                    @foreach ($page->getMedia('getInTouch_image') as $media)
                                                        <img src="{{ $media->getUrl() }}"
                                                            alt="Existing Banner Image"
                                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Heading Input -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="heading">Heading</label>
                                                <input type="text" class="form-control form__field" name="heading"
                                                    value="{{ $content['heading'] ?? '' }}"
                                                    placeholder="Enter heading text">
                                            </div>
                                        </div>

                                        <!-- Heading Input -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="heading">Heading</label>
                                                <input type="text" class="form-control form__field" name="getInTouch_heading_2"
                                                    value="{{ $content['getInTouch_heading_2'] ?? '' }}"
                                                    placeholder="Enter heading text">
                                            </div>
                                        </div>

                                        <!-- Button Text Input -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="button_text">Button Text</label>
                                                <input type="text" class="form-control form__field" name="button_text"
                                                    value="{{ $content['button_text'] ?? '' }}"
                                                    placeholder="Enter button text">
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

            <!-- Hero Section -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-box-shadow mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Update Hero Section</h3>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Red-Highlighted Words -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="hero_highlighted_text">Hero Highlighted Text (Red)</label>
                                                <input type="text" class="form-control form__field"
                                                    name="hero_highlighted_text"
                                                    value="{{ $content['hero_highlighted_text'] ?? '' }}"
                                                    placeholder="Enter red-highlighted text (e.g., 'Strength in Body')">
                                            </div>
                                        </div>

                                        <!-- Remaining Heading Text -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="hero_remaining_heading">Hero Remaining Heading Text</label>
                                                <input type="text" class="form-control form__field"
                                                    name="hero_remaining_heading"
                                                    value="{{ $content['hero_remaining_heading'] ?? '' }}"
                                                    placeholder="Enter the remaining heading text (e.g., 'and Spirit')">
                                            </div>
                                        </div>

                                        <!-- Description -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="hero_description">Hero Description</label>
                                                <textarea class="form-control form__field" name="hero_description" rows="3" placeholder="Enter description text">{{ $content['hero_description'] ?? '' }}</textarea>
                                            </div>
                                        </div>

                                        <!-- Button Text -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="hero_button_text">Hero Button Text</label>
                                                <input type="text" class="form-control form__field"
                                                    name="hero_button_text"
                                                    value="{{ $content['hero_button_text'] ?? '' }}"
                                                    placeholder="Enter button text (e.g., 'Learn More')">
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

            <!-- Manage Homepage Hero Sections -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-box-shadow mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Manage Homepage Hero Sections</h3>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">

                                        <!-- First Hero Section -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">Hero Section 1 Image</label>
                                                <input type="file" class="form-control form__field"
                                                    name="hero_image_1" id="cta_image">
                                                @if ($page->hasMedia('hero_image_1'))
                                                    <label for="existing_background_banner_image"></label>
                                                    @foreach ($page->getMedia('hero_image_1') as $media)
                                                        <img src="{{ $media->getUrl() }}"
                                                            alt="Existing Banner Image"
                                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="hero_heading_1">Hero Section 1 Heading</label>
                                                <input type="text" class="form-control" name="hero_heading_1"
                                                    value="{{ $content['hero_heading_1'] ?? '' }}"
                                                    placeholder="Enter heading for Hero Section 1">
                                            </div>
                                            <div class="form-group">
                                                <label for="hero_description_1">Hero Section 1 Description</label>
                                                <textarea class="form-control" name="hero_description_1" rows="3"
                                                    placeholder="Enter description for Hero Section 1">{{ $content['hero_description_1'] ?? '' }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="hero_button_text_1">Hero Section 1 Button Text</label>
                                                <input type="text" class="form-control" name="hero_button_text_1"
                                                    value="{{ $content['hero_button_text_1'] ?? '' }}"
                                                    placeholder="Enter button text for Hero Section 1">
                                            </div>
                                        </div>

                                        <!-- Second Hero Section -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">Hero Section 2 Image</label>
                                                <input type="file" class="form-control form__field"
                                                    name="hero_image_2" id="cta_image">
                                                @if ($page->hasMedia('hero_image_2'))
                                                    <label for="existing_background_banner_image"></label>
                                                    @foreach ($page->getMedia('hero_image_2') as $media)
                                                        <img src="{{ $media->getUrl() }}"
                                                            alt="Existing Banner Image"
                                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="hero_heading_2">Hero Section 2 Heading</label>
                                                <input type="text" class="form-control" name="hero_heading_2"
                                                    value="{{ $content['hero_heading_2'] ?? '' }}"
                                                    placeholder="Enter heading for Hero Section 2">
                                            </div>
                                            <div class="form-group">
                                                <label for="hero_description_2">Hero Section 2 Description</label>
                                                <textarea class="form-control" name="hero_description_2" rows="3"
                                                    placeholder="Enter description for Hero Section 2">{{ $content['hero_description_2'] ?? '' }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="hero_button_text_2">Hero Section 2 Button Text</label>
                                                <input type="text" class="form-control" name="hero_button_text_2"
                                                    value="{{ $content['hero_button_text_2'] ?? '' }}"
                                                    placeholder="Enter button text for Hero Section 2">
                                            </div>
                                        </div>

                                        <!-- Third Hero Section -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">PNG Image</label>
                                                <input type="file" class="form-control form__field"
                                                    name="hero_image_3" id="cta_image">
                                                @if ($page->hasMedia('hero_image_3'))
                                                    <label for="existing_background_banner_image"></label>
                                                    @foreach ($page->getMedia('hero_image_3') as $media)
                                                        <img src="{{ $media->getUrl() }}"
                                                            alt="Existing Banner Image"
                                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="hero_heading_3">Hero Section 3 Heading</label>
                                                <input type="text" class="form-control" name="hero_heading_3"
                                                    value="{{ $content['hero_heading_3'] ?? '' }}"
                                                    placeholder="Enter heading for Hero Section 3">
                                            </div>
                                            <div class="form-group">
                                                <label for="hero_description_3">Hero Section 3 Description</label>
                                                <textarea class="form-control" name="hero_description_3" rows="3"
                                                    placeholder="Enter description for Hero Section 3">{{ $content['hero_description_3'] ?? '' }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="hero_button_text_3">Hero Section 3 Button Text</label>
                                                <input type="text" class="form-control" name="hero_button_text_3"
                                                    value="{{ $content['hero_button_text_3'] ?? '' }}"
                                                    placeholder="Enter button text for Hero Section 3">
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

            <!-- Benefits -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-box-shadow mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Manage Benefits Section</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- PNG Image Input -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">PNG Image</label>
                                                <input type="file" class="form-control form__field"
                                                    name="benefits_image_png" id="cta_image">
                                                @if ($page->hasMedia('benefits_image_png'))
                                                    <label for="existing_background_banner_image"></label>
                                                    @foreach ($page->getMedia('benefits_image_png') as $media)
                                                        <img src="{{ $media->getUrl() }}"
                                                            alt="Existing Banner Image"
                                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Additional Images -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">Image 1</label>
                                                <input type="file" class="form-control form__field"
                                                    name="benefits_image_1" id="cta_image">
                                                @if ($page->hasMedia('benefits_image_1'))
                                                    <label for="existing_background_banner_image"></label>
                                                    @foreach ($page->getMedia('benefits_image_1') as $media)
                                                        <img src="{{ $media->getUrl() }}"
                                                            alt="Existing Banner Image"
                                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label for="title">Image 2</label>
                                                <input type="file" class="form-control form__field"
                                                    name="benefits_image_2" id="cta_image">
                                                @if ($page->hasMedia('benefits_image_2'))
                                                    <label for="existing_background_banner_image"></label>
                                                    @foreach ($page->getMedia('benefits_image_2') as $media)
                                                        <img src="{{ $media->getUrl() }}"
                                                            alt="Existing Banner Image"
                                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Text Inputs -->
                                        <div class="col-md-12">
                                            <label for="small_heading">Small Heading</label>
                                            <input type="text" class="form-control" name="small_heading"
                                                value="{{ $content['small_heading'] ?? '' }}"
                                                placeholder="Enter Small Heading">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="benefit_heading">Heading</label>
                                            <input type="text" class="form-control" name="benefit_heading"
                                                value="{{ $content['benefit_heading'] ?? '' }}"
                                                placeholder="Enter Heading">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" name="description" rows="3" placeholder="Enter Description">{{ $content['description'] ?? '' }}</textarea>
                                        </div>

                                        <!-- Counters -->
                                        <div class="col-md-4">
                                            <label for="counter_1">Counter 1</label>
                                            <input type="text" class="form-control" name="counter_1"
                                                value="{{ $content['counter_1'] ?? '' }}" placeholder="Enter Counter 1">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="counter_2">Counter 2</label>
                                            <input type="text" class="form-control" name="counter_2"
                                                value="{{ $content['counter_2'] ?? '' }}" placeholder="Enter Counter 2">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="counter_3">Counter 3</label>
                                            <input type="text" class="form-control" name="counter_3"
                                                value="{{ $content['counter_3'] ?? '' }}" placeholder="Enter Counter 3">
                                        </div>

                                        <!-- Button Text -->
                                        <div class="col-md-12 mt-3">
                                            <label for="benefit_button_text">Button Text</label>
                                            <input type="text" class="form-control" name="benefit_button_text"
                                                value="{{ $content['benefit_button_text'] ?? '' }}"
                                                placeholder="Enter Button Text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Training Prices -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-box-shadow mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Manage Training Prices Section</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Training Small Heading Input -->
                                        <div class="col-md-12">
                                            <label for="training_small_heading">Small Heading</label>
                                            <input type="text" class="form-control" name="training_small_heading"
                                                value="{{ $content['training_small_heading'] ?? '' }}"
                                                placeholder="Enter Small Heading">
                                        </div>

                                        <!-- Training Heading Input -->
                                        <div class="col-md-12 mt-3">
                                            <label for="training_heading">Heading</label>
                                            <input type="text" class="form-control" name="training_heading"
                                                value="{{ $content['training_heading'] ?? '' }}"
                                                placeholder="Enter Heading">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Sports Motivationd -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-box-shadow mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Manage Sports Motivation Section</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        
                                        <!-- Sports Motivation BG-Image -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">BG-Image</label>
                                                <input type="file" class="form-control form__field"
                                                    name="sports_image" id="cta_image">
                                                @if ($page->hasMedia('sports_image'))
                                                    <label for="existing_background_banner_image"></label>
                                                    @foreach ($page->getMedia('sports_image') as $media)
                                                        <img src="{{ $media->getUrl() }}"
                                                            alt="Existing Banner Image"
                                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Sports Motivation Small Heading Input -->
                                        <div class="col-md-6">
                                            <label for="sports_motivation_small_heading">Small Heading</label>
                                            <input type="text" class="form-control"
                                                name="sports_motivation_small_heading"
                                                value="{{ $content['sports_motivation_small_heading'] ?? '' }}"
                                                placeholder="Enter Small Heading">
                                        </div>

                                        <!-- Sports Motivation Heading Input -->
                                        <div class="col-md-6">
                                            <label for="sports_motivation_heading">Heading</label>
                                            <input type="text" class="form-control" name="sports_motivation_heading"
                                                value="{{ $content['sports_motivation_heading'] ?? '' }}"
                                                placeholder="Enter Heading">
                                        </div>

                                        <!-- Sports Motivation Description Input -->
                                        <div class="col-md-12 mt-3">
                                            <label for="sports_motivation_description">Description</label>
                                            <textarea class="form-control" name="sports_motivation_description" rows="3" placeholder="Enter Description">{{ $content['sports_motivation_description'] ?? '' }}</textarea>
                                        </div>

                                        <!-- Sports Motivation Button Text Input -->
                                        <div class="col-md-12 mt-3">
                                            <label for="sports_motivation_button_text">Button Text</label>
                                            <input type="text" class="form-control"
                                                name="sports_motivation_button_text"
                                                value="{{ $content['sports_motivation_button_text'] ?? '' }}"
                                                placeholder="Enter Button Text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Classes Schedule -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-box-shadow mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Manage Classes Schedule Section</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Classes Schedule Small Heading Input -->
                                        <div class="col-md-12">
                                            <label for="classes_schedule_small_heading">Small Heading</label>
                                            <input type="text" class="form-control"
                                                name="classes_schedule_small_heading"
                                                value="{{ $content['classes_schedule_small_heading'] ?? '' }}"
                                                placeholder="Enter Small Heading">
                                        </div>

                                        <!-- Classes Schedule Heading Input -->
                                        <div class="col-md-12 mt-3">
                                            <label for="classes_schedule_heading">Heading</label>
                                            <input type="text" class="form-control" name="classes_schedule_heading"
                                                value="{{ $content['classes_schedule_heading'] ?? '' }}"
                                                placeholder="Enter Heading">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Our Team -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-box-shadow mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Manage Our Team Section</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Our Team Small Heading Input -->
                                        <div class="col-md-12">
                                            <label for="our_team_small_heading">Small Heading</label>
                                            <input type="text" class="form-control" name="our_team_small_heading"
                                                value="{{ $content['our_team_small_heading'] ?? '' }}"
                                                placeholder="Enter Small Heading">
                                        </div>

                                        <!-- Our Team Heading Input -->
                                        <div class="col-md-12 mt-3">
                                            <label for="our_team_heading">Heading</label>
                                            <input type="text" class="form-control" name="our_team_heading"
                                                value="{{ $content['our_team_heading'] ?? '' }}"
                                                placeholder="Enter Heading">
                                        </div>

                                        <!-- Our Team Description Input -->
                                        <div class="col-md-12 mt-3">
                                            <label for="our_team_description">Description</label>
                                            <textarea class="form-control" name="our_team_description" rows="3" placeholder="Enter Description">{{ $content['our_team_description'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

             <!-- Our Team -->
             <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-box-shadow mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Manage Reviews From Clients Section</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Our Team Heading Input -->
                                        <div class="col-md-12 mt-3">
                                            <label for="client_reviews_heading">Heading</label>
                                            <input type="text" class="form-control" name="client_reviews_heading"
                                                value="{{ $content['client_reviews_heading'] ?? '' }}"
                                                placeholder="Enter Heading">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Join Our Club - Pick Your Card -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-box-shadow mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Manage "Join Our Club - Pick Your Card" Section</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Join Our Club - Pick Your Card Small Heading Input -->
                                        <div class="col-md-12">
                                            <label for="joinOurClub_small_heading">Heading</label>
                                            <input type="text" class="form-control" name="joinOurClub_small_heading"
                                                value="{{ $content['joinOurClub_small_heading'] ?? '' }}"
                                                placeholder="Enter Small Heading">
                                        </div>

                                        <!-- Join Our Club - Pick Your Card BG-Image -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">BG-Image</label>
                                                <input type="file" class="form-control form__field"
                                                    name="member_image_1" id="cta_image">
                                                @if ($page->hasMedia('member_image_1'))
                                                    <label for="existing_background_banner_image"></label>
                                                    @foreach ($page->getMedia('member_image_1') as $media)
                                                        <img src="{{ $media->getUrl() }}"
                                                            alt="Existing Banner Image"
                                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Join Our Club - Pick Your Card Heading Input -->
                                        <div class="col-md-6">
                                            <label for="member_heading_1">Member List</label>
                                            <input type="text" class="form-control" name="member_heading_1"
                                                value="{{ $content['member_heading_1'] ?? '' }}"
                                                placeholder="Enter Heading">
                                        </div>

                                        <!-- Join Our Club - Pick Your Card BG-Image -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">BG-Image</label>
                                                <input type="file" class="form-control form__field"
                                                    name="member_image_2" id="cta_image">
                                                @if ($page->hasMedia('member_image_2'))
                                                    <label for="existing_background_banner_image"></label>
                                                    @foreach ($page->getMedia('member_image_2') as $media)
                                                        <img src="{{ $media->getUrl() }}"
                                                            alt="Existing Banner Image"
                                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Join Our Club - Pick Your Card Heading Input -->
                                        <div class="col-md-6">
                                            <label for="member_heading_2">Member List</label>
                                            <input type="text" class="form-control" name="member_heading_2"
                                                value="{{ $content['member_heading_2'] ?? '' }}"
                                                placeholder="Enter Heading">
                                        </div>

                                        <!-- Join Our Club - Pick Your Card BG-Image -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">BG-Image</label>
                                                <input type="file" class="form-control form__field"
                                                    name="member_image_3" id="cta_image">
                                                @if ($page->hasMedia('member_image_3'))
                                                    <label for="existing_background_banner_image"></label>
                                                    @foreach ($page->getMedia('member_image_3') as $media)
                                                        <img src="{{ $media->getUrl() }}"
                                                            alt="Existing Banner Image"
                                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Join Our Club - Pick Your Card Heading Input -->
                                        <div class="col-md-6">
                                            <label for="member_plan">Member List</label>
                                            <input type="text" class="form-control" name="member_plan"
                                                value="{{ $content['member_plan'] ?? '' }}"
                                                placeholder="Enter Heading">
                                        </div>

                                        <!-- Join Our Club - Pick Your Card Member_List Btn Input -->
                                        <div class="col-md-6">
                                            <label for="member_list_btn">Member List Btn Text</label>
                                            <input type="text" class="form-control" name="member_list_btn"
                                                value="{{ $content['member_list_btn'] ?? '' }}"
                                                placeholder="Enter Heading">
                                        </div>

                                        <!-- Join Our Club - Pick Your Card image Input -->
                                        <div class="col-md-12 my-3">
                                            <div class="form-group">
                                                <label for="title">Card image</label>
                                                <input type="file" class="form-control form__field"
                                                    name="card_image" id="cta_image">
                                                @if ($page->hasMedia('card_image'))
                                                    <label for="existing_background_banner_image"></label>
                                                    @foreach ($page->getMedia('card_image') as $media)
                                                        <img src="{{ $media->getUrl() }}"
                                                            alt="Existing Banner Image"
                                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Join Our Club - Pick Your Card Heading Input -->
                                        <div class="col-md-4 mt-3">
                                            <label for="member_plan_heading">Member Plan Heading</label>
                                            <input type="text" class="form-control" name="member_plan_heading"
                                                value="{{ $content['member_plan_heading'] ?? '' }}"
                                                placeholder="Enter Heading">
                                        </div>

                                        <!-- Join Our Club - Pick Your Card Member_List Btn Input -->
                                        <div class="col-md-4 mt-3">
                                            <label for="member_plan_des">Member Plan Description</label>
                                            <input type="text" class="form-control" name="member_plan_des"
                                                value="{{ $content['member_plan_des'] ?? '' }}"
                                                placeholder="Enter Heading">
                                        </div>

                                        <!-- Join Our Club - Pick Your Card Member_List Btn Input -->
                                        <div class="col-md-4 mt-3">
                                            <label for="member_plan_price">Member Plan Price</label>
                                            <input type="text" class="form-control" name="member_plan_price"
                                                value="{{ $content['member_plan_price'] ?? '' }}"
                                                placeholder="Enter Heading">
                                        </div>

                                        <!-- Join Our Club - Pick Your Card Heading Input -->
                                        <div class="col-md-4 mt-3">
                                            <label for="member_plan_heading_1">Member Plan Heading</label>
                                            <input type="text" class="form-control" name="member_plan_heading_1"
                                                value="{{ $content['member_plan_heading_1'] ?? '' }}"
                                                placeholder="Enter Heading">
                                        </div>

                                        <!-- Join Our Club - Pick Your Card Member_List Btn Input -->
                                        <div class="col-md-4 mt-3">
                                            <label for="member_plan_des_1">Member Plan Description</label>
                                            <input type="text" class="form-control" name="member_plan_des_1"
                                                value="{{ $content['member_plan_des_1'] ?? '' }}"
                                                placeholder="Enter Heading">
                                        </div>

                                        <!-- Join Our Club - Pick Your Card Member_List Btn Input -->
                                        <div class="col-md-4 mt-3">
                                            <label for="member_plan_price_1">Member Plan Price</label>
                                            <input type="text" class="form-control" name="member_plan_price_1"
                                                value="{{ $content['member_plan_price_1'] ?? '' }}"
                                                placeholder="Enter Heading">
                                        </div>

                                        <!-- Join Our Club - Pick Your Card Heading Input -->
                                        <div class="col-md-4 mt-3">
                                            <label for="member_plan_heading_2">Member Plan Heading</label>
                                            <input type="text" class="form-control" name="member_plan_heading_2"
                                                value="{{ $content['member_plan_heading_2'] ?? '' }}"
                                                placeholder="Enter Heading">
                                        </div>

                                        <!-- Join Our Club - Pick Your Card Member_List Btn Input -->
                                        <div class="col-md-4 mt-3">
                                            <label for="member_plan_des_2">Member Plan Description</label>
                                            <input type="text" class="form-control" name="member_plan_des_2"
                                                value="{{ $content['member_plan_des_2'] ?? '' }}"
                                                placeholder="Enter Heading">
                                        </div>

                                        <!-- Join Our Club - Pick Your Card Member_List Btn Input -->
                                        <div class="col-md-4 mt-3">
                                            <label for="member_plan_price_2">Member Plan Price</label>
                                            <input type="text" class="form-control" name="member_plan_price_2"
                                                value="{{ $content['member_plan_price_2'] ?? '' }}"
                                                placeholder="Enter Heading">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ideal section Section -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-box-shadow mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Update ideal Content</h3>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                        <input type="hidden" name="admin_id">
                                
                                        <!-- First Input Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ideal_main_heading">Ideal Heading</label>
                                                <input type="text" class="form-control form__field"
                                                    value="{{ $content['ideal_main_heading'] ?? '' }}" name="ideal_main_heading"
                                                    placeholder="Enter Heading">
                                            </div>
                                        </div>
                                        <!-- First Input Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ideal_heading">Ideal Heading</label>
                                                <input type="text" class="form-control form__field"
                                                    value="{{ $content['ideal_heading'] ?? '' }}" name="ideal_heading"
                                                    placeholder="Enter Heading">
                                            </div>
                                        </div>
                                        <!-- First Input Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ideal_counter">Ideal Counter 1</label>
                                                <input type="text" class="form-control form__field"
                                                    value="{{ $content['ideal_counter'] ?? '' }}" name="ideal_counter"
                                                    placeholder="Enter Ideal Counter">
                                            </div>
                                        </div>
                                        <!-- First Input Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ideal_text">Ideal Text 1</label>
                                                <input type="text" class="form-control form__field"
                                                    value="{{ $content['ideal_text'] ?? '' }}" name="ideal_text"
                                                    placeholder="Enter Ideal Text">
                                            </div>
                                        </div>
                                        <!-- First Input Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ideal_counter_1">Ideal Counter 2</label>
                                                <input type="text" class="form-control form__field"
                                                    value="{{ $content['ideal_counter_1'] ?? '' }}" name="ideal_counter_1"
                                                    placeholder="Enter ">
                                            </div>
                                        </div>
                                        <!-- First Input Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ideal_text_1">Ideal Text 2</label>
                                                <input type="text" class="form-control form__field"
                                                    value="{{ $content['ideal_text_1'] ?? '' }}" name="ideal_text_1"
                                                    placeholder="Enter ">
                                            </div>
                                        </div>
                                        <!-- First Input Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ideal_counter_2">Ideal Counter 3</label>
                                                <input type="text" class="form-control form__field"
                                                    value="{{ $content['ideal_counter_2'] ?? '' }}" name="ideal_counter_2"
                                                    placeholder="Enter ">
                                            </div>
                                        </div>
                                        <!-- First Input Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ideal_text_2">Ideal Text 3</label>
                                                <input type="text" class="form-control form__field"
                                                    value="{{ $content['ideal_text_2'] ?? '' }}" name="ideal_text_2"
                                                    placeholder="Enter ">
                                            </div>
                                        </div>
                                        <!-- First Input Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ideal_counter_3">Ideal Counter 4</label>
                                                <input type="text" class="form-control form__field"
                                                    value="{{ $content['ideal_counter_3'] ?? '' }}" name="ideal_counter_3"
                                                    placeholder="Enter ">
                                            </div>
                                        </div>
                                        <!-- First Input Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ideal_text_3">Ideal Text 4</label>
                                                <input type="text" class="form-control form__field"
                                                    value="{{ $content['ideal_text_3'] ?? '' }}" name="ideal_text_3"
                                                    placeholder="Enter ">
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
