<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.add');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'description1' => 'required',
            'client' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image1' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image2' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image3' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        foreach (['image', 'image1', 'image2', 'image3'] as $imgField) {
            if ($request->hasFile($imgField)) {
                $data[$imgField] = $request->file($imgField)->store('projects', 'public');
            }
        }

        Project::create($data);

        return redirect()->route('admin.project.index')->with('success', 'Project created!');
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        $projects = Project::all();
        $services = Service::all();
        return view('front.detailed-project', compact('project', 'projects', 'services'));
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.update', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'description1' => 'required',
            'client' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Check if any image is uploaded and delete old image if needed
        foreach (['image', 'image1', 'image2', 'image3'] as $imgField) {
            if ($request->hasFile($imgField)) {
                // Delete old image from storage if new one is uploaded
                if ($project->$imgField) {
                    Storage::disk('public')->delete($project->$imgField);
                }
                $data[$imgField] = $request->file($imgField)->store('projects', 'public');
            } else {
                // Retain old image if not updated
                $data[$imgField] = $project->$imgField;
            }
        }

        $project->update($data);

        return redirect()->route('admin.project.index')->with('success', 'Project updated!');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Delete images from storage
        foreach (['image', 'image1', 'image2', 'image3'] as $imgField) {
            if ($project->$imgField) {
                Storage::disk('public')->delete($project->$imgField);
            }
        }

        $project->delete();

        return response()->json(['message' => 'Project deleted successfully.']);
    }

    public function orderIndex()
    {
        $orders = Order::get();
        return view('admin.order.index', compact('orders'));
    }

    public function orderView($id)
    {
        $order = Order::find($id);
        return view('admin.order.view', compact('order'));
    }
}
