<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'mahasiswa';

    protected $fillable = [
        'nama',
        'jurusan',
        'alamat',
        'jender',
    ];
}
