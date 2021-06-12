<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    protected $fillable =['namabarang','jumlahstok','requestbarang','status'];
}
