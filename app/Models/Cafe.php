<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    use HasFactory;

    protected $table = 'cafes';

    // Relasi ke model Meja (One-to-Many)
    public function tables()
    {
        return $this->hasMany(Table::class, 'cafe_id');
    }

    public function menu()
    {
        return $this->hasMany(Menu::class, 'cafe_id');
    }

    // Relasi ke model Admin (One-to-Many)
    public function admin()
    {
        return $this->hasMany(Admin::class, 'cafe_id');
    }
}
