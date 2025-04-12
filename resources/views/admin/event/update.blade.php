@extends('layouts.admin-layout')
@section('title', 'Edit Event')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3 class="card-title">Edit Event</h3>
                                <a href="{{ route('admin.event.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">Name *</label>
                                        <input type="text" class="form-control" name="name" value="{{ $event->name }}">
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description *</label>
                                        <textarea class="form-control" name="description">{{ $event->description }}</textarea>
                                        @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="badge">Badge *</label>
                                        <textarea class="form-control" name="badge">{{ $event->badge }}</textarea>
                                        @error('badge')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" name="image" id="imageInput">
                                        @if($event->getFirstMediaUrl('event_image'))
                                            <img src="{{ $event->getFirstMediaUrl('event_image') }}" alt="event Image" class="img-thumbnail mt-2" style="width: 150px;" id="imagePreview">
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
