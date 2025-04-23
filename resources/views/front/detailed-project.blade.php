@extends('front.include.app')
@section('title', $project->title . ' | Remodeling Expert')

@section('content')

    <style>
        .banner {
            background-image: url('{{ $data?->getFirstMediaUrl('banner_image') ?: asset('front/images/image.png') }}');
            background-size: cover;
            background-position: center;
            height: 60vh;
            /* Responsive height */
        }

        /* Additional Styling for better UI */
        .project-details {
            /* border: 1px solid #ddd; */
            border-radius: 8px;
            /* background-color: #f9f9f9; */
            padding: 20px;
        }

        .project-details h5 {
            font-weight: bold;
        }

        .project-images img {
            max-width: 100%;
            /* Ensure image fits properly */
            height: auto;
        }

        .project-title {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
        }

        .project-description {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #555;
        }

        /* Make sure all images inside col-md-6 or col-md-12 are responsive */
        .project-images .col-md-6,
        .project-images .col-md-12 {
            padding: 10px;
        }
    </style>

    <!-- Banner Section -->
    <div class="banner text-center">
        <div class="mx-auto" style="max-width: 700px;">
            <h1 data-aos="fade-up" class="text-white">{{ $project->title }}</h1>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row align-items-start">

                <!-- Left Column -->
                <div class="col-md-7">
                    <img data-aos="fade-up" src="{{ asset('front/images/image (18).png') }}" alt="Main Project Image"
                        class="img-fluid mb-3">
                    <p data-aos="fade-up" class="project-description">{!! $project->description1 ?? '' !!}</p>
                </div>

                <!-- Right Column -->
                <div class="col-md-5 mb-4">
                    <div class="project-details">
                        <h5 data-aos="fade-up" class="fw-bold mb-3">{{ $project->title }}</h5>
                        <p data-aos="fade-up" class="project-description">{!! $project->description ?? '' !!}</p><br>
                        <div class="mb-2 d-flex">
                            <strong data-aos="fade-up" style="min-width: 100px;">Client</strong>
                            <span data-aos="fade-up">{{ $project->client }}</span>
                        </div>
                        <div class="mb-2 d-flex">
                            <strong data-aos="fade-up" style="min-width: 100px;">Year</strong>
                            <span data-aos="fade-up">{{ $project->year }}</span>
                        </div>
                        <div class="mb-2 d-flex">
                            <strong data-aos="fade-up" style="min-width: 100px;">Author</strong>
                            <span data-aos="fade-up">{{ $project->author }}</span>
                        </div>
                    </div>
                </div>

                <!-- Additional Images Section -->
                <div class="col-md-7">
                    {{-- <h4 data-aos="fade-up" class="mb-4">More About This Project</h4> --}}
                    <div class="row">
                        @if ($project->image1)
                            <div class="col-md-6">
                                <img data-aos="fade-up" src="{{ asset('storage/' . $project->image1) }}"
                                    class="img-fluid mb-3 project-img-fixed" alt="Project View 1">
                            </div>
                        @endif

                        @if ($project->image2)
                            <div class="col-md-6">
                                <img data-aos="fade-up" src="{{ asset('storage/' . $project->image2) }}"
                                    class="img-fluid mb-3 project-img-fixed" alt="Project View 2">
                            </div>
                        @endif

                        @if ($project->image3)
                            <div class="col-md-12">
                                <img data-aos="fade-up" src="{{ asset('storage/' . $project->image3) }}"
                                    class="img-fluid mb-3 project-img-auto" alt="Project View 3">
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>

    <style>
        .get-started-section {
            background-image: url('{{ $data?->getFirstMediaUrl('get_started_today_image') ?: asset('front/images/frames-for-your-heart-2d4lAQAlbDA-unsplash.png') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }

        .content-box {
            background-color: #0016269e;
            /* black with opacity */
            max-width: 790px;
            width: 100%;
            padding: 5rem !important;
            padding-left: 6rem !important;
            padding-right: 6rem !important;
            height: auto;
            /* Adjust height as needed */
            min-height: 400px;
            /* Set minimum height for the content box */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>

    <section class="position-relative get-started-section d-flex justify-content-center align-items-center mt-5">
        <div class="content-box text-white text-center p-5">
            <h3 data-aos="fade-up" class="fw-bold text-white">{!! $homeContent['get_started_heading'] ?? '' !!}</h3>
            <p data-aos="fade-up" class="text-white">{!! $homeContent['get_started_description'] ?? '' !!}</p>
            <a data-aos="fade-up" href="{!! $homeContent['get_started_button_url'] ?? '' !!}" class="btn btn-primary banner-btn custom-btn btn-14"
                style="padding: 13px 30px !important; font-weight: 800 !important;">{!! $homeContent['get_started_button_text'] ?? '' !!}</a>
        </div>
    </section>
@endsection
