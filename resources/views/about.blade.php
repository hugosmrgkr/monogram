@extends('layouts.app')

@section('content')
    <div class="container py-5">


    @forelse ($abouts as $about)
    
    {{-- Judul --}}
    <h1 style="font-size: 64px; font-family: Inter; font-weight: 700; margin-bottom: 30px;">{{ $about->title }}</h1>

<div class="text-center mb-4">
    <img src="{{ asset('storage/' . $about->image) }}" alt="Monogram Toba Studio" 
         style="max-width: 100%; height: auto; border-radius: 8px;">
</div>

<!-- Deskripsi studio -->
<div style="font-size: 20px; font-family: Inter; font-weight: 500; line-height: 30px; color: black; margin-bottom: 30px;">
    <p>{{ $about->description }}</p>
</div>

    {{-- Dua Gambar Horizontal --}}
    @php
        $horizontalImages = json_decode($about->horizontal_images, true);
    @endphp
    @if (!empty($horizontalImages))
        <div class="d-flex flex-wrap gap-3 my-4">
            @foreach ($horizontalImages as $image)
                <img src="{{ asset('storage/' . $image) }}" alt="Foto Studio"
                    style="width: 100%; max-width: 624px; height: auto; border-radius: 8px;">
            @endforeach
        </div>
    @endif

    {{-- Paragraf Penutup --}}
    @if (!empty($about->closing_paragraph))
        <div style="width: 100%; max-width: 842px; font-size: 20px; font-family: Inter; font-weight: 500; line-height: 30px; color: black;">
            {{ $about->closing_paragraph }}
        </div>
    @endif

    {{-- Galeri Tiga Foto --}}
    @php
        $galleryImages = json_decode($about->gallery_images, true);
    @endphp
    @if (!empty($galleryImages))
        <div class="container py-5 d-flex flex-wrap gap-3 justify-content-center">
            @foreach ($galleryImages as $image)
                <img src="{{ asset('storage/' . $image) }}" alt="Foto Galeri" style="border-radius: 8px;">
            @endforeach
        </div>
    @endif

    {{-- Jam Operasional --}}
    @if (!empty($about->weekday_hours) || !empty($about->weekend_hours))
        <div class="container text-center my-4">
            <h3 style="font-size: 24px; font-weight: 700;">JAM OPERASIONAL</h3>
            @if (!empty($about->weekday_hours))
                <p style="font-size: 20px;">Senin - Sabtu : {{ $about->weekday_hours }}</p>
            @endif
            @if (!empty($about->weekend_hours))
                <p style="font-size: 20px;">Minggu : {{ $about->weekend_hours }}</p>
            @endif
        </div>
    @endif
@empty
    <h1>Belum ada Data</h1>
@endforelse


        {{-- Profil Owner --}}
        <div class="container d-flex flex-wrap justify-content-between align-items-start py-5" style="gap: 40px;">

            {{-- Keterangan Owner --}}
            <div style="max-width: 700px;">
                <h2 style="font-size: 45px; font-weight: 700;">Owner Monogram</h2>
                <p style="color: #828282; font-size: 14px;">Berikut Profil Owner</p>

                <table style="font-size: 20px; font-weight: 500; line-height: 30px;">
                    <tr>
                        <td style="padding-right: 20px;">Nama</td>
                        <td>: Jeremy Jordan Simorangkir</td>
                    </tr>
                    <tr>
                        <td style="padding-right: 20px;">Tanggal Lahir</td>
                        <td>: 2 April 2000</td>
                    </tr>
                    <tr>
                        <td style="padding-right: 20px;">Riwayat Pendidikan</td>
                        <td>: S1 Sistem Informasi (Mikroskil Medan)</td>
                    </tr>
                    <tr>
                        <td style="padding-right: 20px;">Alamat Owner</td>
                        <td>: Jl. Sabam Sirait, Porsea</td>
                    </tr>
                    <tr>
                        <td style="padding-right: 20px;">Alasan</td>
                        <td>: carik duit</td>
                    </tr>
                    <tr>
                        <td style="padding-right: 20px;">Terinspirasi dari</td>
                        <td>: Self photo studio yg ada di Medan</td>
                    </tr>
                </table>

                {{-- Kontak --}}
                <div class="d-flex gap-3 mt-4 flex-wrap">
                    <a href="https://wa.me/6282268691532" target="_blank" style="text-decoration: none;">
                        <div
                            style="padding: 12px 24px; background: black; border-radius: 8px; color: white; font-size: 20px; font-weight: 500;">
                            +62 82268691532
                        </div>
                    </a>
                    <a href="https://instagram.com/jeremysmrgkr_" target="_blank" style="text-decoration: none;">
                        <div
                            style="padding: 12px 24px; background: black; border-radius: 8px; color: white; font-size: 20px; font-weight: 500;">
                            @jeremysmrgkr_
                        </div>
                    </a>
                </div>
            </div>

            {{-- Foto Owner --}}
            <div>
                <img src="{{ asset('assets/images/owner.png') }}" alt="Foto Owner" style="border-radius: 8px;">

            </div>
        </div>
    </div>
@endsection
