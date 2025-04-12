<?php

namespace App\Http\Controllers;

use App\Models\ClassType;
use Illuminate\Http\Request;

class ClassTypeController extends Controller
{
    public function index()
    {
        $classTypes = ClassType::all();
        return view('admin.class_types.index', compact('classTypes'));
    }

    public function create()
    {
        return view('admin.class_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
        ]);

        ClassType::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.class_types.index')->with('success', 'Class Type added successfully');
    }

    public function edit($id)
    {
        $classType = ClassType::findOrFail($id);
        return view('admin.class_types.update', compact('classType'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $classType = ClassType::findOrFail($id);
        $classType->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.class_types.index')->with('success', 'Class Type updated successfully');
    }

    public function destroy($id)
    {
        ClassType::findOrFail($id)->delete();
        return redirect()->route('admin.class_types.index')->with('success', 'Class Type deleted successfully');
    }
}
