<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = ['tanggal', 'kode_barang', 'nama_barang', 'jumlah', 'harga_barang', 'sub_total', 'kasir'];
}
