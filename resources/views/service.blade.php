@extends('layouts.app')

@section('title', 'Layanan')

@section('content')
<style>
    .service-hero {
        width: 100%;
        height: 886px;
        padding-top: 164px;
        position: relative;
        background: #F7F7F7;
        background-image: url('https://placehold.co/1442x886'); /* ganti dengan gambar asli jika sudah */
        background-size: cover;
        background-position: center;
        overflow: hidden;
    }

    .service-overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.24);
        top: 0;
        left: 0;
    }

    .service-text-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 844px;
        width: 90%;
        text-align: center;
        display: flex;
        flex-direction: column;
        gap: 16px;
        color: white;
    }

    .service-text-container h1 {
        font-size: 64px;
        font-family: Inter, sans-serif;
        font-weight: 700;
        line-height: 89.6px;
    }

    .service-text-container p {
        font-size: 24px;
        font-family: Inter, sans-serif;
        font-weight: 500;
        line-height: 33.6px;
    }
</style>

<div class="service-hero">
    <div class="service-overlay"></div>
    <div class="service-text-container">
        <h1>Layanan Monogram</h1>
        <p>Subheading with description of your shopping site</p>
    </div>
</div>
@endsection
