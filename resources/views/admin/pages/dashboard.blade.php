@extends('layouts.admin-layout')
@section('title')
    Dashboard
@endsection
@section('content')
    <style>
        /* Main container */
        .content-wrapper {
            background-color: #d3d3d3;
            color: #e74c3c;
        }

        .content-wrapper .section-title {
            color: #e74c3c; /* Red shade for section titles */
        }

        /* Dashboard section styles */
        .section-title {
            font-size: 28px;
            font-weight: bold;
            color: #e74c3c;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .card-block {
            padding: 42px;
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            background-color: #2c3e50;
            padding-top: 20px;
            padding-left: 70px;
        }
        /* Card Container */
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .order-card {
            background-color: #34495e;
            color: #fff;
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 8px;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            padding: 15px;
        }

        .order-card i {
            font-size: 30px;
            position: absolute;
            top: 15px;
            left: 20px;
        }

        .order-card .content {
            padding: 20px;
        }

        .order-card:hover {
            transform: translateY(-10px);
            box-shadow: rgba(0, 0, 0, 0.3) 0px 8px 16px;
        }

        .event-table-container {
            background: #fff;
            padding: 20px;
            color: #333;
            border-radius: 10px;
            max-height: 400px;
            overflow-y: auto;
        }

        /* Modal Styles */
        .modal-content {
            background-color: #121212;
            color: #fff;
            border-radius: 10px;
        }

        .modal-header {
            background-color: #e74c3c;
            color: white;
        }

        .modal-footer {
            background-color: #121212;
            color: white;
        }

        .event-tag {
            background-color: #e74c3c;
            padding: 5px;
            border-radius: 5px;
            color: #fff;
        }

        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }
    </style>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-white">Admin Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-black-50">Home</a></li>
                            <li class="breadcrumb-item active text-white">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
{{--                <div class="section-title">Dashboard Overview</div>--}}

                <div class="card-container">
                    <!-- Total Orders -->
                    <div class="order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Total Orders</h6>
                            <h2><i class="fa fa-cart-plus"></i><span>486</span></h2>
                            <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                        </div>
                    </div>

                    <!-- User Registrations -->
                    <div class="order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">User Registrations</h6>
                            <h2><i class="fas fa-users"></i><span>486</span></h2>
                            <p class="m-b-0">Verified Users<span class="f-right">351</span></p>
                        </div>
                    </div>

                    <!-- Bounce Rate -->
                    <div class="order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Bounce Rate</h6>
                            <h2><i class="fa fa-refresh"></i><span>486</span></h2>
                            <p class="m-b-0">Completed Events<span class="f-right">351</span></p>
                        </div>
                    </div>

                    <!-- Unique Visitors -->
                    <div class="order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Unique Visitors</h6>
                            <h2><i class="fa fa-users"></i><span>486</span></h2>
                            <p class="m-b-0">Total Visits<span class="f-right">351</span></p>
                        </div>
                    </div>
                </div>



        <!-- Modal for Schedule -->
        <div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="scheduleModalLabel">Class Schedule</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="event-table-container">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th><i class="far fa-clock"></i></th>
                                    <th>Monday</th>
                                    <th>Tuesday</th>
                                    <th>Wednesday</th>
                                    <th>Thursday</th>
                                    <th>Friday</th>
                                    <th>Saturday</th>
                                    <th>Sunday</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($uniqueSchedules as $classSchedule)
                                    <tr>
                                        <th>{{ \Carbon\Carbon::parse($classSchedule->start_time)->format('h:i') }} - {{ \Carbon\Carbon::parse($classSchedule->end_time)->format('h:i') }}</th>
                                        <td class="{{ $classSchedule->day == 'Monday' ? 'event-tag' : '' }}">
                                            @if($classSchedule->day == 'Monday')
                                                <h6>{{ $classSchedule->classType->name }} <span>{{ $classSchedule->trainer->name }}</span></h6>
                                            @endif
                                        </td>
                                        <td class="{{ $classSchedule->day == 'Tuesday' ? 'event-tag' : '' }}">
                                            @if($classSchedule->day == 'Tuesday')
                                                <h6>{{ $classSchedule->classType->name }} <span>{{ $classSchedule->trainer->name }}</span></h6>
                                            @endif
                                        </td>
                                        <td class="{{ $classSchedule->day == 'Wednesday' ? 'event-tag' : '' }}">
                                            @if($classSchedule->day == 'Wednesday')
                                                <h6>{{ $classSchedule->classType->name }} <span>{{ $classSchedule->trainer->name }}</span></h6>
                                            @endif
                                        </td>
                                        <td class="{{ $classSchedule->day == 'Thursday' ? 'event-tag' : '' }}">
                                            @if($classSchedule->day == 'Thursday')
                                                <h6>{{ $classSchedule->classType->name }} <span>{{ $classSchedule->trainer->name }}</span></h6>
                                            @endif
                                        </td>
                                        <td class="{{ $classSchedule->day == 'Friday' ? 'event-tag' : '' }}">
                                            @if($classSchedule->day == 'Friday')
                                                <h6>{{ $classSchedule->classType->name }} <span>{{ $classSchedule->trainer->name }}</span></h6>
                                            @endif
                                        </td>
                                        <td class="{{ $classSchedule->day == 'Saturday' ? 'event-tag' : '' }}">
                                            @if($classSchedule->day == 'Saturday')
                                                <h6>{{ $classSchedule->classType->name }} <span>{{ $classSchedule->trainer->name }}</span></h6>
                                            @endif
                                        </td>
                                        <td class="{{ $classSchedule->day == 'Sunday' ? 'event-tag' : '' }}">
                                            @if($classSchedule->day == 'Sunday')
                                                <h6>{{ $classSchedule->classType->name }} <span>{{ $classSchedule->trainer->name }}</span></h6>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
