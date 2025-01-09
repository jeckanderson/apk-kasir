@extends('dashboard.layouts.main')

@section('main')
    <div class="page-heading">
        <h3>{{ $title }}</h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="/dashboard/barang" method="post">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode_barang">Kode Barang</label>
                                <input type="text" class="form-control @error('kode_barang') is-invalid @enderror" name="kode_barang" id="kode_barang" placeholder="masukan Kode Barang" required value="{{ old('kode_barang') }}"> 
                                @error('kode_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="masukan nama barang" required value="{{ old('nama_barang') }}"> 
                                @error('nama_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="harga_barang">Harga Barang</label>
                                <input type="text" class="form-control" name="harga_barang" id="harga_barang" placeholder="masukan haraga barang" required value="{{ old('harga_barang') }}">
                                @error('harga_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
    
                            <button type="submit" class="btn btn-danger btn-block btn-lg mt-3">Tambah</button>
    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection