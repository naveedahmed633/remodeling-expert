<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Site Title')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('front/images/logo_1.png') }}">

    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/style.css') }}?v={{ time() }}" rel="stylesheet">
    <link href="{{ asset('front/css/aos.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>


<body>

    <nav id="mainNavbar" class="navbar navbar-expand-lg fixed-top mt-5" data-aos="fade-up">
        <div class="container d-flex justify-content-between align-items-center">

            <!-- Left Nav Links + Toggle Button -->
            <div class="d-flex align-items-center">
                {{-- <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarLeft" aria-controls="navbarLeft" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars text-white fs-4"></i>
                </button> --}}
                <a class="navbar-brand ms-auto d-lg-none text-center" href="/">
                    <img src="{{ asset('front/images/Group 135.png') }}" alt="Logo" class="my-2" style="">
                    {{-- <div class="text-white small fw-bold">TOTAL UPGRADE</div>
                    <div class="text-white small fw-thin">REMODELING EXPERT</div> --}}
                </a>
                <div class="collapse navbar-collapse" id="navbarLeft">
                    <ul class="navbar-nav me-3 mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link text-white active" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('about') }}">About Us</a>
                        </li>
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('services') }}">Our
                            Services</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('project') }}">Projects</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Center Logo on large screen | Right Logo on small -->
            <div class="position-absolute start-50 translate-middle-x text-center d-none d-lg-block">
                <a class="navbar-brand d-block" href="/">
                    <img src="{{ asset('front/images/logo_1.png') }}" alt="Logo"  class="my-2" style="width: 40px; height: 40px;">
                    <div class="text-white small fw-bold">TOTAL UPGRADE</div>
                    <div class="text-white small fw-thin">REMODELING EXPERT</div>
                </a>
            </div>
            {{-- <a class="navbar-brand ms-auto d-lg-none text-center" href="/">
                <img src="{{ asset('front/images/logo_1.png') }}" alt="Logo" class="my-2" style="width: 30px; height: 30px;">
                <div class="text-white small fw-bold">TOTAL UPGRADE</div>
                <div class="text-white small fw-thin">REMODELING EXPERT</div>
            </a> --}}
            <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarLeft" aria-controls="navbarLeft" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars text-white fs-4"></i>
                </button>

            <!-- Search Form: Visible on lg+, hidden on small -->
            <form class="d-none d-lg-flex" role="search">
                <a href="#" class="btn btn-primary banner-btn bold custom-btn btn-14" style="padding: 12px 35px !important; font-size: larger !important;">(123) 456-7890</a>
            </form>            

        </div>
    </nav>
