<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    // Show list of events
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('backend.event.index', compact('events'));
    }

    // Show create form
    public function create()
    {
        return view('backend.event.create');
    }

    // Store new event
    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move to public/uploads/events
            $image->move(public_path('uploads/events'), $imageName);
        }

        Event::create([
            'heading' => $request->heading,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'image' => $imageName,
        ]);

        return redirect()->route('backend.event.index')->with('success', 'Event created successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('backend.event.edit', compact('event'));
    }

    // Update event
    public function update(Request $request, $id)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $event = Event::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            $oldPath = public_path('uploads/events/' . $event->image);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/events'), $imageName);
            $event->image = $imageName;
        }

        $event->heading = $request->heading;
        $event->subtitle = $request->subtitle;
        $event->content = $request->content;
        $event->save();

        return redirect()->route('backend.event.index')->with('success', 'Event updated successfully!');
    }

    // Delete event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        // Delete image if exists
        $imagePath = public_path('uploads/events/' . $event->image);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $event->delete();

        return redirect()->route('backend.event.index')->with('success', 'Event deleted successfully!');
    }
    public function show($slug)
{
    $event = Event::where('slug', $slug)->firstOrFail();
    return view('frontend.event-detail', compact('event'));
}

}
