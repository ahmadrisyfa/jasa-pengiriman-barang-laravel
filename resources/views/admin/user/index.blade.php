@extends('admin.template.main')
@section('content')
<div class="row">
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">             
              <div class="card-body p-4">
                @if(session('pesan'))
                <div class="alert alert-success">
                    {{ session('pesan') }}
                </div>
                @endif
                <h5 class="card-title fw-semibold mb-4">Data User</h5>
                {{-- <a href="{{url('/admin/User/create')}}"><button type="button" class="btn btn-outline-primary m-1">Tambah</button></a><br><br> --}}
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Id</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">email</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">admin</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Action</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($User as $data)
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$loop->iteration}}</h6></td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>
                          @if($data->admin == 1)
                          <button class="btn btn-success">Admin</button>
                          @else
                          <button class="btn btn-info">User</button>
                          @endif

                        </td>
                        <td>
                        <a href="{{url('/admin/User/edit/'.$data->id)}}" class="btn btn-warning btn-sm"> edit</a>
                        <a href="{{url('/admin/User/destroy/'.$data->id)}}" class="btn btn-danger btn-sm"> hapus</a>
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