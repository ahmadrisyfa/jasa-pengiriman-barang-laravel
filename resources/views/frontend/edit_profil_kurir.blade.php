@extends('template_frontend.layout')
@section('content')
<div class="breadcrumbs">
  <div class="page-header d-flex align-items-center" style="background-image:url({{asset('frontend/assets/img/page-header.jpg')}})">

    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>Halaman Profile kurir</h2>
          <p>Silahkan Edit Profile Sekarang!</p>
        </div>
      </div>
    </div>
  </div>
  <nav>
    <div class="container">
      <ol>
        <li><a href="{{url('/')}}">Home</a></li>
        <li>Edit Profile kurir</li>
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
        <form action="{{url('daftar_kurir/update')}}" method="post" enctype="multipart/form-data" >
          @csrf         
          <div class="form-group ">
            <label for="">Nama</label>
            <input type="text" name="nama" value="{{ isset($daftar_kurir) ? $daftar_kurir->nama : '' }}" class="form-control" id="nama" placeholder="Masukkan Nama Anda" required>            
          </div>
          <div class="form-group mt-3">
            <label for="">No Telepon</label>
            <input type="number" name="no_hp" value="{{ isset($daftar_kurir) ? $daftar_kurir->no_hp : '' }}" class="form-control" id="no_hp" placeholder="Masukkan No Telepon" required>
          </div> 
          <div class="form-group mt-3">
            <label for="">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" rows="5" placeholder="Masukan Alamat" required>{{ isset($daftar_kurir) ? $daftar_kurir->alamat : '' }}</textarea>
          </div>                
          <div class="form-group mt-3">
            <label for="">Foto</label>
            <img src="{{asset('storage/'.$daftar_kurir->foto)}}" width="200px" alt="{{asset('storage/'.$daftar_kurir->foto)}}">
            <input type="file" name="foto" value="{{ isset($daftar_kurir) ? $daftar_kurir->foto : '' }}" class="form-control" id="foto" placeholder="Masukkan Foto"  >
          </div> 
          <div class="form-group mt-3">
            <label for="">Nama Motor</label>
            <input type="text" name="nama_motor" value="{{ isset($daftar_kurir) ? $daftar_kurir->nama_motor : '' }}" class="form-control" id="nama_motor" placeholder="Masukan Nama Motor" required>
          </div>
          <div class="form-group mt-3">
            <label for="">Plat Nomor</label>
            <input type="text" name="plat_nomor" value="{{ isset($daftar_kurir) ? $daftar_kurir->plat_nomor : '' }}" class="form-control" id="plat_nomor" placeholder="Masukan Plat Nomor" required>
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