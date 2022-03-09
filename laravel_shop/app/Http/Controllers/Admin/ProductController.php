<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    protected $modelProduct;
    protected $modelCategory;

    public function __construct(Category $categories, Product $product)
    {
        $this->modelProduct = $product;
        $this->modelCategory = $categories;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $products = $this->modelProduct
            ->paginate(config('product.paginate'));

        return view('admin.products.index', [
            
            'products' => $products,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->modelCategory->get();
        return view('admin.products.create', [
            
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {        $data = $request->only([
            'category_id',
            'img_url',
            'code',
            'price',
            'quantity',
            'sale_off',
            'status',
            'product_name',
        ]);

        $data['category_id'] = (int) $data['category_id'];
        $data['status'] = isset($data['status']) ? (int) $data['status'] : 0;

         try {
            $file = $request->file('img_url');

            if ($file) {
                $file->store('public/products');
                $data['img_url'] = $file->hashName();
            }
            $product = $this->modelProduct->create($data);
            $msg = 'Create product success.';

            return redirect()
                ->route('admin.products.show', ['product' => $product->id])
                ->with('msg', $msg);
        } catch (\Exception $e) {
            \Log::error($e);
        }

        $error = 'Something went wrong.';

        return redirect()
            ->route('admin.products.index')
            ->with('error', $error);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->modelProduct->findOrFail($id);

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->modelProduct->findOrFail($id);

        $categories = $this->modelCategory->get();
            
        return view('admin.products.edit', [
            'categories' => $categories,
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $product = $this->modelProduct->findOrFail($id);

        $data = $request->only([
           'category_id',
            'img_url',
            'code',
            'price',
            'quantity',
            'sale_off',
            'status',
            'product_name',
        ]);

        $data['category_id'] = (int) $data['category_id'];
        $data['status'] = isset($data['status']) ? (int) $data['status'] : 0;

        try {
            $file = $request->file('img_url');

            if ($file) {
                $file->store('public/products');
                $data['img_url'] = $file->hashName();
            }
            $product->update($data);
            $msg = 'Update product success.';

            return redirect()
                ->route('admin.products.show', ['product' => $product->id])
                ->with('msg', $msg);
        } catch (\Exception $e) {
            \Log::error($e);
        }

        $error = 'Something went wrong.';

        return redirect()
            ->route('admin.products.index')
            ->with('error', $error);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->modelProduct->findOrFail($id);
        try{
            $product->delete();
            $msg= 'Delete Sucess';
            return redirect()
            ->route('admin.products.index')
            ->with('msg',$msg);
        } catch (\Exception $e) {
            \Log::errpr($e);
            $error= 'Lỗi Rồi Bro';
        }

        return redirect()
            ->route('admin.products.index')
            ->with('error',$error);
    }
}
