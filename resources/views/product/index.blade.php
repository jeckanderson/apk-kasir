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
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Qty</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="text-bold-500">{{ $row->kode }}</td>
                                                <td class="text-bold-500">{{ $row->nama }}</td>
                                                <td>{{ $row->qty}}</td>
                                                <td>{{ $row->harga}}</td>
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
