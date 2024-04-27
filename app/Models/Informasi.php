<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    protected $table = 'informasi'; // Nama tabel sesuai dengan struktur
    protected $primaryKey = 'id_informasi'; // Nama kolom primary key
    public $timestamps = true; // Tidak ada kolom created_at dan updated_at

    // Mass assignable properties
    protected $fillable = [
        'foto', 'judul', 'deskripsi', 'created_at'
    ];
}