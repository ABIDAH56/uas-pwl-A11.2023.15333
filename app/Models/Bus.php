<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'jumlah_kursi', 'deskripsi', 'harga_per_hari', 'gambar',
    ];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
