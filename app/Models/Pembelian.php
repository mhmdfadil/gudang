<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = 'pembelian';
    protected $fillable = [
        'kode_pembelian',
        'kategori_id',
        'supplier_id',
        'tanggal_pembelian',
        'total_harga',
        'keterangan'
    ];
     /**
     * Get the supplier associated with the purchase.
     * 
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
