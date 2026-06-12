<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'umkm_id', 'title', 'slug', 'image', 'content', 'published_at'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }
}