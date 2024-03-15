@extends('template_frontend.layout')
@section('content')
<div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image:url({{asset('frontend/assets/img/page-header.jpg')}})">
  
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>Halaman Riwayat Kirim Barang Anda</h2>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li>Riwayat Kirim Barang Anda</li>
        </ol>
      </div>
    </nav>
</div>
    
<section id="contact" class="contact">
    <div class="container card card-body" data-aos="fade-up">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kurir</th>
                <th scope="col">Nama Penerima Barang</th>
                <th scope="col">Berat</th>
                <th scope="col">Alamat Anda</th>
                <th scope="col">Alamat Tujuan</th>
                <th scope="col">Tarif</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($data as $value)                    
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$value->kurir->nama}}</td>
                    <td>{{$value->nama_tujuan}}</td>
                    <td>{{$value->berat}} Kg</td>
                    <td>Kecamatan {{$value->pemesan->kecamatan}}, Desa {{$value->pemesan->desa}}, {{$value->pemesan->detail_rumah}}</td>
                    <td>Kecamatan {{$value->kecamatan}}, Desa {{$value->desa}}, {{$value->detail_rumah}}</td>
                    <td>Rp.{{ number_format($value->tarif, 2, ',', '.') }}</td>
                    <td>
                        @if($value->status == 0)
                        <span class="btn btn-info btn-sm">Kurir Menuju Alamat Anda</span>
                        @elseif($value->status == 1) 
                        <span class="btn btn-primary btn-sm">Kurir Mengirim Barang Anda</span>
                        @elseif($value->status == 2)
                        <span class="btn btn-success btn-sm">Kurir Berhasil Mengirimkan Barang</span>
                        <td>
                      <br>
                        <a href="{{url('riwayat_kirim/cetak/'.$value->id)}}" target="_blank" class="btn btn-primary">Struk</a>
        
                    </td>
                        @endif
                    </td>
                    
                </tr>
                @endforeach
            
            </tbody>
        </table>
    </div>
</section>

@endsection