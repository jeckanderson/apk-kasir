@extends('dashboard.layouts.main')

@section('main')
    <div class="page-heading">
        <h3>Form Edit Data Mahasiswa</h3>
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
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="masukan nama" value="{{ old('name', $user->name) }}"> 
                            </div>
                            
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="masukan username" value="{{ old('username', $user->username) }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="masukan email" value="{{ old('email', $mahasiswa->email) }}">
                            </div>
    
                            {{-- <div class="form-group">
                                <label for="jender">Jender</label>
                                <select class="form-select" name="jender" id="jender">
                                    @if(old('jender', $mahasiswa->jender))
                                        <option value="{{ $mahasiswa->jender }}" selected>{{ $mahasiswa->jender }}</option>
                                        <option value="Laki-Laki">Laki Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    @endif
                                </select>
                            </div> --}}
    
                            <button type="submit" class="btn btn-danger btn-block btn-lg mt-3">Ubah</button>
    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection