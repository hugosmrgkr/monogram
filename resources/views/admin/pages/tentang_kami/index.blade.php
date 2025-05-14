@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card shadow rounded-4 mt-4">
        <div class="card-body">
            <h2 class="text-center fw-bold mb-4">{{ $title }}</h2>

            {{-- Tombol Tambah --}}
            <div class="mb-3 text-end">
                <a href="{{ route('admin.tentang-kami.create') }}" class="btn btn-dark">
                    <i class="fa fa-plus-circle me-1"></i> Tambah Data
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


            @if ($tentangkami->isEmpty())
                <div class="alert alert-info text-center">
                    Belum ada data.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark text-center text-uppercase">
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
                            @foreach ($tentangkami as $key => $item)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>{{ $item->jam_buka_hari_biasa }}</td>
                                    <td>{{ $item->jam_tutup_hari_biasa }}</td>
                                    <td>{{ $item->jam_buka_akhir_pekan }}</td>
                                    <td>{{ $item->jam_tutup_akhir_pekan }}</td>
                                    <td>
                                        @if ($item->kontak_wa)
                                            <a href="{{ $item->kontak_wa }}" target="_blank" class="text-decoration-none text-primary">WhatsApp</a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->kontak_ig)
                                            <a href="{{ $item->kontak_ig }}" target="_blank" class="text-decoration-none text-primary">Instagram</a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.tentang-kami.edit', $item->id) }}" class="btn btn-outline-dark btn-sm">
                                                <i class="fa fa-edit me-1"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.tentang-kami.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
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
