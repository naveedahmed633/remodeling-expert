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
                        <form action="{{route('front.order.data.form')}}" method="POST" id="multiStepForm">
                            @csrf
                            <div class="order-form rounded p-4 h-100 d-flex flex-column justify-content-between"
                                 style="background-color: #eef8ff;">
                                <div class="tab-content">
                                    <!-- Tab 1 -->
                                    <div class="tab-pane fade show active" id="tab1">
                                        @include('partials.logo-social')
                                        <h3 class="fw-bold">Step 1: Select a Service</h3>
                                        <p class="text-muted">The user chooses from the following service
                                            categories:</p>

                                        <input type="text"
                                               id="selectedServicesInput"
                                               class="form-control border-0 border-bottom mb-3 select-services"
                                               placeholder="Selected services will appear here..."
                                               style="background-color: transparent;"
                                               readonly>

                                        <div class="row stepOne service-section">
                                            @foreach($serviceCategories as $category)
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-check d-flex align-items-center mb-2">
                                                        <input class="form-check-input me-2 service-checkbox"
                                                               name="services[]"
                                                               type="checkbox"
                                                               value="{{ $category->id }}"
                                                               data-label="{{ $category->title }}">
                                                        <label
                                                            class="form-check-label mb-0">{{ $category->title }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Tab 2 -->
                                    <div class="tab-pane fade" id="tab2">
                                        @include('partials.logo-social')
                                        <h3 class="fw-bold">Step 2: Subcategory Selection (if applicable)</h3>
                                        <p class="text-muted">If the user selects Interior Remodeling, they are prompted
                                            to specify which part of their home they want to remodel:</p>

                                        <input type="text"
                                               class="form-control border-0 border-bottom mb-3 sub-category-input"
                                               id="selectedSubcategoriesInput"
                                               placeholder="Enter your data"
                                               style="background-color: transparent;" readonly>

                                        <div class="row stepTwo subcategory-section" id="subcategoryContainer">

                                        </div>
                                    </div>

                                    <!-- Tab 3 -->
                                    <div class="tab-pane fade" id="tab3">
                                        @include('partials.logo-social')
                                        <h3 class="fw-bold">Step 3: Remodel Type Selection</h3>
                                        <p class="text-muted">If the user selects Kitchen, they choose:</p>

                                        <input type="text"
                                               id="selectedRemodelType"
                                               class="form-control border-0 border-bottom mb-3 remodel-type-input"
                                               placeholder="Enter your data" style="background-color: transparent;"
                                               readonly>

                                        <div class="row stepThree remodelType">

                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2 remodal-type-checkbox"
                                                           name="remodal_type"
                                                           type="checkbox"
                                                           value="partial"
                                                    >
                                                    <label
                                                        class="form-check-label mb-0">Partial Remodel</label>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-check d-flex align-items-center mb-2">
                                                    <input class="form-check-input me-2 remodal-type-checkbox"
                                                           name="remodal_type"
                                                           type="checkbox"
                                                           value="full"
                                                    >
                                                    <label
                                                        class="form-check-label mb-0">Full Remodel</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tab 4 -->
                                    <div class="tab-pane fade" id="tab4">
                                        @include('partials.logo-social')
                                        <h3 class="fw-bold">Step 4: Specific Requirements</h3>
                                        <p class="text-muted">If the user selects Partial Remodel, they are asked: What
                                            specific aspects do you want to remodel?</p>

                                        <input type="text"
                                               class="form-control border-0 border-bottom mb-3 requirements-input"
                                               placeholder="Enter your data" style="background-color: transparent;"
                                               readonly>

                                        <div class="row stepFour subchildcategory-section"
                                             id="subchildcategoryContainer">
                                        </div>
                                    </div>

                                    <!-- Tab 5 -->
                                    <div class="tab-pane fade" id="tab5">
                                        @include('partials.logo-social')
                                        <h3 class="fw-bold">Step 5: Contact & Final Details</h3>

                                        <input type="text" name="name" class="form-control border-0 border-bottom mb-3"
                                               placeholder="Name*" style="background-color: transparent;">
                                        <input type="number" name="phone"
                                               class="form-control border-0 border-bottom mb-3" placeholder="Phone*"
                                               style="background-color: transparent;">
                                        <input type="email" name="email"
                                               class="form-control border-0 border-bottom mb-3" placeholder="Email*"
                                               style="background-color: transparent;">
                                        <textarea name="message" class="form-control border-0 border-bottom mb-3"
                                                  placeholder="Message"
                                                  style="background-color: transparent;"></textarea>
                                    </div>
                                </div>

                                <!-- Continue Button -->
                                <div role="tablist">
                                    <button type="submit" id="continueBtn" class="btn btn-primary mt-3 w-100"
                                            data-bs-toggle="tab" data-bs-target="#tab2">Continue
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Step Indicators -->
                        <div class="d-flex gap-2 mt-4" id="progressBars">
                            @for ($i = 1; $i <= 5; $i++)
                                <div class="progress-step" data-step="{{ $i }}"
                                     style="height: 10px; width: 100%; background-color: #ccc; border-radius: 5px;"></div>
                            @endfor
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

    <!-- JavaScript Logic -->
    {{--    <script>--}}
    {{--        const checkboxes = document.querySelectorAll('.service-checkbox');--}}
    {{--        const subCategories = document.querySelectorAll('.subCategory');--}}

    {{--        checkboxes.forEach(function (checkbox) {--}}
    {{--            checkbox.addEventListener('change', function () {--}}
    {{--                const serviceId = this.value;--}}
    {{--                subCategories.forEach(function (subCategory) {--}}
    {{--                    if (subCategory.getAttribute('data-service-id') === serviceId) {--}}
    {{--                        subCategory.style.display = checkbox.checked ? 'block' : 'none';--}}
    {{--                    }--}}
    {{--                });--}}
    {{--            });--}}
    {{--        });--}}

    {{--        const continueBtn = document.getElementById('continueBtn');--}}
    {{--        let currentTab = 1;--}}

    {{--        continueBtn.addEventListener('click', function () {--}}
    {{--            if (currentTab < 5) {--}}
    {{--                const nextTab = currentTab + 1;--}}
    {{--                document.querySelector('#tab' + currentTab).classList.remove('show', 'active');--}}
    {{--                document.querySelector('#tab' + nextTab).classList.add('show', 'active');--}}

    {{--                document.querySelectorAll('.progress-step').forEach(function (step) {--}}
    {{--                    step.style.backgroundColor = step.getAttribute('data-step') <= nextTab ? '#4caf50' : '#ccc';--}}
    {{--                });--}}

    {{--                currentTab++;--}}
    {{--                continueBtn.setAttribute('data-bs-target', '#tab' + currentTab);--}}

    {{--                if (currentTab === 5) {--}}
    {{--                    continueBtn.innerText = 'Submit';--}}
    {{--                    continueBtn.type = 'submit';--}}
    {{--                }--}}
    {{--            }--}}
    {{--        });--}}
    {{--    </script>--}}

    <script src="{{ asset('front/js/order.js') }}"></script>

@endsection
@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const checkboxes = document.querySelectorAll('.service-checkbox');
            const displayInput = document.getElementById('selectedServicesInput');


            function updateSelectedServices() {
                let selectedLabels = [];
                let selectedIDs = [];

                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        selectedLabels.push(checkbox.dataset.label);
                        selectedIDs.push(checkbox.value);
                    }
                });

                displayInput.value = selectedLabels.join(', ');

                // Send selected IDs to session via AJAX
                fetch("{{ route('store.selected.services') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({services: selectedIDs, service_titles: selectedLabels})
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            const subcategoryContainer = document.getElementById('subcategoryContainer');
                            const subcategoryInput = document.getElementById('selectedSubcategoriesInput');
                            let selectedSubLabels = [];

                            // Clear previous
                            subcategoryContainer.innerHTML = '';
                            subcategoryInput.value = '';

                            data.subcategories.forEach(sub => {
                                const subDiv = document.createElement('div');
                                subDiv.classList.add('col-md-6', 'col-sm-6');
                                subDiv.innerHTML = `
                <div class="form-check d-flex align-items-center mb-2">
                    <input class="form-check-input me-2 subservice-checkbox" type="checkbox" name="subservices[]" value="${sub.id}" data-label="${sub.name}" id="sub${sub.id}">
                    <label class="form-check-label mb-0" for="sub${sub.id}">${sub.name}</label>
                </div>
            `;
                                subcategoryContainer.appendChild(subDiv);
                            });

                            // Listen for subcategory checkbox changes
                            document.querySelectorAll('.subservice-checkbox').forEach(input => {
                                input.addEventListener('change', () => {
                                    selectedSubLabels = [];
                                    document.querySelectorAll('.subservice-checkbox:checked').forEach(checked => {
                                        selectedSubLabels.push(checked.dataset.label);
                                    });
                                    subcategoryInput.value = selectedSubLabels.join(', ');
                                });
                            });
                        }
                    });

            }

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateSelectedServices);
            });


            const subcategoryInput = document.getElementById('selectedSubcategoriesInput');
            const subcategoryContainer = document.getElementById('subcategoryContainer');
            const subchildContainer = document.getElementById('subchildcategoryContainer');
            const requirementsInput = document.querySelector('.requirements-input');

            subcategoryContainer.addEventListener('change', function () {
                const checked = subcategoryContainer.querySelectorAll('input[type="checkbox"]:checked');
                let labels = [];
                let ids = [];

                checked.forEach(cb => {
                    labels.push(cb.nextElementSibling.innerText.trim());
                    ids.push(cb.value);
                });

                subcategoryInput.value = labels.join(', ');

                // Send subcategory IDs to backend
                fetch("{{ route('store.subcategories') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({subservices: ids, subTitles: labels})
                })
                    .then(res => res.json())
                    .then(data => {
                        if (data.subchildcategories) {
                            // Render into Step 4 container
                            subchildContainer.innerHTML = '';

                            data.subchildcategories.forEach(item => {
                                const wrapper = document.createElement('div');
                                wrapper.className = 'col-md-6 col-sm-6';

                                wrapper.innerHTML = `
                        <div class="form-check d-flex align-items-center mb-2">
                            <input class="form-check-input me-2 subchild-checkbox"
                                   name="subchildservices[]"
                                   type="checkbox"
                                   value="${item.id}"
                                   data-label="${item.name}">
                            <label class="form-check-label mb-0">${item.name}</label>
                        </div>
                    `;
                                subchildContainer.appendChild(wrapper);
                            });
                        }
                    });
            });

            // Step 4 subchild selection
            subchildContainer.addEventListener('change', function () {
                const checked = subchildContainer.querySelectorAll('input[type="checkbox"]:checked');
                let labels = [];
                let ids = [];

                checked.forEach(cb => {
                    labels.push(cb.dataset.label);
                    ids.push(cb.value);
                });

                requirementsInput.value = labels.join(', ');

                // Store subchild to session
                fetch("{{ route('store.subchildcategories') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({subchildservices: ids, subChildTiles: labels})
                });
            });


            const remodelTypeCheckboxes = document.querySelectorAll('.remodal-type-checkbox');
            const remodelTypeInput = document.getElementById('selectedRemodelType');

            remodelTypeCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    // Uncheck all others
                    remodelTypeCheckboxes.forEach(box => {
                        if (box !== this) box.checked = false;
                    });

                    // Set input text and send to session
                    if (this.checked) {
                        remodelTypeInput.value = this.nextElementSibling.innerText.trim();

                        // ✅ Send to session
                        fetch("{{ route('store.remodel.type') }}", {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({remodel_type: this.value})
                        });

                    } else {
                        remodelTypeInput.value = '';
                    }
                });

            });
        });

    </script>

@endpush
