@extends('layouts.admin-layout')
@section('title', 'Add Trainer')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3 class="card-title">Add Trainer</h3>
                                <a href="{{ route('admin.trainers.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.trainers.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Trainer Name *</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="bio">Trainer Bio</label>
                                        <textarea class="form-control" name="bio">{{ old('bio') }}</textarea>
                                        @error('bio')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Trainer Image</label>
                                        <input type="file" class="form-control" name="image" id="imageUpload">
                                        <div id="imagePreview" style="margin-top: 10px;">
                                            <img id="previewImg" src="" alt="Image Preview" style="max-width: 100%; display: none;"/>
                                        </div>
                                        @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="services">Select Service</label>
                                        <select name="service_id" class="form-control">
                                            @foreach($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('service_id')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @push('script')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var imageUpload = document.getElementById('imageUpload');
                imageUpload.addEventListener('change', function(event) {
                    previewImage(event);
                });
            });

            function previewImage(event) {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.getElementById('previewImg');
                    output.src = reader.result;
                    output.style.display = 'block';
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>
    @endpush
@endsection
