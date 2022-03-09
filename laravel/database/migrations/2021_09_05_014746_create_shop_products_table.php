<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_products', function (Blueprint $table) {
            $table->id();
            $table->text('code');
            $table->text('img_url')->nullable();
            $table->string('product_name');
            $table->text('description')->nullable();
            $table->float('price')->nullable();
            $table->integer('sale_off')->nullable();
            $table->integer('quantity')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->integer('category_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_products');
    }
}
