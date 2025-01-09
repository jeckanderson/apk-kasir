@extends('dashboard.layouts.main')

@section('main')
    <div class="page-heading">
        <h3>Form Edit Data User</h3>
    </div>

    <section class="section">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <form action="/dashboard/user/{{ $user->id }}" method="post">
                        @csrf
                        @method('put')
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="masukan username" value="{{ old('username', $user->username) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="masukan nama" value="{{ old('nama', $user->nama) }}" required> 
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="masukan email" value="{{ old('email', $user->email) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="akses">Akses</label>
                                <select class="form-select" aria-label="Default select example" name="akses" id="akses" required>
                                    <option value="admin" @if ($user->akses == "admin") selected @endif>Admin</option>
                                    <option value="kasir" @if ($user->akses == "kasir") selected @endif>Kasir</option>
                                  </select>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="masukan password" value="{{ old('password', $user->password) }}" required>
                            </div>
    
                            <button type="submit" class="btn btn-danger btn-block btn-lg mt-3">Ubah</button>
    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection