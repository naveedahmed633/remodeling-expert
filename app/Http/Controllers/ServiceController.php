<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        return view('admin.service.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $service = new Service();
        $service->title = $request->title;
        $service->description = $request->description;

        $service->save();

        // Save image using Spatie Media Library
        if ($request->hasFile('image')) {
            $service->addMediaFromRequest('image')->toMediaCollection('services');
        }

        return redirect()->route('admin.service.index')->with('success', 'Service added successfully!');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.service.update', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        $service = Service::findOrFail($id);
        $service->title = $request->title;
        $service->description = $request->description;

        if ($request->hasFile('image')) {
            $service->clearMediaCollection('services');
            $service->addMediaFromRequest('image')->toMediaCollection('services');
        }

        $service->save();

        return redirect()->route('admin.service.index')->with('success', 'Service updated successfully!');
    }
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->clearMediaCollection('services');
        $service->delete();
        return redirect()->route('admin.service.index')->with('success', 'Service deleted successfully!');
    }

}
