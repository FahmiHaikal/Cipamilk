<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_id',
        'umkm_id',
        'customer_name',
        'customer_phone',
        'quantity',
        'total_price',
        'status',
        'order_date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }
}
