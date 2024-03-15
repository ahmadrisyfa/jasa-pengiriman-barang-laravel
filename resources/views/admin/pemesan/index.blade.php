@extends('admin.template.main')
@section('content')
<div class="row">
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Data Pemesan</h5>
                {{-- <a href="{{url('/admin/pemesan/create')}}"><button type="button" class="btn btn-outline-primary m-1">Tambah</button></a><br><br> --}}
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Id</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama User</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Kecamatan</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Desa</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Detail Rumah</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">No Hp</h6>
                        </th>
                        {{-- <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Action</h6>
                        </th> --}}
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($pemesan as $data)
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$loop->iteration}}</h6></td>
                        <td>{{$data->user->name}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->kecamatan}}</td>
                        <td>{{$data->desa}}</td>
                        <td>{{$data->detail_rumah}}</td>
                        <td>{{$data->no_hp}}</td>
                        <td>
                        <a href="{{url('/admin/pemesan/edit/'.$data->id)}}" class="btn btn-warning btn-sm"> edit</a>
                        <a href="{{url('/admin/pemesan/destroy/'.$data->id)}}" class="btn btn-danger btn-sm"> hapus</a>
                        </td>
                      </tr>     
                      @endforeach                  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection