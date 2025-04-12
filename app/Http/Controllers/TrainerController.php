<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::with('service')->get();

        return view('admin.trainers.index', compact('trainers'));
    }

    public function create()
    {
        $services = Service::all();
        return view('admin.trainers.create',compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'bio' => 'required',
            'service_id' => 'required',
        ]);

        $trainer = Trainer::create($request->all());

        if ($request->hasFile('image')) {
            $trainer->addMediaFromRequest('image')->toMediaCollection('trainer_images');
        }

        return redirect()->route('admin.trainers.index')->with('success', 'Trainer created successfully.');
    }

    public function edit($id)
    {
        $trainer = Trainer::findOrFail($id);
        $services = Service::all();
        return view('admin.trainers.update', compact('trainer','services'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'bio' => 'required',
            'service_id' => 'required',
        ]);

        $trainer = Trainer::findOrFail($id);
        $trainer->update($request->all());
        if ($request->hasFile('image')) {
            if ($trainer->getFirstMedia('trainer_images')) {
                $trainer->clearMediaCollection('trainer_images');
            }
            $trainer->addMediaFromRequest('image')->toMediaCollection('trainer_images');
        }

        return redirect()->route('admin.trainers.index')->with('success', 'Trainer updated successfully.');
    }

    public function destroy($id)
    {
        $trainer = Trainer::findOrFail($id);
        $trainer->clearMediaCollection('trainer_images');
        $trainer->delete();
        return redirect()->route('admin.trainers.index')->with('success', 'Trainer deleted successfully.');
    }
}
