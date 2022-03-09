<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productModel;

    public function __construct( Product $products)
    {
        $this->productModel = $products;
    }
    public function home()
    {
        $products = DB::table('shop_products')
        ->orderBy('sale_off', 'desc')
        ->orderBy('product_name', 'desc')
        ->paginate(config('product.paginate'));
        
        $categories = Category::where('is_public', config('category.public'))
            ->get();
            
        return view('viewfashion.shop', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function hotsales()
    {
        $products = $this->productModel
        ->where('sale_off', '>' , 28)
        ->orderBy('sale_off', 'desc')
        ->paginate(config('product.paginate'));
        
            
        return view('viewfashion.index-page', [
            'products' => $products,
        ]);
    }
    public function new()
    {
        $products = $this->productModel
        ->where('price', '>' , 30)
        ->orderBy('price', 'desc')
        ->paginate(config('product.paginate'));
        
            
        return view('viewfashion.index-page', [
            'products' => $products,
        ]);
    }
}
