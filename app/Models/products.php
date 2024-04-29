<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable = ['nama_barang', 'qty', 'harga'];
    public $timestamps = false;
}
