@extends('front.include.app')
@section('title', 'Review & Checkout | Remodeling Expert')
@section('content')

    <!-- Banner Section -->
    <div class="py-5" style="background-color: #001626;"></div>

    <section class="py-5" style="background-color: #001626;">
        <div class="container">
            <div class="bg-white rounded p-4">
                <div class="row g-4 align-items-center">

                    <!-- Left Column (Card Tab) -->
                    <div class="col-lg-5">
                        <form action="/order-data" method="PODT" id="multiStepForm">
                            @csrf
                            <div class="order-form rounded p-4 h-100 d-flex flex-column justify-content-between"
                                style="background-color: #eef8ff;">
                                <div class="tab-content">
                                    <!-- Tab 1 -->
                                    <div class="tab-pane fade show active" id="tab1">
                                        <!-- Logo and Social Icons -->
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="{{ asset('front/images/logo_1.png') }}" alt="Logo"
                                                    width="40">
                                                <span class="text-center">
                                                    <div class="theme-color small fw-bold">TOTAL UPGRADE</div>
                                                    <div class="theme-color small fw-thin">REMODELING EXPERT</div>
                                                </span>
                                            </div>

                                            <div class="d-flex gap-2">
                                                <a href="#" class="social-icon"
                                                    style="background-color: black; padding: 10px; border-radius: 50%; text-decoration: none;">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                                <a href="#" class="social-icon"
                                                    style="background-color: black; padding: 10px; border-radius: 50%; text-decoration: none;">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                                <a href="#" class="social-icon"
                                                    style="background-color: black; padding: 10px; border-radius: 50%; text-decoration: none;">
                                                    <i class="fab fa-linkedin"></i>
                                                </a>
                                            </div>

                                        </div>

                                        <!-- Heading -->
                                        <h3 class="fw-bold">Step 1: Select a Service</h3>
                                        <p class="text-muted">The user chooses from the following service categories:</p>

                                        <!-- Input with underline -->
                                        <input type="text"
                                            class="form-control border-0 border-bottom mb-3 select-services"
                                            placeholder="Enter your data" style="background-color: transparent;" readonly>

                                        <!-- Checkboxes -->
                                        <div class="row stepOne service-section">
                                            <div class="col-6">
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]" type="checkbox"
                                                        value="" id="check1">
                                                    <label class="form-check-label mb-0" for="check1">Interior
                                                        Remodeling</label>
                                                </div>
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]" type="checkbox"
                                                        value="" id="check2">
                                                    <label class="form-check-label mb-0" for="check2">Exterior
                                                        Remodeling</label>
                                                </div>
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]" type="checkbox"
                                                        value="" id="check3">
                                                    <label class="form-check-label mb-0" for="check3">Plumbing</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]" type="checkbox"
                                                        value="" id="check4">
                                                    <label class="form-check-label mb-0" for="check4">HVAC</label>
                                                </div>
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]" type="checkbox"
                                                        value="" id="check5">
                                                    <label class="form-check-label mb-0" for="check5">Electric
                                                        Work</label>
                                                </div>
                                                {{-- <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]" type="checkbox" value=""
                                                        id="check6">
                                                    <label class="form-check-label mb-0" for="check6">Option 6</label>
                                                </div> --}}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab2">
                                        <!-- Logo and Social Icons -->
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="{{ asset('front/images/logo_1.png') }}" alt="Logo"
                                                    width="40">
                                                <span class="text-center">
                                                    <div class="theme-color small fw-bold">TOTAL UPGRADE</div>
                                                    <div class="theme-color small fw-thin">REMODELING EXPERT</div>
                                                </span>
                                            </div>

                                            <div class="d-flex gap-2">
                                                <a href="#" class="social-icon"
                                                    style="background-color: black; padding: 10px; border-radius: 50%; text-decoration: none;">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                                <a href="#" class="social-icon"
                                                    style="background-color: black; padding: 10px; border-radius: 50%; text-decoration: none;">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                                <a href="#" class="social-icon"
                                                    style="background-color: black; padding: 10px; border-radius: 50%; text-decoration: none;">
                                                    <i class="fab fa-linkedin"></i>
                                                </a>
                                            </div>

                                        </div>

                                        <!-- Heading -->
                                        <h3 class="fw-bold">Step 2: Subcategory Selection (if applicable)</h3>
                                        <p class="text-muted">If the user selects Interior Remodeling, they are prompted to
                                            specify which part of their home they want to remodel:</p>

                                        <!-- Input with underline -->
                                        <input type="text"
                                            class="form-control border-0 border-bottom mb-3 sub-category-input"
                                            placeholder="Enter your data" style="background-color: transparent;" readonly>

                                        <!-- Checkboxes -->
                                        <div class="row stepTwo subCategory">
                                            <div class="col-6">
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]"
                                                        type="checkbox" value="" id="check1">
                                                    <label class="form-check-label mb-0" for="check1">Bathroom</label>
                                                </div>
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]"
                                                        type="checkbox" value="" id="check2">
                                                    <label class="form-check-label mb-0" for="check2">Kitchen</label>
                                                </div>
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]"
                                                        type="checkbox" value="" id="check3">
                                                    <label class="form-check-label mb-0" for="check3">Bedroom</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]"
                                                        type="checkbox" value="" id="check4">
                                                    <label class="form-check-label mb-0" for="check4">Living
                                                        Room</label>
                                                </div>
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]"
                                                        type="checkbox" value="" id="check5">
                                                    <label class="form-check-label mb-0" for="check5">Other (Custom
                                                        Entry Option)</label>
                                                </div>
                                                {{-- <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]"
                                                        type="checkbox" value="" id="check6">
                                                    <label class="form-check-label mb-0" for="check6">Option 6</label>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab3">
                                        <!-- Logo and Social Icons -->
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="{{ asset('front/images/logo_1.png') }}" alt="Logo"
                                                    width="40">
                                                <span class="text-center">
                                                    <div class="theme-color small fw-bold">TOTAL UPGRADE</div>
                                                    <div class="theme-color small fw-thin">REMODELING EXPERT</div>
                                                </span>
                                            </div>

                                            <div class="d-flex gap-2">
                                                <a href="#" class="social-icon"
                                                    style="background-color: black; padding: 10px; border-radius: 50%; text-decoration: none;">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                                <a href="#" class="social-icon"
                                                    style="background-color: black; padding: 10px; border-radius: 50%; text-decoration: none;">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                                <a href="#" class="social-icon"
                                                    style="background-color: black; padding: 10px; border-radius: 50%; text-decoration: none;">
                                                    <i class="fab fa-linkedin"></i>
                                                </a>
                                            </div>

                                        </div>

                                        <!-- Heading -->
                                        <h3 class="fw-bold">Step 3: Remodel Type Selection (only for applicable
                                            services)</span></h3>
                                        <p class="text-muted">If the user selects Kitchen, they choose:</p>

                                        <!-- Input with underline -->
                                        <input type="text"
                                            class="form-control border-0 border-bottom mb-3 remodel-type-input"
                                            placeholder="Enter your data" style="background-color: transparent;" readonly>

                                        <!-- Checkboxes -->
                                        <div class="row stepThree remodelType">
                                            <div class="col-6">
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]"
                                                        type="checkbox" value="" id="check1">
                                                    <label class="form-check-label mb-0" for="check1">Partial
                                                        Remodel</label>
                                                </div>
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]"
                                                        type="checkbox" value="" id="check2">
                                                    <label class="form-check-label mb-0" for="check2">Full
                                                        Remodel</label>
                                                </div>
                                                {{-- <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]"
                                                        type="checkbox" value="" id="check3">
                                                    <label class="form-check-label mb-0" for="check3">Option 3</label>
                                                </div> --}}
                                            </div>
                                            {{-- <div class="col-6">
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]"
                                                        type="checkbox" value="" id="check4">
                                                    <label class="form-check-label mb-0" for="check4">Option 4</label>
                                                </div>
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]"
                                                        type="checkbox" value="" id="check5">
                                                    <label class="form-check-label mb-0" for="check5">Option 5</label>
                                                </div>
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]"
                                                        type="checkbox" value="" id="check6">
                                                    <label class="form-check-label mb-0" for="check6">Option 6</label>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab4">
                                        <!-- Logo and Social Icons -->
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="{{ asset('front/images/logo_1.png') }}" alt="Logo"
                                                    width="40">
                                                <span class="text-center">
                                                    <div class="theme-color small fw-bold">TOTAL UPGRADE</div>
                                                    <div class="theme-color small fw-thin">REMODELING EXPERT</div>
                                                </span>
                                            </div>

                                            <div class="d-flex gap-2">
                                                <a href="#" class="social-icon"
                                                    style="background-color: black; padding: 10px; border-radius: 50%; text-decoration: none;">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                                <a href="#" class="social-icon"
                                                    style="background-color: black; padding: 10px; border-radius: 50%; text-decoration: none;">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                                <a href="#" class="social-icon"
                                                    style="background-color: black; padding: 10px; border-radius: 50%; text-decoration: none;">
                                                    <i class="fab fa-linkedin"></i>
                                                </a>
                                            </div>

                                        </div>

                                        <!-- Heading -->
                                        <h3 class="fw-bold">Step 4: Specific
                                            Requirements
                                            (Customized per selection)</h3>
                                        <p class="text-muted">If the user selects Partial Remodel, they are asked:What
                                            specific aspects of your kitchen do you want to remodel?</p>

                                        <!-- Input with underline -->
                                        <input type="text"
                                            class="form-control border-0 border-bottom mb-3 requirements-input"
                                            placeholder="Enter your data" style="background-color: transparent;" readonly>

                                        <!-- Checkboxes -->
                                        <div class="row stepFour requirement">
                                            <div class="col-6">
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]"
                                                        type="checkbox" value="" id="check1">
                                                    <label class="form-check-label mb-0" for="check1">Cabinets</label>
                                                </div>
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]"
                                                        type="checkbox" value="" id="check2">
                                                    <label class="form-check-label mb-0" for="check2">Flooring</label>
                                                </div>
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]"
                                                        type="checkbox" value="" id="check3">
                                                    <label class="form-check-label mb-0" for="check3">Appliances</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]"
                                                        type="checkbox" value="" id="check4">
                                                    <label class="form-check-label mb-0" for="check4">Countertops
                                                    </label>
                                                </div>
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]"
                                                        type="checkbox" value="" id="check5">
                                                    <label class="form-check-label mb-0" for="check5">Backsplash</label>
                                                </div>
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="services[]"
                                                        type="checkbox" value="" id="check6">
                                                    <label class="form-check-label mb-0" for="check6">Lighting</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab5">
                                        <!-- Logo and Social Icons -->
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="{{ asset('front/images/logo_1.png') }}" alt="Logo"
                                                    width="40">
                                                <span class="text-center">
                                                    <div class="theme-color small fw-bold">TOTAL UPGRADE</div>
                                                    <div class="theme-color small fw-thin">REMODELING EXPERT</div>
                                                </span>
                                            </div>

                                            <div class="d-flex gap-2">
                                                <a href="#" class="social-icon"
                                                    style="background-color: black; padding: 10px; border-radius: 50%; text-decoration: none;">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                                <a href="#" class="social-icon"
                                                    style="background-color: black; padding: 10px; border-radius: 50%; text-decoration: none;">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                                <a href="#" class="social-icon"
                                                    style="background-color: black; padding: 10px; border-radius: 50%; text-decoration: none;">
                                                    <i class="fab fa-linkedin"></i>
                                                </a>
                                            </div>

                                        </div>

                                        <!-- Heading -->
                                        <h3 class="fw-bold">Step 5: Contact & Final Details</h3>
                                        {{-- <p class="text-muted">Please fill out the details below.</p> --}}

                                        <!-- Input with underline -->
                                        <input type="text" name="name"
                                            class="form-control border-0 border-bottom mb-3" placeholder="Name*"
                                            style="background-color: transparent;">

                                        <input type="number" name="phone"
                                            class="form-control border-0 border-bottom mb-3" placeholder="Phone*"
                                            style="background-color: transparent;">

                                        <input type="email" name="email"
                                            class="form-control border-0 border-bottom mb-3" placeholder="Email*"
                                            style="background-color: transparent;">

                                        <textarea name="message" class="form-control border-0 border-bottom mb-3" placeholder="Message"
                                            style="background-color: transparent;"></textarea>
                                    </div>
                                </div>

                                <!-- Continue Button -->
                                <div role="tablist">
                                    <button id="continueBtn" class="btn btn-primary mt-3 w-100 active"
                                        data-bs-toggle="tab" data-bs-target="#tab1">Continue</button>
                                </div>
                        </form>
                        <!-- Step Indicators -->
                        <div class="d-flex gap-2 mt-4" id="progressBars">
                            <div class="progress-step" data-step="1"
                                style="height: 10px; width: 100%; background-color: #ccc; border-radius: 5px;">
                            </div>
                            <div class="progress-step" data-step="2"
                                style="height: 10px; width: 100%; background-color: #ccc; border-radius: 5px;">
                            </div>
                            <div class="progress-step" data-step="3"
                                style="height: 10px; width: 100%; background-color: #ccc; border-radius: 5px;">
                            </div>
                            <div class="progress-step" data-step="4"
                                style="height: 10px; width: 100%; background-color: #ccc; border-radius: 5px;">
                            </div>
                            <div class="progress-step" data-step="5"
                                style="height: 10px; width: 100%; background-color: #ccc; border-radius: 5px;">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column (Image) -->
                <div class="col-lg-7">
                    <img src="{{ asset('front/images/image (26).png') }}" class="img-fluid rounded form-image"
                        alt="Form Image">
                </div>

            </div>
        </div>
        </div>
    </section>
    <script src="{{ asset('front/js/order.js') }}"></script>

@endsection
