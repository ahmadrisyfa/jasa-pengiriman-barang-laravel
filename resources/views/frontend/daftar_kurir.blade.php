@extends('template_frontend.layout')
@section('content')
<div class="breadcrumbs">
  {{-- <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');"> --}}
  <div class="page-header d-flex align-items-center" style="background-image:url({{asset('frontend/assets/img/page-header.jpg')}})">

    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>Halaman Daftar kurir</h2>
          <p>Silahkan Daftar Sekarang!</p>
        </div>
      </div>
    </div>
  </div>
  <nav>
    <div class="container">
      <ol>
        <li><a href="{{url('/')}}">Home</a></li>
        <li>Daftar kurir</li>
      </ol>
    </div>
  </nav>
</div>
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">

    <div class="row gy-4 ">     
      @if(session('message'))
      <div class="alert alert-success">
          {{ session('message') }}
      </div>
  @endif 
      <div class="col-lg-12">
        <form action="{{url('daftar_kurir/create')}}" method="post" enctype="multipart/form-data" >
          @csrf         
          <div class="form-group ">
            <label for="">Nama</label>
            <input type="text" name="nama" value="{{ isset($data) ? $data->nama : '' }}" class="form-control" id="nama" placeholder="Masukkan Nama Anda" required>            
          </div>
          <div class="form-group mt-3">
            <label for="">No Telepon</label>
            <input type="number" name="no_hp" value="{{ isset($data) ? $data->no_hp : '' }}" class="form-control" id="no_hp" placeholder="Masukkan No Telepon" required>
          </div> 
          <div class="form-group mt-3">
            <label for="">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" rows="5" placeholder="Masukan Alamat" required>{{ isset($data) ? $data->alamat : '' }}</textarea>
          </div>                
          <div class="form-group mt-3">
            <label for="">Foto Anda</label>
            <input type="file" name="foto" value="{{ isset($data) ? $data->foto : '' }}" class="form-control" id="foto" placeholder="Masukkan Foto " required>
          </div> 
          <div class="form-group mt-3">
            <label for="">Nama Montor</label>
            <input type="text" name="nama_motor" value="{{ isset($data) ? $data->nama_motor : '' }}" class="form-control" id="nama_motor" placeholder="Masukan Nama Motor" required>
          </div>
          <div class="form-group mt-3">
            <label for="">Plat Nomor</label>
            <input type="text" name="plat_nomor" value="{{ isset($data) ? $data->plat_nomor : '' }}" class="form-control" id="plat_nomor" placeholder="Masukan Plat Nomor" required>
          </div>
          <div class="text-center mt-3">
            <button type="reset" class="btn btn-info">Reset</button>
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div><!-- End Contact Form -->

    </div>

  </div>
</section>
@endsection