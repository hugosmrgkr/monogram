@extends('admin.layouts.master')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">{{ $title }}</h2>

                {{-- Tombol Tambah --}}
                <div class="mb-3 text-right">
                    <a href="{{ route('about.create') }}" class="btn btn-primary">Tambah Data</a>
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
                                    <th>Judul</th>
                                    <th>Gambar</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($abouts as $key => $about)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $about->title }}</td>
                                        <td>
                                            @if ($about->image)
                                                <img src="{{ asset('storage/' . $about->image) }}" alt="Gambar">
                                            @else
                                                <span class="text-muted">Tidak ada gambar</span>
                                            @endif
                                        </td>
                                        <td>{{ Str::limit($about->description, 50) }}</td>
                                        <td>
                                            <a href="{{ route('about.edit', $about->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('about.destroy', $about->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
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
