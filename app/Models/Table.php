<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $table = 'tables';

    // Relasi ke model Cafe (Many-to-One)
    public function cafe()
    {
        return $this->belongsTo(Cafe::class, 'cafe_id');
    }

    // Relasi ke model Reservasi (One-to-Many)
    public function reservasi()
    {
        return $this->hasMany(Reservation::class, 'table_id');
    }
}
