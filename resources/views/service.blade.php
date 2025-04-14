@extends('layouts.app')

@section('title', 'Layanan')

@section('styles')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
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

<section style="width: 100%; padding: 60px 20px;">
  <div style="max-width: 1200px; margin: 0 auto;">
    <h2 style="font-size: 48px; font-weight: 600; margin-bottom: 40px; text-align: center;">Additional</h2>

  <div style="display: flex; flex-direction: column; gap: 20px;">
    <div>
      <h3 style="font-size: 24px; font-weight: 700;">Extra person (include 1 photo print 3R)</h3>
      <p style="font-size: 20px; font-weight: 500;">22k/person</p>
    </div>
    <div>
      <h3 style="font-size: 24px; font-weight: 700;">Extra Pets</h3>
      <p style="font-size: 20px; font-weight: 500;">25k/pets</p>
    </div>
    <div>
      <h3 style="font-size: 24px; font-weight: 700;">Extra photo printing 3R</h3>
      <p style="font-size: 20px; font-weight: 500;">5k/pcs</p>
    </div>
    <div>
      <h3 style="font-size: 24px; font-weight: 700;">Extra photo printing 4R</h3>
      <p style="font-size: 20px; font-weight: 500;">7k/pcs</p>
    </div>
    <div>
      <h3 style="font-size: 24px; font-weight: 700;">Extra spotlight mode</h3>
      <p style="font-size: 20px; font-weight: 500;">25k</p>
    </div>
    <div>
      <h3 style="font-size: 24px; font-weight: 700;">Extra 10 minutes</h3>
      <p style="font-size: 20px; font-weight: 500;">35k</p>
    </div>
    <div>
      <h3 style="font-size: 24px; font-weight: 700;">Extra 5 minutes</h3>
      <p style="font-size: 20px; font-weight: 500;">20k</p>
    </div>
  </div>

  <a href="https://monogram.youcanbook.me/?fbclid=PAY2xjawI809xleHRuA2FlbQIxMQABpg4DIp_ka4mMwoz2NqK3Q4C66HNN_4xD-cw6rugyYIUHKRHul0kOkfXwzw_aem_i2Kvsj7vE5AJ2gy2ytZdLA" target="_blank" style="display: block; margin: 40px auto 0; background-color: black; color: white; padding: 20px 40px; font-size: 24px; border-radius: 8px; text-decoration: none; text-align: center; width: fit-content;">
  Booking now
</a>



</section>

<!-- Layanan Panggilan Fotografer -->
<section style="width: 100%; padding: 60px 20px;">
  <div style="max-width: 1200px; margin: 0 auto;">
    <h2 style="font-size: 48px; font-weight: 600; margin-bottom: 40px; text-align: left;">Layanan Tambahan</h2>

  <div style="border: 1px solid #e0e0e0; border-radius: 8px; padding: 20px; margin-bottom: 40px;">
    <p style="font-size: 16px; margin: 0 0 10px;"><strong>Layanan Panggilan Fotografer</strong></p>
    <p style="font-size: 14px; color: #555; margin: 0 0 6px;">Kamu dapat memanggil fotografer keluar layanan yang disediakan:</p>
    <ul style="font-size: 14px; color: #555; margin: 6px 0 12px; padding-left: 18px;">
      <li>wisuda</li>
      <li>foto keluarga</li>
    </ul>
    <p style="font-size: 14px; color: #555; margin: 0 0 10px;">Jika berminat lanjut ke WA berikut:</p>
    <button style="font-size: 14px; padding: 10px 16px; border: none; background-color: black; color: white; border-radius: 6px; cursor: pointer;">
      +62 82268691532
    </button>
  </div>
</section>
