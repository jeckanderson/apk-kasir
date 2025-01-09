@extends('dashboard.layouts.main')

@section('main')
    <div class="page-heading">
        <h3>Form Tambah Data User</h3>
    </div>

    <section class="section">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <form action="/dashboard/user" method="post">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="masukan username" value="{{ old('username') }}">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="masukan nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="masukan email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="akses">Pilih Akses</label>
                                <select id="akses" name="akses" class="form-control @error('akses') is-invalid @enderror">
                                    <option value="">-Pilih Akses-</option>
                                    <option value="admin" {{ old('akses') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="kasir" {{ old('akses') == 'kasir' ? 'selected' : '' }}>Kasir</option>
                                </select>
                                @error('akses')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="masukan password">
                                @error('password')
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