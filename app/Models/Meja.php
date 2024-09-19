<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;

    protected $table = 'meja';

    // Relasi ke model Cafe (Many-to-One)
    public function cafe()
    {
        return $this->belongsTo(Cafe::class, 'id_cafe');
    }

    // Relasi ke model Reservasi (One-to-Many)
    public function reservasi()
    {
        return $this->hasMany(Reservasi::class, 'id_meja');
    }
}
