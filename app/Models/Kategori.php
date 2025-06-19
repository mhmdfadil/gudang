<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use  HasFactory, Notifiable;
    protected $table = 'kategori';
    protected $fillable = [
        'nama',
    ];

}
