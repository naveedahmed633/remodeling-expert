<?php

namespace App\Http\Controllers;

use App\Models\ClassSchedule;
use App\Models\ClassType;
use App\Models\Trainer;
use Illuminate\Http\Request;

class ClassScheduleController extends Controller
{
    public function index()
    {
        $classSchedules = ClassSchedule::with('trainer', 'classType')->get();


        return view('admin.class_schedules.index', compact('classSchedules'));
    }

    public function create()
    {
        $classTypes = ClassType::all();
        $trainers = Trainer::all();
        return view('admin.class_schedules.create', compact('classTypes', 'trainers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'trainer_id' => 'required',
            'class_type_id' => 'required',
            'day' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        ClassSchedule::create($request->all());

        return redirect()->route('admin.class_schedules.index')->with('success', 'Class Schedule created successfully!');
    }

    public function edit($id)
    {
        $classSchedule = ClassSchedule::findOrFail($id);
        $classTypes = ClassType::all();
        $trainers = Trainer::all();
        return view('admin.class_schedules.update', compact('classSchedule', 'classTypes', 'trainers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'trainer_id' => 'required',
            'class_type_id' => 'required',
            'day' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        $classSchedule = ClassSchedule::findOrFail($id);
        $classSchedule->update($request->all());

        return redirect()->route('admin.class_schedules.index')->with('success', 'Class Schedule updated successfully!');
    }

    public function destroy($id)
    {
        $classSchedule = ClassSchedule::findOrFail($id);
        $classSchedule->delete();

        return redirect()->route('admin.class_schedules.index')->with('success', 'Class Schedule deleted successfully!');
    }

    public function getClassSchedules(Request $request)
    {
        if ($request->ajax()) {
            if ($request->classType_id == 'all') {
                $classSchedules = ClassSchedule::with(['classType', 'trainer'])->get();
            } else {
                $classSchedules = ClassSchedule::with(['classType', 'trainer'])
                    ->where('class_type_id', $request->classType_id)
                    ->get();
            }
            $uniqueSchedules = $classSchedules->unique(function ($schedule) {
                return $schedule->trainer_id . '-' . $schedule->class_type_id . '-' . $schedule->day . '-' . $schedule->start_time . '-' . $schedule->end_time;
            });
            $uniqueSchedules = $uniqueSchedules->values();
            return response()->json(['classSchedules' => $uniqueSchedules]);
        }
    }

}
