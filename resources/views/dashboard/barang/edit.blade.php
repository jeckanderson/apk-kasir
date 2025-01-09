@extends('dashboard.layouts.main')

@section('main')
    <div class="page-heading">
        <h3>Form Edit Data Barang</h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="/dashboard/barang/{{ $barang->id }}" method="post">
                        @csrf
                        {{-- @dd($barang->id); --}}
                        @method('put')
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode_barang">Kode Barang</label>
                                <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="masukan kode barang" value="{{ old('kode_barang', $barang->kode_barang) }}" required> 
                            </div>

                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="masukan nama barang" value="{{ old('nama_barang', $barang->nama_barang) }}" required> 
                            </div>
                            <div class="form-group">
                                <label for="haraga_barang">Harga Barang</label>
                                <input type="text" class="form-control" name="harga_barang" id="harga_barang" placeholder="masukan harga barang" value="{{ old('harga_barang', $barang->harga_barang) }}" required> 
                            </div>
    
                            <button type="submit" class="btn btn-danger btn-block btn-lg mt-3">Ubah</button>
    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection