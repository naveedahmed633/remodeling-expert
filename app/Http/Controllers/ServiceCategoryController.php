<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::all();
        return view('admin.servicecategories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.servicecategories.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ServiceCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.form.services.index')->with('success', 'Service Category created successfully.');
    }

    public function edit($id)
    {
        $category = ServiceCategory::findOrFail($id);
        return view('admin.servicecategories.update', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = ServiceCategory::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.form.services.index')->with('success', 'Service Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = ServiceCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.form.services.index')->with('success', 'Service Category deleted successfully.');
    }
}
