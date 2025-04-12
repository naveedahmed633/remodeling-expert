@extends('layouts.admin-layout')
@section('title', 'Edit Trainer')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3 class="card-title">Edit Trainer</h3>
                                <a href="{{ route('admin.trainers.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.trainers.update', $trainer->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="name">Trainer Name *</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name', $trainer->name) }}">
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="bio">Trainer Bio</label>
                                        <textarea class="form-control" name="bio">{{ old('bio', $trainer->bio) }}</textarea>
                                        @error('bio')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Trainer Image</label>
                                        <input type="file" class="form-control" name="image" id="imageUpload">
                                        <div id="imagePreview" style="margin-top: 10px;">
                                            @if($trainer->getFirstMediaUrl('trainer_images'))
                                                <img id="previewImg" src="{{ $trainer->getFirstMediaUrl('trainer_images') }}" alt="Image Preview" style="max-width:30%; display: block;"/>
                                            @else
                                                <img id="previewImg" src="" alt="Image Preview" style="max-width: 30%; display: none;"/>
                                            @endif
                                        </div>
                                        @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="services">Select Service</label>
                                        <select name="service_id" class="form-control">
                                            @foreach($services as $service)
                                                <option value="{{ $service->id }}" {{ old('service_id', $trainer->service_id) == $service->id ? 'selected' : '' }}>
                                                    {{ $service->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('service_id')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-success">Update Trainer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var imageUpload = document.getElementById('imageUpload');
            var previewImg = document.getElementById('previewImg');

            // Trigger image preview when a file is selected
            imageUpload.addEventListener('change', function(event) {
                previewImage(event);
            });

            // If there's already an image preview in case of editing
            if (previewImg.src) {
                previewImg.style.display = 'block';
            }
        });

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('previewImg');
                output.src = reader.result;
                output.style.display = 'block'; // Make sure preview is visible
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endpush
