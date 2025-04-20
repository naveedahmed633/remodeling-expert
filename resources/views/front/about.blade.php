@extends('front.include.app')
@section('title', 'About | Remodeling Expert')
@section('content')

    <style>
        .about-banner {
            background-image: url('{{ $data?->getFirstMediaUrl('banner_image') ?? '' }}');
        }
    </style>
    <!-- Banner Section -->
    <div class="about-banner banner text-center">
        <div class="mx-auto" style="max-width: 700px;">
            <h1 class="text-white">{{ $content['banner_section_heading'] ?? '' }}</h1>
        </div>
    </div>

    <section class="py-5" style="">
        <div class="container position-relative">
            <div class="row mb-5">
                <!-- Image Column -->
                <div class="col-md-6">
                    <img src="{{ $data?->getFirstMediaUrl('transforming_homes_image') ?? '' }}" alt="Sample"
                        class="img-fluid w-100">
                </div>

                <!-- Content Box Overlapping -->
                <div class="col-md-7 position-absolute top-50 end-0 translate-middle-y bg-white p-5 shadow"
                    style="z-index: 10;">
                    <h3 class="mb-3 text-start">{{ $content['transforming_homes_heading'] ?? '' }}</h3>
                    <p class="text-start">{{ $content['transforming_homes_desc_1'] ?? '' }}</p>
                    <p class="text-start">{{ $content['transforming_homes_desc_2'] ?? '' }}</p>
                    <p class="text-start">{{ $content['transforming_homes_desc_3'] ?? '' }}</p>
                    <div class="text-start mt-4">
                        <a href="{{ $content['transforming_homes_button_url'] ?? '' }}"
                            class="btn btn-primary p-3">{{ $content['transforming_homes_button_text'] ?? '' }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" style="background-color: #001626;">
        <div class="container">
            <!-- Main Heading -->
            <div class="text-center mb-4">
                <h2 class="text-white">{{ $content['estimate_section_heading'] ?? '' }}</h2>
                <p class="text-white">{{ $content['estimate_section_description'] ?? '' }}</p>
            </div>

            <!-- Sub-sections -->
            <div class="row text-center p-5">
                <!-- Sub-section 1 -->
                <div class="col-md-3 mb-4">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ $data?->getFirstMediaUrl('estimate_image_1') ?? '' }}" alt="Icon 1" class="mb-3"
                            style="width: 50px; height: 50px;">
                        <h5 class="text-white">{{ $content['estimate_image_heading_1'] ?? '' }}</h5>
                        <p class="text-white">{{ $content['estimate_image_desc_1'] ?? '' }}</p>
                    </div>
                </div>

                <!-- Sub-section 2 -->
                <div class="col-md-3 mb-4">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ $data?->getFirstMediaUrl('estimate_image_2') ?? '' }}" alt="Icon 2" class="mb-3"
                            style="width: 50px; height: 50px;">
                        <h5 class="text-white">{{ $content['estimate_image_heading_2'] ?? '' }}</h5>
                        <p class="text-white">{{ $content['estimate_image_desc_2'] ?? '' }}</p>
                    </div>
                </div>

                <!-- Sub-section 3 -->
                <div class="col-md-3 mb-4">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ $data?->getFirstMediaUrl('estimate_image_3') ?? '' }}" alt="Icon 3" class="mb-3"
                            style="width: 50px; height: 50px;">
                        <h5 class="text-white">{{ $content['estimate_image_heading_3'] ?? '' }}</h5>
                        <p class="text-white">{{ $content['estimate_image_desc_3'] ?? '' }}</p>
                    </div>
                </div>

                <!-- Sub-section 4 -->
                <div class="col-md-3 mb-4">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ $data?->getFirstMediaUrl('estimate_image_4') ?? '' }}" alt="Icon 4" class="mb-3"
                            style="width: 50px; height: 50px;">
                        <h5 class="text-white">{{ $content['estimate_image_heading_4'] ?? '' }}</h5>
                        <p class="text-white">{{ $content['estimate_image_desc_4'] ?? '' }}</p>
                    </div>
                </div>
            </div>

            <!-- Button at the End -->
            <div class="text-center mt-4">
                <a href="{{ $content['estimate_button_url'] ?? '' }}"
                    class="btn btn-primary p-3">{{ $content['estimate_button_text'] ?? '' }}</a>
            </div>
        </div>
    </section>

    <div class="container">
        <section class="before-after-section py-5 text-center">
            <h2 class="section-title mb-4 fw-bold">{{ $content['before_after_heading'] ?? '' }}</h2>

            <div class="image-compare-wrapper" aria-label="Before and After Image Slider">
                <div class="image-layer image-before">
                    <img src="{{ $data?->getFirstMediaUrl('before_image') ?? '' }}" alt="Before Image">
                </div>
                <div class="image-layer image-after">
                    <img src="{{ $data?->getFirstMediaUrl('after_image') ?? '' }}" alt="After Image">
                </div>
                <div class="divider-line" id="dividerLine"></div>
                <input type="range" min="0" max="100" value="50" id="imageSlider" class="slider-range" />
            </div>
        </section>
    </div>

    <section class="position-relative py-5 mb-5">
        <div class="container position-relative z-2">
            <div class="row  position-relative">
                <div class="col-md-12 position-relative" style="z-index: 2;">
                    <!-- White Box with width 100% -->
                    <div class="row">
                        <div class="col-7">
                            <div class="bg-white p-5 shadow mt-5 " style="width: 100%;">
                                <div class="fs-1 text-primary mb-3"><i
                                        class="fas fa-quote-left fa-3x text-theme-color mb-3"></i>
                                </div>
                                <h6 class="text-uppercase text-theme-color">{{ $content['trusted_small_heading'] ?? '' }}
                                </h6>
                                <h1 class="fw-bold my-3">{{ $content['trusted_main_heading'] ?? '' }}</h1>
                                <p>{{ $content['trusted_description'] ?? '' }}</p>
                            </div>
                        </div>
                        <div class="col-7 ms-auto">
                            <div class="p-4 py-5 text-white" style="background-color: #001626; width: 60%;">
                                <h5 class="mb-2 text-white">{{ $content['dark_box_heading'] ?? '' }}</h5>
                                <p class="mb-1 text-white">{{ $content['dark_box_description'] ?? '' }}</p>
                                <h4 class="fw-bold mb-0 text-theme-color">{{ $content['dark_box_number'] ?? '' }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Image outside container and full height -->
        <div class="position-absolute top-0 end-0 h-100" style="width: 50%; z-index: 0;">
            <img src="{{ $data?->getFirstMediaUrl('trusted_section_image') ?? '' }}" alt="Image"
                class="w-100 h-100 object-fit-cover">
        </div>
    </section>
@endsection
