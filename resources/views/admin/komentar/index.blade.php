@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card shadow rounded-4 mt-4">
        <div class="card-body" style="padding: 2.5rem;">
            <h2 class="text-center fw-bold mb-4 text-dark" style="letter-spacing: -0.5px;">Daftar Komentar</h2>

            {{-- Notifikasi --}}
            @if(session('success'))
                <div class="alert alert-success" style="background-color: #28a745; color: white;">
                    <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger" style="background-color: #dc3545; color: white;">
                    <i class="fa fa-times-circle me-2"></i>{{ session('error') }}
                </div>
            @endif

            {{-- Tabel Komentar --}}
            <div class="table-responsive mt-4">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark text-center text-uppercase">
                        <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Komentar</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($komentars as $komentar)
                            <tr style="transition: all 0.2s ease;">
                                <td class="text-center">
                                    {{ $komentar->nama ?? 'Anonim' }}
                                </td>
                                <td class="text-center">
                                    {{ $komentar->komentar }}
                                </td>
                                <td class="text-center">
                                    <span class="badge {{ $komentar->is_approve ? 'bg-success' : 'bg-danger' }} text-uppercase">
                                        {{ $komentar->is_approve ? 'Tampil' : 'Disembunyikan' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('admin.komentar.toggle', $komentar->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn {{ $komentar->is_approve ? 'btn-outline-danger' : 'btn-outline-success' }} btn-sm">
                                            <i class="fa {{ $komentar->is_approve ? 'fa-eye-slash' : 'fa-eye' }} me-1"></i>
                                            {{ $komentar->is_approve ? 'Sembunyikan' : 'Tampilkan' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <i class="fa fa-comments mb-3" style="font-size: 3rem; opacity: 0.2;"></i>
                                    <p class="text-muted" style="font-size: 15px;">Tidak ada komentar yang masuk.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Hover effect pada baris tabel
    document.querySelectorAll('.table tr').forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.backgroundColor = '#f8f9fa';
        });

        row.addEventListener('mouseleave', function() {
            this.style.backgroundColor = '';
        });
    });
});
</script>
@endsection
