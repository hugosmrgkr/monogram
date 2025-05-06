<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;  // Ubah dari 'Ulasan' menjadi 'Komentar'
use Illuminate\Support\Facades\Log;

class KomentarController extends Controller
{
    // Menyimpan komentar dari user
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'komentar' => 'required|string',
        ]);

        Komentar::create([
            'nama' => $request->input('nama'),
            'komentar' => $request->input('komentar'),
            'is_approve' => true,
        ]);

        return back()->with('success', 'Komentar berhasil dikirim dan telah ditampilkan.');
    }

    // Menampilkan semua komentar untuk admin
    public function index()
    {
        $komentars = Komentar::latest()->get();  // Ubah 'Ulasan' menjadi 'Komentar'
        $title = 'Data Komentar';  // Judul halaman admin
        return view('admin.komentar.index', compact('komentars', 'title'));  // Ubah 'ulasans' menjadi 'komentars'
    }

    // Toggle status komentar (tampilkan/sembunyikan)
    public function toggle($id)
    {
        $komentar = Komentar::findOrFail($id);  // Ubah 'Ulasan' menjadi 'Komentar'
        $komentar->is_approve = !$komentar->is_approve;  // Ubah 'is_approved' menjadi 'is_approve'
        $komentar->save();

        return redirect()->route('admin.komentar.index')->with('success', 'Status komentar berhasil diperbarui.');  // Ubah 'ulasan' menjadi 'komentar'
    }
}
