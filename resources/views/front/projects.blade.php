@extends('front.include.app')
@section('title', 'Projects | Remodeling Expert')
@section('content')

    <style>
        .project-banner {
            background-image: url('{{ $data?->getFirstMediaUrl('banner_image') ?: asset('front/images/image (9).png') }}');
            background-size: cover;
            background-position: center;
            height: 400px;
            /* Set a fixed height to avoid stretching */
        }
    </style>
    <!-- Banner Section -->
    <div class="project-banner banner text-center">
        <div class="mx-auto" style="max-width: 700px;">
            <h1 class="text-white bold" style="font-weight: 700 !important;">{{ $content['banner_section_heading'] ?? '' }}
            </h1>
        </div>
    </div>

    <section class="container my-5">
        <div class="row">
            @foreach ($projects as $project)
                <div class="col-lg-3 mb-4">
                    <div class="position-relative">
                        <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid w-100 project-image"
                            alt="{{ $project->title }}">
                        <div class="overlay-box bg-white p-3 position-absolute">
                            <h5>{{ $project->title }}</h5>
                            <p>{{ Str::limit(strip_tags($project->description), 40) ?: '' }}</p>
                            <a href="{{ route('project.detail', $project->id) }}" class="btn btn-sm"
                                style="color: #2fa8fa;">
                                <b><i>VIEW PROJECT</i></b>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
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
