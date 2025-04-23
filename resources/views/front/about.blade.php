@extends('front.include.app')
@section('title', 'About | Remodeling Expert')
@section('content')

    <style>
         .about-banner {
            background-image: url('{{ $data?->getFirstMediaUrl('banner_image') ?: asset('front/images/todd-kent-178j8tJrNlc-unsplash.png') }}');
            background-size: cover;
            background-position: center;
            height: 400px;
            /* Set a fixed height to avoid stretching */
        }
    </style>
    <!-- Banner Section -->
    <div class="about-banner banner text-center">
        <div class="mx-auto" style="max-width: 700px;">
            <h1 class="text-white bold" style="font-weight: 700 !important;" data-aos="fade-up">
                {!! $content['banner_section_heading'] ?? '' !!}</h1>
        </div>
    </div>

    <section class="py-5" style="">
        <div class="container position-relative">
            <div class="row">
                <!-- Image Column -->
                <div class="col-md-6">
                    <img  data-aos="fade-up" src="{{ $data?->getFirstMediaUrl('transforming_homes_image') ?: asset('front/images/3d-rendering-loft-luxury-living-room-with-bookshelf (1).png') }}" alt="Sample"
                        class="img-fluid w-100">
                </div>

                <!-- Content Box Overlapping -->
                <div class="col-md-7 position-absolute top-50 end-0 translate-middle-y bg-white p-5 shadow"
                    style="z-index: 10;">
                    <h3 class="mb-3 text-start bold" style="font-weight: 700 !important;"  data-aos="fade-up">{!! $content['transforming_homes_heading'] ?? '' !!}</h3>
                    <p class="text-start" data-aos="fade-up">{!! $content['transforming_homes_desc_1'] ?? '' !!}</p>
                    <p class="text-start" data-aos="fade-up">{!! $content['transforming_homes_desc_2'] ?? '' !!}</p>
                    <p class="text-start" data-aos="fade-up">{!! $content['transforming_homes_desc_3'] ?? '' !!}</p>
                    <div class="text-start mt-4">
                        <a href="{!! $content['transforming_homes_button_url'] ?? '' !!}"
                            class="btn custom-btn btn-14 btn-primary banner-btn" style="padding: 12px 40px !important; font-weight: 800 !important;"  data-aos="fade-up">{!! $content['transforming_homes_button_text'] ?? '' !!}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="py-5" style="background-color: #001626;">
        <div class="container py-4">
            <!-- Main Heading -->
            <div class="text-center mb-4">
                <h2 class="text-white bold" style="font-weight: 700 !important;" data-aos="fade-up">{!! $content['estimate_section_heading'] ?? '' !!}</h2>
                <p class="text-white text-small" data-aos="fade-up">{!! $content['estimate_section_description'] ?? '' !!}</p>
            </div>
    
            <!-- Sub-sections -->
            <div class="row text-center py-3">
                <!-- Sub-section 1 -->
                <div class="col-md-3">
                    <div class="d-flex flex-column align-items-center">
                        <div style="height: 60px;" class="mb-3 d-flex align-items-start justify-content-center">
                            <img data-aos="fade-up" src="{{ asset('front/images/Screenshot 2025-04-21 060645.png') }}" alt="Icon 1"
                                 style="max-height: 100%; width: auto;">
                        </div>
                        <h5 data-aos="fade-up" class="text-white text-center">{!! $content['estimate_image_heading_1'] ?? '' !!}</h5>
                        <p data-aos="fade-up" class="text-white text-center">{!! $content['estimate_image_desc_1'] ?? '' !!}</p>
                    </div>
                </div>
    
                <!-- Sub-section 2 -->
                <div class="col-md-3">
                    <div class="d-flex flex-column align-items-center">
                        <div style="height: 60px;" class="mb-3 d-flex align-items-start justify-content-center">
                            <img data-aos="fade-up" src="{{ asset('front/images/flooring.png') }}" alt="Icon 2"
                                 style="max-height: 100%; width: auto;">
                        </div>
                        <h5 data-aos="fade-up" class="text-white text-center">{!! $content['estimate_image_heading_2'] ?? '' !!}</h5>
                        <p data-aos="fade-up" class="text-white text-center">{!! $content['estimate_image_desc_2'] ?? '' !!}</p>
                    </div>
                </div>
    
                <!-- Sub-section 3 -->
                <div class="col-md-3">
                    <div class="d-flex flex-column align-items-center">
                        <div style="height: 60px;" class="mb-3 d-flex align-items-start justify-content-center">
                            <img data-aos="fade-up" src="{{ asset('front/images/lightning.png') }}" alt="Icon 3"
                                 style="max-height: 100%; width: auto;">
                        </div>
                        <h5 data-aos="fade-up" class="text-white text-center">{!! $content['estimate_image_heading_3'] ?? '' !!}</h5>
                        <p data-aos="fade-up" class="text-white text-center">{!! $content['estimate_image_desc_3'] ?? '' !!}</p>
                    </div>
                </div>
    
                <!-- Sub-section 4 -->
                <div class="col-md-3">
                    <div class="d-flex flex-column align-items-center">
                        <div style="height: 60px;" class="mb-3 d-flex align-items-start justify-content-center">
                            <img data-aos="fade-up" src="{{ asset('front/images/door.png') }}" alt="Icon 4"
                                 style="max-height: 100%; width: auto;">
                        </div>
                        <h5 data-aos="fade-up" class="text-white text-center">{!! $content['estimate_image_heading_4'] ?? '' !!}</h5>
                        <p data-aos="fade-up" class="text-white text-center">{!! $content['estimate_image_desc_4'] ?? '' !!}</p>
                    </div>
                </div>
            </div>
    
            <!-- Button at the End -->
            <div class="text-center mt-4">
                <a data-aos="fade-up" href="{!! $content['estimate_button_url'] ?? '' !!}"
                   class="btn btn-primary custom-btn btn-14 banner-btn"
                   style="padding: 11px 40px !important; font-weight: 800 !important;">
                    {!! $content['estimate_button_text'] ?? '' !!}
                </a>
            </div>
        </div>
    </section>

    <div class="container">
        <section class="before-after-section py-5 text-center">
            <h2 data-aos="fade-up" class="section-title mb-4 fw-bold bold" style="font-weight: 700 !important;">{!! $content['before_after_heading'] ?? '' !!}</h2>

            <div class="image-compare-wrapper" aria-label="Before and After Image Slider">
                <div class="image-layer image-before">
                    <img data-aos="fade-up" src="{{ $data?->getFirstMediaUrl('before_image') ?: asset('front/images/spacious-reconfigured-kitchen-remodel-naples-fl-before-2-1.jpg') }}" alt="Before Image">
                </div>
                <div class="image-layer image-after">
                    <img data-aos="fade-up" src="{{ $data?->getFirstMediaUrl('after_image') ?: asset('front/images/after.jpg') }}" alt="After Image">
                </div>
                <div class="divider-line" id="dividerLine"></div>
                <input type="range" min="0" max="100" value="50" id="imageSlider"
                    class="slider-range" />
            </div>
        </section>
    </div>

    
    <section class="position-relative py-5 mb-5">
        <div class="container position-relative z-2">
            <div class="row position-relative">
                <div class="col-md-12 position-relative" style="z-index: 2;">
                    <div class="row">
                        <!-- White Box -->
                        <div class="col-lg-7 col-md-12">
                            <div class="bg-white d-flex p-5 shadow mt-5 trusted-white-box flex-column flex-lg-row align-items-start"
                                style="width: 100%;">
                                <div data-aos="fade-up" class="fs-1 text-primary mb-3 px-lg-4 px-0 trusted-quote-img">
                                    <img src="{{ asset('front/images/“.png') }}" alt="">
                                </div>
                                <div>
                                    <h6 data-aos="fade-up" class="text-uppercase text-theme-color">
                                        {!! $content['trusted_small_heading'] ?? '' !!}
                                    </h6>
                                    <h1 data-aos="fade-up" class="fw-bold my-3 bold" style="font-weight: 700 !important;">
                                        {!! $content['trusted_main_heading'] ?? '' !!}
                                    </h1>
                                    <p data-aos="fade-up" style="font-style: italic">
                                        {!! $content['trusted_description'] ?? '' !!}
                                    </p>
                                </div>
                            </div>
                        </div>
    
                        <!-- Black Box -->
                        <div class="col-lg-7 col-md-12 ms-lg-auto">
                            <div class="p-4 py-5 text-white trusted-dark-box"
                                style="background-color: #001626; width: 50%;">
                                <h5 data-aos="fade-up" class="mb-2 text-white bold" style="font-weight: 700 !important;">
                                    {!! $content['dark_box_heading'] ?? '' !!}
                                </h5>
                                <p data-aos="fade-up" class="mb-1 text-white">
                                    {!! $content['dark_box_description'] ?? '' !!}
                                </p>
                                <h4 data-aos="fade-up" class="fw-bold mb-0 text-theme-color">
                                    {!! $content['dark_box_number'] ?? '' !!}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Background Image (Visible only on LG and above) -->
        <div class="position-absolute top-0 end-0 h-100 trusted-bg-image" style="width: 65%; z-index: 0;">
            <img data-aos="fade-up"
                src="{{ $data?->getFirstMediaUrl('trusted_section_image') ?: asset('front/images/image (30).png') }}"
                alt="Image"
                class="w-100 h-100 object-fit-cover">
        </div>
    </section>
@endsection
