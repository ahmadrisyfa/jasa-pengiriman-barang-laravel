@extends('admin.template.main')
@section('content')
<h6 class="card-title fw-semibold mb-4">Tambah Data</h5>
<div class="row">
  <div class="col-lg-8">
  <div class="card mb-0">
      <div class="card-body ">
        <form action="{{url('/admin/User/store')}}" method="POST">
          {{csrf_field()}}
          <fieldset >
            <legend></legend>

              <div class=" mb-3">
              <label for="disabledTextInput" class="form-label">Nama</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="input....">
              @error('name')
              <p style="color: red;">{{ $message }}</p>
          @enderror
            </div>

            <div class=" mb-3 mb-3">
              <label for="disabledTextInput" class="form-label">Email</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="input....">
              @error('email')
              <p style="color: red;">{{ $message }}</p>
          @enderror
            </div>
            <div class="mb-3">
                  <label for="disabledTextInput">Admin</label>
                  <select class="form-control" id="admin" name="admin">
                 <option selected disabled >----pilih----</option>
                 <option value="0">User</option>
                <option value="1">Admin</option>
                  </select>
                  @error('admin')
              <p style="color: red;">{{ $message }}</p>
          @enderror
            </div>
            <div class=" mb-3 mb-3">
              <label for="disabledTextInput" class="form-label">Password</label>
              <input type="text" id="password" name="password" class="form-control" placeholder="input....">
              @error('password')
              <p style="color: red;">{{ $message }}</p>
          @enderror
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