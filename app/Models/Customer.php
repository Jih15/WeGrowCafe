<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    // Relasi ke model Otentikasi (One-to-One)
    public function authentications()
    {
        return $this->belongsTo(Authentication::class, 'authentication_id');
    }

    // Relasi ke model Reservasi (One-to-Many)
    public function reservasi()
    {
        return $this->hasMany(Reservation::class, 'customer_id');
    }
}
