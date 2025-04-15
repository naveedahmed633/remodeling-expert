@extends('front.include.app')
@section('title', 'Services | Remodeling Expert')
@section('content')
    <!-- Banner Section -->
    <div class="services-banner banner text-center">
        <div class="mx-auto" style="max-width: 700px;">
            <h1 class="text-white">Our Services</h1>
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

    <section class="container my-5">
        <div class="row mt-5">
            <!-- Card 1 -->
            <div class="col-lg-4 mb-4 height-335">
                <div class="position-relative">
                    <img src="{{ asset('front/images/image (10).png') }}" class="img-fluid w-100" alt="Image 1">
                    <div class="overlay-box bg-white p-3 position-absolute bottom-minus">
                        <h5>Interior Remodeling</h5>
                        <p>Modern upgrades for kitchens, bathrooms, and living spaces.</p>
                        <a href="#" class="btn btn-sm" style="color: #2980b9;"><b><i>Read More</i></b></a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-4 mb-4 height-335">
                <div class="position-relative">
                    <img src="{{ asset('front/images/image (11).png') }}" class="img-fluid w-100" alt="Image 2">
                    <div class="overlay-box bg-white p-3 position-absolute bottom-minus">
                        <h5>Exterior Remodeling</h5>
                        <p>Enhancing curb appeal with durable design renovations.</p>
                        <a href="#" class="btn btn-sm" style="color: #2980b9;"><b><i>Read More</i></b></a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-lg-4 mb-4 height-335">
                <div class="position-relative">
                    <img src="{{ asset('front/images/image (12).png') }}" class="img-fluid w-100" alt="Image 3">
                    <div class="overlay-box bg-white p-3 position-absolute bottom-minus">
                        <h5>Plumbing</h5>
                        <p>Modern upgrades for kitchens, bathrooms, and living spaces.</p>
                        <a href="#" class="btn btn-sm" style="color: #2980b9;"><b><i>Read More</i></b></a>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-lg-4 mb-4 height-335">
                <div class="position-relative">
                    <img src="{{ asset('front/images/image (13).png') }}" class="img-fluid w-100" alt="Image 4">
                    <div class="overlay-box bg-white p-3 position-absolute bottom-minus">
                        <h5>HVAC</h5>
                        <p>Efficient heating, cooling, and ventilation solutions.</p>
                        <a href="#" class="btn btn-sm" style="color: #2980b9;"><b><i>Read More</i></b></a>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col-lg-4 mb-4 height-335">
                <div class="position-relative">
                    <img src="{{ asset('front/images/image (14).png') }}" class="img-fluid w-100" alt="Image 4">
                    <div class="overlay-box bg-white p-3 position-absolute bottom-minus">
                        <h5>Electrical Work</h5>
                        <p>Modern upgrades for kitchens, bathrooms, and living spaces.</p>
                        <a href="#" class="btn btn-sm" style="color: #2980b9;"><b><i>Read More</i></b></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-trusted-experts />
@endsection
