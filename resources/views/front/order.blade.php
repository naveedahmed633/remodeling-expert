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
                    <form action="/order-data" method="POST" id="multiStepForm">
                        @csrf
                        <div class="order-form rounded p-4 h-100 d-flex flex-column justify-content-between" style="background-color: #eef8ff;">
                            <div class="tab-content">
                                <!-- Tab 1 -->
                                <div class="tab-pane fade show active" id="tab1">
                                    @include('partials.logo-social')
                                    <h3 class="fw-bold">Step 1: Select a Service</h3>
                                    <p class="text-muted">The user chooses from the following service categories:</p>

                                    <input type="text" class="form-control border-0 border-bottom mb-3 select-services" placeholder="Enter your data" style="background-color: transparent;" readonly>

                                    <div class="row stepOne service-section">
                                        @foreach ($servicesForm->chunk(ceil($servicesForm->count() / 2)) as $chunk)
                                            <div class="col-6">
                                                @foreach ($chunk as $service)
                                                    <div class="form-check d-flex align-items-center mb-2">
                                                        <input class="form-check-input me-2 service-checkbox" name="services[]" type="checkbox" value="{{ $service->id }}" id="check{{ $service->id }}">
                                                        <label class="form-check-label mb-0" for="check{{ $service->id }}">
                                                            {{ $service->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Tab 2 -->
                                <div class="tab-pane fade" id="tab2">
                                    @include('partials.logo-social')
                                    <h3 class="fw-bold">Step 2: Subcategory Selection (if applicable)</h3>
                                    <p class="text-muted">If the user selects Interior Remodeling, they are prompted to specify which part of their home they want to remodel:</p>

                                    <input type="text" class="form-control border-0 border-bottom mb-3 sub-category-input" placeholder="Enter your data" style="background-color: transparent;" readonly>

                                    <div class="row stepTwo subcategory-section">
                                        @foreach ($subServicesData as $subService)
                                            <div class="form-check d-flex align-items-center mb-2 subCategory" data-service-id="{{ $subService->service_id }}" style="display: none;">
                                                <input class="form-check-input me-2" name="subservices[]" type="checkbox" value="{{ $subService->id }}" id="sub{{ $subService->id }}">
                                                <label class="form-check-label mb-0" for="sub{{ $subService->id }}">
                                                    {{ $subService->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Tab 3 -->
                                <div class="tab-pane fade" id="tab3">
                                    @include('partials.logo-social')
                                    <h3 class="fw-bold">Step 3: Remodel Type Selection</h3>
                                    <p class="text-muted">If the user selects Kitchen, they choose:</p>

                                    <input type="text" class="form-control border-0 border-bottom mb-3 remodel-type-input" placeholder="Enter your data" style="background-color: transparent;" readonly>

                                    <div class="row stepThree remodelType">
                                        @foreach ($remodelTypes as $type)
                                            <div class="col-6">
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2" name="remodel_types[]" type="checkbox" value="{{ $type->id }}" id="remodel{{ $type->id }}">
                                                    <label class="form-check-label mb-0" for="remodel{{ $type->id }}">
                                                        {{ $type->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Tab 4 -->
                                <div class="tab-pane fade" id="tab4">
                                    @include('partials.logo-social')
                                    <h3 class="fw-bold">Step 4: Specific Requirements</h3>
                                    <p class="text-muted">If the user selects Partial Remodel, they are asked: What specific aspects do you want to remodel?</p>

                                    <input type="text" class="form-control border-0 border-bottom mb-3 requirements-input" placeholder="Enter your data" style="background-color: transparent;" readonly>

                                    {{-- <div class="row stepFour requirement">
                                        @foreach ($requirements->chunk(ceil($requirements->count() / 2)) as $chunk)
                                            <div class="col-6">
                                                @foreach ($chunk as $requirement)
                                                    <div class="form-check d-flex align-items-center mb-2">
                                                        <input class="form-check-input me-2" name="requirements[]" type="checkbox" value="{{ $requirement->id }}" id="requirement{{ $requirement->id }}">
                                                        <label class="form-check-label mb-0" for="requirement{{ $requirement->id }}">
                                                            {{ $requirement->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div> --}}
                                </div>

                                <!-- Tab 5 -->
                                <div class="tab-pane fade" id="tab5">
                                    @include('partials.logo-social')
                                    <h3 class="fw-bold">Step 5: Contact & Final Details</h3>

                                    <input type="text" name="name" class="form-control border-0 border-bottom mb-3" placeholder="Name*" style="background-color: transparent;">
                                    <input type="number" name="phone" class="form-control border-0 border-bottom mb-3" placeholder="Phone*" style="background-color: transparent;">
                                    <input type="email" name="email" class="form-control border-0 border-bottom mb-3" placeholder="Email*" style="background-color: transparent;">
                                    <textarea name="message" class="form-control border-0 border-bottom mb-3" placeholder="Message" style="background-color: transparent;"></textarea>
                                </div>
                            </div>

                            <!-- Continue Button -->
                            <div role="tablist">
                                <button type="button" id="continueBtn" class="btn btn-primary mt-3 w-100" data-bs-toggle="tab" data-bs-target="#tab2">Continue</button>
                            </div>
                        </div>
                    </form>

                    <!-- Step Indicators -->
                    <div class="d-flex gap-2 mt-4" id="progressBars">
                        @for ($i = 1; $i <= 5; $i++)
                            <div class="progress-step" data-step="{{ $i }}" style="height: 10px; width: 100%; background-color: #ccc; border-radius: 5px;"></div>
                        @endfor
                    </div>
                </div>

                <!-- Right Column (Image) -->
                <div class="col-lg-7">
                    <img src="{{ asset('front/images/image (26).png') }}" class="img-fluid rounded form-image" alt="Form Image">
                </div>

            </div>
        </div>
    </div>
</section>

<!-- JavaScript Logic -->
<script>
    const checkboxes = document.querySelectorAll('.service-checkbox');
    const subCategories = document.querySelectorAll('.subCategory');

    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const serviceId = this.value;
            subCategories.forEach(function(subCategory) {
                if (subCategory.getAttribute('data-service-id') === serviceId) {
                    subCategory.style.display = checkbox.checked ? 'block' : 'none';
                }
            });
        });
    });

    const continueBtn = document.getElementById('continueBtn');
    let currentTab = 1;

    continueBtn.addEventListener('click', function() {
        if (currentTab < 5) {
            const nextTab = currentTab + 1;
            document.querySelector('#tab' + currentTab).classList.remove('show', 'active');
            document.querySelector('#tab' + nextTab).classList.add('show', 'active');

            document.querySelectorAll('.progress-step').forEach(function(step) {
                step.style.backgroundColor = step.getAttribute('data-step') <= nextTab ? '#4caf50' : '#ccc';
            });

            currentTab++;
            continueBtn.setAttribute('data-bs-target', '#tab' + currentTab);

            if (currentTab === 5) {
                continueBtn.innerText = 'Submit';
                continueBtn.type = 'submit';
            }
        }
    });
</script>

<script src="{{ asset('front/js/order.js') }}"></script>

@endsection
