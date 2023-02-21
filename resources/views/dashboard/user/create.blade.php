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
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="masukan name" required> 
                            </div>
                            
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="masukan username" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="masukan email" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="masukan password" required>
                            </div>
    
                            <button type="submit" class="btn btn-danger btn-block btn-lg mt-3">Tambah</button>
    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection