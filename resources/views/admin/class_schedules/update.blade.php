@extends('layouts.admin-layout')
@section('title', 'Edit Class Schedule')
@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3 class="card-title">Edit Class Schedule</h3>
                                <a href="{{ route('admin.class_schedules.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.class_schedules.update', $classSchedule->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="trainer_id">Trainer *</label>
                                        <select class="form-control" name="trainer_id" required>
                                            @foreach ($trainers as $trainer)
                                                <option value="{{ $trainer->id }}" @if($trainer->id == $classSchedule->trainer_id) selected @endif>{{ $trainer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="class_type_id">Class Type *</label>
                                        <select class="form-control" name="class_type_id" required>
                                            @foreach ($classTypes as $classType)
                                                <option value="{{ $classType->id }}" @if($classType->id == $classSchedule->class_type_id) selected @endif>{{ $classType->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="day">Day *</label>
                                        <select class="form-control" name="day" required>
                                            <option value="" disabled>Select Day</option>
                                            <option value="Monday" {{ $classSchedule->day == 'Monday' ? 'selected' : '' }}>Monday</option>
                                            <option value="Tuesday" {{ $classSchedule->day == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                                            <option value="Wednesday" {{ $classSchedule->day == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                                            <option value="Thursday" {{ $classSchedule->day == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                                            <option value="Friday" {{ $classSchedule->day == 'Friday' ? 'selected' : '' }}>Friday</option>
                                            <option value="Saturday" {{ $classSchedule->day == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                                            <option value="Sunday" {{ $classSchedule->day == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                                        </select>
                                        @error('day')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="start_time">Start Time *</label>
                                        <select class="form-control" name="start_time" id="start_time" required>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="end_time">End Time *</label>
                                        <select class="form-control" name="end_time" id="end_time" required>
                                        </select>
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
@section('script')
    <script>
        function generateTimeOptions(selectElement, selectedTime = null) {
            const hours = [];
            for (let i = 0; i < 24; i++) {
                let hour = i % 12 || 12;
                let ampm = i < 12 ? 'AM' : 'PM';
                let formattedTime = `${hour}:00 ${ampm}`;
                let timeValue = `${i}:00`;

                let isSelected = selectedTime === timeValue ? 'selected' : '';
                hours.push(`<option value="${timeValue}" ${isSelected}>${formattedTime}</option>`);
            }
            selectElement.innerHTML = hours.join('');
        }

        window.onload = function() {
            const startTimeSelect = document.getElementById('start_time');
            const endTimeSelect = document.getElementById('end_time');

            const startTimeValue = "{{ old('start_time', $classSchedule->start_time) }}";
            const endTimeValue = "{{ old('end_time', $classSchedule->end_time) }}";

            generateTimeOptions(startTimeSelect, startTimeValue);
            generateTimeOptions(endTimeSelect, endTimeValue);
        };
    </script>
@endsection
