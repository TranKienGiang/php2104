<?php

namespace App\Exports;

use App\Models\OrderProduct;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrderProductExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    { 
        $title = [
            "order_id" => "order_id",
            "product_id" => "product_id",
            "price" => "price",
            "sale_off" => "sale_off",
            "quantity" => "quantity",   
        ];

        $orderproducts = OrderProduct::all()->toArray();

        array_unshift($orderproducts, $title);

        return collect($orderproducts);
    }
}