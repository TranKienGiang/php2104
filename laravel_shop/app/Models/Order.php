<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'total_price',
        'code',
        'status_order',
        'user_id',
        'note',
    ];
    public function products() {

        return $this->belongsToMany(Product::class, 'product_order');
    }
    public function productOrders() {
        return $this->hasMany(OrderProduct::class);
    }
}
