@extends('dashboard.layouts.main')

@section('main')

<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>Data Barang</h3>

    @can('admin')
        <a href="/dashboard/barang/create" class="btn btn-primary btn-lg shadow-lg mt-3">Tambah Data</a>
    @endcan
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
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($barangs as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="text-bold-500">{{ $row->kode_barang }}</td>
                                                <td class="text-bold-500">{{ $row->nama_barang }}</td>
                                                <td class="text-bold-500">{{ $row->harga_barang}}</td>
                                                <td>
                                                    <a href="/dashboard/barang/{{ $row->id }}/edit" class="badge bg-warning">Update</a>
                                                    <form action="/dashboard/barang/{{ $row->id }}" method="post" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="badge bg-danger border-0" onclick="return confirm('yakin?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach --}}
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