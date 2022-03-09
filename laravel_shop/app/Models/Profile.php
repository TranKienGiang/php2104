<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';
      public function orders()
    {
        return $this->belongsToMany(Order::class, 'product_order');
    }
}
