<?php

namespace PortalComercial;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = ['order_id', 'product_id', 'price', 'quantity'];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}
