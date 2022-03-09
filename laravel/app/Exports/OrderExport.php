<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrderExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         $title = [
            "id" => "id",
            "name" => "name",
            "phone" => "phone",
            "email" => "email",
            "user_id" =>"user_id",
            "address" => "address",
            "total_price" => "total_price",
            "code" => "code",
            "status_order" => "status_order",
            "note" => "note",
            "created_at" => "created_at",
            "updated_at" => "updated_at",    
        ];

        $orders = Order::all()->toArray();

        array_unshift($orders, $title);

        return collect($orders);
    }
}