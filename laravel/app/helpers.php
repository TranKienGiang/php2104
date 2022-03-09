<?php
use Illuminate\Support\Str;
if (!function_exists('showProductImage')) {
    function showProductImage($img_url)
    {
        if (Str::contains($img_url, 'http')){

           return $img_url;
        }

       	return ('/storage/products/' .$img_url);
    }
}
if (!function_exists('showCartQuantity')) {
    function showCartQuantity()
    {
        $sessionData = session('cart');
        $quantity = 0;

        if ($sessionData) {
            $quantity = count($sessionData);
        }

        return $quantity;
    }
}
?>