@extends('admin.layouts.master')
@section('content')
<div class="col-lg-8 mx-auto">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center">Edit Data</h2>

            <form action="{{ route('admin.about.update', $about->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Jam Operasional Weekday --}}
                <div class="form-group">
                    <label>Jam Buka (Senin - Sabtu)</label>
                    <input type="time" name="weekday_open" class="form-control" value="{{ $about->weekday_open }}" required>
                </div>
                <div class="form-group">
                    <label>Jam Tutup (Senin - Sabtu)</label>
                    <input type="time" name="weekday_close" class="form-control" value="{{ $about->weekday_close }}" required>
                </div>

                {{-- Jam Operasional Weekend --}}
                <div class="form-group">
                    <label>Jam Buka (Minggu)</label>
                    <input type="time" name="weekend_open" class="form-control" value="{{ $about->weekend_open }}" required>
                </div>
                <div class="form-group">
                    <label>Jam Tutup (Minggu)</label>
                    <input type="time" name="weekend_close" class="form-control" value="{{ $about->weekend_close }}" required>
                </div>

                {{-- Kontak --}}
                <div class="form-group">
                    <label>Link WhatsApp</label>
                    <input type="url" name="kontak_wa" class="form-control" value="{{ $about->kontak_wa }}" required>
                </div>
                <div class="form-group">
                    <label>Link Instagram</label>
                    <input type="url" name="kontak_ig" class="form-control" value="{{ $about->kontak_ig }}" required>
                </div>

                <div class="mt-3 text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
