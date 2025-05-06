@extends('admin.layouts.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="font-weight-bold text-dark">Daftar Komentar</h4>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger">
                        <i class="fa fa-times-circle me-2"></i>{{ session('error') }}
                    </div>
                @endif

                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th class="text-uppercase text-center">Nama</th>
                                <th class="text-uppercase text-center">Komentar</th>
                                <th class="text-uppercase text-center">Status</th>
                                <th class="text-uppercase text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($komentars as $komentar)
                                <tr>
                                    <td class="text-center">{{ $komentar->nama ?? 'Anonim' }}</td>
                                    <td class="text-center">{{ $komentar->komentar }}</td>
                                    <td class="text-center">
                                        <span class="badge
                                            {{ $komentar->is_approve ? 'bg-success' : 'bg-danger' }}">
                                            {{ $komentar->is_approve ? 'Tampil' : 'Disembunyikan' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.komentar.toggle', $komentar->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn
                                                {{ $komentar->is_approve ? 'btn-outline-danger' : 'btn-outline-success' }}
                                                btn-sm">
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
                                        <p class="text-muted">Tidak ada komentar yang masuk.</p>
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
