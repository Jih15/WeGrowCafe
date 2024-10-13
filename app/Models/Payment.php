<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    // Relasi ke model Reservasi (Many-to-One)
    public function reservasi()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }
}
