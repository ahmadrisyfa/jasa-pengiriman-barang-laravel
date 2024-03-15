@extends('admin.template.main')
@section('content')
<h6 class="card-title fw-semibold mb-4">Edit Data</h5>
<div class="row">
  <div class="col-lg-8">
  <div class="card mb-0">
        <div class="card-body ">
        <form action="{{url('/admin/daftar_kurir/update/'.$daftar_kurir->id)}}" method="POST">
            {{csrf_field()}}          
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="1" @if($daftar_kurir->status == 1) selected @endif>Aktif</option>
                    <option value="0" @if($daftar_kurir->status == 0) selected @endif>Tidak Aktif</option>
                </select>                
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