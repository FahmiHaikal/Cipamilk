<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasOne(
            User::class,
            'umkm_id'
        );
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
