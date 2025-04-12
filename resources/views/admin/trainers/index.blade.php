@extends('layouts.admin-layout')
@section('title', 'All Trainers')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3 class="card-title">All Trainers</h3>
                                <a href="{{ route('admin.trainers.create') }}" class="btn btn-success btn-sm float-right">Add New Trainer</a>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Bio</th>
                                        <th>Image</th>
                                        <th>Service</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($trainers as $trainer)
                                        <tr>
                                            <td>{{ $trainer->name ?? '-'}}</td>
                                            <td>{{ $trainer->bio ?? '-'}}</td>
                                            <td>
                                                @if($trainer->getFirstMediaUrl('trainer_images'))
                                                    <img src="{{ $trainer->getFirstMediaUrl('trainer_images') }}" alt="Trainer Image" style="width: 50px; height: auto;"/>
                                                @else
                                                    <span>No Image</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($trainer->service)
                                                    {{ $trainer->service->title ?? '-' }}
                                                @else
                                                    <span>-</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.trainers.edit', $trainer->id) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('admin.trainers.destroy', $trainer->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
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
