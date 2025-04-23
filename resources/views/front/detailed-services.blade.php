@extends('front.include.app')
@section('title', $service->title . ' | Remodeling Expert')
@section('content')

    <style>
        .banner {
            background-image: url('{{ $data?->getFirstMediaUrl('banner_image') ?: asset('front/images/image.png') }}');
            background-size: cover;
            background-position: center;
            height: 400px;
            /* Set a fixed height to avoid stretching */
        }

        .overlay-box {
            background-color: white;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
        }

        .height-335 {
            height: 335px;
            position: relative;
        }

        /* Ensure the image is responsive */
        .service-image {
            width: 100%;
            height: auto;
        }

        /* Fix alignment for text */
        .service-detail h5 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .service-detail p {
            font-size: 14px;
            margin-bottom: 15px;
        }

        /* Adjust padding for the right sidebar */
        .col-lg-4 {
            padding-top: 20px;
        }
    </style>
    <!-- Banner Section -->
    <div class="banner banner text-center">
        <div class="mx-auto" style="max-width: 700px;">
            <h1 data-aos="fade-up" class="text-white">{{ $service->title }}</h1>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row">

                <!-- Left Side - col-md-8 -->
                <div class="col-lg-8 mb-4">
                    <div class="text-center mb-3">
                        <img data-aos="fade-up" src="{{ asset('storage/' . $service->image) }}" class="img-fluid w-100"
                            alt="{{ $service->title }}">
                    </div>
                    <p data-aos="fade-up">{!! $service->description ?? '' !!}</p>
                </div>

                <!-- Right Side - col-md-4 -->
                <div class="col-lg-4">
                    <h3 data-aos="fade-up" class="mb-3"><b>Related Services</b></h3>
                    <div class="row mt-5">
                        @foreach ($services as $service)
                            <div class="col-12 mb-4">
                                <div class="height-335 position-relative">
                                    <img data-aos="fade-up" src="{{ asset('storage/' . $service->image) }}"
                                        class="service-image w-100" alt="{{ $service->title }}">
                                    <div class="overlay-box position-absolute p-3">
                                        <div class="service-detail">
                                            <h5 data-aos="fade-up">{{ $service->title }}</h5>
                                            <p data-aos="fade-up">{{ Str::limit(strip_tags($service->description), 60) }}
                                            </p>
                                            <a data-aos="fade-up" href="{{ route('service.detail', $service->id) }}"
                                                class="btn btn-sm p-3" style="color: #2980b9;">
                                                <b><i>Read More</i></b>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <section class="before-after-section py-5 text-center">
            <h2 data-aos="fade-up" class="section-title mb-4 fw-bold bold" style="font-weight: 700 !important;">
                {!! $content['before_after_heading'] ?? '' !!}</h2>

            <div class="image-compare-wrapper" aria-label="Before and After Image Slider">
                <div class="image-layer image-before">
                    <img data-aos="fade-up"
                        src="{{ $data?->getFirstMediaUrl('before_image') ?: asset('front/images/spacious-reconfigured-kitchen-remodel-naples-fl-before-2-1.jpg') }}"
                        alt="Before Image">
                </div>
                <div class="image-layer image-after">
                    <img data-aos="fade-up"
                        src="{{ $data?->getFirstMediaUrl('after_image') ?: asset('front/images/after.jpg') }}"
                        alt="After Image">
                </div>
                <div class="divider-line" id="dividerLine"></div>
                <input type="range" min="0" max="100" value="50" id="imageSlider" class="slider-range" />
            </div>
        </section>
    </div>

    

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
            <a data-aos="fade-up" href="{!! $content['get_started_button_url'] ?? '' !!}" class="btn btn-primary banner-btn custom-btn btn-14"
                style="padding: 10px 40px !important; font-weight: 800 !important;">{!! $content['get_started_button_text'] ?? '' !!}</a>
        </div>
    </section>
@endsection
