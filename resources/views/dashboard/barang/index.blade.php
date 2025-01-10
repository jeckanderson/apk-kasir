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
            <form action="/dashboard/barang">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Masukan keyword pencarian" name="search">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                @can('admin')
                    <a href="/dashboard/barang/create" class="btn btn-primary shadow-lg">Tambah Data</a>
                @endcan
            </div>
        </div>
    </div>



    @if (session()->has('success'))
        <div class="alert alert-warning">
            {{ session('success') }}
        </div>
    @endif

    <div class="page-content mt-3">
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
                                            @foreach ($barangs as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="text-bold-500">{{ $row->kode_barang }}</td>
                                                    <td class="text-bold-500">{{ $row->nama_barang }}</td>
                                                    <td class="text-bold-500">{{ $row->harga_barang }}</td>
                                                    <td>
                                                        <a href="/dashboard/barang/{{ $row->id }}/edit"
                                                            class="badge bg-warning">Update</a>
                                                        <form action="/dashboard/barang/{{ $row->id }}" method="post"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="badge bg-danger border-0"
                                                                onclick="return confirm('yakin?')">Delete</button>
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
