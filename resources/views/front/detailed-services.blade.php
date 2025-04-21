@extends('front.include.app')
@section('title',  $service->title. ' | Remodeling Expert')
@section('content')

    <!-- Banner Section -->
    <div class="interior-banner banner text-center">
        <div class="mx-auto" style="max-width: 700px;">
            <h1 data-aos="fade-up" class="text-white">{{ $service->title }}</h1>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row">

                <!-- Left Side - col-md-8 -->
                <div class="col-lg-8 mb-4">
                    <div class="text-center mb-3">
                        <img data-aos="fade-up" src="{{ asset('storage/'.$service->image) }}" class="img-fluid w-100" alt="{{ $service->title }}">
                    </div>
                    <p data-aos="fade-up">{!! $service->description ?? '' !!}</p>
                </div>

                <!-- Right Side - col-md-4 -->
                <div class="col-lg-4">
                    <h3 data-aos="fade-up" class="mb-3"><b>Related Services</b></h3>
                    <div class="row mt-5">
                        @foreach ($services as $service)
                            <div class="mb-4 height-335">
                                <div class="position-relative">
                                    <img data-aos="fade-up" src="{{ asset('storage/' .  $service->image) }}" class="img-fluid w-100"
                                        alt="{{ $service->title }}">
                                    <div class="overlay-box bg-white p-3 position-absolute bottom-minus">
                                        <h5 data-aos="fade-up">{{ $service->title }}</h5>
                                        <p data-aos="fade-up">{{ Str::limit(strip_tags($service->description), 60) }}</p>
                                        <a data-aos="fade-up" href="{{ route('service.detail', $service->id) }}" class="btn btn-sm p-3" style="color: #2980b9;">
                                            <b><i>Read More</i></b>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    {{-- <x-before-after :content="$content"/>
    <x-get-started :content="$content"/> --}}
@endsection
