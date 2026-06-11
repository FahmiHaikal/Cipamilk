<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'umkm_id',
        'nama_produk',
        'slug',
        'harga',
        'kategori',
        'deskripsi',
        'masa_simpan',
        'label_gizi',
        'image',
        'diskon',
        'rating',
        'terjual',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    
        }
}
