@extends('front.include.app')
@section('title', 'Home | Total Upgrade Remodeling Expert')
@section('content')

    <!-- Banner Section -->
    <div class="home-banner text-center">
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

    <x-get-estimate />

    <x-before-after />

    <x-trusted-experts />

    <x-get-started />
@endsection
