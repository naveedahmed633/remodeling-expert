@extends('front.include.app')
@section('title', 'Blogs | Remodeling Expert')
@section('content')

    <style>
        .blog-banner {
            background-image: url('{{ $data?->getFirstMediaUrl('banner_image') ?: asset('front/images/image.png') }}');
            background-size: cover;
            background-position: center;
            height: 400px;
            /* Set a fixed height to avoid stretching */
        }
    </style>

    <!-- Banner Section -->
    <div class="blog-banner banner text-center">
        <div class="mx-auto" style="max-width: 700px;">
            <h1 data-aos="fade-up" class="text-white bold" style="font-weight: 700 !important;">{!! $content['banner_section_heading'] ?? '' !!}</h1>
        </div>
    </div>
    <style>
        .blog-image-fixed {
            height: 350px; /* Ya koi aur height jo aapko suit kare */
            object-fit: cover;
            object-position: center;
            /* border-radius: 6px; */
        }
    
        @media (max-width: 768px) {
            .blog-image-fixed {
                height: 250px;
            }
        }
    </style>
    
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                @foreach ($blogs as $blog)
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <img data-aos="fade-up" src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image"
                                    class="img-fluid w-100 blog-image-fixed">
                            </div>
                            <div class="col-md-6">
                                <p data-aos="fade-up" class="mb-1" style="color: #2980b9;">
                                    <strong>{{ strtoupper(\Carbon\Carbon::parse($blog->created_at)->format('d/F/Y')) }}</strong>
                                </p>
                                <h5 data-aos="fade-up" class="fw-bold" style="font-weight: 700 !important;">
                                    {{ $blog->title }}</h5>
                                <p data-aos="fade-up">{{ Str::limit(strip_tags($blog->description), 400) }}</p>
                                <a data-aos="fade-up" href="{{ route('blog.detail', $blog->id) }}"
                                    style="text-decoration: underline; color: #2fa8fa;">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
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
            height: auto; /* Adjust height as needed */
            min-height: 400px; /* Set minimum height for the content box */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
    
    <section class="position-relative get-started-section d-flex justify-content-center align-items-center mt-5">
        <div class="content-box text-white text-center p-5">
            <h3 data-aos="fade-up" class="fw-bold text-white">{!! $content['get_started_heading'] ?? '' !!}</h3>
            <p data-aos="fade-up" class="text-white">{!! $content['get_started_description'] ?? '' !!}</p>
            <a data-aos="fade-up" href="{!! $content['get_started_button_url'] ?? '' !!}"
                class="btn btn-primary banner-btn custom-btn btn-14" style="padding: 13px 30px !important;">{!! $content['get_started_button_text'] ?? '' !!}</a>
        </div>
    </section>
@endsection
