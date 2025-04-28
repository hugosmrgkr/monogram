<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        return view('admin.pages.about.index', [
            'abouts' => About::all(),
            'title' => 'Tentang Kami'
        ]);
    }

    public function create()
    {
        return view('admin.pages.about.create', [
            'title' => 'Tambah Data'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'weekday_open' => 'required',
            'weekday_close' => 'required',
            'weekend_open' => 'required',
            'weekend_close' => 'required',
            'kontak_wa' => 'required|url',
            'kontak_ig' => 'required|url',
        ]);

        About::create([
            'weekday_open' => $request->weekday_open,
            'weekday_close' => $request->weekday_close,
            'weekend_open' => $request->weekend_open,
            'weekend_close' => $request->weekend_close,
            'kontak_wa' => $request->kontak_wa,
            'kontak_ig' => $request->kontak_ig,
        ]);

        return redirect()->route('admin.about.index')->with('success', 'Data About berhasil ditambahkan!');
    }

    public function edit(About $about)
    {
        return view('admin.pages.about.edit', [
            'about' => $about,
            'title' => 'Edit Data'
        ]);
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'weekday_open' => 'required',
            'weekday_close' => 'required',
            'weekend_open' => 'required',
            'weekend_close' => 'required',
            'kontak_wa' => 'required|url',
            'kontak_ig' => 'required|url',
        ]);

        $about->update([
            'weekday_open' => $request->weekday_open,
            'weekday_close' => $request->weekday_close,
            'weekend_open' => $request->weekend_open,
            'weekend_close' => $request->weekend_close,
            'kontak_wa' => $request->kontak_wa,
            'kontak_ig' => $request->kontak_ig,
        ]);

        return redirect()->route('admin.about.index')->with('success', 'Data About berhasil diperbarui!');
    }

    public function destroy(About $about)
    {
        $about->delete();
        return redirect()->route('admin.about.index')->with('success', 'Data About berhasil dihapus!');
    }
}
