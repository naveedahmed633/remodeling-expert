@extends('layouts.admin-layout')
@section('title', 'Edit Testimonial')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3 class="card-title">Edit Testimonial</h3>
                                <a href="{{ route('admin.testimonial.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">Name *</label>
                                        <input type="text" class="form-control" name="name" value="{{ $testimonial->name }}">
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description *</label>
                                        <textarea class="form-control" name="description">{{ $testimonial->description }}</textarea>
                                        @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" name="image" id="imageInput">
                                        @if($testimonial->getFirstMediaUrl('testimonial_image'))
                                            <img src="{{ $testimonial->getFirstMediaUrl('testimonial_image') }}" alt="Testimonial Image" class="img-thumbnail mt-2" style="width: 150px;" id="imagePreview">
                                        @else
                                            <p>No Image</p>
                                        @endif
                                        @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script>
        // Image preview functionality
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const imagePreview = document.getElementById('imagePreview');
                imagePreview.src = e.target.result;
            }

            if (file) {
                reader.readAsDataURL(file); // Read the file and trigger the onload event
            }
        });
    </script>
@endsection
