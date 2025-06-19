<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use  HasFactory, Notifiable;
    protected $table = 'suppliers';
    protected $fillable = [
        'nama_supplier',
        'alamat',
        'telepon',
        'email',
    ];
}
