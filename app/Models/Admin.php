<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';

    // Relasi ke model Cafe (Many-to-One)
    public function cafe()
    {
        return $this->belongsTo(Cafe::class, 'id_cafe');
    }
}
