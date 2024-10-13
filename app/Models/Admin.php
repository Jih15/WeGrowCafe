<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';

    protected $primaryKey = 'admin_id';

    protected $fillable = [
        'cafe_id',         // nullable field, if admin is associated with a cafe
        'role',            // Master Admin or Cafe Admin
        'name',            // Admin name
        'email',           // Admin email
        'password',        // Admin password (hashed)
        'phone',           // Admin phone number
        'profile_photo',   // Nullable field for profile photo URL
        'authentication_id' // Foreign key to authentication table
    ];

    // Relasi ke model Cafe (Many-to-One)
    public function cafe()
    {
        return $this->belongsTo(Cafe::class, 'cafe_id');
    }
}
