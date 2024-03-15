@extends('template_frontend.layout')
@section('content')
<div class="breadcrumbs">
    {{-- <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');"> --}}
    <div class="page-header d-flex align-items-center" style="background-image:url({{asset('frontend/assets/img/page-header.jpg')}})">
  
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>Persyaratan Menjadi Kurir</h2>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li>Persyaratan</li>
        </ol>
      </div>
    </nav>
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        <p>Pastikan anda telah sesuai dengan syarat dan ketentuan di bawah ini sebelum mendaftar:<br><br>
            Warga negara Indonesia Umur minimum 18 tahun <br> maksimum 65 tahun pada saat pendaftaran<br>
            Mempunyai e-KTP Asli SIM C / D Asli (dalam masa berlaku) STNK dan SKPD Asli<br> Mempunyai Rekening bank<br>
            Mempunyai kendaraan sendiri Batas maksimal umur kendaraan 8 tahun<br> Kendaraan Bukan kendaraan motor tipe Trail, Sport atau Touring<br>
            
            </p>
    </div>
  </section>
</div>
@endsection