@extends('template_frontend.layout')
@section('content')
<div class="breadcrumbs">
    {{-- <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');"> --}}
    <div class="page-header d-flex align-items-center" style="background-image:url({{asset('frontend/assets/img/page-header.jpg')}})">
  
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>Syarat dan Ketentuan barang</h2>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li>Ketentuan Barang</li>
        </ol>
      </div>
    </nav>
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        <p>Pastikan barang yang kamu kirim telah sesuai dengan syarat dan ketentuan di bawah ini:<br>
            Dimensi/Ukuran:70x70x50cm<br>
            Berat maksimal: 5kg<br>
            Bukan barang pecah belah<br>
            Tidak mudah hancur<br>
            Bukan hewan<br>
            Tidak termasuk dalam Barang Terlarang (Narkoba)<br>
            Tidak diperbolehkan melakukan pengiriman barang dari dan ke penjara.
            </p>
    </div>
  </section>
</div>
@endsection