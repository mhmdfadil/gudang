<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use  HasFactory, Notifiable;
    protected $table = 'barangs';
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'stok',
        'harga',
    ];
}
