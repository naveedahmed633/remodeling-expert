@extends('front.include.app')
@section('title', 'Services | Remodeling Expert')
@section('content')

    <!-- Banner Section -->
    <div class="classic-banner banner text-center">
        <div class="mx-auto" style="max-width: 700px;">
            <h1 class="text-white">Blogs</h1>
        </div>
    </div>

    <section class="py-5">
      <div class="container">
          <div class="row g-4">
              @foreach($blogs as $blog)
                  <div class="col-12">
                      <div class="row align-items-center">
                          <div class="col-md-6">
                              <img src="{{ asset('storage/' .  $blog->image) }}" alt="Blog Image" class="img-fluid w-100">
                          </div>
                          <div class="col-md-6">
                              <p class="mb-1" style="color: #2980b9;">
                                  <strong>{{ strtoupper(\Carbon\Carbon::parse($blog->created_at)->format('d/F/Y')) }}</strong>
                              </p>
                              <h5 class="fw-bold">{{ $blog->title }}</h5>
                              <p>{{ Str::limit(strip_tags($blog->description), 300) }}</p>
                              <a href="{{ route('blog.detail', $blog->id) }}" style="text-decoration: underline; color: #2980b9;">Read More</a>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
  </section>

    <x-get-started />
@endsection
