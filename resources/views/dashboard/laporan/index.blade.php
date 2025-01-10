@extends('dashboard.layouts.main')

@section('main')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <h3>Laporan Penjualan</h3>
    <div class="row d-flex">
        <form action="/laporann" method="GET">
            <div class="form-group">
                <label for="tanggal_awal">Tanggal Awal</label>
                <input type="date" id="tanggal_awal" name="tanggal_awal" class="form-control"
                    value="{{ request('tanggal_awal') }}">
            </div>
            <div class="form-group">
                <label for="tanggal_akhir">Tanggal Akhir</label>
                <input type="date" id="tanggal_akhir" name="tanggal_akhir" class="form-control"
                    value="{{ request('tanggal_akhir') }}">
            </div>

            <button type="submit" class="btn btn-primary mt-2 mb-4">Cari</button>
        </form>
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
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-lg">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Sub Total</th>
                                                <th>Kasir</th>
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
