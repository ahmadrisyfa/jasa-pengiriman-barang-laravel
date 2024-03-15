@extends('admin.template.main')
@section('content')
<div class="row">
        
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-4">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Total Admin</h5>
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h4 class="fw-semibold mb-3">{{$total_admin}}</h4>                                                
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Total User</h5>
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h4 class="fw-semibold mb-3">{{$total_user}}</h4>                                                
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Total Kurir</h5>
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h4 class="fw-semibold mb-3">{{$total_kurir}}</h4>                                                
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Total Pesanan Hari Ini</h5>
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h4 class="fw-semibold mb-3">{{$total_pesanan_hari_ini}}</h4>                                                
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Total Semua Pesanan</h5>
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h4 class="fw-semibold mb-3">{{$total_semua_pesanan}}</h4>                                                
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection