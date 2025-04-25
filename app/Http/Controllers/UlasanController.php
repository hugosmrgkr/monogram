<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;
use Illuminate\Support\Facades\Log;

class UlasanController extends Controller
{
    // Menyimpan ulasan dari user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // sekarang wajib
            'ulasan' => 'required|string',
        ]);
    
        Ulasan::create([
            'name' => $request->input('name'),
            'ulasan' => $request->input('ulasan'),
            'is_approved' => true, // langsung tampil
        ]);
    
        return back()->with('success', 'Komentar berhasil dikirim dan telah ditampilkan.');
    }
    
    // Menampilkan semua ulasan untuk admin
    public function index()
    {
        $ulasans = Ulasan::latest()->get();
        $title = 'Data Ulasan';
        return view('admin.ulasan.index', compact('ulasans', 'title'));
    }

    // Toggle status ulasan (tampilkan/sembunyikan)
    public function toggle($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->is_approved = !$ulasan->is_approved;
        $ulasan->save();

        return redirect()->route('admin.ulasan.index')->with('success', 'Status ulasan berhasil diperbarui.');
    }
}
