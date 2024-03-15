@extends('template_frontend.layout')
@section('content')
<div class="breadcrumbs">
  <div class="page-header d-flex align-items-center" style="background-image:url({{asset('frontend/assets/img/page-header.jpg')}})">

    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>Profil</h2>
          <p>Masukkan Profilmu </p>
        </div>
      </div>
    </div>
  </div>
  <nav>
    <div class="container">
      <ol>
        <li><a href="{{url('/')}}">Home</a></li>
        <li>Profil</li>
      </ol>
    </div>
  </nav>
</div>
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">
    <a href="{{url('riwayat_kirim')}}" class="btn btn-info">Ke Riwayat Pengiriman Anda</a>
    <div class="row gy-4 ">     
      @if(session('message'))
      <div class="alert alert-success">
          {{ session('message') }}
      </div>
  @endif 
      <div class="col-lg-12">
        <form action="{{url('profile/create')}}" method="post" >
          @csrf
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="">Nama</label>
              <input type="text" name="nama" class="form-control" value="{{ isset($data) ? $data->nama : '' }}"id="nama" placeholder="Masukkan Nama" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="">Kecamatan</label>
              <select class="form-control" id="kecamatan" name="kecamatan">
                  <option disabled selected>---- pilih Kecamatan ----</option>
                  <option value="Bangsri" {{ isset($data) && $data->kecamatan === 'Bangsri' ? 'selected' : '' }}>Bangsri</option>
                  <option value="Batealit" {{ isset($data) && $data->kecamatan === 'Batealit' ? 'selected' : '' }}>Batealit</option>
                  <option value="Donorojo" {{ isset($data) && $data->kecamatan === 'Donorojo' ? 'selected' : '' }}>Donorojo</option>
                  <option value="Jepara" {{ isset($data) && $data->kecamatan === 'Jepara' ? 'selected' : '' }}>Jepara</option>
                  <option value="Kalinyamatan" {{ isset($data) && $data->kecamatan === 'Kalinyamatan' ? 'selected' : '' }}>Kalinyamatan</option>
                  <option value="Karimunjawa" {{ isset($data) && $data->kecamatan === 'Karimunjawa' ? 'selected' : '' }}>Karimunjawa</option>
                  <option value="Kedung" {{ isset($data) && $data->kecamatan === 'Kedung' ? 'selected' : '' }}>Kedung</option>
                  <option value="Keling" {{ isset($data) && $data->kecamatan === 'Keling' ? 'selected' : '' }}>Keling</option>
                  <option value="Kembang" {{ isset($data) && $data->kecamatan === 'Kembang' ? 'selected' : '' }}>Kembang</option>
                  <option value="Mayong" {{ isset($data) && $data->kecamatan === 'Mayong' ? 'selected' : '' }}>Mayong</option>
                  <option value="Mlonggo" {{ isset($data) && $data->kecamatan === 'Mlonggo' ? 'selected' : '' }}>Mlonggo</option>
                  <option value="Nalumsari" {{ isset($data) && $data->kecamatan === 'Nalumsari' ? 'selected' : '' }}>Nalumsari</option>
                  <option value="Pakis_Aji" {{ isset($data) && $data->kecamatan === 'Pakis_Aji' ? 'selected' : '' }}>Pakis Aji</option>
                  <option value="Pecangaan" {{ isset($data) && $data->kecamatan === 'Pecangaan' ? 'selected' : '' }}>Pecangaan</option>
                  <option value="Tahunan" {{ isset($data) && $data->kecamatan === 'Tahunan' ? 'selected' : '' }}>Tahunan</option>
                  <option value="Welahan" {{ isset($data) && $data->kecamatan === 'Welahan' ? 'selected' : '' }}>Welahan</option>
              </select>
          </div>
          
          </div>
          <div class="form-group mt-3">
            <label for="">Desa</label>
            <input type="text" name="desa" value="{{ isset($data) ? $data->desa : '' }}" class="form-control" id="desa" placeholder="Masukkan Desa Anda" required>            
          </div>
          <div class="form-group mt-3">
            <label for="">No Telepon</label>
            <input type="number" name="no_hp" value="{{ isset($data) ? $data->no_hp : '' }}" class="form-control" id="no_hp" placeholder="Masukkan No Telepon" required>
          </div> 
          <div class="form-group mt-3">
            <label for="">Detail Rumah</label>
            <textarea class="form-control" name="detail_rumah" id="detail_rumah" rows="5" placeholder="Masukan Detail Rumah" required>{{ isset($data) ? $data->detail_rumah : '' }}</textarea>
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