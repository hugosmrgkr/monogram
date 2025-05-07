@extends('admin.layouts.master')
@section('content')
<div class="col-lg-8 mx-auto">
    <div class="card shadow-none bg-white rounded-none">
        <div class="card-body p-8">
            <h2 class="text-center text-black font-bold text-2xl mb-8">{{ __('Edit Data Tentang Kami') }}</h2>

            <form action="{{ route('admin.tentang-kami.update', $tentangKami->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Jam Operasional Hari Biasa --}}
                <div class="form-group mb-6">
                    <label class="text-black text-sm font-medium" for="jam_buka_hari_biasa">{{ __('Jam Buka (Senin - Sabtu)') }}</label>
                    <input type="time" id="jam_buka_hari_biasa" name="jam_buka_hari_biasa" class="form-control border border-gray-300 rounded-md p-2 w-full" value="{{ old('jam_buka_hari_biasa', $tentangKami->jam_buka_hari_biasa) }}" required>
                    @error('jam_buka_hari_biasa')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-6">
                    <label class="text-black text-sm font-medium" for="jam_tutup_hari_biasa">{{ __('Jam Tutup (Senin - Sabtu)') }}</label>
                    <input type="time" id="jam_tutup_hari_biasa" name="jam_tutup_hari_biasa" class="form-control border border-gray-300 rounded-md p-2 w-full" value="{{ old('jam_tutup_hari_biasa', $tentangKami->jam_tutup_hari_biasa) }}" required>
                    @error('jam_tutup_hari_biasa')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Jam Operasional Akhir Pekan --}}
                <div class="form-group mb-6">
                    <label class="text-black text-sm font-medium" for="jam_buka_akhir_pekan">{{ __('Jam Buka (Minggu)') }}</label>
                    <input type="time" id="jam_buka_akhir_pekan" name="jam_buka_akhir_pekan" class="form-control border border-gray-300 rounded-md p-2 w-full" value="{{ old('jam_buka_akhir_pekan', $tentangKami->jam_buka_akhir_pekan) }}" required>
                    @error('jam_buka_akhir_pekan')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-6">
                    <label class="text-black text-sm font-medium" for="jam_tutup_akhir_pekan">{{ __('Jam Tutup (Minggu)') }}</label>
                    <input type="time" id="jam_tutup_akhir_pekan" name="jam_tutup_akhir_pekan" class="form-control border border-gray-300 rounded-md p-2 w-full" value="{{ old('jam_tutup_akhir_pekan', $tentangKami->jam_tutup_akhir_pekan) }}" required>
                    @error('jam_tutup_akhir_pekan')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                {{-- Kontak --}}
                <div class="form-group mb-6">
                    <label class="text-black text-sm font-medium" for="kontak_wa">{{ __('Link WhatsApp') }}</label>
                    <input type="url" id="kontak_wa" name="kontak_wa" class="form-control border border-gray-300 rounded-md p-2 w-full" value="{{ old('kontak_wa', $tentangKami->kontak_wa) }}" required>
                    @error('kontak_wa')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-6">
                    <label class="text-black text-sm font-medium" for="kontak_ig">{{ __('Link Instagram') }}</label>
                    <input type="url" id="kontak_ig" name="kontak_ig" class="form-control border border-gray-300 rounded-md p-2 w-full" value="{{ old('kontak_ig', $tentangKami->kontak_ig) }}" required>
                    @error('kontak_ig')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Tombol Aksi --}}
                <div class="mt-6 text-center">
                    <button type="submit" class="btn bg-black text-white rounded-md py-2 px-6 text-sm font-semibold hover:bg-gray-800 transition">
                        {{ __('Simpan') }}
                    </button>
                    <a href="{{ route('admin.tentang-kami.index') }}" class="btn bg-white text-black border border-black rounded-md py-2 px-6 text-sm font-semibold hover:bg-gray-100 transition">
                        {{ __('Batal') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
