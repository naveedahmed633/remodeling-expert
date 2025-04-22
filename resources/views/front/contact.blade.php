@extends('front.include.app')
@section('title', 'Contact Us | Remodeling Expert')
@section('content')
    <style>
        .classic-banner {
            background-image: url('{{ $data?->getFirstMediaUrl('banner_image') ?: asset('front/images/image (25).png') }}');
        }
    </style>
    <!-- Banner Section -->
    <div class="classic-banner banner text-center">
        <div class="mx-auto" style="max-width: 700px;">
            <h1 data-aos="fade-up" class="text-white bold" style="font-weight: 700 !important;">{!! $content['banner_section_heading'] ?? '' !!}</h1>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row text-dark py-5" style="background-color: #eaf6ff;">

                <!-- Address -->
                <div class="col-md-4 mb-4 mb-md-0 text-center p-5">
                    <h5 data-aos="fade-up" class="fw-bold bold" style="font-weight: 700 !important;">{!! $content['address_heading'] ?? '' !!}</h5>
                    <p data-aos="fade-up" class="mb-1">{!! $content['address_description_1'] ?? '' !!}</p>
                    <p data-aos="fade-up" class="mb-1">{!! $content['address_description_2'] ?? '' !!}</p>
                </div>

                <!-- Office Hours -->
                <div class="col-md-4 mb-4 mb-md-0 text-center p-5">
                    <h5 data-aos="fade-up" class="fw-bold bold" style="font-weight: 700 !important;">{!! $content['office_hours_heading'] ?? '' !!}</h5>
                    <p data-aos="fade-up" class="mb-1">{!! $content['office_hours_description_1'] ?? '' !!}</p>
                    <p data-aos="fade-up" class="mb-0">{!! $content['office_hours_description_2'] ?? '' !!}</p>
                </div>

                <!-- Phone Number -->
                <div class="col-md-4 d-flex flex-column align-items-center justify-content-center text-center p-5">
                    <h5 data-aos="fade-up" class="fw-bold bold" style="font-weight: 700 !important;">{!! $content['phone_number_heading'] ?? '' !!}</h5>
                    <p data-aos="fade-up" class="mb-1">{!! $content['phone_number_description_1'] ?? '' !!}</p>
                    <p data-aos="fade-up" class="mb-0" style="color: #1abc9c;">
                        {!! $content['phone_number_description_2'] ?? '' !!}</p>
                </div>

            </div>
        </div>
    </section>

    <section class="py-5" style="background-color: #e5e8e9;">
        <div class="container">
            <div class="row align-items-center justify-content-center">

                <!-- Left Side Content -->
                <div class="col-md-6 text-start mb-4 mb-md-0">
                    <h2 data-aos="fade-up" class="fw-bold" style="font-weight: 700 !important;">{!! $content['get_in_touch_heading'] ?? '' !!}</h2>
                    <p data-aos="fade-up">{!! $content['get_in_touch_description'] ?? '' !!}</p>
                </div>

                <!-- Right Side Form -->
                <div class="col-md-6" data-aos="fade-up">
                    <form>
                        <div class="row mb-3">
                            <div class="col">
                                <label data-aos="fade-up" for="firstName" class="form-label">First Name</label>
                                <input type="text" id="firstName" class="form-control">
                            </div>
                            <div class="col">
                                <label data-aos="fade-up" for="lastName" class="form-label">Last Name</label>
                                <input type="text" id="lastName" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label data-aos="fade-up" for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control">
                            </div>
                            <div class="col">
                                <label data-aos="fade-up" for="phone" class="form-label">Phone Number</label>
                                <input type="text" id="phone" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label data-aos="fade-up" for="message" class="form-label">Message</label>
                            <textarea id="message" rows="4" class="form-control"></textarea>
                        </div>
                        <button data-aos="fade-up" type="submit" class="btn btn-primary custom-btn btn-14 banner-btn"
                            style="padding: 10px 40px !important; font-weight: 800 !important;">{!! $content['get_in_touch_button_text'] ?? '' !!}</button>
                    </form>
                </div>
            </div>
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
