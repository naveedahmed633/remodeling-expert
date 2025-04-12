@extends('layouts.admin-layout')
@section('title')
    Edit Product
@endsection
@section('content')
    <style>
        .active {
            background-color: #007BFF !important;
            color: white !important;
        }

        .rating {
            width: 400px;
            height: 50px;
            margin: 0 auto;
            padding: 1px 99px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background: #f9f9f9;
        }

        .rating label {
            float: right;
            position: relative;
            width: 40px;
            height: 40px;
            cursor: pointer;
        }

        .rating label:not(:first-of-type) {
            padding-right: 2px;
        }

        .rating label:before {
            content: "\2605";
            font-size: 42px;
            color: #ccc;
            line-height: 1;
        }

        .rating label.active-star::before {
            color: #f9df4a;
        }

        .rating input {
            display: none;
        }

        .rating input:checked~label:before,
        .rating:not(:checked)>label:hover:before,
        .rating:not(:checked)>label:hover~label:before {
            color: #f9df4a;
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card card-box-shadow mt-5">

                            <div class="card-header">
                                <h3 class="card-title">Edit Product</h3>
                                <a href="{{ route('admin.product.list') }}" class="btn btn-primary btn-sm float-right mr-5 ">

                                    Back

                                </a>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">

                                <form action="{{ route('admin.product.update', $find_product->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Product Name *</label>
                                                <input type="text" class="form-control form__field" name="name"
                                                    value="{{ $find_product->name ?? '' }}">
                                            </div>

                                            <small class="text-danger">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        {{-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="category_id">Category</label>
                                                <select name="category_id" class="form-control form__field">
                                                    <option value="" disabled>Select Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $find_product->category_id == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <small class="text-danger">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div> --}}
                                        <div class="col-md-6">
                                            <label for="">Product Price *</label>
                                            <input type="number" step="0.01" min="0"
                                                onkeypress="return!(event.charCode == 45)" class="form-control form__field"
                                                name="price" value="{{ $find_product->price ?? '' }}">
                                            <small class="text-danger">
                                                @error('price')
                                                    {{ $message }}
                                                @enderror
                                            </small>

                                        </div>

                                        <div class="col-md-6">
                                            <label for="">Product Description</label>
                                            <textarea name="description" rows="4" class="form-control form__field">{{ $find_product->description ?? '' }}</textarea>
                                            <small class="text-danger">
                                                @error('description')
                                                    {{ $message }}
                                                @enderror
                                            </small>

                                        </div>

                                        <div class="col-md-6 mt-4">
                                            <div class="form-group">
                                                <label for="testimonialImageInput">Product Image:</label>
                                                <input type="file" class="form-control form__field visually-hidden"
                                                    name="product_image" id="testimonialImageInput"accept="image/*">
                                                <label for="testimonialImageInput"
                                                    class="file-input-label form__field form-control">
                                                    <i class="fas fa-camera"></i> Choose file
                                                </label>

                                                <small class='text-danger'>
                                                    @error('product_image')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>

                                            <img id="testimonialImagePreview"
                                                src="{{ $find_product->productImage('product_image') ?: asset('upload/placeholder.png') }}"
                                                alt="Profile Preview"
                                                style="width: 200px; height: 150px; margin-top: 10px; ">

                                        </div>
{{-- 
                                        <div class="col-md-6">
                                            <label for="">Product Key Feature Heading</label>
                                            <input type="text" class="form-control form__field"
                                                name="heading1"value="{{ $find_product->heading1 ?? '' }}">
                                            <small class="text-danger">
                                                @error('heading1')
                                                    {{ $message }}
                                                @enderror
                                            </small>

                                        </div>

                                        <div class="col-md-6">
                                            <label for="">Product Key Feature Heading</label>
                                            <textarea name="description1" rows="4" class="form-control form__field">{{ $find_product->description1 ?? '' }}</textarea>
                                            <small class="text-danger">
                                                @error('description1')
                                                    {{ $message }}
                                                @enderror
                                            </small>

                                        </div>

                                        <div class="col-md-6">
                                            <label for="">Product Ingredients Heading </label>
                                            <input type="text" class="form-control form__field"
                                                name="heading2"value="{{ $find_product->heading2 ?? '' }}">
                                            <small class="text-danger">
                                                @error('heading2')
                                                    {{ $message }}
                                                @enderror
                                            </small>

                                        </div>

                                        <div class="col-md-6">
                                            <label for="">Product Ingredients Description</label>
                                            <textarea name="description2" rows="4" class="form-control form__field">{{ $find_product->description2 ?? '' }}</textarea>
                                            <small class="text-danger">
                                                @error('description2')
                                                    {{ $message }}
                                                @enderror
                                            </small>

                                        </div>


                                        <div class="col-md-6">
                                            <label for="">Product How To Use Heading</label>
                                            <input type="text" class="form-control form__field"
                                                name="heading3"value="{{ $find_product->heading3 ?? '' }}">
                                            <small class="text-danger">
                                                @error('heading3')
                                                    {{ $message }}
                                                @enderror
                                            </small>

                                        </div>

                                        <div class="col-md-6">
                                            <label for="">Product How To Use Description</label>
                                            <textarea name="description3" rows="4" class="form-control form__field">{{ $find_product->description3 ?? '' }}</textarea>
                                            <small class="text-danger">
                                                @error('description3')
                                                    {{ $message }}
                                                @enderror
                                            </small>

                                        </div>


                                        <div class="col-md-6">
                                            <label for="">Product Quality Heading *</label>
                                            <input type="text" class="form-control form__field"
                                                name="heading4"value="{{ $find_product->heading4 ?? '' }}">
                                            <small class="text-danger">
                                                @error('heading4')
                                                    {{ $message }}
                                                @enderror
                                            </small>

                                        </div>

                                        <div class="col-md-6">
                                            <label for="">Product Quality Description</label>
                                            <textarea name="description4" rows="4" class="form-control form__field">{{ $find_product->description4 ?? '' }}</textarea>
                                            <small class="text-danger">
                                                @error('description4')
                                                    {{ $message }}
                                                @enderror
                                            </small>

                                        </div> --}}

                                        <div class="mx-auto mt-5">
                                            <div class="form-group">
                                                <input type="submit" class="form-control btn btn-primary btn-sm "
                                                    value="Submit">
                                            </div>
                                        </div>

                                    </div>
                                </form>

                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('script')
    <script>
        function showImagePreview(input, previewId) {
            const preview = document.getElementById(previewId);

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        const imageInput = document.getElementById('testimonialImageInput');
        imageInput.addEventListener('change', function() {
            showImagePreview(this, 'testimonialImagePreview');
        });
        const smallInput = document.getElementById('smallImageInput');
        smallInput.addEventListener('change', function() {
            showImagePreview(this, 'smallImagePreview');
        });
    </script>
@endsection
