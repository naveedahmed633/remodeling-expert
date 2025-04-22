@extends('layouts.admin-layout')

@section('title')
    Add Blog
@endsection

@section('content')
    <style>
        .active {
            background-color: #007BFF !important;
            color: white !important;
        }

        /* Custom styling for form inputs */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-control {
            border-radius: 5px;
            padding: 12px;
            font-size: 1rem;
        }

        .sub-service-item,
        .remodel-type-item {
            display: flex;
            margin-bottom: 1rem;
            justify-content: space-between;
            align-items: center;
        }

        .sub-service-item input,
        .remodel-type-item input {
            width: 75%;
        }

        .remove-btn {
            background-color: #ff5c5c;
            color: white;
            padding: 8px 15px;
            font-size: 1rem;
            border-radius: 5px;
            border: none;
        }

        .add-btn {
            background-color: #28a745;
            color: white;
            padding: 8px 15px;
            font-size: 1rem;
            border-radius: 5px;
            border: none;
        }

        .btn-sm {
            font-size: 0.9rem;
        }
    </style>

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-box-shadow mt-5">
                            <div class="card-header">
                                <h3 class="card-title">Add Service</h3>
                                <a href="{{ route('admin.form.services.index') }}" class="btn btn-primary btn-sm float-right">
                                    Back
                                </a>
                            </div>
                            <div class="card-body">
                                <form
                                    action="{{ isset($service) ? route('admin.form.services.update', $service->id) : route('admin.form.services.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($service))
                                        @method('PUT')
                                    @endif

                                    <div class="row">
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                        <!-- Service Name -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Service Name *</label>
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="Enter Service Name"
                                                    value="{{ old('name', $service->name ?? '') }}">
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Submit -->
                                        <div class="mx-auto mt-5">
                                            <button type="submit" class="form-control btn btn-primary btn-sm">Submit
                                                Service</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <script>
                                let subServiceCount = {{ isset($service) ? $service->subServices->count() : 0 }};

                                // Add new Sub-Service
                                document.getElementById('addSubServiceBtn').addEventListener('click', function() {
                                    const wrapper = document.getElementById('sub_services_wrapper');
                                    const div = document.createElement('div');
                                    div.classList.add('sub-service-item');
                                    div.innerHTML = `
        <input type="text" class="form-control" name="sub_services[${subServiceCount}][name]" placeholder="Enter Sub-Service Name" required>
        <button type="button" class="remove-btn removeSubService">Remove</button>
        <div class="remodel-types-wrapper" data-index="${subServiceCount}"></div>
        <button type="button" class="add-btn btn-sm addRemodelTypeBtn" data-index="${subServiceCount}">+ Add Remodel Type</button>
    `;
                                    wrapper.appendChild(div);
                                    subServiceCount++;
                                });

                                // Event delegation for removing sub-service and remodel types, and adding remodel types dynamically
                                document.getElementById('sub_services_wrapper').addEventListener('click', function(e) {
                                    // Remove Sub-Service
                                    if (e.target.classList.contains('removeSubService')) {
                                        e.target.closest('.sub-service-item').remove();
                                    }
                                    // Remove Remodel Type
                                    if (e.target.classList.contains('removeRemodelType')) {
                                        e.target.closest('.remodel-type-item').remove();
                                    }
                                    // Add Remodel Type
                                    if (e.target.classList.contains('addRemodelTypeBtn')) {
                                        const index = e.target.getAttribute('data-index');
                                        const wrapper = document.querySelector(`.remodel-types-wrapper[data-index="${index}"]`);
                                        const div = document.createElement('div');
                                        div.classList.add('remodel-type-item');
                                        div.innerHTML = `
            <input type="text" class="form-control" name="sub_services[${index}][remodel_types][][name]" placeholder="Enter Remodel Type Name" required>
            <button type="button" class="remove-btn removeRemodelType">Remove</button>
        `;
                                        wrapper.appendChild(div);
                                    }
                                });

                                // For Initial Sub-Service (First one) to have its "Add Remodel Type" button work
                                document.addEventListener('DOMContentLoaded', function() {
                                    const firstRemodelTypeButton = document.querySelector('.addRemodelTypeBtn');
                                    if (firstRemodelTypeButton) {
                                        firstRemodelTypeButton.click(); // Trigger click to initialize
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>  
            </div>
        </section>
    </div>
@endsection
