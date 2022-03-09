<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use App\Http\Middleware;
use App\Mail\OrderShipped;
use App\Mail\NewFashions;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewMailController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/a', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/name', function () {
    return ('Well Come To Giang Cá Khô From Ba Vì !!');
});

Route::get('/input-get', function () {
   return view('inputget');
});

Route::get('/user{id}', function ($id) {
    return 'User '.$id;
});

Route::get('/demoget', function (Request $request) {
    return view('outputget',['data'=>$request->all()]);
});

Route::get('/input-post', function () {
   return view('inputpost');
});

Route::post('/demopost', function (Request $request) {
    return view('outputpost',['data'=>$request->all()]);
});
// if (Route::current()->getName() == 'shop') {
  
// }
// Route::get('/viewname', function () {
//    return view('myviews.viewname', ['name' => 'Giang !!! ']);
// });

Route::get('/viewdob', function () {
   return view('myviews.viewblade', ['name' => 'Giang !!!']);
});

Route::get('/viewblade', function () {
   return view('myviews.viewblade', $array=['Giang','Hi']);
});

// Route::get('/view-exists', function () {
//     if (View::exists('myviews.viewname')) {

//         echo '<script language="javascript">';
//         echo 'alert("View exists")';  //not showing an alert box.
//         echo '</script>';
//     }
//     else {
//         return view('inputpost');
//     }
// });
// Route::get('/view-composer', function ($view) {
//    return view('myviews.viewname', ['name' => 'Giang !!! ']);
// });
Route::get('/view-component', function () {
   return view('myviews.viewname');
});
Route::get('/home1', function () {
   return view('myviews.home');
});
Route::get('/about1', function () {
   return view('myviews.about');
});
Route::get('/contact1', function () {
   return view('myviews.contact');
});
Route::get('/', [IndexController::class, 'homeview'])->name('home');

Route::post('/addcart', [OrderController::class, 'saveDataToSession'])->name('addcart');

Route::put('/order-update', [OrderController::class, 'update'])->name('updatecart');

Route::get('/showcart', [OrderController::class, 'orderList'])->name('showcart');

Route::post('/deletecart', [OrderController::class, 'deleteProduct'])->name('deletecart');

Route::get('/shop', [HomeController::class, 'home'])->name('shop');

Route::get('/shop/{id}', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/hotsales', [HomeController::class, 'hotsales'])->name('products.hotsales');

Route::get('/new', [HomeController::class, 'new'])->name('products.new');

Route::get('/blog', function () {
   return view('viewfashion.blog');
})->name('blog');


Route::get('/about', function () {
   return view('viewfashion.about');
});


Route::get('/contact', function () {
   return view('viewfashion.contact');
})->name('contact');

Route::get('/detail/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/detail', function () {
   return view('viewfashion.detail');
});

Route::get('/checkout', function () {
   return view('viewfashion.checkout');
});

Route::get('/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
Route::get('/order-mail', [OrderController::class, 'orderMail'])->name('order.mail');

Route::get('/blog-detail', function () {
   return view('viewfashion.blog-detail');
});

Route::get('/order-export', [OrderController::class, 'export'])->name('order.export');
Route::get('/orderproduct-export', [OrderController::class, 'exportproduct'])->name('orderProduct.export');

Route::name('admin.')->group(function () {
   Route::resource('/products', AdminProductController::class)->middleware(['auth','admin']);
   Route::get('/orders', [AdminOrderController::class, 'index'])->name('order.index');
   Route::get('/order-list', [AdminOrderController::class, 'orderList'])->name('order-list');
   Route::get('/order-products-list', [AdminOrderController::class, 'orderProductsList'])->name('order-products-list');
});

Route::resource('photos', PhotoController::class);

Route::get('/send-mail', [OrderShipped::class, 'build'])->name('send-mail');
Route::get('/fashion-mail', [NewFashions::class, 'build'])->name('fashion-mail');

Route::post('purchase', [OrderController::class, 'purchase'])->name('order.purchase');

Route::post('/newmail', [NewMailController::class, 'sendNew'])->name('newmail');

require __DIR__.'/auth.php';
    