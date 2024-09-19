<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    use HasFactory;

    protected $table = 'cafe';

    // Relasi ke model Meja (One-to-Many)
    public function meja()
    {
        return $this->hasMany(Meja::class, 'id_cafe');
    }

    // Relasi ke model Menu (One-to-Many)
    public function menu()
    {
        return $this->hasMany(Menu::class, 'id_cafe');
    }

    // Relasi ke model Admin (One-to-Many)
    public function admin()
    {
        return $this->hasMany(Admin::class, 'id_cafe');
    }
}
