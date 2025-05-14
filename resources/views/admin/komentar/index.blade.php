@extends('admin.layouts.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow-sm border-0">
            <div class="card-body py-4">
                <h2 class="text-center font-weight-bold mb-4 text-dark">Komentar</h2>

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

                {{-- Tampilkan pesan jika tidak ada komentar --}}
                @if ($komentars->isEmpty())
                    <div class="alert alert-info text-center">
                        Belum ada komentar.
                    </div>
                @else
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Komentar</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($komentars as $key => $komentar)
                                    <tr>
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td>{{ $komentar->nama ?? 'Anonim' }}</td>
                                        <td>{{ Str::limit($komentar->komentar, 50) }}</td>
                                        <td class="text-center">
                                            <span class="badge {{ $komentar->is_approve ? 'bg-success' : 'bg-danger' }}">
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
