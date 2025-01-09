@extends('dashboard.layouts.main')

@section('main')

<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
    <h3>{{ $title }}</h3>
</header>



<div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <form action="/dashboard/user">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Masukan keyword pencarian" name="search">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                  </div>
            </form>
      </div>
      <div class="col-md-6">
            <div class="input-group">
                @can('admin')
                    <a href="/dashboard/user/create" class="btn btn-primary shadow-lg">Tambah Data</a>
                @endcan
            </div>
      </div>
</div>

    @if (session()->has('success'))
        <div class="alert alert-warning">
            {{ session('success') }}
        </div>
    @endif

<div class="page-content">
    <section class="row">
        <div class="col-12">
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4>Profile Visit</h4>
                        </div> --}}
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0 table-lg">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Akses</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $row)
                                            <tr>
                                                <td class="text-bold-500">{{ $loop->iteration }}</td>
                                                <td class="text-bold-500">{{ $row->username}}</td>
                                                <td class="text-bold-500">{{ $row->nama }}</td>
                                                <td class="text-bold-500">{{ $row->email }}</td>
                                                <td class="text-bold-500">{{ $row->akses }}</td>
                                                <td>
                                                    <a href="/dashboard/user/{{ $row->id }}/edit" class="badge bg-warning">Update</a>
                                                    <form action="/dashboard/user/{{ $row->id }}" method="post" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="badge bg-danger border-0" onclick="return confirm('yakin?')">Delete</button>
                                                    </form>
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
        </div>


        
    </section>
</div>

@include('dashboard.layouts.footer')
    
@endsection