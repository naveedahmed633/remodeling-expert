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
                                <a href="{{ route('admin.subservice.category.index') }}"
                                    class="btn btn-primary btn-sm float-right">
                                    Back
                                </a>
                            </div>
                            <div class="card-body">
                                <form
                                    action="{{ isset($service) ? route('admin.subservice.category.update', $service->id) : route('admin.subservice.category.store') }}"
                                    method="POST" enctype="multipart/subservice.category-data">
                                    @csrf
                                    @if (isset($service))
                                        @method('PUT')
                                    @endif

                                    <div class="row">
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                        <!-- Service Dropdown -->
                                        <div class="form-group">
                                            <label for="main_service">Select Main Service *</label>
                                            <select name="main_service" id="main_service" class="form-control">
                                                <option value="">-- Select a Service --</option>
                                                @foreach ($categories as $serv)
                                                    <option value="{{ $serv->id }}">{{ $serv->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Subcategory Input and Add Button -->
                                        <div class="form-group" id="subcategory_input_wrapper" style="display: none;">
                                            <label for="subcategory_input">Add Subcategory</label>
                                            <div class="d-flex gap-2">
                                                <input type="text" id="subcategory_input" class="form-control"
                                                    placeholder="Enter Subcategory Name">
                                                <button type="button" class="btn btn-success"
                                                    id="add_subcategory_btn">Add</button>
                                            </div>
                                        </div>

                                        <!-- Subcategory Display List -->
                                        <div class="form-group">
                                            <label>Subcategories List</label>
                                            <div id="subcategory_list"></div>
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
                                let subcategoryCount = 0;

                                // Show input box when service is selected
                                document.getElementById('main_service').addEventListener('change', function() {
                                    const wrapper = document.getElementById('subcategory_input_wrapper');
                                    const list = document.getElementById('subcategory_list');

                                    if (this.value !== '') {
                                        wrapper.style.display = 'block';
                                    } else {
                                        wrapper.style.display = 'none';
                                        list.innerHTML = '';
                                        subcategoryCount = 0;
                                    }
                                });

                                // Add new subcategory field
                                document.getElementById('add_subcategory_btn').addEventListener('click', function() {
                                    const input = document.getElementById('subcategory_input');
                                    const list = document.getElementById('subcategory_list');
                                    const value = input.value.trim();

                                    if (value !== '') {
                                        const div = document.createElement('div');
                                        div.classList.add('d-flex', 'align-items-center', 'gap-2', 'mb-2');

                                        div.innerHTML = `
    <input type="text" class="form-control" name="sub_services[${subcategoryCount}][name]" value="${value}" readonly>
    <button type="button" class="btn btn-danger btn-sm removeSubService">Remove</button>
`;
                                        list.appendChild(div);
                                        subcategoryCount++;
                                        input.value = '';
                                    }
                                });

                                // Remove subcategory field
                                document.getElementById('subcategory_list').addEventListener('click', function(e) {
                                    if (e.target.classList.contains('removeSubService')) {
                                        e.target.parentElement.remove();
                                    }
                                });
                                document.querySelector('form').addEventListener('submit', function(e) {
                                    const subcategoryInputs = document.querySelectorAll('#subcategory_list input');
                                    if (subcategoryInputs.length === 0) {
                                        e.preventDefault();
                                        alert('Please add at least one subcategory before submitting.');
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
