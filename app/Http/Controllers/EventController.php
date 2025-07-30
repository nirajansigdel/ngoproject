<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        $page_title = 'Events';
        return view('backend.event.index', compact('events', 'page_title'));
    }

    public function create()
    {
        $page_title = 'Create Event';
        return view('backend.event.create', compact('page_title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:events,title',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|boolean'
        ]);

        $data = $request->except('_token', 'image');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . preg_replace('/\s+/', '_', $image->getClientOriginalName());
            $image->move(public_path('uploads/events'), $imageName);
            $data['image'] = $imageName;
        }

        Event::create($data);

        return redirect()->route('backend.event.index')->with('success', 'Event created successfully!');
    }

    public function show(Event $event)
    {
        // Redirect to edit page, as a separate show page is often not needed in admin panels
        return redirect()->route('backend.event.edit', $event->id);
    }


    public function edit(Event $event)
    {
        $page_title = 'Edit Event';
        return view('backend.event.edit', compact('event', 'page_title'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:events,title,' . $event->id,
            'subtitle' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|boolean'
        ]);

        $data = $request->except('_token', '_method', 'image');

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($event->image && File::exists(public_path('uploads/events/' . $event->image))) {
                File::delete(public_path('uploads/events/' . $event->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . preg_replace('/\s+/', '_', $image->getClientOriginalName());
            $image->move(public_path('uploads/events'), $imageName);
            $data['image'] = $imageName;
        }

        $event->update($data);

        return redirect()->route('backend.event.index')->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        // Delete image file if it exists
        if ($event->image && File::exists(public_path('uploads/events/' . $event->image))) {
            File::delete(public_path('upload s/events/' . $event->image));
        }

        $event->delete();

        return redirect()->route('backend.event.index')->with('success', 'Event deleted successfully!');
    }
}