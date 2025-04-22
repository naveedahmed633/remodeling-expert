@extends('front.include.app')
@section('title', 'Home | Remodeling Expert')
@section('content')
    <style>
        .home-banner {
            background-image: url('{{ $data?->getFirstMediaUrl('banner_image') ?: asset('front/images/movie-night-by-pool-whole-family.png') }}');
        }
    </style>
    <!-- Banner Section -->
    <div class="home-banner banner text-center">
        <div class="mx-auto" style="max-width: 700px; ">
            <h1 class="text-white" data-aos="fade-up" style="font-family: Open Sans;">{!! $content['banner_section_heading'] ?? '' !!}</h1>
            <p class="text-white" data-aos="fade-up">{!! $content['banner_section_description'] ?? ''!!}</p>
            <a href="{!! $content['banner_section_button_url'] ?? ''!!}"
                class="btn btn-primary custom-btn btn-14 banner-btn" style="padding: 10px 40px !important; font-weight: 800 !important;" data-aos="fade-up"><b>{!! $content['banner_section_button_text'] ?? '' !!}</b></a>
        </div>
    </div>

    <section class="py-5" style="">
        <div class="container position-relative">
            <div class="row mb-5">
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
                            class="btn custom-btn btn-14 btn-primary banner-btn" style="padding: 10px 40px !important; font-weight: 800 !important;"  data-aos="fade-up">{!! $content['transforming_homes_button_text'] ?? '' !!}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container text-center">
            <div class="row d-flex justify-content-center">
                <div class="col-9">
                    <h2 class="bold" style="font-weight: 700 !important;" data-aos="fade-up">{!! $content['interior_solutions_heading'] ?? '' !!}</h2>
                    <p data-aos="fade-up">{!! $content['interior_solutions_description'] ?? '' !!}</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-3 mb-4">
                    <img data-aos="fade-up" src="{{ $data?->getFirstMediaUrl('interior_solution_image_1') ?: asset('front/images/image (33).png') }}"
                        class="img-fluid equal-height" alt="Image 1">
                    <h5 data-aos="fade-up" class="mt-3">{!! $content['interior_solution_desc_1'] ?? '' !!}</h5>
                </div>
                <div class="col-md-3 mb-4">
                    <img data-aos="fade-up" src="{{ $data?->getFirstMediaUrl('interior_solution_image_2') ?: asset('front/images/image (31).png') }}"
                        class="img-fluid equal-height" alt="Image 2">
                    <h5 data-aos="fade-up" class="mt-3">{!! $content['interior_solution_desc_2'] ?? '' !!}</h5>
                </div>
                <div class="col-md-3 mb-4">
                    <img data-aos="fade-up" src="{{ $data?->getFirstMediaUrl('interior_solution_image_3') ?: asset('front/images/image (33).png') }}"
                        class="img-fluid equal-height" alt="Image 3">
                    <h5 data-aos="fade-up" class="mt-3">{!! $content['interior_solution_desc_3'] ?? '' !!}</h5>
                </div>
                <div class="col-md-3 mb-4">
                    <img data-aos="fade-up" src="{{ $data?->getFirstMediaUrl('interior_solution_image_4') ?: asset('front/images/image (32).png') }}"
                        class="img-fluid equal-height" alt="Image 4">
                    <h5 data-aos="fade-up" class="mt-3">{!! $content['interior_solution_desc_4'] ?? '' !!}</h5>
                </div>
            </div>

            <a  data-aos="fade-up" href="{!! $content['interior_solution_button_url'] ?? '' !!}"
                class="btn btn-primary custom-btn btn-14 mt-4 banner-btn bold"  style="font-weight: 700 !important; padding: 10px 40px !important; font-weight: 800 !important;">{!! $content['interior_solution_button_text'] ?? '' !!}</a>
        </div>
    </section>

    <section class="py-5" style="background-color: #001626;">
        <div class="container">
            <!-- Main Heading -->
            <div class="text-center mb-4">
                <h2 class="text-white bold" style="font-weight: 700 !important;" data-aos="fade-up">{!! $content['estimate_section_heading'] ?? '' !!}</h2>
                <p class="text-white text-small" data-aos="fade-up">{!! $content['estimate_section_description'] ?? '' !!}</p>
            </div>
    
            <!-- Sub-sections -->
            <div class="row text-center">
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
                   style="padding: 10px 40px !important; font-weight: 800 !important;">
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
            <div class="row  position-relative">
                <div class="col-md-12 position-relative" style="z-index: 2;">
                    <!-- White Box with width 100% -->
                    <div class="row">
                        <div class="col-7">
                            <div class="bg-white d-flex p-5 shadow mt-5 " style="width: 100%;">
                                <div data-aos="fade-up" class="fs-1 text-primary mb-3 px-4">
                                    <img src="{{ asset('front/images/“.png') }}" alt="">
                                </div>
                                <div>
                                <h6 data-aos="fade-up" class="text-uppercase text-theme-color">{!! $content['trusted_small_heading'] ?? '' !!}
                                </h6>
                                <h1 data-aos="fade-up" class="fw-bold my-3 bold" style="font-weight: 700 !important;">{!! $content['trusted_main_heading'] ?? '' !!}</h1>
                                <p data-aos="fade-up" style="font-family: Open Sans"><i>{!! $content['trusted_description'] ?? '' !!}</i></p>
                            </div>
                            </div>
                        </div>
                        <div class="col-7 ms-auto">
                            <div class="p-4 py-5 text-white" style="background-color: #001626; width: 50%; ">
                                <h5 data-aos="fade-up" class="mb-2 text-white bold" style="font-weight: 700 !important;">{!! $content['dark_box_heading'] ?? '' !!}</h5>
                                <p data-aos="fade-up" class="mb-1 text-white">{!! $content['dark_box_description'] ?? '' !!}</p>
                                <h4 data-aos="fade-up" class="fw-bold mb-0 text-theme-color">{!! $content['dark_box_number'] ?? '' !!}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Image outside container and full height -->
        <div class="position-absolute top-0 end-0 h-100" style="width: 65%; z-index: 0;">
            <img data-aos="fade-up" src="{{ $data?->getFirstMediaUrl('trusted_section_image') ?: asset('front/images/image (30).png') }}" alt="Image"
                class="w-100 h-100 object-fit-cover">
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row d-flex justify-content-center  text-center">
                <div class="col-8">
                    <h2 data-aos="fade-up" class=" bold" style="font-weight: 700 !important;">{!! $content['recent_projects_heading'] ?? '' !!}</h2>
                    <p data-aos="fade-up">{!! $content['recent_projects_description'] ?? '' !!}</p>
                </div>
            </div>
            <div class="row">
                @foreach ($projects->take(4) as $project)
                    <div class="col-md-3 mb-4">
                        <div class="position-relative">
                            <img data-aos="fade-up" src="{{ asset('storage/' . $project->image) }}" class="img-fluid w-100 project-image"
                                alt="{{ $project->title }}">
                            <div class="overlay-box bg-white p-3 position-absolute">
                                <h5 data-aos="fade-up">{{ $project->title }}</h5>
                                <p data-aos="fade-up">{{ Str::limit(strip_tags($project->description), 40) ?: '' }}</p>
                                <a data-aos="fade-up" href="{{ route('project.detail', $project->id) }}" class="btn btn-sm"
                                    style="color: #2fa8fc;">
                                    <b><i>VIEW PROJECT</i></b>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Bottom Centered Button -->
            <div class="text-center mt-4">
                <a data-aos="fade-up" href="{!! $content['recent_projects_button_url'] ?? '' !!}"
                    class="btn custom-btn btn-14 btn-primary banner-btn" style="padding: 10px 40px !important; font-weight: 800 !important;">{!! $content['recent_projects_button_text'] ?? '' !!}</a>
            </div>
        </div>
    </section>

    <style>
        .get-started-section {
            background-image: url('{{ $data?->getFirstMediaUrl('get_started_today_image') ?: asset('front/images/frames-for-your-heart-2d4lAQAlbDA-unsplash.png') }}');
            /* replace with your image */
            background-size: cover;
            background-position: center;
            height: 100vh;
        }

        .content-box {
            background-color: #0016269e;
            /* black with opacity */
            max-width: 700px;
            /* col-5 jaisa */
            width: 100%;
            padding: 5rem !important;
            padding-left: 6rem !important;
            padding-right: 6rem !important;
            /* border-radius: 10px; */
        }
    </style>
    <section class="position-relative get-started-section d-flex justify-content-center align-items-center">
        <div class="content-box text-white text-center p-5">
            <h2 data-aos="fade-up" class="fw-bold mb-3 text-white">{!! $content['get_started_heading'] ?? '' !!}</h2>
            <p data-aos="fade-up" class="mb-4 text-white">{!! $content['get_started_description'] ?? '' !!}</p>
            <a data-aos="fade-up" href="{!! $content['get_started_button_url'] ?? '' !!}"
                class="btn btn-primary banner-btn custom-btn btn-14" style="padding: 10px 40px !important; font-weight: 800 !important;">{!! $content['get_started_button_text'] ?? '' !!}</a>
        </div>
    </section>
@endsection
