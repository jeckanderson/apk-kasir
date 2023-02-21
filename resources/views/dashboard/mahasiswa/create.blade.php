@extends('dashboard.layouts.main')

@section('main')
    <div class="page-heading">
        <h3>Form Tambah Data Mahasiswa</h3>
    </div>

    <section class="section">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <form action="/dashboard/user" method="post">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="masukan nama" required> 
                            </div>
                            
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="masukan jurusan" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="masukan alamat" required>
                            </div>
    
                            <div class="form-group">
                                <label for="jender">Jender</label>
                                <select class="form-select" name="jender" id="jender">
                                    <option value="Laki-Laki">Laki Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
    
                            <button type="submit" class="btn btn-danger btn-block btn-lg mt-3">Tambah</button>
    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection