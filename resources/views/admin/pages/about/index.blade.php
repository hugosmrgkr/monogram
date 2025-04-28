@extends('admin.layouts.master')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">{{ $title }}</h2>

                {{-- Tombol Tambah --}}
                <div class="mb-3 text-right">
                    <a href="{{ route('admin.about.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>

                @if ($abouts->isEmpty())
                    <div class="alert alert-warning text-center">
                        Belum ada data.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jam Buka (Weekday)</th>
                                    <th>Jam Tutup (Weekday)</th>
                                    <th>Jam Buka (Weekend)</th>
                                    <th>Jam Tutup (Weekend)</th>
                                    <th>WhatsApp</th>
                                    <th>Instagram</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($abouts as $key => $about)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $about->weekday_open }}</td>
                                        <td>{{ $about->weekday_close }}</td>
                                        <td>{{ $about->weekend_open }}</td>
                                        <td>{{ $about->weekend_close }}</td>
                                        <td>
                                            @if ($about->kontak_wa)
                                                <a href="{{ $about->kontak_wa }}" target="_blank">WhatsApp</a>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($about->kontak_ig)
                                                <a href="{{ $about->kontak_ig }}" target="_blank">Instagram</a>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
