<?php
namespace App\Http\Controllers;

use App\Models\CmsPage;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.add');
    }

    public function store(Request $request)
    {
        // Validate the request
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Check if an image is uploaded and store it
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        // Create a new service
        Service::create($data);

        return redirect()->route('admin.service.index')->with('success', 'Service created!');
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        $services = Service::all();
        
        $data = CmsPage::where('name', 'Project')->first();
        $content = $data ? json_decode($data->content, true) : [];
        return view('front.detailed-services', compact('service', 'services', "data", "content"));
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.update', compact('service'));
    }

    public function update(Request $request, $id)
    {
        // Find the service to update
        $service = Service::findOrFail($id);

        // Validate the request
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        // If an image is uploaded, store it and update the data
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        } else {
            // If no image is uploaded, keep the old image
            $data['image'] = $service->image;
        }

        // Update the service with new data
        $service->update($data);

        return redirect()->route('admin.service.index')->with('success', 'Service updated!');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return response()->json(['message' => 'Service deleted successfully.']);
    }
}
