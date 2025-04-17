@extends('front.include.app')
@section('title', 'Contact Us | Remodeling Expert')
@section('content')
    
    <!-- Banner Section -->
    <div class="classic-banner banner text-center">
        <div class="mx-auto" style="max-width: 700px;">
            <h1 class="text-white">Contact Us</h1>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row text-dark py-5" style="background-color: #eaf6ff;">

                <!-- Address -->
                <div class="col-md-4 mb-4 mb-md-0 text-center p-5">
                    <h5 class="fw-bold">Address</h5>
                    <p class="mb-1">Your Company Name 333 Street</p>
                    <p class="mb-1">City Name, Postal Code Zip Code</p>
                </div>

                <!-- Office Hours -->
                <div class="col-md-4 mb-4 mb-md-0 text-center p-5">
                    <h5 class="fw-bold">Office Hours</h5>
                    <p class="mb-1">Mon-Fri: 08:00 AM - 05:00 PM</p>
                    <p class="mb-0">Sat-Sun: Emergency only</p>
                </div>

                <!-- Phone Number -->
                <div class="col-md-4 d-flex flex-column align-items-center justify-content-center text-center p-5">
                    <h5 class="fw-bold">Phone Number</h5>
                    <p class="mb-1">Main Phone Line</p>
                    <p class="mb-0" style="color: #1abc9c;">(111) 123-1234</p>
                </div>

            </div>
        </div>
    </section>

    <section class="py-5" style="background-color: #e5e8e9;">
        <div class="container">
            <div class="row align-items-center justify-content-center">

                <!-- Left Side Content -->
                <div class="col-md-6 text-start mb-4 mb-md-0">
                    <h2 class="fw-bold">Get in touch with us</h2>
                    <p>Please fill out the form with all required information and we will get back to you within 3 business
                        days.</p>
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
                        <button type="submit" class="btn btn-primary px-5 py-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <x-get-started />
@endsection
