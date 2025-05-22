@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="card shadow rounded-4 mt-4">
            <div class="card-body">
                <h2 class="text-center fw-bold mb-4">{{ $title }}</h2>
                {{-- Tombol Kategori --}}
                <div class="mb-3 d-flex justify-content-start gap-3">
                <div class="dropdown custom-dropdown-bw">
                    <button class="btn btn-outline-dark btn-sm dropdown-toggle" type="button" id="dropdownKategori" data-bs-toggle="dropdown" aria-expanded="false">
                        Pilih Kategori
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownKategori">
                        <li>
                            <a href="{{ route('admin.gallery.index', ['kategori' => 'Semua']) }}" class="dropdown-item">Semua</a>
                        </li>
                        @foreach ($kategoriList as $kategoriItem)
                            <li>
                                <a href="{{ route('admin.gallery.index', ['kategori' => $kategoriItem]) }}" class="dropdown-item">{{ $kategoriItem }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="mb-3 text-end">
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-dark">
                    <i class="fa fa-plus-circle me-1"></i> Tambah galeri
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

            {{-- Tampilkan pesan jika tidak ada gambar --}}
            @if ($galleries->isEmpty())
                <div class="alert alert-info text-center">
                    Belum ada gambar dalam galeri.
                </div>
            @else
                {{-- Tabel Galeri --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark text-center text-uppercase">
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galleries as $key => $gallery)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/app/public/' . $gallery->gambar) }}" style="width: 120px; height: 180px; object-fit: cover; border-radius: 8px;">
                                    </td>
                                    <td class="text-center">{{ $gallery->kategori }}</td>
                                    <td class="text-center">
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.gallery.edit', $gallery->galeri_id) }}" class="btn btn-outline-dark btn-sm">
                                                <i class="fa fa-edit me-1"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.gallery.destroy', $gallery->galeri_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-dark btn-sm">
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
