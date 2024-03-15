@extends('template_frontend.layout')
@section('content')
<div class="breadcrumbs">
  {{-- <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');"> --}}
  <div class="page-header d-flex align-items-center" style="background-image:url({{asset('frontend/assets/img/page-header.jpg')}})">

    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>Halaman Kirim Barang</h2>
          <p>Kirim Barangmu Sekarang!</p>
        </div>
      </div>
    </div>
  </div>
  <nav>
    <div class="container">
      <ol>
        <li><a href="{{url('/')}}">Home</a></li>
        <li>Kirim Barang</li>
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
        <form action="{{url('kirim_barang')}}" method="post" >
          @csrf
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="#"><b>Alamat Anda:</b></label>
              @if(\App\Models\Pemesan::where('user_id', auth()->user()->id)->exists())
              <p>Nama: <b>{{$alamat->nama}}</b><br> Kecamatan:{{$alamat->kecamatan}} Desa: {{$alamat->desa}}, {{$alamat->detail_rumah}} <br> No Hp: {{$alamat->no_hp}}</p>
              <input type="hidden" value="{{$alamat->kecamatan}}" id="kecamatan_awal">
              @else
              <p>Belum Memasukan Alamat Anda</p>
              @endif
            </div>
            <div class="form-group mt-3">
              <label for="">Nama Tujuan</label>
              <input type="text" name="nama_tujuan" value="{{ isset($data) ? $data->nama_tujuan : '' }}" class="form-control" id="nama_tujuan" placeholder="Masukkan Nama tujuan Anda" required>            
            </div>
          <select name="kurir_id" id="kurir_id" style="opacity: 0;width:1px;">
            @foreach ($kurir as $data_kurir)                
            <option value="{{$data_kurir->id}}">{{$data_kurir->nama}}</option>
            @endforeach
          </select>
          </div>
          <div class="form-group  mt-3 mt-md-0">
               <label for="">Berat</label>
               <input type="number" name="berat" value="{{ isset($data) ? $data->berat : '' }}" class="form-control" onchange="updateTarif()" id="berat" placeholder="Masukkan berat per-kg" required>
             </div> 
          <div class="form-group mt-3">
            <label for="">Kecamatan</label>
            <select class="form-control" id="kecamatan" name="kecamatan" onchange="updateTarif()">
              <option disabled selected>---- pilih Kecamatan Tujuan Anda ----</option>
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
              <option value="Pakis Aji" {{ isset($data) && $data->kecamatan === 'Pakis Aji' ? 'selected' : '' }}>Pakis Aji</option>
              <option value="Pecangaan" {{ isset($data) && $data->kecamatan === 'Pecangaan' ? 'selected' : '' }}>Pecangaan</option>
              <option value="Tahunan" {{ isset($data) && $data->kecamatan === 'Tahunan' ? 'selected' : '' }}>Tahunan</option>
              <option value="Welahan" {{ isset($data) && $data->kecamatan === 'Welahan' ? 'selected' : '' }}>Welahan</option>
          </select>
        </div>
        
          <div class="form-group mt-3">
            <label for="">Desa</label>
            <input type="text" name="desa" value="{{ isset($data) ? $data->desa : '' }}" class="form-control" id="desa" placeholder="Masukkan Desa Anda" required>            
          </div>
          <div class="form-group mt-3">
            <label for="">Detail Rumah</label>
            <textarea class="form-control" name="detail_rumah" id="detail_rumah" rows="5" placeholder="Masukan Detail Rumah" required>{{ isset($data) ? $data->detail_rumah : '' }}</textarea>
          </div>                
         
          <div class="form-group mt-3">
            <label for="">Tarif</label>
            <input type="number" name="tarif" value="{{ isset($data) ? $data->tarif : '' }}" readonly class="form-control" id="tarif" placeholder="tarif" required>
        </div>
          <div class="text-center mt-3">
            @if(\App\Models\Pemesan::where('user_id', auth()->user()->id)->exists())
            <button type="reset" class="btn btn-info">Reset</button>
            <button type="submit" class="btn btn-success">Submit</button>
            @else
            <a href="{{url('profile')}}" class="btn btn-primary">Tambahkan Alamat</a>
            @endif
          </div>
        </form>
      </div><!-- End Contact Form -->

    </div>

  </div>
</section>
<script>
  function updateTarif() {
      var kecamatan_awal = document.getElementById('kecamatan_awal').value;
      var selected_kecamatan = document.getElementById('kecamatan').value;
      var tarif_input = document.getElementById('tarif');
      var berat = document.getElementById('berat').value; 
      var tambahan_biaya = (berat - 1) * 2000;

      if (kecamatan_awal == 'Keling' && selected_kecamatan == 'Welahan') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Keling' && selected_kecamatan == 'Kembang') {
          tarif_input.value = 9000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Keling' && selected_kecamatan == 'Batealit') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Keling' && selected_kecamatan == 'Bangsri') {
          tarif_input.value = 12000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Keling' && selected_kecamatan == 'Donorojo') {
          tarif_input.value = 8000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Keling' && selected_kecamatan == 'Jepara') {
          tarif_input.value = 13000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Keling' && selected_kecamatan == 'Kalinyamatan') {
          tarif_input.value = 12000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Keling' && selected_kecamatan == 'Karimunjawa') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Keling' && selected_kecamatan == 'Kedung') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Keling' && selected_kecamatan == 'Keling') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Keling' && selected_kecamatan == 'Mayong') {
          tarif_input.value = 15000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Keling' && selected_kecamatan == 'Mlonggo') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Keling' && selected_kecamatan == 'Nalumsari') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Keling' && selected_kecamatan == 'Pakis Aji') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Keling' && selected_kecamatan == 'pecangaan') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Keling' && selected_kecamatan == 'Tahunan') {
          tarif_input.value = 11000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Welahan' && selected_kecamatan == 'Welahan') {
          tarif_input.value = 11000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Welahan' && selected_kecamatan == 'Kembang') {
          tarif_input.value = 11000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Welahan' && selected_kecamatan == 'Batealit') {
          tarif_input.value = 11000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Welahan' && selected_kecamatan == 'Bangsri') {
          tarif_input.value = 11000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Welahan' && selected_kecamatan == 'Donorojo') {
          tarif_input.value = 11000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Welahan' && selected_kecamatan == 'Jepara') {
          tarif_input.value = 11000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Welahan' && selected_kecamatan == 'Kalinyamatan') {
          tarif_input.value = 11000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Welahan' && selected_kecamatan == 'Karimunjawa') {
          tarif_input.value = 11000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Welahan' && selected_kecamatan == 'Kedung') {
          tarif_input.value = 11000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Welahan' && selected_kecamatan == 'Keling') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Welahan' && selected_kecamatan == 'Mayong') {
          tarif_input.value = 15000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Welahan' && selected_kecamatan == 'Mlonggo') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Welahan' && selected_kecamatan == 'Nalumsari') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Welahan' && selected_kecamatan == 'Pakis Aji') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Welahan' && selected_kecamatan == 'pecangaan') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Welahan' && selected_kecamatan == 'Tahunan') {
          tarif_input.value = 10000 + tambahan_biaya;
        } else if(kecamatan_awal == 'Kembang' && selected_kecamatan == 'Welahan') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Kembang' && selected_kecamatan == 'Kembang') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Kembang' && selected_kecamatan == 'Batealit') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kembang' && selected_kecamatan == 'Bangsri') {
          tarif_input.value = 12000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kembang' && selected_kecamatan == 'Donorojo') {
          tarif_input.value = 12000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kembang' && selected_kecamatan == 'Jepara') {
          tarif_input.value = 12000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kembang' && selected_kecamatan == 'Kalinyamatan') {
          tarif_input.value = 12000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kembang' && selected_kecamatan == 'Karimunjawa') {
          tarif_input.value = 12000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kembang' && selected_kecamatan == 'Kedung') {
          tarif_input.value = 12000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kembang' && selected_kecamatan == 'Keling') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kembang' && selected_kecamatan == 'Mayong') {
          tarif_input.value = 15000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Kembang' && selected_kecamatan == 'Mlonggo') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Kembang' && selected_kecamatan == 'Nalumsari') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kembang' && selected_kecamatan == 'Pakis Aji') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kembang' && selected_kecamatan == 'pecangaan') {
          tarif_input.value = 12500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kembang' && selected_kecamatan == 'Tahunan') {
          tarif_input.value = 12500 + tambahan_biaya;
        } else if(kecamatan_awal == 'Batealit' && selected_kecamatan == 'Welahan') {
          tarif_input.value = 12500 + tambahan_biaya;
      } else if(kecamatan_awal == 'Batealit' && selected_kecamatan == 'Kembang') {
          tarif_input.value = 12500 + tambahan_biaya;
      } else if(kecamatan_awal == 'Batealit' && selected_kecamatan == 'Batealit') {
          tarif_input.value = 12500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Batealit' && selected_kecamatan == 'Bangsri') {
          tarif_input.value = 12500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Batealit' && selected_kecamatan == 'Donorojo') {
          tarif_input.value = 12500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Batealit' && selected_kecamatan == 'Jepara') {
          tarif_input.value = 12500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Batealit' && selected_kecamatan == 'Kalinyamatan') {
          tarif_input.value = 12500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Batealit' && selected_kecamatan == 'Karimunjawa') {
          tarif_input.value = 12500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Batealit' && selected_kecamatan == 'Kedung') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Batealit' && selected_kecamatan == 'Keling') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Batealit' && selected_kecamatan == 'Mayong') {
          tarif_input.value = 15000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Batealit' && selected_kecamatan == 'Mlonggo') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Batealit' && selected_kecamatan == 'Nalumsari') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Batealit' && selected_kecamatan == 'Pakis Aji') {
          tarif_input.value = 13000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Batealit' && selected_kecamatan == 'pecangaan') {
          tarif_input.value = 13000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Batealit' && selected_kecamatan == 'Tahunan') {
          tarif_input.value = 13000 + tambahan_biaya;
        } else if(kecamatan_awal == 'Donorojo' && selected_kecamatan == 'Welahan') {
          tarif_input.value = 13000 + tambahan_biaya;
      }  else if(kecamatan_awal == 'Donorojo' && selected_kecamatan == 'Kembang') {
          tarif_input.value = 13000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Donorojo' && selected_kecamatan == 'Batealit') {
          tarif_input.value = 13000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Donorojo' && selected_kecamatan == 'Bangsri') {
          tarif_input.value = 13000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Donorojo' && selected_kecamatan == 'Donorojo') {
          tarif_input.value = 13000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Donorojo' && selected_kecamatan == 'Jepara') {
          tarif_input.value = 13000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Donorojo' && selected_kecamatan == 'Kalinyamatan') {
          tarif_input.value = 13000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Donorojo' && selected_kecamatan == 'Karimunjawa') {
          tarif_input.value = 13000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Donorojo' && selected_kecamatan == 'Kedung') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Donorojo' && selected_kecamatan == 'Keling') {
          tarif_input.value = 13000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Donorojo' && selected_kecamatan == 'Mayong') {
          tarif_input.value = 15000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Donorojo' && selected_kecamatan == 'Mlonggo') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Donorojo' && selected_kecamatan == 'Nalumsari') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Donorojo' && selected_kecamatan == 'Pakis Aji') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Donorojo' && selected_kecamatan == 'pecangaan') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Donorojo' && selected_kecamatan == 'Tahunan') {
          tarif_input.value = 10000 + tambahan_biaya;
        } else if(kecamatan_awal == 'Jepara' && selected_kecamatan == 'Welahan') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Jepara' && selected_kecamatan == 'Kembang') {
          tarif_input.value = 11500 + tambahan_biaya;
      } else if(kecamatan_awal == 'Jepara' && selected_kecamatan == 'Batealit') {
          tarif_input.value = 11000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Jepara' && selected_kecamatan == 'Bangsri') {
          tarif_input.value = 11500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Jepara' && selected_kecamatan == 'Donorojo') {
          tarif_input.value = 11500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Jepara' && selected_kecamatan == 'Jepara') {
          tarif_input.value = 5000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Jepara' && selected_kecamatan == 'Kalinyamatan') {
          tarif_input.value = 11500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Jepara' && selected_kecamatan == 'Karimunjawa') {
          tarif_input.value = 8500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Jepara' && selected_kecamatan == 'Kedung') {
          tarif_input.value = 11500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Jepara' && selected_kecamatan == 'Keling') {
          tarif_input.value = 10500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Jepara' && selected_kecamatan == 'Mayong') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Jepara' && selected_kecamatan == 'Mlonggo') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Jepara' && selected_kecamatan == 'Nalumsari') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Jepara' && selected_kecamatan == 'Pakis Aji') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Jepara' && selected_kecamatan == 'pecangaan') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Jepara' && selected_kecamatan == 'Tahunan') {
          tarif_input.value = 10000 + tambahan_biaya;
        } else if(kecamatan_awal == 'Kalinyamatan' && selected_kecamatan == 'Welahan') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Kalinyamatan' && selected_kecamatan == 'Kembang') {
          tarif_input.value = 9000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Kalinyamatan' && selected_kecamatan == 'Batealit') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kalinyamatan' && selected_kecamatan == 'Bangsri') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kalinyamatan' && selected_kecamatan == 'Donorojo') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kalinyamatan' && selected_kecamatan == 'Jepara') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kalinyamatan' && selected_kecamatan == 'Kalinyamatan') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kalinyamatan' && selected_kecamatan == 'Karimunjawa') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kalinyamatan' && selected_kecamatan == 'Kedung') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kalinyamatan' && selected_kecamatan == 'Keling') {
          tarif_input.value = 6000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kalinyamatan' && selected_kecamatan == 'Mayong') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Kalinyamatan' && selected_kecamatan == 'Mlonggo') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Kalinyamatan' && selected_kecamatan == 'Nalumsari') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kalinyamatan' && selected_kecamatan == 'Pakis Aji') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kalinyamatan' && selected_kecamatan == 'Pecangaan') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kalinyamatan' && selected_kecamatan == 'Tahunan') {
          tarif_input.value = 10000 + tambahan_biaya;
        } else if(kecamatan_awal == 'Karimunjawa' && selected_kecamatan == 'Welahan') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Karimunjawa' && selected_kecamatan == 'Kembang') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Karimunjawa' && selected_kecamatan == 'Batealit') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Karimunjawa' && selected_kecamatan == 'Bangsri') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Karimunjawa' && selected_kecamatan == 'Donorojo') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Karimunjawa' && selected_kecamatan == 'Jepara') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Karimunjawa' && selected_kecamatan == 'Kalinyamatan') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Karimunjawa' && selected_kecamatan == 'Karimunjawa') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Karimunjawa' && selected_kecamatan == 'Kedung') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Karimunjawa' && selected_kecamatan == 'Keling') {
          tarif_input.value = 12000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Karimunjawa' && selected_kecamatan == 'Mayong') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Karimunjawa' && selected_kecamatan == 'Mlonggo') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Karimunjawa' && selected_kecamatan == 'Nalumsari') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Karimunjawa' && selected_kecamatan == 'Pakis Aji') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Karimunjawa' && selected_kecamatan == 'pecangaan') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Karimunjawa' && selected_kecamatan == 'Tahunan') {
          tarif_input.value = 10000 + tambahan_biaya;
        } else if(kecamatan_awal == 'Kedung' && selected_kecamatan == 'Welahan') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Kedung' && selected_kecamatan == 'Kembang') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Kedung' && selected_kecamatan == 'Batealit') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kedung' && selected_kecamatan == 'Bangsri') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kedung' && selected_kecamatan == 'Donorojo') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kedung' && selected_kecamatan == 'Jepara') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kedung' && selected_kecamatan == 'Kalinyamatan') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kedung' && selected_kecamatan == 'Karimunjawa') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kedung' && selected_kecamatan == 'Kedung') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kedung' && selected_kecamatan == 'Keling') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kedung' && selected_kecamatan == 'Mayong') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Kedung' && selected_kecamatan == 'Mlonggo') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Kedung' && selected_kecamatan == 'Nalumsari') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kedung' && selected_kecamatan == 'Pakis Aji') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kedung' && selected_kecamatan == 'pecangaan') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Kedung' && selected_kecamatan == 'Tahunan') {
          tarif_input.value = 10000 + tambahan_biaya;
        } else if(kecamatan_awal == 'Mayong' && selected_kecamatan == 'Welahan') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Mayong' && selected_kecamatan == 'Kembang') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Mayong' && selected_kecamatan == 'Batealit') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Mayong' && selected_kecamatan == 'Bangsri') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Mayong' && selected_kecamatan == 'Donorojo') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Mayong' && selected_kecamatan == 'Jepara') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Mayong' && selected_kecamatan == 'Kalinyamatan') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Mayong' && selected_kecamatan == 'Karimunjawa') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Mayong' && selected_kecamatan == 'Kedung') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Mayong' && selected_kecamatan == 'Keling') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Mayong' && selected_kecamatan == 'Mayong') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Mayong' && selected_kecamatan == 'Mlonggo') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Mayong' && selected_kecamatan == 'Nalumsari') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Mayong' && selected_kecamatan == 'Pakis Aji') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Mayong' && selected_kecamatan == 'pecangaan') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Mayong' && selected_kecamatan == 'Tahunan') {
          tarif_input.value = 10000 + tambahan_biaya;
        } else if(kecamatan_awal == 'Mlonggo' && selected_kecamatan == 'Welahan') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Mlonggo' && selected_kecamatan == 'Kembang') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Mlonggo' && selected_kecamatan == 'Batealit') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Mlonggo' && selected_kecamatan == 'Bangsri') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Mlonggo' && selected_kecamatan == 'Donorojo') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Mlonggo' && selected_kecamatan == 'Jepara') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Mlonggo' && selected_kecamatan == 'Kalinyamatan') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Mlonggo' && selected_kecamatan == 'Karimunjawa') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Mlonggo' && selected_kecamatan == 'Kedung') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Mlonggo' && selected_kecamatan == 'Keling') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Mlonggo' && selected_kecamatan == 'Mayong') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Mlonggo' && selected_kecamatan == 'Mlonggo') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Mlonggo' && selected_kecamatan == 'Nalumsari') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Mlonggo' && selected_kecamatan == 'Pakis Aji') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Mlonggo' && selected_kecamatan == 'pecangaan') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Mlonggo' && selected_kecamatan == 'Tahunan') {
          tarif_input.value = 10000 + tambahan_biaya;
        } else if(kecamatan_awal == 'Nalumsari' && selected_kecamatan == 'Welahan') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Nalumsari' && selected_kecamatan == 'Kembang') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Nalumsari' && selected_kecamatan == 'Batealit') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Nalumsari' && selected_kecamatan == 'Bangsri') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Nalumsari' && selected_kecamatan == 'Donorojo') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Nalumsari' && selected_kecamatan == 'Jepara') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Nalumsari' && selected_kecamatan == 'Kalinyamatan') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Nalumsari' && selected_kecamatan == 'Karimunjawa') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Nalumsari' && selected_kecamatan == 'Kedung') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Nalumsari' && selected_kecamatan == 'Keling') {
          tarif_input.value = 13000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Nalumsari' && selected_kecamatan == 'Mayong') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Nalumsari' && selected_kecamatan == 'Mlonggo') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Nalumsari' && selected_kecamatan == 'Nalumsari') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Nalumsari' && selected_kecamatan == 'Pakis Aji') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Nalumsari' && selected_kecamatan == 'pecangaan') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Nalumsari' && selected_kecamatan == 'Tahunan') {
          tarif_input.value = 10000 + tambahan_biaya;
        } else if(kecamatan_awal == 'Pakis Aji' && selected_kecamatan == 'Welahan') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Pakis Aji' && selected_kecamatan == 'Kembang') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Pakis Aji' && selected_kecamatan == 'Batealit') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pakis Aji' && selected_kecamatan == 'Bangsri') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pakis Aji' && selected_kecamatan == 'Donorojo') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pakis Aji' && selected_kecamatan == 'Jepara') {
          tarif_input.value = 10000 + tambahan_biaya;
    } else if(kecamatan_awal == 'Pakis Aji' && selected_kecamatan == 'Kalinyamatan') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pakis Aji' && selected_kecamatan == 'Karimunjawa') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pakis Aji' && selected_kecamatan == 'Kedung') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pakis Aji' && selected_kecamatan == 'Keling') {
          tarif_input.value = 13000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pakis Aji' && selected_kecamatan == 'Mayong') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Pakis Aji' && selected_kecamatan == 'Mlonggo') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Pakis Aji' && selected_kecamatan == 'Nalumsari') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pakis Aji' && selected_kecamatan == 'Pakis Aji') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pakis Aji' && selected_kecamatan == 'pecangaan') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pakis Aji' && selected_kecamatan == 'Tahunan') {
          tarif_input.value = 10000 + tambahan_biaya;
        } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Welahan') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Kembang') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Batealit') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Bangsri') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Donorojo') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Jepara') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Kalinyamatan') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Karimunjawa') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Kedung') {
          tarif_input.value = 9000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Keling') {
          tarif_input.value = 9000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Mayong') {
          tarif_input.value = 9000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Mlonggo') {
          tarif_input.value = 9000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Nalumsari') {
          tarif_input.value = 9000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Pakis Aji') {
          tarif_input.value = 9000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Pecangaan') {
          tarif_input.value = 9000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Tahunan') {
          tarif_input.value = 9000 + tambahan_biaya;
        } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Welahan') {
          tarif_input.value = 9000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Kembang') {
          tarif_input.value = 9000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Batealit') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Bangsri') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Donorojo') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Jepara') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Kalinyamatan') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Karimunjawa') {
          tarif_input.value = 12000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Kedung') {
          tarif_input.value = 12000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Keling') {
          tarif_input.value = 12000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Mayong') {
          tarif_input.value = 12000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Mlonggo') {
          tarif_input.value = 12000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Nalumsari') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Pakis Aji') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'pecangaan') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Tahunan') {
          tarif_input.value = 10000 + tambahan_biaya;
        } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Welahan') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Kembang') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Batealit') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Bangsri') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Donorojo') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Jepara') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Kalinyamatan') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Karimunjawa') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Kedung') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Keling') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Mayong') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Mlonggo') {
          tarif_input.value = 10000 + tambahan_biaya;
      } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Nalumsari') {
          tarif_input.value = 10500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Pakis Aji') {
          tarif_input.value = 10500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'pecangaan') {
          tarif_input.value = 10500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Tahunan' && selected_kecamatan == 'Tahunan') {
          tarif_input.value = 10500 + tambahan_biaya;
        } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Welahan') {
          tarif_input.value = 10500 + tambahan_biaya;
      } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Kembang') {
          tarif_input.value = 10500 + tambahan_biaya;
      } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Batealit') {
          tarif_input.value = 10500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Bangsri') {
          tarif_input.value = 10500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Donorojo') {
          tarif_input.value = 10500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Jepara') {
          tarif_input.value = 10500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Kalinyamatan') {
          tarif_input.value = 10500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Karimunjawa') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Kedung') {
          tarif_input.value = 10000 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Keling') {
          tarif_input.value = 9500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Mayong') {
          tarif_input.value = 9500 + tambahan_biaya;
      } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Mlonggo') {
          tarif_input.value = 9500 + tambahan_biaya;
      } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Nalumsari') {
          tarif_input.value = 9500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Pakis Aji') {
          tarif_input.value = 9500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'pecangaan') {
          tarif_input.value = 9500 + tambahan_biaya;
     } else if(kecamatan_awal == 'Pecangaan' && selected_kecamatan == 'Tahunan') {
          tarif_input.value = 9500 + tambahan_biaya;
     }
      else{
          tarif_input.value = 'Ada Error';

      }
    }
</script>
@endsection