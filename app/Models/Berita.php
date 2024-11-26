<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'informasi';

    protected $fillable = [
        'judul',
        'isi',
        'gambar',   
        'slug',
        'id_kategori',
        'petugas_id'
    ];

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    // Relasi ke user/penulis
    public function user()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
} 