@extends('front.include.app')
@section('title', 'Services | Remodeling Expert')
@section('content')

<style>
       .services-banner {
            background-image: url('{{ $data?->getFirstMediaUrl('banner_image') ?: asset('front/images/spacejoy-9M66C_w_ToM-unsplash.png') }}');
            background-size: cover;
            background-position: center;
            height: 400px;
            /* Set a fixed height to avoid stretching */
        }
</style>

    <!-- Banner Section -->
    <div class="services-banner banner text-center">
        <div class="mx-auto" style="max-width: 700px;">
            <h1 class="text-white bold" style="font-weight: 700 !important;">Our Services</h1>
        </div>
    </div>

    <section class="py-5 transforming-md-screen">
        <div class="container position-relative">
            <div class="row">
                <!-- Image Column -->
                <div class="col-lg-6">
                    <img  data-aos="fade-up" src="{{ $data?->getFirstMediaUrl('transforming_homes_image') ?: asset('front/images/3d-rendering-loft-luxury-living-room-with-bookshelf (1).png') }}" alt="Sample"
                        class="img-fluid w-100">
                </div>

                <!-- Content Box Overlapping -->
                <div class="col-lg-7 position-absolute top-50 end-0 translate-middle-y bg-white p-5 shadow"
                    style="z-index: 10;">
                    <h3 class="mb-3 text-start bold" style="font-weight: 700 !important;"  data-aos="fade-up">{!! $content['transforming_homes_heading'] ?? '' !!}</h3>
                    <p class="text-start" data-aos="fade-up">{!! $content['transforming_homes_desc_1'] ?? '' !!}</p>
                    <p class="text-start" data-aos="fade-up">{!! $content['transforming_homes_desc_2'] ?? '' !!}</p>
                    <p class="text-start" data-aos="fade-up">{!! $content['transforming_homes_desc_3'] ?? '' !!}</p>
                    <div class="text-start mt-4">
                        <a href="{!! $content['transforming_homes_button_url'] ?? '' !!}"
                            class="btn custom-btn btn-14 btn-primary banner-btn" style="padding: 12px 40px !important;"  data-aos="fade-up">{!! $content['transforming_homes_button_text'] ?? '' !!}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <section class="container my-5">
            <div class="row mt-5">
                @foreach($services as $service)
                    <div class="col-lg-4 mb-4 height-335">
                        <div class="position-relative">
                            <img src="{{ asset('storage/' . $service->image) }}" class="img-fluid w-100"
                            alt="{{ $service->title }}">
                            <div class="overlay-box bg-white p-3 position-absolute bottom-minus">
                                <h5>{{ $service->title }}</h5>
                                <p>{{ Str::limit(strip_tags($service->description), 40) ? : '' }}</p>
                                <a href="{{ route('service.detail', $service->id) }}" class="btn btn-sm" style="color: #2fa8fa;"><b><i>Read More</i></b></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="position-relative py-5 mb-5">
            <div class="container position-relative z-2">
                <div class="row position-relative">
                    <div class="col-md-12 position-relative" style="z-index: 2;">
                        <div class="row">
                            <!-- White Box -->
                            <div class="col-lg-7 col-md-12">
                                <div class="bg-white d-flex p-5 shadow mt-5 trusted-white-box flex-column flex-lg-row align-items-start"
                                    style="width: 100%;">
                                    <div data-aos="fade-up" class="fs-1 text-primary mb-3 px-lg-4 px-0 trusted-quote-img">
                                        <img src="{{ asset('front/images/“.png') }}" alt="">
                                    </div>
                                    <div>
                                        <h6 data-aos="fade-up" class="text-uppercase text-theme-color">
                                            {!! $content['trusted_small_heading'] ?? '' !!}
                                        </h6>
                                        <h1 data-aos="fade-up" class="fw-bold my-3 bold" style="font-weight: 700 !important;">
                                            {!! $content['trusted_main_heading'] ?? '' !!}
                                        </h1>
                                        <p data-aos="fade-up" style="font-style: italic">
                                            {!! $content['trusted_description'] ?? '' !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Black Box -->
                            <div class="col-lg-7 col-md-12 ms-lg-auto">
                                <div class="p-4 py-5 text-white trusted-dark-box"
                                    style="background-color: #001626; width: 50%;">
                                    <h5 data-aos="fade-up" class="mb-2 text-white bold" style="font-weight: 700 !important;">
                                        {!! $content['dark_box_heading'] ?? '' !!}
                                    </h5>
                                    <p data-aos="fade-up" class="mb-1 text-white">
                                        {!! $content['dark_box_description'] ?? '' !!}
                                    </p>
                                    <h4 data-aos="fade-up" class="fw-bold mb-0 text-theme-color">
                                        {!! $content['dark_box_number'] ?? '' !!}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Background Image (Visible only on LG and above) -->
            <div class="position-absolute top-0 end-0 trusted-bg-image" style="width: 65%; z-index: 0; height: 85% !important">
                <img data-aos="fade-up"
                    src="{{ $data?->getFirstMediaUrl('trusted_section_image') ?: asset('front/images/image (30).png') }}"
                    alt="Image"
                    class="w-100 h-100 object-fit-cover">
            </div>
        </section>
@endsection
