@extends('front.include.app')
@section('title', 'Home | Remodeling Expert')
@section('content')

    <!-- Banner Section -->
    <div class="home-banner banner text-center">
        <div class="mx-auto" style="max-width: 700px;">
            <h1 class="text-white">Transform Your Home with Expert Remodeling</h1>
            <p class="text-white">
                Transform your space with precision and style. Our expert remodeling services deliver high-quality
                craftsmanship,
                innovative designs, and seamless execution to bring your vision to life.
            </p>
            <button class="btn btn-primary p-3">START NOW</button>
        </div>
    </div>

    <x-home-transform-section heading="Transforming Homes with Expert Craftsmanship"
        paragraph-one="At Remodelling Experts, we bring innovation, precision, and quality to every
        remodeling project. With years of experience, our team specializes in creating stunning, functional
        spaces that enhance your home’s beauty and value."
        paragraph-two="We take pride in our attention to detail, seamless project management, and
        commitment to customer satisfaction. Whether it's a kitchen, bathroom, or whole-home renovation, we
        ensure a stress-free experience and exceptional results."
        paragraph-three="Let’s build something amazing together!"
        image-path="front/images/3d-rendering-loft-luxury-living-room-with-bookshelf.png" button-text="LEARN MORE"
        button-url="#" />

    <section class="py-5">
        <div class="container text-center">
            <div class="row d-flex justify-content-center">
                <div class="col-7">
                    <h2 class="mb-5">Your all-in-one destination for interior solutions</h2>
                    <p>At Remodelling Experts, we bring innovation, precision, and quality to every remodeling project. With
                        years
                        of experience, our team specializes in creating stunning, functional spaces that enhance your home’s
                        beauty
                        and value.</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-3 mb-4">
                    <img src="{{ asset('front/images/all-in-one.png') }}" class="img-fluid equal-height" alt="Image 1">
                    <h5 class="mt-3">Interior Remodeling</h5>
                </div>
                <div class="col-md-3 mb-4">
                    <img src="{{ asset('front/images/image (2).png') }}" class="img-fluid equal-height" alt="Image 2">
                    <h5 class="mt-3">Interior Remodeling</h5>
                </div>
                <div class="col-md-3 mb-4">
                    <img src="{{ asset('front/images/image (3).png') }}" class="img-fluid equal-height" alt="Image 3">
                    <h5 class="mt-3">Plumbing</h5>
                </div>
                <div class="col-md-3 mb-4">
                    <img src="{{ asset('front/images/image (4).png') }}" class="img-fluid equal-height" alt="Image 4">
                    <h5 class="mt-3">HVAC</h5>
                </div>
            </div>

            <a href="#" class="btn btn-primary mt-4 p-3">MORE SERVICES</a>
        </div>
    </section>

    <x-get-estimate />

    <x-before-after />

    <x-trusted-experts />

    <section class="py-5">
        <div class="container">
            <div class="row d-flex justify-content-center  text-center">
                <div class="col-7">
                    <h2 class="mb-5">Recent Projects</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed
                        cursus ante
                        dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.</p>
                </div>
            </div>
            <div class="row">
                <!-- Card 1 -->
                <div class="col-md-3 mb-4">
                    <div class="position-relative">
                        <img src="{{ asset('front/images/image (5).png') }}" class="img-fluid w-100" alt="Image 1">
                        <div class="overlay-box bg-white p-3 position-absolute">
                            <h5>Classic & Professional</h5>
                            <p>Elevating Homes with Expert Craftsmanship</p>
                            <a href="#" class="btn btn-sm" style="color: #2980b9;"><b><i>VIEW PROJECT</i></b></a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-3 mb-4">
                    <div class="position-relative">
                        <img src="{{ asset('front/images/image (6).png') }}" class="img-fluid w-100" alt="Image 2">
                        <div class="overlay-box bg-white p-3 position-absolute">
                            <h5>Modern & Sleek</h5>
                            <p>Redefining Spaces with Innovation & Style</p>
                            <a href="#" class="btn btn-sm" style="color: #2980b9;"><b><i>VIEW PROJECT</i></b></a>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-3 mb-4">
                    <div class="position-relative">
                        <img src="{{ asset('front/images/image (7).png') }}" class="img-fluid w-100" alt="Image 3">
                        <div class="overlay-box bg-white p-3 position-absolute">
                            <h5>Customer-Focused</h5>
                            <p>Designed for Your Vision, Built for Your Life.</p>
                            <a href="#" class="btn btn-sm" style="color: #2980b9;"><b><i>VIEW PROJECT</i></b></a>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-md-3 mb-4">
                    <div class="position-relative">
                        <img src="{{ asset('front/images/image (8).png') }}" class="img-fluid w-100" alt="Image 4">
                        <div class="overlay-box bg-white p-3 position-absolute">
                            <h5>Luxury & High-End</h5>
                            <p>Where Elegance Meets Functionality</p>
                            <a href="#" class="btn btn-sm" style="color: #2980b9;"><b><i>VIEW PROJECT</i></b></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Centered Button -->
            <div class="text-center mt-4">
                <a href="#" class="btn btn-primary p-3">MORE PROJECTS</a>
            </div>
        </div>
    </section>

    <x-get-started />
@endsection
