<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    // Relasi ke model Otentikasi (One-to-One)
    public function otentikasi()
    {
        return $this->belongsTo(Otentikasi::class, 'id_otentikasi');
    }

    // Relasi ke model Reservasi (One-to-Many)
    public function reservasi()
    {
        return $this->hasMany(Reservasi::class, 'id_customer');
    }
}
