<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    protected $categoryModel;
    protected $productModel;

    public function __construct(Category $categories, Product $products)
    {
        $this->categoryModel = $categories;
        $this->productModel = $products;
    }

    public function index($id)
    {   
        
        $categories = $this->categoryModel->get();
        $category = $this->categoryModel->findOrFail($id);
        $products = $this->productModel
            ->where('category_id', $category->id)
            ->paginate(config('product.paginate'));

        return view('viewfashion.shop', [
            'categories' => $categories,
            'products' => $products,
            'category' => $category, 
        ]);
        
    }
    
}
