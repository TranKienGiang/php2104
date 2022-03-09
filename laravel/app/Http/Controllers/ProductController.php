<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function show($id)
    {
        $product = DB::table('shop_products')->find($id);
        if (!$product) {
            return redirect('home');
        }

        return view('viewfashion.detail', ['product' => $product]);
    }
}
