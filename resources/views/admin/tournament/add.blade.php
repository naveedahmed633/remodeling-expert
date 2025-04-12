@extends('layouts.admin-layout')
@section('title', 'Add Tournament')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3 class="card-title">Add Tournament</h3>
                                <a href="{{ route('admin.tournament.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.tournament.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Tournament Name *</label>
                                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                        @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Tournament Description *</label>
                                        <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                                        @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Tournament Image</label>
                                        <input type="file" class="form-control" name="image" id="image">
                                        @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <div class="mt-3">
                                            <img id="imagePreview" src="#" alt="Image Preview" style="display: none; max-height: 150px;">
                                        </div>
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
@endsection

@section('scripts')
    <script>
        document.getElementById('image').addEventListener('change', function (event) {
            const imagePreview = document.getElementById('imagePreview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.style.display = 'none';
            }
        });
    </script>
@endsection
