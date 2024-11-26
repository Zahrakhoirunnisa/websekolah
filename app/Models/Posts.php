<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'judul',
        'kategori_id',
        'isi',
        'petugas_id',
        'status',
    ];

    public $timestamps = false;

    // Relasi dengan model Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    // Relasi dengan model Petugas
    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'petugas_id');
    }

    // Relasi ke Gallery
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'post_id');
    }
}
