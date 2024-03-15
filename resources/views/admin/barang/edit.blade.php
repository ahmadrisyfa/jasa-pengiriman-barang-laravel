@extends('admin.template.main')
@section('content')
<h6 class="card-title fw-semibold mb-4">Edit Data</h5>
<div class="row">
  <div class="col-lg-8">
  <div class="card mb-0">
      <div class="card-body ">
        <form action="{{url('/admin/barang/update/'.$barang->id)}}" method="POST">
          {{csrf_field()}}
          <fieldset >
            <legend></legend>
            <div class="row">
              <div class="col-md-3 mb-3">
              <label for="disabledTextInput" class="form-label">User Id</label>
              <input type="text" id="user_id" name="user_id" class="form-control" value="{{$barang->user_id}}">
            </div>
            <div class="col-md-3 mb-3">
              <label for="disabledTextInput" class="form-label">Kurir Id</label>
              <input type="text" id="kurir_id" name="kurir_id" class="form-control" value="{{$barang->kurir_id}}">
            </div>
          </div>
            <div class="mb-3">
              <label for="disabledTextInput" class="form-label">Berat</label>
              <input type="text" id="berat" name="berat" class="form-control" value="{{$barang->berat}}">
            </div>
            <div class="mb-3">
              <label for="disabledTextInput" class="form-label">Kecamatan</label>
              <input type="text" id="kecamatan" name="kecamatan" class="form-control" value="{{$barang->kecamatan}}">
            </div>
              <div class="mb-3">
              <label for="disabledTextInput" class="form-label">Desa</label>
              <input type="text" id="desa" name="desa" class="form-control" value="{{$barang->desa}}">
            </div>
            <div class="mb-3">
              <label for="disabledTextInput" class="form-label">Detail Rumah</label>
              <input type="text" id="detail_rumah" name="detail_rumah" class="form-control" value="{{$barang->detail_rumah}}">
            </div>
            <div class="mb-3">
              <label for="disabledTextInput" class="form-label">Tarif</label>
              <input type="text" id="tarif" name="tarif" class="form-control" value="{{$barang->tarif}}">
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