<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'position',
        'status',
    ];

    public $timestamps = false;

    // Relasi ke Posts
    public function posts()
    {
        return $this->belongsTo(Posts::class, 'post_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'gallery_id');
    }
}
