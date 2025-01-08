<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaction = Transaction::with("products")->where("user_id", Auth::user()->id)
            ->where("status", "cart")->first();
        return view('transaksi.index')->with('transaction', $transaction);
    }

    public function hapus(string $id)
    {
        Transaction::query()->where('user_id', Auth::user()->id)
            ->where('status', 'cart')->first()
            ->products()->detach($id);

        return redirect()->route('transaksi.index');
    }

    public function selesai()
    {
        Transaction::query()->where('user_id', Auth::user()->id)
            ->where('status', 'cart')->update(['status' => 'selesai']);

        return redirect()->route('transaksi.index');
    }

    public function tambah(Request $request)
    {

        $product = Product::query()->where("kode", $request->kode)->first();
        $subTotal = $product->harga * intval($request->qty);
        $transaksi = $this->getTransaksi();
        $product->transactions()->attach($transaksi->id, ['qty' => $request->qty,
            'harga' => $subTotal,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()]);


        return redirect()->route('transaksi.index');
    }

    private function getTransaksi()
    {
        $userId = Auth::user()->id;
        $trx = Transaction::query()->where("user_id", $userId)
            ->where("status", "cart")->first();
        if (is_null($trx)) {
            $trx = Transaction::query()->create([
                "kode_transaksi" => date("YYmmdd") . time(),
                "user_id" => $userId,
                "status" => "cart"
            ]);
        }

        return $trx;

    }
}
