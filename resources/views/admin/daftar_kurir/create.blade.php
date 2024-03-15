@extends('admin.template.main')
@section('content')
<h6 class="card-title fw-semibold mb-4">Tambah Data</h5>
<div class="row">
  <div class="col-lg-8">
  <div class="card mb-0">
        <div class="card-body ">
        <form action="{{url('/admin/daftar_kurir/store')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
            <fieldset >
            <legend></legend>
            {{-- <div class="row">
                <div class=" mb-3">
                <label for="disabledTextInput" class="form-label">User Id</label>
                <input type="text" id="user_id" name="user_id" class="form-control" placeholder="input....">
            </div> --}}
            </div>
            <div class=" mb-3">
                <label for="disabledTextInput" class="form-label">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="input....">
            </div>
            <div class=" mb-3">
                <label for="disabledTextInput" class="form-label">No Hp</label>
                <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="input....">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="input....">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Foto</label>
                <input type="file" id="foto" name="foto" class="form-control" placeholder="input....">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Nama Motor</label>
                <input type="text" id="nama_motor" name="nama_motor" class="form-control" placeholder="input....">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Plat Nomor</label>
                <input type="text" id="plat_nomor" name="plat_nomor" class="form-control" placeholder="input....">
            </div>
            {{-- <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Status</label>
                <input type="text" id="status" name="status" class="form-control" placeholder="input....">
            </div> --}}
            </div>
            <div class="col-lg-5 mb-4" style="margin-left:40px;"><button type="submit" class="btn btn-primary">Submit</button></div>
            
            </fieldset>
        </form>
        </div>
    </div>
  </div>
</div>
@endsection