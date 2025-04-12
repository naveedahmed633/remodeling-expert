@extends('layouts.admin-layout')
@section('title', 'Services')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3 class="card-title">Services List</h3>
                                <a href="{{ route('admin.service.create') }}" class="btn btn-primary btn-sm float-right">Add Service</a>
                            </div>
                            <div class="card-body">
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($services as $service)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $service->title }}</td>
                                            <td>{{ $service->description }}</td>
                                            <td>
                                                @if($service->getFirstMediaUrl('services'))
                                                    <img src="{{ $service->getFirstMediaUrl('services') }}" alt="Service Image" style="width: 80px;">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.service.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.service.destroy', $service->id) }}" method="POST" class="d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm delete-button">Delete</button>
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
{{--    <script>--}}
{{--        // Confirmation popup for delete--}}
{{--        document.querySelectorAll('.delete-form').forEach(form => {--}}
{{--            form.addEventListener('submit', function(e) {--}}
{{--                e.preventDefault();--}}
{{--                if (confirm('Are you sure you want to delete this service?')) {--}}
{{--                    this.submit();--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endsection

@section('script')
    <script>
        // Confirmation popup for delete
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                if (confirm('Are you sure you want to delete this service?')) {
                    this.submit();
                }
            });
        });
    </script>
@endsection
