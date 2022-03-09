<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Exports\OrderExport;
use App\Exports\OrderProductExport;
use Maatwebsite\Excel\Facades\Excel;
class OrderController extends Controller
{

    protected $categoryModel;
    protected $productModel;
    protected $orderModel;
    protected $productOrderModel;

    public function __construct(
        Category $category,
        Product $product,
        Order $order,
        OrderProduct $productOrder
    )
    {
        $this->categoryModel = $category;
        $this->productModel = $product;
        $this->orderModel = $order;
        $this->productOrderModel = $productOrder;
    }

    public function saveDataToSession(Request $request)
    {
        $productId = (int) $request->product_id;
        $quantity = (int) $request->quantity;
        $existFlg = false;

        if (session('cart')) {
            $data['cart'] = session('cart');

            foreach ($data['cart'] as $key => $value) {
                if ($productId == $value['id']) {
                    $data['cart'][$key]['quantity'] += $quantity;
                    $existFlg = true;
                }
            }

            if (!$existFlg) {
                $data['cart'][] = [
                    'id' => $productId,
                    'quantity' => $quantity
                ];
            }
        } else {
            $data = [
                'cart' => [
                    [
                        'id' => $request->product_id,
                        'quantity' => $request->quantity
                    ],
                ],
            ];
        }

        session($data);

        return json_encode($data);
    }

    public function orderList()
    {

        $cartData = session('cart');
        $cartData = collect($cartData);

        $productData = $cartData->pluck('quantity', 'id')->toArray();
        $productIds = $cartData->pluck('id');

        $products = $this->productModel->whereIn('id', $productIds)->get();

        $subtotal = 0;
        $delivery = 0;
        $discount = 0;
        $total = 0 ;

        foreach ($products as $product) {
            $subtotal += $product->price * $productData[$product->id] * ((100 - $product->sale_off) / 100);
            // if ($subtotal += $product->price * $productData[$product->id] * ((100 - $product->sale_off) / 100)) > 200{
            //     $delivery = 0;
            // }
            // else {
            //     $delivery = 20;
            // }
        }

        $total = $subtotal + $delivery - $discount ;

        return view('viewfashion.cart', [
            'products' => $products,
            'productData' => $productData,
            'subtotal' => $subtotal,
            'delivery' => $delivery,
            'discount' => $discount,
            'total' => $total,
        ]);
    }

    public function deleteProduct(Request $request)
    {
        $productId = (int) $request->product_id;
        $cartData = session('cart');

        foreach ($cartData as $key => $productData) {
            if ($productData['id'] == $productId) {
                unset($cartData[$key]);
            }
        }

        if (is_null($cartData)) {
            session()->forget('cart');

            return json_encode([]);
        }

        $request->session()->forget('cart');
        session(['cart' => $cartData]);

        return json_encode(['cart' => $cartData]);
    }

    public function update(Request $request)
    {
        $productId = (int) $request->product_id;
        $quantity = (int) $request->quantity;

        if (session('cart')) {
            $data['cart'] = session('cart');

            foreach ($data['cart'] as $key => $value) {
                if ($productId == $value['id']) {
                    $data['cart'][$key]['quantity'] = $quantity;
                }
            }
            session($data);

            return json_encode($data);
        }

        return json_encode(['status' => false]);
    }

    public function checkout()
    {
        $cartData = session('cart');
        $cartData = collect($cartData);

        $productData = $cartData->pluck('quantity', 'id')->toArray();
        $productIds = $cartData->pluck('id');

        $products = $this->productModel->whereIn('id', $productIds)->get();

        $subtotal = 0;
        $delivery = 0;
        $discount = 0;
        $total = 0 ;

        foreach ($products as $product) {
            $subtotal += $product->price * $productData[$product->id] * ((100 - $product->sale_off) / 100);
        }

        $total = $subtotal + $delivery -$discount ;

        return view('viewfashion.checkout', [
            'products' => $products,
            'productData' => $productData,
            'subtotal' => $subtotal,
            'delivery' => $delivery,
            'discount' => $discount,
            'total' => $total,
        ]);
    }

    public function purchase(Request $request)
    {
        $input = $request->only([
            'name',
            'phone',
            'email',
            'address',
            'total_price',
            'code',
            'note',
        ]);

        $orderSession = session('cart');
            // $totalPrice = 100;
        $code = 'JHGF100';
        $totalPrice = 100;
        $orderData = [
            'name' => $input['name'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'address' => $input['address'],
            'total_price' => $input['total_price'],
            'code' => $code,
            'note' => $input['note'],
        ];
        
        try {
            DB::beginTransaction();
            $order = $this->orderModel->create($orderData);

            $orderId = $order->id;

            $productOrderData = [];

            foreach ($orderSession as $product) {
                $productId = $product['id'];
                $productRecord = $this->productModel->find($productId);
                $productOrderData[] = [
                    'order_id' => $orderId,
                    'product_id' => $productId,
                    'price' => (int) $productRecord->price,
                    'sale_off' => $productRecord->sale_off,
                    'quantity' => $product['quantity'],
                ];
            }

            $this->productOrderModel->insert($productOrderData);
        } catch (\Exception $e) {
            \Log::error($e);
            DB::rollBack();
        }
        DB::commit();
        Mail::to($input['email'])->send(new OrderShipped($order));
        session()->forget('cart');
        return json_encode(['status_order' => 'lên đơn']);
    }

    

    public function export()
    {
        return Excel::download(new OrderExport, 'orders.xlsx');
    }
    public function exportproduct()
    {
        return Excel::download(new OrderProductExport, 'orderproducts.xlsx');
    }

}