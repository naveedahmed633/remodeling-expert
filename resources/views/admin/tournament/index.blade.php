@extends('layouts.admin-layout')
@section('title', 'Tournaments')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3 class="card-title">Tournaments List</h3>
                                <a href="{{ route('admin.tournament.create') }}" class="btn btn-primary btn-sm float-right">Add Tournament</a>
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
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tournaments as $tournament)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $tournament->title }}</td>
                                            <td>{{ $tournament->description }}</td>
                                            <td>
                                                @if($tournament->getFirstMediaUrl('images'))
                                                    <img src="{{ $tournament->getFirstMediaUrl('images') }}" alt="Tournament Image" style="width: 80px;">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.tournament.edit', $tournament->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.tournament.destroy', $tournament->id) }}" method="POST" class="d-inline delete-form">
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
@endsection

@section('script')
    <script>
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                if (confirm('Are you sure you want to delete this tournament?')) {
                    this.submit();
                }
            });
        });
    </script>
@endsection
