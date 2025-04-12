<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonial.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $testimonial = Testimonial::create($request->only('name', 'description'));

        if ($request->hasFile('image')) {
            $testimonial->addMediaFromRequest('image')->toMediaCollection('testimonial_image');
        }

        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.update', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $testimonial->update($request->only('name', 'description'));

        if ($request->hasFile('image')) {
            $testimonial->clearMediaCollection('testimonial_image');
            $testimonial->addMediaFromRequest('image')->toMediaCollection('testimonial_image');
        }

        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->clearMediaCollection('testimonial_image');
        $testimonial->delete();

        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial deleted successfully.');
    }
}
