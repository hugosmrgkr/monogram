<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.pages.faq.index', [
            'title' => 'Daftar FAQ',
            'faqs' => $faqs
        ]);
    }

    public function create()
    {
        return view('admin.pages.faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'required|string',
        ]);

        Faq::create($request->all());

        return redirect()->route('faq.index')->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit(Faq $faq)
    {
        return view('admin.pages.faq.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'required|string',
        ]);

        $faq->update($request->all());

        return redirect()->route('faq.index')->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('faq.index')->with('success', 'FAQ berhasil dihapus.');
    }
}
