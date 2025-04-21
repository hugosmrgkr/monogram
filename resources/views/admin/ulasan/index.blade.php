@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-4">Manajemen Ulasan</h2>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- List Ulasan --}}
    @forelse($ulasans as $ulasan)
        <div class="border p-3 rounded mb-3 shadow-sm">
            <p><strong>Nama:</strong> {{ $ulasan->name ?? 'Anonim' }}</p>
            <p><strong>Ulasan:</strong> {{ $ulasan->ulasan }}</p>
            <p><strong>Status:</strong>
                @if($ulasan->is_approved)
                    <span class="text-success">Tampil</span>
                @else
                    <span class="text-danger">Disembunyikan</span>
                @endif
            </p>

            <form action="{{ route('admin.ulasan.toggle', $ulasan->id) }}" method="POST" style="display:inline-block;">
                @csrf
                <button class="btn btn-sm {{ $ulasan->is_approved ? 'btn-warning' : 'btn-success' }}">
                    {{ $ulasan->is_approved ? 'Sembunyikan' : 'Tampilkan' }}
                </button>
            </form>
        </div>
    @empty
        <div class="alert alert-info">Tidak ada ulasan yang masuk.</div>
    @endforelse
</div>
@endsection