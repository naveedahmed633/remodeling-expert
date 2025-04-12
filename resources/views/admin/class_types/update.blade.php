@extends('layouts.admin-layout')
@section('title', 'Edit Class Type')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3 class="card-title">Edit Class Type</h3>
                                <a href="{{ route('admin.class_types.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.class_types.update', $classType->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">Class Type Name *</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name', $classType->name) }}">
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Class Type Description</label>
                                        <textarea class="form-control" name="description">{{ old('description', $classType->description) }}</textarea>
                                        @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
