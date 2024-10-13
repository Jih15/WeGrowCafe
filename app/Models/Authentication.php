<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authentication extends Model
{
    use HasFactory;

    protected $table = 'authentications';

    // Relasi ke model Customer (One-to-One)
    public function customer()
    {
        return $this->hasOne(Customer::class, 'authentication_id');
    }
}
