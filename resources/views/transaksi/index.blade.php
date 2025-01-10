@extends('dashboard.layouts.main')

@section('main')

    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>Selamat Datang, {{ auth()->user()->username }}</h3>
    </div>

    <div class="row">
        <div class="col-3">
            <div class="card p-4">
                <form action="/transaksi/tambah" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="kode" class="form-label">Masukan Kode Barang</label>
                        <input type="text" class="form-control" name="kode" id="kode" required>
                    </div>
                    <div class="mb-3">
                        <label for="qty" class="form-label">Masukan Jumlah Barang</label>
                        <input type="number" class="form-control" name="qty" id="qty" required>
                    </div>
                    <input type="submit" class="btn btn-primary w-100" value="Tambah" />
                </form>
            </div>
        </div>
        <div class="col-9">
            <div class="card p-4">
                <h6 class="text-center">Keranjang Belanja</h6>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Sub Total</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @if (!is_null($transaction))
                            @foreach ($transaction->barangs as $product)
                                <tr>
                                    <th scope="col">{{ $product->kode_barang }}</th>
                                    <th scope="col">{{ $product->nama_barang }}</th>
                                    <th scope="col">{{ $product->pivot->qty }}</th>
                                    <th scope="col">{{ $product->harga_barang }}</th>
                                    <th scope="col">{{ $product->pivot->harga }}</th>
                                    <th scope="col">
                                        <a href="/transaksi/hapus/{{ $product->id }}" class="btn btn-sm btn-danger">
                                            hapus
                                        </a>
                                    </th>
                                </tr>
                                @php $total += $product->pivot->harga; @endphp
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <h6 class="mt-5">Total : <span id="total">{{ $total }}</span></h6>
                <h6>Jumlah Bayar : </h6>
                <div class="input-group w-50">
                    <input type="text" class="form-control" id="bayar" placeholder="Masukan jumlah bayar"
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cek</button>
                </div>
                <h6 class="mt-5">Kembalian : <span id="kembalian">0</span></h6>

                <a href="/transaksi/selesai" class="btn btn-primary w-25">Selesai & Cetak Struk</a>
            </div>
        </div>
    </div>

@section('script')
    <script>
        let cek = document.getElementById('button-addon2');
        let total = document.getElementById('total');
        let kembalian = document.getElementById('kembalian');
        cek.addEventListener("click", () => {
            let bayar = document.getElementById('bayar');

            let totalKembali = parseInt(bayar.value) - parseInt(total.textContent);

            kembalian.textContent = totalKembali;
        })
    </script>
@endsection

@include('dashboard.layouts.footer')

@endsection
