@extends('template_frontend.layout')
@section('content')
<div class="breadcrumbs">
    {{-- <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');"> --}}
    <div class="page-header d-flex align-items-center" style="background-image:url({{asset('frontend/assets/img/page-header.jpg')}})">
  
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>Jarak dan Waktu Tempuh Pengiriman</h2>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li>Waktu</li>
        </ol>
      </div>
    </nav>
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        <p>Berikut ini adalah ketentuan waktu atau jarak tempuh pengiriman:<br><br>     
            Layanan ini dapat digunakan 24 jam selagi kurir tersedia.<br> 
            Waktu pengantaran paket ke satu alamat pengiriman adalah 1 - 2 jam<br> setelah paket diambil oleh kurir.
            kurir akan menjemput barang kurang lebih dalam waktu kurang dari 1 jam 
            </p>
    </div>
  </section>
</div>
@endsection