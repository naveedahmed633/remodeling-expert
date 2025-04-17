@extends('front.include.app')
@section('title', 'Services | Remodeling Expert')
@section('content')

    <!-- Banner Section -->
    <div class="classic-banner banner text-center">
        <div class="mx-auto" style="max-width: 700px;">
            <h1 class="text-white">Classic & Professional</h1>
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
  

    <section class="py-5">
        <div class="container">
          <div class="row g-4">
      
            <!-- Blog Card 1 -->
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-md-6">
                  <img src="{{ asset('front/images/image (18).png') }}" alt="Blog Image 1" class="img-fluid w-100">
                </div>
                <div class="col-md-6">
                  <p class="mb-1" style="color: #2980b9;"><strong>02/JUNE/2025</strong></p>
                  <h5 class="fw-bold">Modern Home Design Trends</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vehicula malesuada nisi eu rutrum. Maecenas purus diam, lobortis at velit eget, ultricies posuere augue. Nullam nec lectus a augue dictum euismod ut sed ex. Integer pretium arcu neque, vitae mollis massa consequat eu. In eget dolor luctus, varius dui fringilla, lobortis odio. Cras molestie nunc pretium, dictum lorem vel, vulputate mi. Etiam ac ligula bibendum, luctus diam sit amet, rutrum ipsum.</p>
                  <a href="#" style="text-decoration: underline; color: #2980b9;">Read More</a>
                </div>
              </div>
            </div>
      
            <!-- Blog Card 2 -->
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-md-6">
                  <img src="{{ asset('front/images/image (22).png') }}" alt="Blog Image 2" class="img-fluid w-100">
                </div>
                <div class="col-md-6">
                  <p class="mb-1" style="color: #2980b9;"><strong>15/MAY/2025</strong></p>
                  <h5 class="fw-bold">Creating Space with Style</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vehicula malesuada nisi eu rutrum. Maecenas purus diam, lobortis at velit eget, ultricies posuere augue. Nullam nec lectus a augue dictum euismod ut sed ex. Integer pretium arcu neque, vitae mollis massa consequat eu. In eget dolor luctus, varius dui fringilla, lobortis odio. Cras molestie nunc pretium, dictum lorem vel, vulputate mi. Etiam ac ligula bibendum, luctus diam sit amet, rutrum ipsum.</p>
                  <a href="#" style="text-decoration: underline; color: #2980b9;">Read More</a>
                </div>
              </div>
            </div>
      
            <!-- Blog Card 3 -->
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-md-6">
                  <img src="{{ asset('front/images/image (23).png') }}" alt="Blog Image 3" class="img-fluid w-100">
                </div>
                <div class="col-md-6">
                  <p class="mb-1" style="color: #2980b9;"><strong>30/APRIL/2025</strong></p>
                  <h5 class="fw-bold">Kitchen Makeovers 101</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vehicula malesuada nisi eu rutrum. Maecenas purus diam, lobortis at velit eget, ultricies posuere augue. Nullam nec lectus a augue dictum euismod ut sed ex. Integer pretium arcu neque, vitae mollis massa consequat eu. In eget dolor luctus, varius dui fringilla, lobortis odio. Cras molestie nunc pretium, dictum lorem vel, vulputate mi. Etiam ac ligula bibendum, luctus diam sit amet, rutrum ipsum.</p>
                  <a href="#" style="text-decoration: underline; color: #2980b9;">Read More</a>
                </div>
              </div>
            </div>
      
            <!-- Blog Card 4 -->
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-md-6">
                  <img src="{{ asset('front/images/image (24).png') }}" alt="Blog Image 4" class="img-fluid w-100">
                </div>
                <div class="col-md-6">
                  <p class="mb-1" style="color: #2980b9;"><strong>10/MARCH/2025</strong></p>
                  <h5 class="fw-bold">The Art of Interior Lighting</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vehicula malesuada nisi eu rutrum. Maecenas purus diam, lobortis at velit eget, ultricies posuere augue. Nullam nec lectus a augue dictum euismod ut sed ex. Integer pretium arcu neque, vitae mollis massa consequat eu. In eget dolor luctus, varius dui fringilla, lobortis odio. Cras molestie nunc pretium, dictum lorem vel, vulputate mi. Etiam ac ligula bibendum, luctus diam sit amet, rutrum ipsum.</p>
                  <a href="#" style="text-decoration: underline; color: #2980b9;">Read More</a>
                </div>
              </div>
            </div>
      
          </div>
        </div>
      </section>
      

    <x-get-started />
@endsection
