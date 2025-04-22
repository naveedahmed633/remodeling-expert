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
        // dd($request->sub_services);
        // Check if the service category exists
        $serviceCategory = ServiceCategory::find($request->main_service);

        if ($serviceCategory) {
            foreach ($request->sub_services as $sub) {
                SubserviceCategory::create([
                    'name' => $sub['name'],
                    'service_category_id' => $request->main_service,
                ]);
            }
        } else {
            dd('Service category not found.');
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
