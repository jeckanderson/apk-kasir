@extends('dashboard.layouts.main')

@section('main')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>Data Transaksi</h3>
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
                    <div class="col-4">
                        <div class="form-group">
                            <label for="kode_barang">Masukan Kode Barang</label>
                            <input type="text" class="form-control @error('kode_barang') is-invalid @enderror"
                                name="kode_barang" id="kode_barang" placeholder="masukan kode barang"
                                value="{{ old('kode_barang') }}">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jumlah_barang">Masukan Jumlah Barang</label>
                            <input type="text" class="form-control @error('jumlah_barang') is-invalid @enderror"
                                name="jumlah_barang" id="jumlah_barang" placeholder="masukan jumlah barang"
                                value="{{ old('jumlah_barang') }}">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">Tambah Ke Keranjang</button>
                        </div>
                    </div>
                    <div class="col-8">
                        <h4 class="text-center">Keranjang Belanja</h4>
                        <div class="card">
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
                                            <tr>
                                                <td>1</td>
                                                <td>001</td>
                                                <td>Meja</td>
                                                <td>150.000</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-sm">Hapus</a>
                                                </td>
                                            </tr>
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
                                    <br>
                                    <br>

                                    <div class="footeer">
                                        <div>Total: 50.000</div>
                                        <div>
                                            <label for="">Jumlah Bayar: </label>
                                            <input type="text" class="form-control" value="100.000">
                                        </div>
                                        <div>Kembali: 50.000</div>
                                        <br>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-secondary">Selesai & Cetak Struk</button>
                                        </div>
                                    </div>
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
