@extends('front.include.app')
@section('title', 'Services | Remodeling Expert')
@section('content')

<style>
    .classic-banner {
        background-image: url('{{ $data?->getFirstMediaUrl('banner_image') ?? '' }}');
    }
</style>

    <!-- Banner Section -->
    <div class="classic-banner banner text-center">
        <div class="mx-auto" style="max-width: 700px;">
            <h1 data-aos="fade-up" class="text-white">{{ $content['banner_section_heading'] ?? '' }}</h1>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                @foreach ($blogs as $blog)
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <img data-aos="fade-up" src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="img-fluid w-100">
                            </div>
                            <div class="col-md-6">
                                <p data-aos="fade-up" class="mb-1" style="color: #2980b9;">
                                    <strong>{{ strtoupper(\Carbon\Carbon::parse($blog->created_at)->format('d/F/Y')) }}</strong>
                                </p>
                                <h5 data-aos="fade-up" class="fw-bold">{{ $blog->title }}</h5>
                                <p data-aos="fade-up">{{ Str::limit(strip_tags($blog->description), 300) }}</p>
                                <a data-aos="fade-up" href="{{ route('blog.detail', $blog->id) }}"
                                    style="text-decoration: underline; color: #2980b9;">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <style>
        .get-started-section {
            background-image: url('{{ $data?->getFirstMediaUrl('get_started_today_image') ?? '' }}');
            /* replace with your image */
            background-size: cover;
            background-position: center;
            height: 100vh;
        }

        .content-box {
            background-color: rgba(0, 0, 0, 0.482);
            /* black with opacity */
            max-width: 500px;
            /* col-5 jaisa */
            width: 100%;
            padding: 2rem;
            border-radius: 10px;
        }
    </style>
    <section class="position-relative get-started-section d-flex justify-content-center align-items-center">
        <div class="content-box text-white text-center p-5">
            <h2 data-aos="fade-up" class="fw-bold mb-3 text-white">{{ $content['get_started_heading'] ?? '' }}</h2>
            <p data-aos="fade-up" class="mb-4">{{ $content['get_started_description'] ?? '' }}</p>
            <a data-aos="fade-up" href="{{ $content['get_started_button_url'] ?? '' }}"
                class="btn btn-primary p-3">{{ $content['get_started_button_text'] ?? '' }}</a>
        </div>
    </section>
@endsection
