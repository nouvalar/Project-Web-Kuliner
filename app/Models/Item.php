<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 
        'lokasi', 
        'kategori', 
        'gambar', 
        'judul'
    ];

    public function favorites()
    {
        return $this->hasMany(Favorit::class);
    }
}
