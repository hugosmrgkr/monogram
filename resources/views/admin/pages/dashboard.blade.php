@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <h3 style="font-weight: 700; color: #212529; letter-spacing: 0.5px;">Welcome Admin</h3>
            <h6 style="font-weight: 400; color: #6c757d;">Semua sistem berjalan lancar!</h6>
            <hr style="background-color: #212529; height: 1px; opacity: 0.1;">
        </div>
    </div>

    {{-- Statistik Ringkas --}}
    <div class="row g-3">
        {{-- Total Galeri --}}
        <div class="col-md-3">
            <div class="card mb-3" style="border: none; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                <div class="card-body text-white" style="background-color: #495057; border-radius: 10px; padding: 1.5rem;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-1 text-white" style="font-weight: 600; font-size: 1rem; background-color:">Total Foto Galeri</h5>
                        <i class="bi bi-images" style="font-size: 1.5rem;"></i>
                    </div>
                    <p class="card-text" style="font-size: 2rem; font-weight: 700; margin-top: 0.5rem; margin-bottom: 0;">{{ $totalGaleri }}</p>
                </div>
            </div>
        </div>

        {{-- Total Ulasan --}}
        <div class="col-md-3">
            <div class="card mb-3" style="border: none; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                <div class="card-body text-white" style="background-color: #495057; border-radius: 10px; padding: 1.5rem;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-1 text-white" style="font-weight: 600; font-size: 1rem;">Total Ulasan</h5>
                        <i class="bi bi-chat-square-text" style="font-size: 1.5rem;"></i>
                    </div>
                    <p class="card-text" style="font-size: 2rem; font-weight: 700; margin-top: 0.5rem; margin-bottom: 0;">{{ $totalUlasan }}</p>
                </div>
            </div>
        </div>

        {{-- Total Berita Aktif --}}
        <div class="col-md-3">
            <div class="card mb-3" style="border: none; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                <div class="card-body text-white" style="background-color: #495057; border-radius: 10px; padding: 1.5rem;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-1 text-white" style="font-weight: 600; font-size: 1rem;">Berita Aktif</h5>
                        <i class="bi bi-newspaper" style="font-size: 1.5rem;"></i>
                    </div>
                    <p class="card-text" style="font-size: 2rem; font-weight: 700; margin-top: 0.5rem; margin-bottom: 0;">{{ $totalBerita }}</p>
                </div>
            </div>
        </div>

        {{-- Total FAQ --}}
        <div class="col-md-3">
            <div class="card mb-3" style="border: none; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                <div class="card-body text-white" style="background-color: #495057; border-radius: 10px; padding: 1.5rem;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-1 text-white" style="font-weight: 600; font-size: 1rem;">FAQ</h5>
                        <i class="bi bi-question-circle" style="font-size: 1.5rem;"></i>
                    </div>
                    <p class="card-text" style="font-size: 2rem; font-weight: 700; margin-top: 0.5rem; margin-bottom: 0;">{{ $totalFaq }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Total Layanan --}}
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-3" style="border: none; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                <div class="card-body text-white" style="background-color: #495057; border-radius: 10px; padding: 1.5rem;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-1 text-white" style="font-weight: 600; font-size: 1rem;">Layanan</h5>
                        <i class="bi bi-gear" style="font-size: 1.5rem;"></i>
                    </div>
                    <p class="card-text" style="font-size: 2rem; font-weight: 700; margin-top: 0.5rem; margin-bottom: 0;">{{ $totalLayanan }}</p>
                </div>
            </div>
        </div>
    </div>

@endsection

