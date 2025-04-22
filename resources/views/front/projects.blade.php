@extends('front.include.app')
@section('title', 'Projects | Remodeling Expert')
@section('content')

    <style>
        .project-banner {
            background-image: url('{{ $data?->getFirstMediaUrl('banner_image') ?: asset('front/images/image (9).png') }}');
            background-size: cover;
            background-position: center;
            height: 400px;
            /* Set a fixed height to avoid stretching */
        }
    </style>
    <!-- Banner Section -->
    <div class="project-banner banner text-center">
        <div class="mx-auto" style="max-width: 700px;">
            <h1 class="text-white bold" style="font-weight: 700 !important;">{{ $content['banner_section_heading'] ?? '' }}
            </h1>
        </div>
    </div>

    <section class="container my-5">
        <div class="row">
            @foreach ($projects as $project)
                <div class="col-lg-3 mb-4">
                    <div class="position-relative">
                        <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid w-100 project-image"
                            alt="{{ $project->title }}">
                        <div class="overlay-box bg-white p-3 position-absolute">
                            <h5>{{ $project->title }}</h5>
                            <p>{{ Str::limit(strip_tags($project->description), 40) ?: '' }}</p>
                            <a href="{{ route('project.detail', $project->id) }}" class="btn btn-sm"
                                style="color: #2fa8fa;">
                                <b><i>VIEW PROJECT</i></b>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
