@extends('layouts.admin-layout')
@section('title', 'Class Types')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3 class="card-title">Class Types</h3>
                                <a href="{{ route('admin.class_types.create') }}" class="btn btn-success btn-sm float-right">Add Class Type</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($classTypes as $classType)
                                        <tr>
                                            <td>{{ $classType->name }}</td>
                                            <td>{{ $classType->description }}</td>
                                            <td>
                                                <a href="{{ route('admin.class_types.edit', $classType->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.class_types.destroy', $classType->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
