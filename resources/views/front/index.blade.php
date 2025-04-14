@extends('front.include.app')
@section('title', 'Home | Total Upgrade Remodeling Expert')
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
            <button class="btn btn-primary">START NOW</button>
        </div>
    </div>

    <x-home-transform-section 
        heading="Transforming Homes with Expert Craftsmanship"
        paragraph-one="At Remodelling Experts, we bring innovation, precision, and quality to every
        remodeling project. With years of experience, our team specializes in creating stunning, functional
        spaces that enhance your home’s beauty and value."
        paragraph-two="We take pride in our attention to detail, seamless project management, and
        commitment to customer satisfaction. Whether it's a kitchen, bathroom, or whole-home renovation, we
        ensure a stress-free experience and exceptional results."
        paragraph-three="Let’s build something amazing together!"
        image-path="front/images/3d-rendering-loft-luxury-living-room-with-bookshelf.png"
        button-text="LEARN MORE" button-url="#" />

        <section class="py-5">
          <div class="container text-center">
            <h2 class="mb-5">Your all-in-one destination for interior solutions</h2>
            <p>At Remodelling Experts, we bring innovation, precision, and quality to every remodeling project. With years of experience, our team specializes in creating stunning, functional spaces that enhance your home’s beauty and value.</p>
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
        
            <a href="#" class="btn btn-primary mt-4">MORE SERVICES</a>
          </div>
        </section>        

    <x-get-estimate />

    <x-before-after />

    <x-trusted-experts />

    <x-get-started />
@endsection
