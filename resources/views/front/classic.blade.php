@extends('front.include.app')
@section('title', 'Classic & Professional | Remodeling Expert')
@section('content')

    <!-- Banner Section -->
    <div class="classic-banner banner text-center">
        <div class="mx-auto" style="max-width: 700px;">
            <h1 class="text-white">Classic & Professional</h1>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row align-items-start">

                <!-- Left Column - Image and Paragraph -->
                <div class="col-md-8 mb-4">
                    <img src="{{ asset('front/images/image (18).png') }}" alt="Main Image" class="img-fluid mb-3">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vehicula malesuada nisi eu rutrum.
                        Maecenas purus diam, lobortis at velit eget, ultricies posuere augue. Nullam nec lectus a augue
                        dictum euismod ut sed ex. Integer pretium arcu neque, vitae mollis massa consequat eu. In eget dolor
                        luctus, varius dui fringilla, lobortis odio. Cras molestie nunc pretium, dictum lorem vel, vulputate
                        mi. Etiam ac ligula bibendum, luctus diam sit amet, rutrum ipsum.</p>
                </div>

                <!-- Right Column - Details -->
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">Classic & Professional</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vehicula malesuada nisi eu rutrum.
                        Maecenas purus diam, lobortis at velit eget, ultricies posuere augue. Nullam nec lectus a augue
                        dictum euismod ut sed ex. Integer pretium arcu neque, vitae mollis massa consequat eu. In eget dolor
                        luctus, varius dui fringilla, lobortis odio. Cras molestie nunc pretium, dictum lorem vel, vulputate
                        mi. Etiam ac ligula bibendum, luctus diam sit amet, rutrum ipsum.</p><br>
                    <div class="mb-2 d-flex">
                        <strong style="min-width: 100px;">Client</strong>
                        <span>Lost Image</span>
                    </div>
                    <div class="mb-2 d-flex">
                        <strong style="min-width: 100px;">Year</strong>
                        <span>2019</span>
                    </div>
                    <div class="mb-2 d-flex">
                        <strong style="min-width: 100px;">Author</strong>
                        <span>John Doe</span>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ asset('front/images/image (19).png') }}" alt="Main Image" class="img-fluid mb-3">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('front/images/image (20).png') }}" alt="Main Image" class="img-fluid mb-3">
                        </div>
                    </div>
                    <img src="{{ asset('front/images/image (21).png') }}" alt="Main Image" class="img-fluid mb-3">
                </div>
            </div>
        </div>
    </section>


    <x-get-started />
@endsection
