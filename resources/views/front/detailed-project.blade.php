@extends('front.include.app')
@section('title', $project->title . ' | Remodeling Expert')

@section('content')

    <!-- Banner Section -->
    <div class="classic-banner banner text-center">
        <div class="mx-auto" style="max-width: 700px;">
            <h1 data-aos="fade-up" class="text-white">{{ $project->title }}</h1>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row align-items-start">

                <!-- Left Column -->
                <div class="col-md-8 mb-4">
                    <img data-aos="fade-up" src="{{ asset('front/images/image (18).png') }}" alt="Main Project Image" class="img-fluid mb-3">
                    <p data-aos="fade-up">{!! $project->description1 ?? '' !!}</p>
                </div>

                <!-- Right Column -->
                <div class="col-md-4 mb-4">
                    <div class="p-3 border rounded bg-light">
                        <h5 data-aos="fade-up" class="fw-bold mb-3">{{ $project->title }}</h5>
                        <p data-aos="fade-up">{!! $project->description ?? '' !!}</p><br>
                        <div class="mb-2 d-flex">
                            <strong data-aos="fade-up" style="min-width: 100px;">Client</strong>
                            <span data-aos="fade-up">{{ $project->client }}</span>
                        </div>
                        <div class="mb-2 d-flex">
                            <strong data-aos="fade-up" style="min-width: 100px;">Year</strong>
                            <span data-aos="fade-up">{{ $project->year }}</span>
                        </div>
                        <div class="mb-2 d-flex">
                            <strong data-aos="fade-up" style="min-width: 100px;">Author</strong>
                            <span data-aos="fade-up">{{ $project->author }}</span>
                        </div>
                    </div>
                </div>

                <!-- Additional Images Section -->
                <div class="col-md-8 mt-4">
                    <h4 data-aos="fade-up" class="mb-4">More About This Project</h4>
                    <div class="row">
                        @if ($project->image1)
                            <div class="col-md-6">
                                <img data-aos="fade-up" src="{{ asset('storage/' . $project->image1) }}" class="img-fluid mb-3" alt="Project View 1">
                            </div>
                        @endif

                        @if ($project->image2)
                            <div class="col-md-6">
                                <img data-aos="fade-up" src="{{ asset('storage/' . $project->image2) }}" class="img-fluid mb-3" alt="Project View 2">
                            </div>
                        @endif

                        @if ($project->image3)
                            <div class="col-md-12">
                                <img data-aos="fade-up" src="{{ asset('storage/' . $project->image3) }}" class="img-fluid mb-3" alt="Project View 3">
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
{{-- 
    <x-get-started :content="$content"/> --}}
@endsection
