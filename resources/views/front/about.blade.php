@extends('front.include.app')
@section('title', 'About | Remodeling Expert')
@section('content')
    <!-- Banner Section -->
    <div class="about-banner banner text-center">
        <div class="mx-auto" style="max-width: 700px;">
            <h1 class="text-white">About Us</h1>
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

    <x-get-estimate />

    <x-before-after />

    <x-trusted-experts />
@endsection
