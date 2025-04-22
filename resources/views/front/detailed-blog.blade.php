@extends('front.include.app')

@section('title', $blog->title . ' | Go Tech Digital')

@section('content')
    @php
        $shareUrl = urlencode(request()->fullUrl());
        $shareText = urlencode($blog->title);
    @endphp
    <style>
        .blog .social-icon {
            background-color: rgb(255, 255, 255);
            color: white !important;
            padding: 10px;
            border-radius: 10%;
            /* Circular Icons */
            font-size: 18px;
            /* Adjust icon size */
            transition: background-color 0.3s ease;
            /* Smooth transition on hover */
        }

        .blog .social-icon i {
            color: rgb(0, 0, 0) !important;
        }

        .blog .social-icon:hover {
            background-color: #2FA8FC;
            /* Slightly lighter black on hover */
            text-decoration: none;
            color: white;
            /* Remove underline on hover */
        }
    </style>

    <div class="bg-nav"></div>

    <section style="background: #001626;">
        <div class="container py-5 blog">
            <div class="row">
                <div class="col-md-8">

                    <!-- Blog Title -->
                    <h2 data-aos="fade-up" class="mb-3 text-white"><b>{{ $blog->title }}</b></h2>

                    <!-- Date & Time -->
                    <small class="text-muted d-block mt-1" data-aos="fade-up">
                        <i data-aos="fade-up" class="fas fa-calendar-alt me-1 text-white"></i>
                        {{ \Carbon\Carbon::parse($blog->created_at)->format('d/F/Y') }}
                        &nbsp;&nbsp;&nbsp;
                        <i data-aos="fade-up" class="fas fa-clock me-1 text-white"></i>
                        {{ $blog->created_at->format('h:i A') }}
                    </small>

                    <!-- Social Icons -->
                    <div class="my-4 d-flex">
                        <a data-aos="fade-up" href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}"
                            target="_blank" class="social-icon me-3"><i class="fab fa-facebook-f"></i></a>
                        <a data-aos="fade-up"
                            href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareText }}"
                            target="_blank" class="social-icon me-3"><i class="fab fa-twitter"></i></a>
                        <a data-aos="fade-up"
                            href="https://www.linkedin.com/shareArticle?mini=true&url={{ $shareUrl }}&title={{ $shareText }}"
                            target="_blank" class="social-icon me-3"><i class="fab fa-linkedin-in"></i></a>
                        <a data-aos="fade-up" href="https://www.instagram.com/your_profile_username" target="_blank"
                            class="social-icon me-3"><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="text-center">
                        <!-- Blog Image -->
                        <img data-aos="fade-up" src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                            class="img-fluid rounded mb-4">
                    </div>
                    <!-- Blog Description -->
                    <div data-aos="fade-up" class="blog-description text-white">
                        {!! $blog->description !!}
                    </div>

                </div>
                <!-- Right Side - Sticky Sidebar -->
                <div class="col-md-4">
                    <div class="sticky-top" style="top: 50px;"> {{-- Change position-sticky to sticky-top --}}
                        <div class="p-3 border-0 rounded">
                            <h5 data-aos="fade-up" class="mb-3 text-white"><b>Recent Posts</b></h5>
                            <ul class="nav flex-column">
                                @foreach ($blogs as $blog)
                                    <li class="nav-item text-start">
                                        <a data-aos="fade-up" class="nav-link  blog-posts"
                                            href="{{ route('blog.detail', $blog->id) }}">
                                            {{ Str::limit($blog->title, 50) }}
                                        </a>
                                        <small data-aos="fade-up" class="text-muted d-block mt-1"
                                            style="padding: .5rem 1rem;">
                                            <i class="fas fa-calendar-alt me-1 text-white"></i>
                                            {{ \Carbon\Carbon::parse($blog->created_at)->format('d/F/Y') }}
                                            &nbsp;&nbsp;&nbsp;
                                            <i class="fas fa-clock me-1"></i> {{ $blog->created_at->format('h:i A') }}
                                        </small>
                                        <hr>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
