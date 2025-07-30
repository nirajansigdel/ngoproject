<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    // Backend - List all FAQs with pagination
    public function index()
    {
        $faqs = Faq::latest()->paginate(5);
        return view('backend.faq.index', compact('faqs'));
    }

    // Backend - Show create form
    public function create()
    {
        return view('backend.faq.create');
    }

    // Backend - Store new FAQ
    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'question' => 'required|string',
            'answer' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['heading', 'question', 'answer']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('faq_images', 'public');
        }

        Faq::create($data);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully.');
    }

    // Backend - Show edit form
    public function edit(Faq $faq)
    {
        return view('backend.faq.edit', compact('faq'));
    }

    // Backend - Update existing FAQ
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'question' => 'required|string',
            'answer' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['heading', 'question', 'answer']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('faq_images', 'public');
        }

        $faq->update($data);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully.');
    }

    // Backend - Delete FAQ
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully.');
    }

    // Frontend - Display FAQs dynamically
    public function frontendIndex()
    {
        $faqs = Faq::latest()->get();  // fetch all FAQs ordered by latest
        return view('frontend.faq.index', compact('faqs'));
    }

    
}
