<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'price',
        'quantity',
        'status',
        'sale_off',
        'img_url',
        'code',
        'product_name',
    ];
    protected $table = 'shop_products';
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'product_order');
    }
}
