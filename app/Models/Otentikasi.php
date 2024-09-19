<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otentikasi extends Model
{
    use HasFactory;

    protected $table = 'otentikasi';

    // Relasi ke model Customer (One-to-One)
    public function customer()
    {
        return $this->hasOne(Customer::class, 'id_otentikasi');
    }
}
