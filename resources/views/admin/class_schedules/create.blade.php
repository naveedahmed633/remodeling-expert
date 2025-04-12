@extends('layouts.admin-layout')
@section('title', 'Add Class Schedule')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3 class="card-title">Add Class Schedule</h3>
                                <a href="{{ route('admin.class_schedules.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.class_schedules.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="trainer_id">Trainer *</label>
                                        <select class="form-control" name="trainer_id" >
                                            @foreach ($trainers as $trainer)
                                                <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('trainer_id')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="class_type_id">Class Type *</label>
                                        <select class="form-control" name="class_type_id" >
                                            @foreach ($classTypes as $classType)
                                                <option value="{{ $classType->id }}">{{ $classType->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('class_type_id')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="day">Day *</label>
                                        <select class="form-control" name="day" >
                                            <option value="" disabled selected>Select Day</option>
                                            <option value="Monday" {{ old('day') == 'Monday' ? 'selected' : '' }}>Monday</option>
                                            <option value="Tuesday" {{ old('day') == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                                            <option value="Wednesday" {{ old('day') == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                                            <option value="Thursday" {{ old('day') == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                                            <option value="Friday" {{ old('day') == 'Friday' ? 'selected' : '' }}>Friday</option>
                                            <option value="Saturday" {{ old('day') == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                                            <option value="Sunday" {{ old('day') == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                                        </select>
                                        @error('day')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="start_time">Start Time *</label>
                                        <select class="form-control" name="start_time" id="start_time">
                                            <option value="">Select Start Time</option>
                                        </select>
                                        @error('start_time')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="end_time">End Time *</label>
                                        <select class="form-control" name="end_time" id="end_time">
                                            <option value="">Select End Time</option>
                                        </select>
                                        @error('end_time')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
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
        function generateTimeOptions(selectElement) {
            const hours = [];
            for (let i = 0; i < 24; i++) {
                let hour = i % 12 || 12;
                let ampm = i < 12 ? 'AM' : 'PM';
                let formattedTime = `${hour}:00 ${ampm}`;
                hours.push(`<option value="${i}:00">${formattedTime}</option>`);
            }
            selectElement.innerHTML = hours.join('');
        }
        window.onload = function() {
            const startTimeSelect = document.getElementById('start_time');
            const endTimeSelect = document.getElementById('end_time');

            generateTimeOptions(startTimeSelect);
            generateTimeOptions(endTimeSelect);
        };
    </script>

@endsection
