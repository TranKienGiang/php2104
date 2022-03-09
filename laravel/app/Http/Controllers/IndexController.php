<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class IndexController extends Controller
{
    public function homeview()
    {
        $products = DB::table('shop_products')
        ->orderBy('sale_off', 'desc')
        ->orderBy('product_name', 'desc')
        ->paginate(config('product.paginate'));
        
        $categories = Category::where('is_public', config('category.public'))
            ->get();
            
        return view('viewfashion.index-page', [
            'products' => $products,
            'categories' => $categories,
        ]);

    }
}
