@extends('admin.template.main')
@section('content')
<h6 class="card-title fw-semibold mb-4">Tambah Data</h5>
<div class="row">
  <div class="col-lg-8">
  <div class="card mb-0">
      <div class="card-body ">
        <form action="{{url('/admin/pemesan/store')}}" method="POST">
          {{csrf_field()}}
          <fieldset >
            <legend></legend>
            <div class="row">
              <div class=" mb-3">
              <label for="disabledTextInput" class="form-label">User Id</label>
              <input type="text" id="user_id" name="user_id" class="form-control" placeholder="input....">
            </div>
            </div>
            <div class=" mb-3">
                <label for="disabledTextInput" class="form-label">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="input....">
            </div>
            <div class="mb-3">
              <label for="disabledTextInput" class="form-label">Kecamatan</label>
              <input type="text" id="kecamatan" name="kecamatan" class="form-control" placeholder="input....">
            </div>
              <div class="mb-3">
              <label for="disabledTextInput" class="form-label">Desa</label>
              <input type="text" id="desa" name="desa" class="form-control" placeholder="input....">
            </div>
            <div class="mb-3">
              <label for="disabledTextInput" class="form-label">Detail Rumah</label>
              <input type="text" id="detail_rumah" name="detail_rumah" class="form-control" placeholder="input....">
            </div>
            <div class="col-md-4 mb-3">
                <label for="disabledTextInput" class="form-label">No Hp</label>
                <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="input....">
            </div>
            </div>
            <div class="col-lg-5 mb-4" style="margin-left:40px;"><button type="submit" class="btn btn-primary">Submit</button></div>
            
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection