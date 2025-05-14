<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'komentar' => 'required|string',
        ]);

        $komentar = Komentar::create([
            'nama' => $validated['nama'],
            'komentar' => $validated['komentar'],
            'is_approve' => true,
        ]);

        // Untuk AJAX: balas JSON
        if ($request->ajax()) {
            return response()->json($komentar, 200);
        }

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
        $komentar = Komentar::findOrFail($id);
        $komentar->is_approve = !$komentar->is_approve;
        $komentar->admin_id = Auth::guard('admin')->id();
        $komentar->save();
        return redirect()->route('admin.komentar.index')->with('success', 'Status komentar berhasil diperbarui.');
    }
}
