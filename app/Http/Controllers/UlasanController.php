<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;

class UlasanController extends Controller
{
    // Menyimpan ulasan dari user
    public function store(Request $request)
    {
        $request->validate([
            'ulasan' => 'required|string',
            'name' => 'nullable|string|max:255',
        ]);
    
        Ulasan::create([
            'name' => $request->name,
            'ulasan' => $request->ulasan,
            'is_approved' => null, 
        ]);
    
        return back()->with('success', 'Ulasan berhasil dikirim dan sedang menunggu persetujuan admin.');
    }
    

    // Menampilkan semua ulasan untuk admin
    public function index()
    {
        $ulasans = Ulasan::latest()->get();
        $title = 'Data Ulasan';
        return view('admin.ulasan.index', compact('ulasans', 'title'));
    }
    

    // Menyetujui ulasan
   // Approve
public function approve($id)
{
    \Log::info('Approve dipanggil via method: ' . request()->method());
    
    $ulasan = Ulasan::findOrFail($id);
    $ulasan->is_approved = true;
    $ulasan->save();

    return redirect()->route('admin.ulasan.index')->with('success', 'Ulasan disetujui.');
}

// Reject
public function reject($id)
{
    $ulasan = Ulasan::findOrFail($id);
    $ulasan->is_approved = false;
    $ulasan->save();

    return redirect()->route('admin.ulasan.index')->with('error', 'Ulasan ditolak.');
}

}