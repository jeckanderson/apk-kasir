<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Barang extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'kode_barang',
    //     'nama_barang',
    //     'harga_barang',
    // ];
    protected $guarded = ['id'];


    public function transactions() : BelongsToMany
    {
        return $this->belongsToMany(Transaction::class)->wherePivot('qty', 'harga');
    }
}
