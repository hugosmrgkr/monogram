@extends('admin.layouts.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card shadow-sm rounded-0 mt-4">
        <div class="card-body p-4">
            <h2 class="text-center fw-bold mb-4">{{ $title }}</h2>

            {{-- Tombol Tambah --}}
            <div class="mb-3 text-end">
                <a href="{{ route('admin.berita.create') }}" class="btn btn-dark">
                    <i class="fa fa-plus-circle me-2"></i>Tambah Berita
                </a>
            </div>

            @if(session('success'))
                <div id="success-alert" class="alert alert-success text-center mb-3" role="alert">
                    {{ session('success') }}
                </div>
                <script>
                    // Menyembunyikan alert setelah 3 detik
                    setTimeout(function() {
                        var successAlert = document.getElementById('success-alert');
                        if (successAlert) {
                            successAlert.style.display = 'none';
                        }
                    }, 3000); // 3000ms = 3 detik
                </script>
            @endif


            @if ($beritas->isEmpty())
                <div class="alert alert-info text-center">
                    Belum ada data berita.
                </div>
            @else
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark text-center text-uppercase">
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
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>{{ $berita->judul }}</td>
                                    <td class="text-center">
                                        @if ($berita->gambar)
                                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar" class="img-fluid" style="width: 100px; height: 80px;">
                                        @else
                                            <span class="text-muted">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td>{{ Str::limit($berita->isi, 50) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($berita->tanggal_mulai)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($berita->tanggal_habis)->format('d M Y') }}</td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-outline-dark btn-sm">
                                                <i class="fa fa-edit me-1"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash me-1"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
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
