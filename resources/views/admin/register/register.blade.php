<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <link rel="shortcut icon" type="image/png" href="{{('backend/assets/images/logos/favicon.png')}}" />
  <link rel="stylesheet" href="{{('backend/assets/css/styles.min.css')}}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
          
                <h1 class="h4 text-gray-900 mb-4 center" style="text-align:center">Register Here!!!</h1>
              
         
                
                <form action="{{url('/register')}}" method="POST">
                   @csrf
                  <div class="mb-3">
                    <label for="exampleInputUsername" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name">
                    @error('name')
            <p style="color: red;">{{ $message }}</p>
        @enderror
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputUsername" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                    @error('email')
            <p style="color: red;">{{ $message }}</p>
        @enderror
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @error('password')
            <p style="color: red;">{{ $message }}</p>
        @enderror
                  </div>
                  <!-- <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div>
                    <a class="text-primary fw-bold" href="./index.html">Forgot Password ?</a> 
                  </div> -->
                  @if(Session('message'))
                      <div class="alert alert-danger">
                          <b>!!</b> {{Session('message')}}
                      </div>
                  @endif
                  <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Register</button>
                  <div class="d-flex align-items-center justify-content-center">
                    
                    <a class="text-primary fw-bold ms-2" href="{{url('login')}}">Sudah Punya Akun? Login Sekarang</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{('backend/assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{('backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>