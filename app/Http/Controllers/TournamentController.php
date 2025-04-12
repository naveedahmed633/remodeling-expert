<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::all();
        return view('admin.tournament.index', compact('tournaments'));
    }
    public function create()
    {
        return view('admin.tournament.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $tournament = Tournament::create($request->only(['title', 'description']));
        if ($request->hasFile('image')) {
            $tournament->addMedia($request->file('image'))->toMediaCollection('images');
        }
        return redirect()->route('admin.tournament.index')->with('success', 'Tournament created successfully!');
    }

    public function edit($id)
    {
        $tournament = Tournament::findOrFail($id);
        return view('admin.tournament.update', compact('tournament'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $tournament = Tournament::findOrFail($id);
        $tournament->update($request->only(['title', 'description']));

        if ($request->hasFile('image')) {
            $tournament->clearMediaCollection('images');
            $tournament->addMedia($request->file('image'))->toMediaCollection('images');
        }
        return redirect()->route('admin.tournament.index')->with('success', 'Tournament updated successfully!');
    }

    public function destroy($id)
    {
        $tournament = Tournament::findOrFail($id);
        $tournament->clearMediaCollection('images');
        $tournament->delete();

        return redirect()->route('admin.tournament.index')->with('success', 'Tournament deleted successfully!');
    }
}
