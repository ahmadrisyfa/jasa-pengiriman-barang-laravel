@extends('template_frontend.layout')
@section('content')
<div class="breadcrumbs">
  <div class="page-header d-flex align-items-center" style="background-image:url({{asset('frontend/assets/img/page-header.jpg')}})">

    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>Halaman Pesanan Kurir</h2>
        </div>
      </div>
    </div>
  </div>
  <nav>
    <div class="container">
      <ol>
        <li><a href="{{url('/')}}">Home</a></li>
        <li>Pesanan Kurir</li>
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
          <th scope="col">Nama Penerima Barang</th>
          <th scope="col">Nama Kurir</th>
          <th scope="col">Berat</th>
          <th scope="col">Alamat Pengirim</th>
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
              <td>{{$value->nama_tujuan}}</td>
              <td>{{$value->kurir->nama}}</td>
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
                @endif
              </td>
              <td> 
                <br>
                  {{-- <a href="{{url('riwayat_kirim/cetak/'.$value->id)}}" class="btn btn-primary">Edit</a> --}}
                  <button type="button" style="width: 80px" class="btn btn-primary edit-button"
                  data-id="{{ $value->id }}" data-bs-toggle="modal"
                  data-bs-target="#edit_modal">
                 <i class="fa fa-pencil"></i> Edit
              </button> 
  
              </td>
          </tr>
          @endforeach
      
      </tbody>
  </table>
  </div>
</section>
<div class="modal fade" id="edit_modal" tabindex="-1">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Edit Status Kirim Barang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">                                   
        <form id="EditForm">
          <input type="hidden" name="edit_id" id="edit_id">
              <div class="col-12">
                  <label for="status" class="form-label">Status Pengiriman</label><br>
                  <select name="status" id="status" required class="form-control">
                    <option value="" selected disabled>-- Pilih Status Pengiriman -- </option>
                    <option value="0">Kurir Menuju Alamat Anda</option>
                    <option value="1">Kurir Mengirim Barang Anda</option>
                    <option value="2">Kurir Berhasil Mengirimkan Barang</option>
                  </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>                
      </div>            

  </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('click', '.edit-button', function(event) {
        event.preventDefault();
        var id = $(this).data('id');

        $.ajax({
            url: '{{ url('daftar_pesanan_kurir_edit') }}/' + id,
            type: 'GET',
            success: function(data) {
                $('#edit_id').val(id);                    
                $('#status').val(data.status)                        

                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
        
        $("#EditForm").submit(function(event) {
            event.preventDefault();

            var id = $('#edit_id').val();
            
            var formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("status", $("#status").val());
          
            

            $.ajax({
                url: '{{ url('daftar_pesanan_kurir_update') }}/' + id,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert(response.message);
                    location.reload();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
@endsection