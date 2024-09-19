<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';

    // Relasi ke model Meja (Many-to-One)
    public function meja()
    {
        return $this->belongsTo(Meja::class, 'id_meja');
    }

    // Relasi ke model Customer (Many-to-One)
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }

    // Relasi ke model Pembayaran (One-to-One)
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_reservasi');
    }
}
