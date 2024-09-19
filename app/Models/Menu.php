<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';

    // Relasi ke model Cafe (Many-to-One)
    public function cafe()
    {
        return $this->belongsTo(Cafe::class, 'id_cafe');
    }
}
