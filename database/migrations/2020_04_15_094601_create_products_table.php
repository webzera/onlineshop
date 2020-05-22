<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('slug')->unique();
            $table->text('prod_desc');
            $table->float('price');
            $table->string('prod_image')->nullable();

            $table->string('brand')->nullable();

            $table->string('local_name')->unique()->nullable();
            $table->string('SKU')->unique();
            $table->string('maket_price')->nullable();
            $table->string('supplier_id')->nullable();            
            $table->string('supplier_price')->nullable();
            $table->string('dis_price')->nullable();
            $table->string('first_avail')->nullable();
            $table->string('stock_level')->nullable();
            $table->integer('weightage')->default(1);
            $table->text('video_link')->nullable();
            $table->tinyInteger('status')->default(1);

            // $table->unsignedBigInteger('shop_id')->nullable();
            // $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');

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
        Schema::dropIfExists('products');
    }
}
