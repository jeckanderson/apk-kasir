@extends('dashboard.layouts.main')

@section('main')

<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>Data User</h3>

    @can('admin')
        <a href="/dashboard/user/create" class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Tambah Data</a>
    @endcan
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
                        {{-- <div class="card-header">
                            <h4>Profile Visit</h4>
                        </div> --}}
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0 table-lg">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            @can('admin')
                                            <th>Password</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="text-bold-500">{{ $row->name }}</td>
                                                <td class="text-bold-500">{{ $row->email }}</td>
                                                <td>{{ $row->username}}</td>
                                                @can('admin')
                                                <td>{{ $row->password }}</td>
                                                <td>
                                                    <a href="/dashboard/user/{{ $row->id }}/edit" class="badge bg-warning">Update</a>
                                                    <form action="/dashboard/user/{{ $row->id }}" method="post" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="badge bg-danger border-0" onclick="return confirm('yakin?')">Delete</button>
                                                    </form>
                                                </td>
                                                @endcan
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