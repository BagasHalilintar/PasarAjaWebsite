<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'users'; // Nama tabel sesuai dengan struktur
    protected $primaryKey = 'id_users'; // Nama kolom primary key
    public $timestamps = true; // Tidak ada kolom created_at dan updated_at

    // Mass assignable properties
    protected $fillable = [
        'email', 'nama', 'created_at'
    ];
}
