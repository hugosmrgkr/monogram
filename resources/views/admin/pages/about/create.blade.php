@extends('admin.layouts.master')
@section('content')
<div class="col-lg-8 mx-auto">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center">Tambah Data</h2>

            <form action="{{ route('admin.about.store') }}" method="POST">
                @csrf

                {{-- Jam Operasional Weekday --}}
                <div class="form-group">
                    <label>Jam Buka (Senin - Sabtu)</label>
                    <input type="time" name="weekday_open" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Jam Tutup (Senin - Sabtu)</label>
                    <input type="time" name="weekday_close" class="form-control" required>
                </div>

                {{-- Jam Operasional Weekend --}}
                <div class="form-group">
                    <label>Jam Buka (Minggu)</label>
                    <input type="time" name="weekend_open" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Jam Tutup (Minggu)</label>
                    <input type="time" name="weekend_close" class="form-control" required>
                </div>

                {{-- Kontak --}}
                <div class="form-group">
                    <label>Link WhatsApp</label>
                    <input type="url" name="kontak_wa" class="form-control" placeholder="https://wa.me/..." required>
                </div>
                <div class="form-group">
                    <label>Link Instagram</label>
                    <input type="url" name="kontak_ig" class="form-control" placeholder="https://instagram.com/..." required>
                </div>

                <div class="mt-3 text-center">
                    <button type="submit" class="btn" style="background-color: black; color: white; border: none;">Simpan</button>
                    <a href="{{ route('admin.about.index') }}" class="btn" style="background-color: white; color: black; border: 1px solid black;">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
