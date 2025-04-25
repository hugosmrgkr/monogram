@extends('layouts.app')

@section('title', 'Layanan')

@section('styles')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/service.css') }}">
@endsection

@section('content')

<div class="service-hero">
    <div class="service-overlay"></div>
    <div class="service-text-container">
        <h1>Layanan Monogram</h1>
        <p>Subheading with description of your shopping site</p>
    </div>
</div>

<div class="service-section">
    <img class="service-image" src="/assets/images/keuntungan2.png" alt="Studio Monogram" />
    <div class="service-info">
        <div class="service-price">75K</div>
        <div class="service-description">
            15 minutes photoshoot<br>
            - 2 people<br>
            - 2 photo printing (3R)<br>
            - all soft files (Google Drive link expires in 7 days)
        </div>
    </div>
</div>

<!-- SECTION: ADDITIONAL -->
<!-- SECTION: ADDITIONAL -->
<section style="width: 100%; background: white; padding: 20px;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <h2 style="font-size: 18px; font-weight: 600; margin-bottom: 20px; padding-left: 10px; font-family: sans-serif;">Additional</h2>

        <div style="display: flex; flex-wrap: wrap; justify-content: flex-start; gap: 15px;">
            @forelse($layanans as $layanan)
                <div style="flex: 0 0 calc(33.333% - 10px); max-width: calc(33.333% - 10px); background: white; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.12); margin-bottom: 15px; overflow: hidden;">
                    <div style="padding: 15px;">
                        @if($layanan->gambar)
                            <img src="{{ asset('storage/' . $layanan->gambar) }}" alt="{{ $layanan->judul }}" style="width: 100px; height: 100px; object-fit: contain; margin-bottom: 10px;">
                        @else
                            <div style="width: 100px; height: 100px; background: #E3E3E3; margin-bottom: 10px;"></div>
                        @endif
                        
                        <h3 style="font-size: 14px; font-weight: 600; margin: 0 0 5px 0; font-family: sans-serif;">{{ $layanan->judul }}</h3>
                        <p style="font-size: 12px; color: #666; margin: 0; font-family: sans-serif;">{{ $layanan->keterangan }}</p>
                    </div>
                </div>
            @empty
                <p style="text-align: center; width: 100%;">Belum ada layanan tersedia saat ini.</p>
            @endforelse
        </div>

        <!-- Booking Button -->
        <div style="text-align: center; margin-top: 30px;">
        <a href="https://monogram.youcanbook.me/" target="_blank"
           style="display: block; margin: 40px auto 0; background-color: black; color: white; padding: 16px 32px; font-size: 20px; border-radius: 8px; text-decoration: none; text-align: center; width: fit-content;">
            Booking now
        </a>
        </div>
    </div>
</section>

<!-- SECTION: LAYANAN PANGGILAN FOTOGRAFER -->
<section style="width: 100%; background-color: #686868; position: relative; overflow: hidden; padding: 40px 20px;">
  <div style="max-width: 800px; margin: 0 auto; position: relative; z-index: 2;">
    <div style="display: flex; justify-content: space-between; align-items: center;">
      <div style="max-width: 60%;">
        <h2 style="font-size: 24px; font-weight: 600; margin-bottom: 15px; color: white;">Layanan Panggilan Fotografer</h2>
        <p style="font-size: 14px; color: white; margin-bottom: 5px;">Kamu dapat memanggil fotografer keluar layanan yang disediakan:</p>
        <p style="font-size: 14px; color: white; margin-bottom: 5px;">-Wisuda</p>
        <p style="font-size: 14px; color: white; margin-bottom: 5px;">-foto keluarga</p>
        <p style="font-size: 14px; color: white; margin-bottom: 15px;">Jika berminat lanjut ke WA berikut:</p>
        <a href="https://wa.me/6282268691532" target="_blank"
           style="display: inline-flex; align-items: center; font-size: 14px; padding: 5px 10px; background-color: #25D366; color: white; border-radius: 4px; text-decoration: none;">
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="white" style="margin-right: 5px;">
               <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
           </svg>
           +62 82268691532
        </a>
      </div>
    </div>
  </div>
  
  <!-- Photographer Image -->
  <div style="position: absolute; right: 20%; top: 50%; transform: translateY(-50%); z-index: 1;">
    <img src="{{ asset('images/photographer.png') }}" alt="Photographer" style="height: 160px;">
  </div>
  
  <!-- Camera Image -->
  <div style="position: absolute; right: 5%; top: 50%; transform: translateY(-50%); z-index: 1;">
    <img src="{{ asset('images/camera.png') }}" alt="Camera" style="height: 120px;">
  </div>
</section>

