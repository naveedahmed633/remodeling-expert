@extends('layouts.admin-layout')
@section('title', 'Class Schedules')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3 class="card-title">Class Schedules</h3>
                                <a href="{{ route('admin.class_schedules.create') }}" class="btn btn-primary btn-sm float-right">Add New</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Class Type</th>
                                        <th>Trainer</th>
                                        <th>Day</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($classSchedules as $classSchedule)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $classSchedule->classType->name }}</td>
                                            <td>{{ $classSchedule->trainer->name }}</td>
                                            <td>{{ $classSchedule->day }}</td>
                                            <td>{{ \Carbon\Carbon::parse($classSchedule->start_time)->format('h:i A') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($classSchedule->end_time)->format('h:i A') }}</td>
                                            <td>
                                                <a href="{{ route('admin.class_schedules.edit', $classSchedule->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                <form action="{{ route('admin.class_schedules.destroy', $classSchedule->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
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
