@extends('admin.layouts.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h2 class="text-center text-dark font-weight-bold mb-4" style="letter-spacing: -0.5px;">Daftar Komentar</h2>

                {{-- Notifikasi --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger">
                        <i class="fa fa-times-circle me-2"></i>{{ session('error') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-uppercase text-white" style="font-size: 14px; letter-spacing: 1px;">Nama</th>
                                <th class="text-uppercase text-white" style="font-size: 14px; letter-spacing: 1px;">Komentar</th>
                                <th class="text-uppercase text-white" style="font-size: 14px; letter-spacing: 1px;">Status</th>
                                <th class="text-uppercase text-white" style="font-size: 14px; letter-spacing: 1px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($komentars as $komentar)
                                <tr>
                                    <td class="text-center">{{ $komentar->nama ?? 'Anonim' }}</td>
                                    <td class="text-center">{{ $komentar->komentar }}</td>
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
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hover effect pada baris tabel
        document.querySelectorAll('tbody tr').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.backgroundColor = '#f8f9fa';
            });

            row.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '';
            });
        });

        // Hover effects untuk tombol
        document.querySelectorAll('.btn-outline-success, .btn-outline-danger').forEach(button => {
            const originalColor = button.classList.contains('btn-outline-success') ? '#198754' : '#dc3545';

            button.addEventListener('mouseenter', function() {
                this.style.backgroundColor = originalColor;
                this.style.color = '#ffffff';
            });

            button.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '';
                this.style.color = originalColor;
            });
        });
    });
</script>
@endsection
