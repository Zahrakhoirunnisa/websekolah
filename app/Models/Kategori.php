<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'judul',
    ];

    // Relasi dengan model Post
    public function posts()
    {
        return $this->hasMany(Posts::class, 'kategori_id');
    }

    public $timestamps = false;
}
