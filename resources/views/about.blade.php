@extends('layouts.app')

@section('content')
    <div class="container py-5">

        {{-- Judul --}}
        <h1 style="font-size: 64px; font-family: Inter; font-weight: 700; text-align: center;">TENTANG MONOGRAM TOBA</h1>


        @forelse ($abouts as $about)
            <img src="{{ asset('storage/' . $about->image) }}" alt="Monogram Studio"
                style="width: 100%; max-width: 975px; height: auto; border-radius: 8px;" class="my-4">
            <h1 style="font-size: 64px; font-family: Inter; font-weight: 700;">{{ $about->title }}</h1>

            {{-- Paragraf Deskripsi --}}
            <div
                style="width: 100%; max-width: 842px; font-size: 14px; font-family: Inter; font-weight: 500; line-height: 21px; color: black;">
                <p>{{ $about->description }}</p>
            </div>
        @empty
            <h1>Belum ada Data</h1>
        @endforelse


        {{-- Dua Gambar Horizontal --}}
        <div class="d-flex flex-wrap gap-3 my-4">
            <img src="{{ asset('assets/images/tentang2.png') }}" alt="Foto Studio 1"
                style="width: 100%; max-width: 624px; height: auto; border-radius: 8px;">
            <img src="{{ asset('assets/images/tentang3.png') }}" alt="Foto Studio 2"
                style="width: 100%; max-width: 624px; height: auto; border-radius: 8px;">
        </div>

        {{-- Paragraf Penutup --}}
        <div
            style="width: 100%; max-width: 842px; font-size: 20px; font-family: Inter; font-weight: 500; line-height: 30px; color: black;">
            Bagi Anda yang ingin merasakan pengalaman fotografi terbaik, Monogram Toba Studio siap membantu mengabadikan
            momen berharga dengan sentuhan profesional. Datang dan nikmati layanan fotografi berkualitas di studio kami,
            tempat setiap cerita menjadi kenangan yang tak terlupakan.
        </div>

        {{-- Galeri Tiga Foto --}}
        <div class="container py-5 d-flex flex-wrap gap-3 justify-content-center">
            <img src="{{ asset('assets/images/tentangCard1.png') }}" alt="Foto Owner 1" style="border-radius: 8px;">
            <img src="{{ asset('assets/images/tentangCard2.png') }}" alt="Foto Owner 2" style="border-radius: 8px;">
            <img src="{{ asset('assets/images/tentangCard3.png') }}" alt="Foto Owner 3" style="border-radius: 8px;">
        </div>

        {{-- Jam Operasional --}}
        <div class="container text-center my-4">
            <h3 style="font-size: 24px; font-weight: 700;">JAM OPERASIONAL</h3>
            <p style="font-size: 20px;">Senin - Sabtu : 11.00 - 20.00</p>
            <p style="font-size: 20px;">Minggu : 15.00 - 21.00</p>
        </div>

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
