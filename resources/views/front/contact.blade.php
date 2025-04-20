@extends('front.include.app')
@section('title', 'Contact Us | Remodeling Expert')
@section('content')
<style>
    .classic-banner {
        background-image: url('{{ $data?->getFirstMediaUrl('banner_image') ?? '' }}');
    }
</style>
    <!-- Banner Section -->
    <div class="classic-banner banner text-center">
        <div class="mx-auto" style="max-width: 700px;">
            <h1 class="text-white">{{ $content['banner_section_heading'] ?? '' }}</h1>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row text-dark py-5" style="background-color: #eaf6ff;">

                <!-- Address -->
                <div class="col-md-4 mb-4 mb-md-0 text-center p-5">
                    <h5 class="fw-bold">{{ $content['banner_section_heading'] ?? '' }}</h5>
                    <p class="mb-1">{{ $content['banner_section_heading'] ?? '' }}</p>
                    <p class="mb-1">{{ $content['banner_section_heading'] ?? '' }}</p>
                </div>

                <!-- Office Hours -->
                <div class="col-md-4 mb-4 mb-md-0 text-center p-5">
                    <h5 class="fw-bold">{{ $content['banner_section_heading'] ?? '' }}</h5>
                    <p class="mb-1">{{ $content['banner_section_heading'] ?? '' }}</p>
                    <p class="mb-0">{{ $content['banner_section_heading'] ?? '' }}</p>
                </div>

                <!-- Phone Number -->
                <div class="col-md-4 d-flex flex-column align-items-center justify-content-center text-center p-5">
                    <h5 class="fw-bold">{{ $content['banner_section_heading'] ?? '' }}</h5>
                    <p class="mb-1">{{ $content['banner_section_heading'] ?? '' }}</p>
                    <p class="mb-0" style="color: #1abc9c;">{{ $content['banner_section_heading'] ?? '' }}</p>
                </div>

            </div>
        </div>
    </section>

    <section class="py-5" style="background-color: #e5e8e9;">
        <div class="container">
            <div class="row align-items-center justify-content-center">

                <!-- Left Side Content -->
                <div class="col-md-6 text-start mb-4 mb-md-0">
                    <h2 class="fw-bold">{{ $content['banner_section_heading'] ?? '' }}</h2>
                    <p>{{ $content['banner_section_heading'] ?? '' }}</p>
                </div>

                <!-- Right Side Form -->
                <div class="col-md-6">
                    <form>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" id="firstName" class="form-control">
                            </div>
                            <div class="col">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" id="lastName" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control">
                            </div>
                            <div class="col">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" id="phone" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea id="message" rows="4" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 py-2">Submit</button>
                    </form>
                </div>
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
            <h2 class="fw-bold mb-3 text-white">{{ $content['get_started_heading'] ?? '' }}</h2>
            <p class="mb-4">{{ $content['get_started_description'] ?? '' }}</p>
            <a href="{{ $content['get_started_button_url'] ?? '' }}"
                class="btn btn-primary p-3">{{ $content['get_started_button_text'] ?? '' }}</a>
        </div>
    </section>
@endsection
