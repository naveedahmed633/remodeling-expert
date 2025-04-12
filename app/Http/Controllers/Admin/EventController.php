<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index()
    {
        $events = Event::all();
        return view('admin.event.index', compact('events'));
    }

    //
    public function create()
    {
        return view('admin.event.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $event = Event::create($request->only('name', 'description', 'badge'));

        if ($request->hasFile('image')) {
            $event->addMediaFromRequest('image')->toMediaCollection('event_image');
        }

        return redirect()->route('admin.event.index')->with('success', 'Event created successfully.');
    }

    //
    public function edit(Event $event)
    {
        return view('admin.event.update', compact('event'));
    }

    //
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $event->update($request->only('name', 'description', 'badge'));

        if ($request->hasFile('image')) {
            $event->clearMediaCollection('event_image');
            $event->addMediaFromRequest('image')->toMediaCollection('event_image');
        }

        return redirect()->route('admin.event.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->clearMediaCollection('event_image');
        $event->delete();

        return redirect()->route('admin.event.index')->with('success', 'Event deleted successfully.');
    }
}
