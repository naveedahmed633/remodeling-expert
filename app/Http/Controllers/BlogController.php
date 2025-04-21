<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Service;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.add');
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'blog created!');
    }

    public function ajeeb(Request $request)
    {
        // Validate data if needed
        $data = $request->all();

        // Example: Save in database if needed
        // ModelName::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Form submitted successfully!',
            'data' => $data
        ]);
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        $blogs = Blog::all();
        $services = Service::all();
        return view('front.detailed-blog', compact('blog', 'blogs', 'services'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.update', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'blog updated!');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return response()->json(['message' => 'blog deleted successfully.']);
    }
}
