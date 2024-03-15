@extends('template_frontend.layout')
@section('content')
<div class="breadcrumbs">
    {{-- <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');"> --}}
    <div class="page-header d-flex align-items-center" style="background-image:url({{asset('frontend/assets/img/page-header.jpg')}})">
  
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>Tata Cara dan Syarat Pengiriman</h2>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li>Pengiriman</li>
        </ol>
      </div>
    </nav>
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        <p>Pastikan kamu mengirim barang sesuai dengan ketentuan pengiriman:<br><br>
            login terlebih dahulu (bila belum pernah mendaftar register terlebih dahulu)<br>
            masukan data diri kamu pada menu profile<br>
            ketika akan mengirim barang kamu dapat memilih tombol kirim barang (ingat alamat yang kamu isi di profil adalah alamat dimana barangmu akan di jemput)<br>
            setelah mengisi data pada kirim barang kamu akan di bawa ke tampilan yang terdapat rincian pemesanan<br>
            jika sudah melihat tampilan itu artinya kamu sudah mendapatkan kurir<br>
            setelah itu kurir akan melakukan pekerjaannya<br>
            kamu akan dihubungi di nomor yang kamu isi di profil (pastikan nomor aktif) bila kurir terdapat kebingungan dengan titik jemput maupun antar<br>

            </p>
    </div>
  </section>
</div>
@endsection