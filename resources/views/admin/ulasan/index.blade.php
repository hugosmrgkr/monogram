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
                @switch($ulasan->is_approved)
                    @case(true)
                        <span class="text-success">Disetujui</span>
                        @break
                    @case(false)
                        <span class="text-danger">Ditolak</span>
                        @break
                    @default
                        <span class="text-warning">Menunggu</span>
                @endswitch
            </p>

            @if(is_null($ulasan->is_approved))
                <form action="{{ route('admin.ulasan.approve', $ulasan->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    <button class="btn btn-success btn-sm">Setujui</button>
                </form>

                <form action="{{ route('admin.ulasan.reject', $ulasan->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    <button class="btn btn-danger btn-sm">Tolak</button>
                </form>
            @endif
        </div>
    @empty
        <div class="alert alert-info">Tidak ada ulasan yang masuk.</div>
    @endforelse
</div>
@endsection
