<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use App\Models\SubserviceCategory;
use Illuminate\Http\Request;

class SubserviceCategoryController extends Controller
{

    public function getSubServices($id)
    {
        $service = ServiceCategory::with('subServices.remodelTypes')->find($id);
        return response()->json($service);
    }
    public function index()
    {
        $categories = SubserviceCategory::all();
        return view('admin.subservices.index', compact('categories'));
    }

    public function create()
    {

        $categories = SubserviceCategory::all();
        return view('admin.subservices.add', compact('categories'));
    }
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'main_service' => 'required|exists:service_categories,id',
            'sub_services' => 'nullable|array',
            'sub_services.*.name' => 'required_with:sub_services|string|max:255',
        ]);
        

        if (!empty($validated['sub_services'])) {
            foreach ($validated['sub_services'] as $subcategory) {
                SubserviceCategory::create([
                    'service_category_id' => $validated['main_service'],
                    'name' => $subcategory['name'],
                ]);
            }
        }
        

        // Redirect back with a success message
        return back()->with('success', 'Subservices added successfully!');
    }

    public function edit($id)
    {
        $category = SubserviceCategory::findOrFail($id);
        return view('admin.subservices.update', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = SubserviceCategory::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.form.services.index')->with('success', 'Service Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = SubserviceCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.form.services.index')->with('success', 'Service Category deleted successfully.');
    }
}
