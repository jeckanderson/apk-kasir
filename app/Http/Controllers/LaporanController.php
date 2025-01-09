<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class LaporanController extends Controller
{
    public function index()
    {
        return view('dashboard.laporan.index', [
            'title' => 'Data Barang',
            // 'barangs' => Barang::all()
        ]);
    }

    public function laporann(Request $request)
    {
        // Validasi input tanggal
        $request->validate([
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
        ]);

        // Ambil data berdasarkan filter tanggal
        $penjualan = Laporan::whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])
            ->get();

        // Total penjualan
        $totalPenjualan = $penjualan->sum('total_harga');

        // return view('dashboard.laporan.index', compact('penjualan', 'totalPenjualan'));
        return view('dashboard.laporan.index', [
            'title' => 'Data Penjualan',
            'penjualan' => $penjualan,
            'penjualan' => $totalPenjualan,
        ]);
        }
}
