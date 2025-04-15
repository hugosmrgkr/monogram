<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.about.index', [
            'abouts' => About::all(),
            'title' => 'Data About',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.about.create', [
            'title' => 'Data About',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'closing_paragraph' => 'nullable|string',
            'weekday_hours' => 'nullable|string',
            'weekend_hours' => 'nullable|string',
            'horizontal_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Upload gambar utama
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('abouts', 'public');
        }
    
        // Upload gambar horizontal
        $horizontalImagePaths = [];
        if ($request->hasFile('horizontal_images')) {
            foreach ($request->file('horizontal_images') as $file) {
                $horizontalImagePaths[] = $file->store('abouts/horizontal', 'public');
            }
        }
    
        // Upload gambar galeri
        $galleryImagePaths = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $galleryImagePaths[] = $file->store('abouts/gallery', 'public');
            }
        }
    
        // Simpan ke database
        About::create([
            'title' => $request->title,
            'description' => $request->description,
            'closing_paragraph' => $request->closing_paragraph,
            'weekday_hours' => $request->weekday_hours,
            'weekend_hours' => $request->weekend_hours,
            'horizontal_images' => json_encode($horizontalImagePaths),
            'gallery_images' => json_encode($galleryImagePaths),
            'image' => $imagePath,
        ]);
    
        return redirect()->route('about.index')->with('success', 'Data berhasil disimpan!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('admin.pages.about.edit', [
            'about' => $about,
            'title' => 'Edit About',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            if ($about->image && Storage::disk('public')->exists($about->image)) {
                Storage::disk('public')->delete($about->image);
            }
            $validated['image'] = $request->file('image')->store('abouts', 'public');
        }
        $about->update($validated);
        return redirect()->route('about.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        if ($about->image && Storage::disk('public')->exists($about->image)) {
            Storage::disk('public')->delete($about->image);
        }
        $about->delete();
        return redirect()->route('about.index')->with('success', 'Data berhasil dihapus.');
    }
}
