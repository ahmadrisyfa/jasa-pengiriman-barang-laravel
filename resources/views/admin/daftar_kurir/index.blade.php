@extends('admin.template.main')
@section('content')
<div class="row">
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Data Daftar Kurir</h5>
                {{-- <!-- <a href="{{url('/admin/daftar_kurir/create')}}"><button type="button" class="btn btn-outline-primary m-1">Tambah</button></a><br><br> --> --}}
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
                          <h6 class="fw-semibold mb-0">No Hp</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Alamat</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Foto</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama Motor</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Plat Nomor</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Status</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Action</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($daftar_kurir as $data)
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$loop->iteration}}</h6></td>
                        <td>{{$data->user->name}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->no_hp}}</td>
                        <td>{{$data->alamat}}</td>
                        <td><img src="{{asset('storage/'.$data->foto)}}" width="200"></td>
                        <td>{{$data->nama_motor}}</td>
                        <td>{{$data->plat_nomor}}</td>
                        <td>
                          @if($data->status == 1)
                          <button class="btn btn-success">Aktif</button>
                          @else
                          <button class="btn btn-danger">Non Aktif</button>
                          @endif
                        </td>
                        <td>
                        <a href="{{url('/admin/daftar_kurir/edit/'.$data->id)}}" class="btn btn-warning btn-sm"> edit</a>
                        {{-- <a href="{{url('/admin/daftar_kurir/destroy/'.$data->id)}}" class="btn btn-danger btn-sm"> hapus</a> --}}
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