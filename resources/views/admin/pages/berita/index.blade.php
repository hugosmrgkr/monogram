@extends('admin.layouts.master')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">{{ $title }}</h2>


                {{-- Tombol Tambah --}}
                <div class="mb-3 text-right">
                    <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">Tambah Berita</a>
                </div>

                @if ($beritas->isEmpty())
                    <div class="alert alert-warning text-center">
                        Belum ada data berita.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Gambar</th>
                                    <th>Isi Berita</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Habis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($beritas as $key => $berita)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $berita->judul }}</td>
                                        <td>
                                            @if ($berita->gambar)
                                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar" width="100">
                                            @else
                                                <span class="text-muted">Tidak ada gambar</span>
                                            @endif
                                        </td>
                                        <td>{{ Str::limit($berita->isi, 50) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($berita->tanggal_mulai)->format('d M Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($berita->tanggal_habis)->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus berita ini?')">Hapus</button>
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
