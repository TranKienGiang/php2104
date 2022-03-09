<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{   
    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'sale_off',
        'quantity',
    ];
    use HasFactory;
    protected $table = 'product_order';
}