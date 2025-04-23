@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Galeri Wisuda</h2>
        @foreach($wisuda as $foto)
            <img src="{{ asset('uploads/' . $foto->gambar) }}" class="m-2">
        @endforeach

        <h2>Galeri Keluarga</h2>
        @foreach($keluarga as $foto)
            <img src="{{ asset('uploads/' . $foto->gambar) }}" class="m-2">
        @endforeach

        <h2>Galeri Pasangan</h2>
        @foreach($pasangan as $foto)
            <img src="{{ asset('uploads/' . $foto->gambar) }}" class="m-2">
        @endforeach

        <h2>Galeri Pertemanan</h2>
        @foreach($pertemanan as $foto)
            <img src="{{ asset('uploads/' . $foto->gambar) }}" class="m-2">
        @endforeach
    </div>
@endsection
